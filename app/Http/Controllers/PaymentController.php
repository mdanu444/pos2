<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\SaleInvoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $this->data['user'] = User::findOrFail($id);
        $this->data['payments'] = Payment::all()->where('user_id', $id);
        $FullPath = array_reverse(explode('/',URL::current()));
        $this->data['path']= $FullPath[0];
        return view('users.show',  $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $request->input();
        $data['user_id'] = $id;
        $data['admin_id'] = Auth::id();
        Payment::create($data);
        $request->session()->flash('message', 'Payment Added Successfull.');
        $request->session()->flash('status', 'success');
        return redirect()->route('users.payments', ['user' => $id]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $user, $receipt)
    {
        Payment::destroy($receipt);
        $request->session()->flash('message', "Payment Deleted Successfully");
        $request->session()->flash('status', "success");
        return redirect()->route('users.show', ['user' => $user]);
    }
}
