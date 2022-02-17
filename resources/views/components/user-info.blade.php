<table class="table">
    <tr><td>Id:</td><td>{{ $user->id}}</td></tr>
    <tr><td>Name:</td><td>{{ $user->name}}</td></tr>
    <tr><td>Email:</td><td>{{ $user->email}}</td></tr>
    <tr><td>Phone:</td><td>{{ $user->phone}}</td></tr>
    <tr><td>Address:</td><td>{{ $user->address}}</td></tr>
    <tr><td>Created At:</td><td>{{ $user->created_at}}</td></tr>
    <tr><td>Updated At:</td><td>{{ $user->updated_at}}</td></tr>
    <tr><td>User Group:</td><td>{{ $user->group->title}}</td></tr>
</table>
