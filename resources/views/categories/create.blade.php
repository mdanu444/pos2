<x-header />

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> {{ $heading }}</h6>
    </div>
    <div class="card-body">

@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $item)
            <li>{{$item}}</li>
        @endforeach
    </ul>
@endif

        <div class="table-responsive">
            @if ($editStatus == false)
            {!! Form::open(['route' => 'categories.store']) !!}
            @else
            {!! Form::model($data, ['route' => ['categories.update', $data->id], 'method' => 'put']) !!}
            @endif


            <div class="form-group d-flex">
                <div class="d-inline-block w-25">Category Title</div>
                {!! Form::text('title', null, ['class' => 'form-control w-50 ']) !!}
            </div>

            {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}

            {!! Form::close() !!}
        </div>

    </div>
</div>


<x-footer />
