@extends('products.layout')

@section('content')
<div class="row">
    <div class="col-log-12">
        <div class="pull-left">
            <h2>CRUD App</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Product Details</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th width="200px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->detail }}</td>
        <td>{{ $product->created_at }}</td>
        <td>{{ $product->updated_at }}</td>
        <td>
            <form action="{{route('products.destroy',$product->id) }}" method="POST">
                {{-- <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a> --}}
                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $products->links() }}

@endsection