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
            <table class="table">
                <tr><td>Title:</td><td>{{ $data['group']->title}}</td></tr>
                <tr><td>Id:</td><td>{{ $data['group']->id}}</td></tr>
                <tr><td>Created At:</td><td>{{ $data['group']->created_at}}</td></tr>
                <tr><td>Updated At:</td><td>{{ $data['group']->updated_at}}</td></tr>
            </table>
        </div>
    </div>
</div>
</div>

<x-footer />

