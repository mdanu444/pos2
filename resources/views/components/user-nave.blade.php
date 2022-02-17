<div class="buttons p-2">
    <div class="back d-inline-block">
        <a class="btn btn-primary" href="{{route('users.index')}}">
            <i class="fa fa-arrow-left"></i>Back
        </a>
    </div>
<div class="curricullams float-right">








<!-- New Sale modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#NewSale">
   + Add Sale
</button>
<!-- New Sale Modal -->
<div class="modal fade" id="NewSale" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="NewSaleLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{route('users.sales.store', ['user' => $user->id]) }}" method="post">
        @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="NewSaleLabel">Add Sale Satment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4">Challan No:</div>
                    <div class="col-md-8">
                        <input type="text" name="challan_no" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">Date:</div>
                    <div class="col-md-8">
                        <input type="date" name="date" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">Note:</div>
                    <div class="col-md-8">
                        <input type="note" name="date" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
       </form>
      </div>
    </div>
</div>
<!-- New Sale Modal -->






<!-- New Receipt modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#NewReceipt">
    + Add Receipt
   </button>
    <!-- Modal -->
    <div class="modal fade" id="NewReceipt" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="NewReceiptLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">


 <form action="{{route('users.receipts.store', ['user' => $user->id]) }}" method="post">
     @csrf
         <div class="modal-header">
           <h5 class="modal-title" id="NewReceiptLabel">Add Receipt Satment</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
                 <div class="row mb-3">
                     <div class="col-md-4">Amount:</div>
                     <div class="col-md-8">
                         <input type="number" name="amount" class="form-control">
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-4">Date:</div>
                     <div class="col-md-8">
                         <input type="date" name="date" class="form-control">
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-md-4">Note:</div>
                     <div class="col-md-8">
                         <textarea cols="5" name="note" class="form-control"></textarea>
                     </div>
                 </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Add</button>
         </div>
 </form>


       </div>
     </div>
   </div>

<!-- End New Receipt modal -->






<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#NewPurchase">
   + Add Purchase
  </button>
   <!-- Modal -->
   <div class="modal fade" id="NewPurchase" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="NewPurchaseLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">


<form action="{{route('users.purchases.store', ['user' => $user->id]) }}" method="post">
    @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="NewPurchaseLabel">Add Purchase Satment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4">Challan No:</div>
                    <div class="col-md-8">
                        <input type="text" name="challan_no" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">Date:</div>
                    <div class="col-md-8">
                        <input type="date" name="date" class="form-control">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
</form>


      </div>
    </div>
  </div>







<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#NewPayment">
   + Add Payment
  </button>
   <!-- Modal -->
   <div class="modal fade" id="NewPayment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="NewPaymentLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">


<form action="{{route('users.payments.store', ['user' => $user->id]) }}" method="post">
    @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="NewPaymentLabel">Add Payment Satment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4">Amount:</div>
                    <div class="col-md-8">
                        <input type="number" name="amount" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">Date:</div>
                    <div class="col-md-8">
                        <input type="date" name="date" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">Note:</div>
                    <div class="col-md-8">
                        <textarea cols="5" name="note" class="form-control"></textarea>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
</form>


      </div>
    </div>
  </div>








    </div>
</div>
