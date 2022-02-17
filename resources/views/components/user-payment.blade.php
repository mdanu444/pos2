<div class="card-body">
    <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
    <th>Serial</th>
    <th>User</th>
    <th>Date</th>
    <th>Note</th>
    <th>Amount</th>
    <th class="text-center">Action</th>
</tr>
</thead>
<tfoot>
<tr>
    <th colspan="4">Total</th>
    <th>{{$payments->sum('amount')}}</th>
    <th class="text-center">Action</th>
</tr>
</tfoot>
<tbody>
@php
    $i = 1;
@endphp
@foreach ($payments as $item)
<tr>
    <td>{{$i++}}</td>
    <td>{{$item->user->name}}</td>
    <td>{{$item->date}}</td>
    <td>{{$item->note}}</td>
    <td>{{$item->amount}}</td>
    <td class="d-flex">
        {!! Form::open(['route' => ['users.payments.destroy', $item->user->id, $item->id], 'method' => 'delete']) !!}
            <button onclick="return confirm('Are You Sure ?')" type="submit" class="bg-danger text-light rounded p-2 ml-2 border-0"><i class="fa fa-trash"></i></button>
        {!! Form::close() !!}
    </td>
</tr>
@endforeach


</tbody>
        </table>
    </div>
</div>
</div>
