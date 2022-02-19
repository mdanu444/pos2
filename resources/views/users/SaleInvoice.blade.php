<x-header />
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class=""><strong>Customer Name: </strong>{{$user->name}}</div>
                <div class=""><strong>Customer Email: </strong>{{$user->email}}</div>
                <div class=""><strong>Customer Phone: </strong>{{$user->phone}}</div>
                <div class=""><strong>Customer Address: </strong>{{$user->address}}</div>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
                <div class=""><strong>Chalan No: </strong>{{$invoice->challan_no}}</div>
                <div class=""><strong>Date: </strong>{{$invoice->date}}</div>
                <div class=""><strong>Note: </strong>{{$invoice->note}}</div>
            </div>
        </div>
                <br><br>

                <table class="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Items</th>
                            <th >{{ $items->sum('quantity') }}</th>
                            <th>Total</th>
                            <th >{{$items->sum('total')}}</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (count($items) === 0)
                            <tr><td class="text-center text-bold" colspan="5">No Item Found.</td></tr>
                        @else
                        <?php $i = 1; ?>
                        @foreach ($items as $key => $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->product->title}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->total}}</td>
                                <td>
                                    <form action="{{route('sale.item.destory', ['user' => $user->id, 'invoice' => $item->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button style="submit" onclick="return confirm('Are you Sure ?')" class="bg-danger rounded text-light border-0 p-1"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <table class=" d-flex justify-content-end alert alert-success">
                        <tr >
                            <td ><strong>Receipt for this Invoice : </strong></td>
                            <td >{{ $receipt->sum('amount') }}</td>
                        </tr>
                    </table>


<!-- New Sale modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#InvoiceItem">
    + Add Sale
 </button>
 <!-- New Sale Modal -->
 <div class="modal fade" id="InvoiceItem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="InvoiceItemLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       {!! Form::open(['route' => ['users.sales.invoice.item', $user->id, $invoice->id], 'method' => 'post']) !!}
         @csrf
             <div class="modal-header">
                 <h5 class="modal-title" id="InvoiceItemLabel">Add Sale Satment</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="row mb-3">
                     <div class="col-md-4">Product:</div>
                     <div class="col-md-8">
                         {!! Form::select('product_id', $products, 0, ['class' => 'form-control']) !!}
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-4">Quantity: </div>
                     <div class="col-md-8">
                         {!! Form::number('quantity', 0, ['class' => "form-control" ]) !!}
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-4">Price:</div>
                     <div class="col-md-8">
                         {!! Form::number('price', 0, ['class' => 'form-control']) !!}
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-4">Total:</div>
                     <div class="col-md-8">
                         {!! Form::number('total', 0, ['class' => 'form-control']) !!}
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Add</button>
             </div>
        {!! Form::close() !!}
       </div>
     </div>
 </div>
 <!-- New Sale Modal -->



 <!-- New Sale modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InvoiceReceipt">
    + Add Receipt
 </button>
 <!-- New Sale Modal -->
 <div class="modal fade" id="InvoiceReceipt" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="InvoiceReceiptLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">

        {{-- users/{user}/receipts/{invoice?} --}}
       {!! Form::open(['route' => ['users.receipts.store', $user->id, $invoice->id], 'method' => 'post']) !!}
         @csrf
             <div class="modal-header">
                 <h5 class="modal-title" id="InvoiceReceiptLabel">Add Sale Satment</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="row mb-3">
                     <div class="col-md-4">Amount:</div>
                     <div class="col-md-8">
                         {!! Form::text('amount', 0, ['class' => 'form-control']) !!}
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-4">Quantity: </div>
                     <div class="col-md-8">
                         {!! Form::date('date', null, ['class' => 'form-control']) !!}
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-4">Price:</div>
                     <div class="col-md-8">
                         {!! Form::textarea('note', null, ['style'=>'height: 80px','class' => 'form-control']) !!}
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Add</button>
             </div>
        {!! Form::close() !!}
       </div>
     </div>
 </div>
 <!-- New Sale Modal -->


    </div>
</div>



<x-footer />

