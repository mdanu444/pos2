<x-header />
<div class="width-100">
<h1 class="d-inline-block">User Groups</h1>
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Group Title: {{ $data['group']->title}}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('groups.update', ['group' => $data['group']->id ]) }}" method="post" class="form-group">
            @csrf
             @method('put')
            <div>
                User Group Title: <br>
                <input value="{{ $data['group']->title }}" type="text" class="form-control" name="title" placeholder="User Group Title">
                @error('title')
                     <span class="text-danger">{{ $message }}</span>
                @enderror
            </div><br>

            <input type="submit" value="Submit" class="btn btn-info">
        </form>
        </div>
    </div>
</div>

<x-footer />

