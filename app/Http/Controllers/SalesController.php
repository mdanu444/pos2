<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesInvocieRequest;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $this->data['user'] = User::findOrFail($id);
        $this->data['sales'] = SaleInvoice::all()->where('user_id', $id);
        $FullPath = array_reverse(explode('/',URL::current()));
        $this->data['path']= $FullPath[0];
        return view('users.show',  $this->data);
    }

    public function store(SalesInvocieRequest $request, $id)
    {
        $this->data = $request->all();
        $this->data['user_id'] = $id;
        $this->data['admin_id'] = Auth::id();
        $this->data;
        if($createdData = SaleInvoice::create($this->data)){
        return redirect()->route('users.sales.invoice', ['user' => $id, 'invoice' => $createdData->id]);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice($user, $invoice)
    {
        $this->data['user'] = User::find($user);
        $this->data['invoice'] = SaleInvoice::find($invoice);
        $this->data['items'] = SaleItem::all()->where('sale_invocie_id', '=', $invoice);
        $this->data['products'] = Product::ArrayForSelect();
        $this->data['receipt'] = Receipt::all()->where('sale_invocie_id', $invoice);
        return view('users.SaleInvoice', $this->data);
    }


    public function StorItem(Request $request, $user, $invoice)
    {
        $this->data = $request->all();
        $this->data['user_id'] = $user;
        $this->data['sale_invocie_id'] = $invoice;
        SaleItem::create($this->data);
        return back();
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
    public function destory($user, $invoice)
    {
        $items = SaleItem::all()->where('sale_invocie_id', $invoice);
        $ids = [];
        foreach($items as $key => $value){
            $ids[$key] = $value->id;
        }
        SaleItem::destroy($ids);
        SaleInvoice::destroy($invoice);

        return back();
    }
    public function itemDestory($user, $invoice)
    {
        SaleItem::destroy($invoice);

        return back();
    }
}
