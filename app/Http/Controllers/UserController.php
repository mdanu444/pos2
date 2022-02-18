<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['addLink'] = "users.create";
        $this->data['heading'] = "users List";
        $this->data['users'] = User::all();

        return view('users.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $this->data ['heading'] = "Add New User";
       $this->data ['editStatus'] = false;
       $this->data ['data'] = (object) array('id' => 0);
       $this->data['groups'] = Group::arrayForSelect();
        return view('users.create', $this->data);
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
            'name'=>'required|unique:users',
            'email'=>'required|unique:users|email',
            'phone'=>'required',
            'group_id'=>'required',
        ]);

        $data  = $request->all();
        $data ['admin_id'] = Auth::id();
        if(User::create($data)){
            $request->session()->flash('message', 'User user Title Created Successfull.');
            $request->session()->flash('status', 'success');
            return redirect(route('users.index'));
        }else{
            $request->session()->flash('message', 'User user Title cant Created Successfull.');
            $request->session()->flash('status', 'error');
            return redirect(route('users.index'));
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
        $this->data['user'] = User::findOrFail($id);
        $this->data['path'] = "users";
        return view('users.show',  $this->data);
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
        $this->data['heading'] = 'Edit User Data.';
        $this->data['editStatus'] = true;
        $this->data['data'] = User::findOrFail($id);
        return view('users.create', $this->data);
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
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->group_id = $request->group_id;
        $user->updated_at = now();
        if ($user->save()) {
            $request->session()->flash('message', ' User Updated Successfull.');
            $request->session()->flash('status', 'success');
            return redirect(route('users.index'));
        }else{
            $request->session()->flash('message', ' User cant Update.');
            $request->session()->flash('status', 'error');
            return redirect(route('users.index'));
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
        if(User::destroy($id)){
            session()->flash('message', 'User Deleted Successfull.');
            session()->flash('status', 'success');
            $Invoices = SaleInvoice::all()->where('user_id', $id);
            $invoiceId = [];
            foreach($Invoices as $key => $value){
                $invoiceId[$key] = $value->id;
            }
            SaleInvoice::destroy($invoiceId);

            $saleItemsId = [];
            foreach($invoiceId as  $id){
                $items = SaleItem::all()->where('sale_invocie_id', $id);
                foreach($items as $key => $value){
                    $saleItemsId[$key] = $value->id;
                }
            }
            SaleItem::destroy($saleItemsId);
            return redirect(route('users.index'));
        }else{
            session()->flash('message', 'User cant Delete.');
            session()->flash('status', 'danger');
            return redirect(route('users.index'));
        }

    }
}
