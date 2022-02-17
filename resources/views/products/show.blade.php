<x-header />
<div class="width-100">
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Product: {{ $products->name}}</h6>
    </div>
    <div class="card-body">
            <table class="table">
                <tr><td>Id:</td><td>{{ $products->id}}</td></tr>
                <tr><td>Title:</td><td>{{ $products->title}}</td></tr>
                <tr><td >description:</td><td class="text-justify">{{ $products->description}}</td></tr>
                <tr><td>cost_price:</td><td>{{ $products->cost_price}}</td></tr>
                <tr><td>price:</td><td>{{ $products->price}}</td></tr>
                <tr><td>Category Title:</td><td>{{ $products->category->title}}</td></tr>
                <tr><td>Admin Name:</td><td>{{ $products->admin->name}}</td></tr>
                <tr><td>Created At:</td><td>{{ $products->created_at}}</td></tr>
                <tr><td>Updated At:</td><td>{{ $products->updated_at}}</td></tr>
            </table>
        </div>
    </div>
</div>
</div>

<x-footer />

