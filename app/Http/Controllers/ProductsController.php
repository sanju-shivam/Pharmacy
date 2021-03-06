<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use Gate;
use DB;
use App\Product;
use App\Exports\ProductsExport;
use App\Category;
use App\Brand;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Social;
use App\State;
use Illuminate\Support\Str;

class ProductsController extends Controller
{




    public function fetch(Request $request)
    {
        if($request->ajax())
     {
      $query = $request->query;
      $data = DB::raw('products')->where('title', 'LIKE', "%{$query}%")->distinct()->get(['title']);
      $output = '<ul class="dropdown-menu" " style="display:block; position:absolute;z-index:10000 !important;width:100%">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->title.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

    
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index', 'search']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // If the category is selected
        if(request()->category) {
            
            $products = Product::with('category')->whereHas('category', function ($query){
                $query->where('slug', request()->category);
            })->paginate(10);

            $categories = Category::all();
            $states = State::all();
            $categoryName =  optional($categories->where('slug', request()->category)->first())->name;

        } 
        elseif(request()->state) {
            // Filter by State
            $products = Product::with('state')->whereHas('state', function ($query){
                $query->where('slug', request()->state);
            })->paginate(10);

            $categories = Category::all();
            $states = State::all();
            $categoryName =  optional($categories->where('slug', request()->category)->first())->name;
            // $stateName =  optional($states->where('slug', request()->state)->first())->name;
        }
        else {

            $products = Product::paginate(10);
            $categories = Category::all();
            $categoryName = 'All Categories';
            $states = State::all();

        }

        $socials = Social::all();

        //dd($states);
        
        return view('products.index')->with([
            'products' => $products, 
            'categories' => $categories,
            'categoryName' => $categoryName,
            'socials' => $socials,
            'states' => $states,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $states = State::all();

        $socials = Social::all();
        return view('products.create')->with([
            'brands' => $brands,
            'categories' => $categories,
            'socials' => $socials,
            'states' => $states,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);

        global $fileNameToStore;
        // Save the product
        if($request->hasFile('image'))
        {
            //  Get the file with extension
            $file= $request->file('image');
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File name to store and Get the extension
            $fileNameToStore= $filename.'_'.time().'_'.$request->image->extension();
            //Upload Image
            $file->move('public/products',$fileNameToStore);
        } else {
            $fileNameToStore = 'productimage.jpeg';
        }

        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'molecules' => 'required',
            'text' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:1999',
            'state' => 'required',
        ]);

        $product = new Product;
        $product->title = $request->input('title');
        $product->slug = Str::slug($request->input('title', '-'));
        $product->molecules = $request->input('molecules');
        $product->text = $request->input('text');
        $product->brand_id = $request->get('brand');
        $product->category_id = $request->get('category');
        $product->image = $fileNameToStore;
        $product->state_id = $request->input('state');
        $product->save();

        if($product){
            return redirect('/admin/products')->with('success', 'Product Created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // All Categories 
        $categories = Category::paginate(12);
        // $brand = Brand::find('slug');
        $product = Product::where('slug', $slug)->firstOrFail();
        $socials = Social::all();
        return view('products.show')->with([
            'product' => $product,
            // 'brand' => $brand,
            'categories' => $categories,
            'socials' => $socials,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::find($id);
        $states = State::select('name','id')->get();
        return view('products.edit')->with([
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
            'states' => $states,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Save the product
        if($request->hasFile('image'))
        {
            // Get the file with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get the ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAS('public/products', $fileNameToStore);
        }

        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'molecules' => 'required',
            'text' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000',
            'state' => 'required',
        ]);

        $product = Product::find($id);
        $product->title = $request->input('title');
        $product->slug = Str::slug($request->input('title', '-'));
        $product->molecules = $request->input('molecules');
        $product->text = $request->input('text');
        $product->brand_id = $request->get('brand');
        $product->category_id = $request->get('category');
        $product->state_id = $request->input('state');
        if($request->hasFile('image')) {
            $product->image = $fileNameToStore;
        }
        if($product->save()) {
            $request->session()->flash('success', $product->title .' has been updates');
        }else{
            $request->session()->flash('error', 'There was an error updating ' . $product->title);
        }

        return redirect('/admin/products')->with('success', 'Product Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if($product->image != 'productimage.jpeg') { 
            // Delete Image
            Storage::delete('public/products/'.$product->image);
        }
        $product->delete();

        return redirect('/admin/products')->with('success', 'Product is Removed');
    }

    /**
     * Export Excel file from Products Table
     */
    public function export()
    {
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }

    /**
     * Import Excel file to Products Table
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function import(Request $request)
    {
        //Save the File
        if($request->hasFile('file'))
        {
            // Get the file with extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            //Get the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get the ext
            $extension = $request->file('file')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload File
            $path = $request->file('file')->storeAS('public/excels', $fileNameToStore);

        
        }


        $this->validate($request, [
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $products = Excel::toArray(new ProductsImport(), $request->file('file'));

        foreach($products[0] as $row) {
            //  dd($row[1].' '.$row[2]);
            $arr[] = [
                // If uncomment this id from here, remove [0] from foreach
                // 'id' => $row[0], 
                'image' => $row[1],
                'title' => $row[2],
                'slug' => $row[3],
                'molecules' => $row[4],
                'text' => $row[5],
                'brand_id' => $row[6],
                'category_id' => $row[7],
                'state_id' => $row[8],
            ];
        }

        if(!empty($arr)){
            DB::table('products')->insert($arr);
        }
          
        return back()->with('success', 'Excel file uploaded to database successfully');
    
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'query' => 'required|min:3',
        ]);

        if ($validator->fails()) {
        return back()->with('toast_error', 'Please enter at least 6 character');
        }

        $query = $request->input('query');

        $products = Product::select('products.*', 'brands.name', 'brands.slug as brand_slug')
                        ->where('title', 'like', "%$query%")
                        ->orWhere('molecules', 'like', "%$query%")
                        ->orWhere('text', 'like', "%$query%")
                        ->join('brands', 'brands.id', '=', 'brand_id')
                        ->orWhere('name', 'like', "%$query%")->paginate(10);

        $categories = Category::all();
        $brands = Brand::all();

        return view('products.search')->with([
            'products' => $products,
            'categories'=> $categories,
            'brands' => $brands,
        ]);   
    }



    // public function filter(Request $request)
    // {
    //     //dd($request->all());
    //     if(!empty($request->FilterCategory) and empty($request->state)){
            
    //         $products = Product::select('image','title','slug','text')->where('category_id','=',$request->FilterCategory)->get();
    //         $categories = Category::all();
    //         $socials = Social::select('link','icon')->get();
    //         $states = State::select('name','id')->get();
    //         return view('products.Filter_products',compact('products','categories','socials','states'));           
    //     }
    //     else if(empty($request->FilterCategory) and !empty($request->state)){
    //         $products = Product::select('image','title','slug','text')->where('location','=',$request->state)->paginate(4);
    //         $categories = Category::all();
    //         $socials = Social::select('link','icon')->get();
    //         $states = State::select('name','id')->get();
    //         return view('products.Filter_products',compact('products','categories','socials','states'));
    //     }
    //     else{
    //         $products = Product::select('image','title','slug','text')->where('location','=',$request->state)->where('category_id','=',$request->FilterCategory)->get();
    //         $categories = Category::all();
    //         $socials = Social::select('link','icon')->get();
    //         $states = State::select('name','id')->get();
    //         return view('products.Filter_products',compact('products','categories','socials','states'));
    //     }
    // }







    
}
