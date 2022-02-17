    <div class="card-body">
        <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>Serial</th>
        <th>Challan No</th>
        <th>Customer</th>
        <th>Date</th>
        <th class="text-center">Action</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>Serial</th>
        <th>Challan No</th>
        <th>Customer</th>
        <th>Date</th>
        <th class="text-center">Action</th>
    </tr>
</tfoot>
<tbody>
    @php
        $i = 1;
    @endphp
    @foreach ($sales as $item)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$item->challan_no}}</td>
        <td>{{$item->user->name}}</td>
        <td>{{$item->date}}</td>
        <td class="d-flex">
            <a class="bg-success text-light rounded p-2"  href="{{ route('admins.show', ['admin' => $item->id]) }}"><i class="fa fa-eye"></i></a>

            <a class="ml-2 bg-info text-light rounded p-2"  href="{{ route('admins.edit', ['admin' => $item->id]) }}"><i class="fa fa-pen"></i></a>


            {!! Form::open(['route' => ['admins.destroy', $item->id], 'method' => 'delete']) !!}
                <button type="submit" class="bg-danger text-light rounded p-2 ml-2 border-0"><i class="fa fa-trash"></i></button>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach


</tbody>
            </table>
        </div>
    </div>
</div>
