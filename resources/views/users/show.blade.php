<x-header />
<div class="width-100">
</div>
@if ($errors->any())
<ul class="alert alert-danger">
    @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>

@endif

<div class="row">
    <!-- Sales  Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Sales</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->sales()->sum('total') }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Total Receipt  -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Receipt</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->receipt->sum('amount') }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Total Payment  -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Payment</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->payment->sum('amount') }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Total Purchase -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Purchase</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->purchases()->sum('total') }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<x-user-nave :user="$user" />




    <br>
<!-- DataTales Example -->
<div class="row mt-2">
    <div class="col-md-2">
        <a href="{{route('users.show', ['user'=>$user->id])}}" class="btn btn-outline-primary btn-block @if($path == 'users'){{'active'}} @endif">User Info</a>
        <a href="{{route('users.sales', ['user'=>$user->id])}}" class="btn btn-outline-primary btn-block @if($path == 'sales'){{'active'}} @endif">Sale Invoices</a>
        <a href="{{route('users.receipts', ['user'=>$user->id])}}" class="btn btn-outline-primary btn-block @if($path == 'receipts'){{'active'}} @endif">Receipts</a>
        <a href="{{route('users.purchases', ['user'=>$user->id])}}" class="btn btn-outline-primary btn-block @if($path == 'purchases'){{'active'}} @endif">Purchase Invoices</a>
        <a href="{{route('users.payments', ['user'=>$user->id])}}" class="btn btn-outline-primary btn-block @if($path == 'payments'){{'active'}} @endif">Payments</a>
    </div>




    <div class="col-md-10">
        <div class="card shadow mb-4 d-flex flex-direct-row">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary float-left">User: {{ $user->name}}</h6>
            </div>
            <div class="card-body">
                @switch($path)
                    @case('users')
                        <x-user-info :user="$user" />
                        @break
                        @case('sales')
                        <x-user-sale :sale="$sales" :user="$user" />
                        @break
                        @case('receipts')
                        <x-user-receipt :receipts="$receipts" :user="$user"/>
                        @break
                        @case('purchases')
                        <x-user-purchase :purchase="$purchase" :user="$user"/>
                        @break
                        @case('payments')
                        <x-user-payment :payments="$payments" :user="$user"/>
                        @break
                    @default

                @endswitch
            </div>
        </div>



</div>
</div>
</div>
</div>



<x-footer />

