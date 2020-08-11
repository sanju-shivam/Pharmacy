<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Auth;
use App\brand_user;

class BrandsController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brands = Brand::all(); 

        return view('admin.brands.index')->with([
            'brands' => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);

        $brand = new Brand;
        $brand->name = $request->input('name');
        $brand->slug = $request->input('slug');
        if($brand->save()) {
            $request->session()->flash('success', $brand->name .' has been updates');
        }else{
            $request->session()->flash('error', 'There was an error updating ' . $brand->name);
        }

        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('admin.brands.edit')->with('brand', $brand);
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
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->input('name');
        $brand->slug = $request->input('slug');
        if($brand->save()) {
            $request->session()->flash('success', $brand->name .' has been updates');
        }else{
            $request->session()->flash('error', 'There was an error updating ' . $brand->name);
        }

        return redirect()->route('admin.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        $brand->delete();

        return redirect()->route('admin.brands.index');
    }


    // Supplier want to add its brand for first time view
    public function brands_add_view_supplier()
    {
        $brands = Brand::select('name','id')->get();
        return view('supplier.select_brands',compact('brands'));
    }

    // Supplier want to update or view brands
    public function brands_view_supplier()
    {
        $brand_id = brand_user::select('brand_id')->where('user_id','=',Auth::user()->id)->get();
        $brand_id =  explode(',',$brand_id[0]->brand_id);
        // dd($brand_id,Auth::user()->id);
        $brands = Brand::select('name','id')->get();
        return view('supplier.view_selected_brands',compact('brands','brand_id'));
    }

    // Supplier wants to add brands to database 
    public function brands_store_supplier(Request $request)
    {
        $obj = new brand_user;
        $obj->user_id = Auth::user()->id;
        $obj->brand_id = implode(',', $request->brand);
        $obj->save();

        if($obj){
            return redirect('/select_brands');
        }
    }

    // Supplier wants to update brands to database 
    public function brands_update_supplier(Request $request)
    {   

        if(!empty($request->brand)){
            $brand_id = implode(',', $request->brand);
        }
        else{
            $brand_id = null;
        }
        $obj = brand_user::where('user_id','=', Auth::user()->id)->update([
            'brand_id' => $brand_id,
        ]);

        if($obj){
            return redirect('/View_Selected_Brands');
        }
    }
}
