<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['addLink'] = "categories.create";
        $this->data['heading'] = "categories List";
        $this->data['categories'] = Category::all();

        return view('categories.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $this->data ['heading'] = "Add New Category";
       $this->data ['editStatus'] = false;
       $this->data ['data'] = (object) array('id' => 0);
       $this->data['groups'] = Group::arrayForSelect();
        return view('categories.create', $this->data);
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
            'title'=>'required|unique:categories',
        ]);

        if(Category::create($request->all())){
            $request->session()->flash('message', 'Category Category Title Created Successfull.');
            $request->session()->flash('status', 'success');
            return redirect(route('categories.index'));
        }else{
            $request->session()->flash('message', 'Category Category Title cant Created Successfull.');
            $request->session()->flash('status', 'error');
            return redirect(route('categories.index'));
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
        $this->data['category'] = Category::findOrFail($id);
        return view('categories.show',  $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['groups'] = Group::arrayForSelect();
        $this->data['heading'] = 'Edit Category Data.';
        $this->data['editStatus'] = true;
        $this->data['data'] = Category::findOrFail($id);
        return view('categories.create', $this->data);
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
        $Category = Category::findOrFail($id);
        $Category->title = $request->title;
        $Category->updated_at = now();
        if ($Category->save()) {
            $request->session()->flash('message', ' Category Updated Successfull.');
            $request->session()->flash('status', 'success');
            return redirect(route('categories.index'));
        }else{
            $request->session()->flash('message', ' Category cant Update.');
            $request->session()->flash('status', 'error');
            return redirect(route('categories.index'));
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
        if(Category::destroy($id)){
            session()->flash('message', 'Category Deleted Successfull.');
            session()->flash('status', 'success');
            return redirect(route('categories.index'));
        }else{
            session()->flash('message', 'Category cant Created Successfull.');
            session()->flash('status', 'error');
            return redirect(route('categories.index'));
        }
    }
}

