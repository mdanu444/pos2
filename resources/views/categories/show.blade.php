<x-header />
<div class="width-100">
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">category: {{ $category->title}}</h6>
    </div>
    <div class="card-body">
            <table class="table">
                <tr><td>Id:</td><td>{{ $category->id}}</td></tr>
                <tr><td>Title:</td><td>{{ $category->title}}</td></tr>
                <tr><td>Created At:</td><td>{{ $category->created_at}}</td></tr>
                <tr><td>Updated At:</td><td>{{ $category->updated_at}}</td></tr>
            </table>
        </div>
    </div>
</div>
</div>

<x-footer />

