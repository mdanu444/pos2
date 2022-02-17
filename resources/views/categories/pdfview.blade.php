<!DOCTYPE html>
<html>
<head>

<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    font-size: 15px;
    font-family: Arial, Helvetica, sans-serif;
}
th, td {
    padding: 5px;
}
th{
    background: rgb(255, 240, 158);
}
table{
    width: 100%;
    background: rgb(234, 236, 214);
}

</style>


</head>



<div class="container">
    <table class="table table-striped  table-success">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>User Type</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
            <tr >
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->group_id}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->address}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</html>
