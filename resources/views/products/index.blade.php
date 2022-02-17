<x-header />
<div class="width-100">
<h1 class="d-inline-block">{{ $heading }}</h1>
<a  href="{{ route( $addLink ) }}" class="btn btn-info float-right"><i class="fas fa-plus"></i>Add New</a>
<a  href="{{ route( 'products-pdf' ) }}" class="btn btn-info float-right mr-2">Download List</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">product  List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>Serial</th>
        <th>Title</th>
        <th>Description</th>
        <th>Cost Price</th>
        <th>Price</th>
        <th>Category</th>
        <th>Admin</th>
        <th class="text-center">Action</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>Serial</th>
        <th>Title</th>
        <th>Description</th>
        <th>Cost Price</th>
        <th>Price</th>
        <th>Category</th>
        <th>Admin</th>
        <th class="text-center">Action</th>
    </tr>
</tfoot>
<tbody>
    @php
        $i = 1;
    @endphp
    @foreach ($products as $item)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->cost_price}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->category->title}}</td>
        <td>{{$item->admin->name}}</td>
        <td class="d-flex">

            <a class="bg-success text-light mr-2 rounded p-2"  href="{{ route('products.show', ['product' => $item->id]) }}"><i class="fa fa-eye"></i></a>


            <a class="bg-info text-light rounded p-2"  href="{{ route('products.edit', ['product' => $item->id]) }}"><i class="fa fa-pen"></i></a>

            {!! Form::open(['route' => ['products.destroy', $item->id], 'method' => 'delete']) !!}
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

