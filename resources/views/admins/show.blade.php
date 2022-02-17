<x-header />
<div class="width-100">
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User: {{ $admin->name}}</h6>
    </div>
    <div class="card-body">
            <table class="table">
                <tr><td>Id:</td><td>{{ $admin->id}}</td></tr>
                <tr><td>Name:</td><td>{{ $admin->name}}</td></tr>
                <tr><td>Email:</td><td>{{ $admin->email}}</td></tr>
                <tr><td>Phone:</td><td>{{ $admin->phone}}</td></tr>
                <tr><td>Address:</td><td>{{ $admin->address}}</td></tr>
                <tr><td>Created At:</td><td>{{ $admin->created_at}}</td></tr>
                <tr><td>Updated At:</td><td>{{ $admin->updated_at}}</td></tr>
                <tr><td>Adming Group:</td><td>{{ $admin->group->title}}</td></tr>
            </table>
        </div>
    </div>
</div>
</div>

<x-footer />

