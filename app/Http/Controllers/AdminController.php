<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['addLink'] = "admins.create";
        $this->data['heading'] = "Admins List";
        $this->data['admins'] = Admin::all();

        return view('admins.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $this->data ['heading'] = "Add New Admin";
       $this->data ['editStatus'] = false;
       $this->data ['data'] = (object) array('id' => 0);
       $this->data['groups'] = Group::arrayForSelect();
        return view('admins.create', $this->data);
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
            'name'=>'required|unique:admins',
            'email'=>'required|unique:admins|email',
            'phone'=>'required',
            'group_id'=>'required',
            'password'=>'required'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        if(Admin::create($data)){
            $request->session()->flash('message', 'admin admin Title Created Successfull.');
            $request->session()->flash('status', 'success');
            return redirect(route('admins.index'));
        }else{
            $request->session()->flash('message', 'admin admin Title cant Created Successfull.');
            $request->session()->flash('status', 'error');
            return redirect(route('admins.index'));
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
        $this->data['admin'] = Admin::findOrFail($id);
        return view('admins.show',  $this->data);
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
        $this->data['heading'] = 'Edit Admin Data.';
        $this->data['editStatus'] = true;
        $this->data['data'] = Admin::findOrFail($id);
        return view('admins.create', $this->data);
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
        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->group_id = $request->group_id;
        $admin->updated_at = now();
        if ($admin->save()) {
            $request->session()->flash('message', ' Admin Updated Successfull.');
            $request->session()->flash('status', 'success');
            return redirect(route('admins.index'));
        }else{
            $request->session()->flash('message', ' Admin cant Update.');
            $request->session()->flash('status', 'error');
            return redirect(route('admins.index'));
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
        if(Admin::destroy($id)){
            session()->flash('message', 'Admin Deleted Successfull.');
            session()->flash('status', 'success');
            return redirect(route('admins.index'));
        }else{
            session()->flash('message', 'Admin cant Created Successfull.');
            session()->flash('status', 'error');
            return redirect(route('admins.index'));
        }
    }
}
