@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Product  Management</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ url('/') }}/product-new" class="btn btn-primary btn-sm">Add Product</a>
                                     
                  
                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Product ID</th>
                          <th scope="col">Title</th>
                          <th scope="col">SKU</th>
                          <th scope="col">Price</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                         @foreach ($products as $product)
                        <tr>
                          <th scope="row">{{ $product['id'] }}</th>
                          <td>{{ $product['title'] }}</td>
                          <td>{{ $product['variants'][0]['sku'] }}</td>
                          <td>{{ $product['variants'][0]['price'] }}</td>
                          <td>
                            <a href="{{ url('/') }}/product-view/{{ $product['id'] }}" class="badge badge-primary">View</a>
                            <a href="{{ url('/') }}/product-edit/{{ $product['id'] }}" class="badge badge-primary">Edit</a>
                            <a href="{{ url('/') }}/delete/{{ $product['id'] }}" class="badge badge-primary" onClick="return confirm('Delete Product?');">Delete</a>
                          </td>
                        </tr>
                        
                         @endforeach

                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
