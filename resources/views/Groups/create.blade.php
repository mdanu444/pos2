<x-header />

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Add a new User Group</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form action="{{ route('groups.store') }}" method="post" class="form-group">
                @csrf
                <div>
                    User Group Title: <br>
                    <input type="text" class="form-control" name="title" placeholder="User Group Title">
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
