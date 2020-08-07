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

class ProductsController extends Controller
{
    
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
            $categoryName =  optional($categories->where('slug', request()->category)->first())->name;

        } else {

            $products = Product::paginate(10);
            $categories = Category::all();
            $categoryName = 'All Products';

        }
        
        return view('products.index')->with([
            'products' => $products, 
            'categories' => $categories,
            'categoryName' => $categoryName,
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

        // $user_id = auth()->user()->id; //  NO USE
        // $user = User::find($user_id); // NO USE 

        // $product->categories()->attach($categories);

        return view('products.create')->with([
            
            'brands' => $brands,
            'categories' => $categories,
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

        global $fileNameToStore;
        // Save the product
        if($request->hasFile('image'))
        {
            // Get the file with extension
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

        dd($request->all());

        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'molecules' => 'required',
            'text' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|nullable|max:1999',
            'location' => 'required',
        ]);

        // $category = Category::where('category_id', '=', $category->id);
        // $brand = Brand::where('brand_id', '=', $brand->id);


        $product = new Product;
        $product->title = $request->input('title');
        $product->slug = $request->input('slug');
        $product->molecules = $request->input('molecules');
        $product->text = $request->input('text');
        $product->brand_id = $request->get('brand');
        $product->category_id = $request->get('category');
        $product->image = $fileNameToStore;
        $product->location = $request->input('location');
        $product->save();


        return redirect('/admin/products')->with('success', 'Product Created');
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
        return view('products.show')->with([
            'product' => $product,
            // 'brand' => $brand,
            'categories' => $categories,
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
        return view('products.edit')->with([
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
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
            'location' => 'required',
        ]);

        $product = Product::find($id);
        $product->title = $request->input('title');
        $product->slug = $request->input('slug');
        $product->molecules = $request->input('molecules');
        $product->text = $request->input('text');
        $product->brand_id = $request->get('brand');
        $product->category_id = $request->get('category');
        $product->location = $request->input('location');
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



    
}
