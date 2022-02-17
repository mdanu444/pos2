<x-header />
<div class="width-100">
<h1 class="d-inline-block">{{ $heading }}</h1>
<a  href="{{ route( $addLink ) }}" class="btn btn-info float-right"><i class="fas fa-plus"></i>Add New</a>
<a  href="{{ route( 'users-pdf' ) }}" class="btn btn-info float-right mr-2">Download List</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User Groups List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>Serial</th>
        <th>Name</th>
        <th>Email</th>
        <th>user Group</th>
        <th>Phone</th>
        <th>Address</th>
        <th class="text-center">Action</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>Serial</th>
        <th>Name</th>
        <th>Email</th>
        <th>user Group</th>
        <th>Phone</th>
        <th>Address</th>
        <th class="text-center">Action</th>
    </tr>
</tfoot>
<tbody>
    @php
        $i = 1;
    @endphp
    @foreach ($users as $item)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->group->title}}</td>
        <td>{{$item->phone}}</td>
        <td>{{$item->address}}</td>
        <td class="d-flex">

            <a class="bg-success text-light mr-2 rounded p-2"  href="{{ route('users.show', ['user' => $item->id]) }}"><i class="fa fa-eye"></i></a>


            <a class="bg-info text-light rounded p-2"  href="{{ route('users.edit', ['user' => $item->id]) }}"><i class="fa fa-pen"></i></a>

            {!! Form::open(['route' => ['users.destroy', $item->id], 'method' => 'delete']) !!}
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

<x-footer />

