<!DOCTYPE html>
<html>
<head>

<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    font-size: 19px;
    font-family: Arial, Helvetica, sans-serif;
}
th, td {
    padding: 10px;
}
th{
    background: rgb(255, 240, 158);
}
table{
    width: 100%;
    background: rgb(229, 254, 255);
}

</style>


</head>



<div class="container">
    <table class="table table-striped  table-success">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
            <tr >
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</html>
