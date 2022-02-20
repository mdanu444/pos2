    <div class="card-body">
        <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>Serial</th>
        <th>Challan No</th>
        <th>Amount</th>
        <th>Date</th>
        <th class="text-center">Action</th>
    </tr>
</thead>
<tbody>
    @php
        $i = 1;
        $total = 0;
    @endphp
    @foreach ($sales as $item)
    <?php $total += $item->saleItems()->sum('total') ?>
    <tr>
        <td>{{$i++}}</td>
        <td>{{$item->challan_no}}</td>
        <td>{{$item->saleItems()->sum('total')}}</td>
        <td>{{$item->date}}</td>
        <td class="d-flex">
            <a class="bg-success text-light rounded p-2"  href="{{ route('users.sales.invoice', ['user' => $user->id, 'invoice' => $item->id]) }}"><i class="fa fa-eye"></i></a>


            {!! Form::open(['route' => ['users.sales.delete', [$user->id, $item->id]], 'method' => 'delete']) !!}
                <button type="submit" class="bg-danger text-light rounded p-2 ml-2 border-0"><i class="fa fa-trash"></i></button>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach


</tbody>

<tfoot>
    <tr>
        <th></th>
        <th>Total</th>
        <th>{{$total}}</th>
        <th></th>
        <th class="text-center">Action</th>
    </tr>
</tfoot>
            </table>
        </div>
    </div>
</div>
