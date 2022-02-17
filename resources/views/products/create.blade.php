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
            {!! Form::open(['route' => 'products.store']) !!}
            @else
            {!! Form::model($data, ['route' => ['products.update', $data->id], 'method' => 'put']) !!}
            @endif


            <div class="form-group">
                <div class="d-inline-block w-25">Category</div>
                {!! Form::select('category_id', $category, $data->id, ['class'=>'form-control w-50 d-inline-block']) !!}
            </div>


            <div class="form-group">
                <div class="d-inline-block w-25">Title</div>
                {!! Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control d-inline-block w-50']) !!}
            </div>


            <div class="form-group d-flex">
                <div class="d-inline-block w-25">Description</div>
                {!! Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control d-inline-block w-50', 'style' => 'height: 80px;']) !!}
            </div>


            <div class="form-group">
                <div class="d-inline-block w-25">Cost Price</div>
                {!! Form::text('cost_price', null, ['placeholder' => 'Cost Price', 'class' => 'form-control d-inline-block w-50']) !!}
            </div>


            <div class="form-group">
                <div class="d-inline-block w-25">Price</div>
                {!! Form::text('price', null, ['placeholder' => 'Price', 'class' => 'form-control d-inline-block w-50']) !!}
            </div>

            <div class="form-group d-flex">
              {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>
</div>


<x-footer />
