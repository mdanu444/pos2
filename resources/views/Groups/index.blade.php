<x-header />
<div class="width-100">
<h1 class="d-inline-block">User Groups</h1>
<a  href="{{ route( $data['addLink'] ) }}" class="btn btn-info float-right"><i class="fas fa-plus"></i>Add New</a>
<a  href="{{ route( 'group-pdf' ) }}" class="btn btn-info float-right mr-2">Download List</a>
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
        <th>Title</th>
        <th class="text-center">Action</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>Serial</th>
        <th>Title</th>
        <th class="text-center">Action</th>
    </tr>
</tfoot>
<tbody>
    @php
        $i = 1;
    @endphp
    @foreach ($data['groups'] as $item)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$item->title}}</td>
        <td class="w-25 text-center" >

            <a href="{{route('groups.show', ['group'=>$item->id])}}"class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>

            <a href="{{route('groups.edit', ['group'=>$item->id])}}"class="btn btn-sm btn-info"><i class="fa fa-pen"></i></a>

            <form class="d-inline-block" action="{{route('groups.destroy', ['group'=>$item->id])}}" method="POST">
            @method('delete')
            @csrf
                <button onclick="return confirm('Are your sure to delete ?')"pe="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach


</tbody>
            </table>
        </div>
    </div>
</div>

<x-footer />

