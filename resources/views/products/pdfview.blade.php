<!DOCTYPE html>
<html>
<head>

<style>

    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    font-size: 15px;
    font-family: Arial, Helvetica, sans-serif;
    text-align: justify;
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
                <th>Title</th>
                <th>Description</th>
                <th>Cost Price</th>
                <th>Price</th>
                <th>Category</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
            <tr >
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->cost_price}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->category->title}}</td>
                <td>{{$item->admin->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</html>
