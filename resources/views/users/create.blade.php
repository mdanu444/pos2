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
            {!! Form::open(['route' => 'users.store']) !!}
            @else
            {!! Form::model($data, ['route' => ['users.update', $data->id], 'method' => 'put']) !!}
            @endif


            <div class="form-group">
                <div class="d-inline-block w-25">Admin Type</div>
                {!! Form::select('group_id', $groups, $data->id, ['class'=>'form-control w-50 d-inline-block']) !!}
            </div>


            <div class="form-group">
                <div class="d-inline-block w-25">Name</div>
                {!! Form::text('name', null, ['placeholder' => 'Name','class' => 'form-control d-inline-block w-50']) !!}
            </div>


            <div class="form-group">
                <div class="d-inline-block w-25">Email</div>
                {!! Form::text('email', null, ['placeholder' => 'Email Address', 'class' => 'form-control d-inline-block w-50']) !!}
            </div>


            <div class="form-group">
                <div class="d-inline-block w-25">Phone</div>
                {!! Form::text('phone', null, ['placeholder' => 'Phone', 'class' => 'form-control d-inline-block w-50']) !!}
            </div>


            <div class="form-group d-flex">
                <div class="d-inline-block w-25">Address</div>
                {!! Form::textarea('address', null, ['placeholder' => 'Address', 'class' => 'form-control d-inline-block w-50', 'style' => "height: 80px;"]) !!}
            </div>


            <div class="form-group d-flex">
              {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
            </div>


            {!! Form::close() !!}
        </div>

    </div>
</div>


<x-footer />
