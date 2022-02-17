<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Group;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['addLink'] = "products.create";
        $this->data['heading'] = "Products List";
        $this->data['products'] = Product::all();

        return view('products.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $this->data ['heading'] = "Add New Product";
       $this->data ['editStatus'] = false;
       $this->data ['data'] = (object) array('id' => 0);
       $this->data['category'] = Category::arrayForSelect();
        return view('products.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         =>'required|unique:products',
            'price'         =>'required',
            'cost_price'    =>'required',
            'category_id'   =>'required',
        ]);
        $data = $request->all();
        $data['admin_id'] = Auth::id();
        if(Product::create($data)){
            $request->session()->flash('message', 'Product Created Successfull.');
            $request->session()->flash('status', 'success');
            return redirect(route('products.index'));
        }else{
            $request->session()->flash('message', 'Product cant Created Successfull.');
            $request->session()->flash('status', 'error');
            return redirect(route('products.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['products'] = Product::findOrFail($id);
        return view('products.show',  $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['category'] = Category::arrayForSelect();
        $this->data['admin'] = Admin::arrayForSelect();
        $this->data['heading'] = 'Edit Product Data.';
        $this->data['editStatus'] = true;
        $this->data['data'] = Product::findOrFail($id);
        return view('products.create', $this->data);
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
        $Product = Product::findOrFail($id);
        $Product->title = $request->title;
        $Product->description = $request->description;
        $Product->cost_price = $request->cost_price;
        $Product->price = $request->price;
        $Product->category_id = $request->category_id;
        $Product->admin_id = Auth::id();
        $Product->updated_at = now();
        if ($Product->save()) {
            $request->session()->flash('message', ' Product Updated Successfull.');
            $request->session()->flash('status', 'success');
            return redirect(route('products.index'));
        }else{
            $request->session()->flash('message', ' Product cant Update.');
            $request->session()->flash('status', 'error');
            return redirect(route('products.index'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Product::destroy($id)){
            session()->flash('message', 'Product Deleted Successfull.');
            session()->flash('status', 'success');
            return redirect(route('products.index'));
        }else{
            session()->flash('message', 'Product cant Created Successfull.');
            session()->flash('status', 'error');
            return redirect(route('products.index'));
        }
    }
}
