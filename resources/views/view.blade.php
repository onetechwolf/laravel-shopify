@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">View Product</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif     

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-8">
                                      {{ $product['title'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="product_type" class="col-sm-3 col-form-label">Product Type</label>
                                    <div class="col-sm-8">
                                      {{ $product['product_type'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="vendor" class="col-sm-3 col-form-label">Vendor</label>
                                    <div class="col-sm-8">
                                      {{ $product['vendor'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="body_html" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-8">
                                        {{ $product['body_html'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Variants</h4>
                                <div class="form-group row">
                                    <label for="vendor" class="col-sm-3 col-form-label">Color</label>
                                    <div class="col-sm-8">
                                     {{ $product['variants'][0]['option1'] }}
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-8">
                                      {{ $product['variants'][0]['price'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sku" class="col-sm-3 col-form-label">Sku</label>
                                    <div class="col-sm-8">
                                      {{ $product['variants'][0]['sku'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">         
                                <hr>                   
                                <a href="{{ url('/') }}/product-edit/{{ $product['id'] }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('/') }}/delete/{{ $product['id'] }}" class="btn btn-primary btn-sm" onClick="return confirm('Delete Product?');">Delete</a>
                                <a href="{{ url('/') }}/home" class="btn btn-primary btn-sm">Back</a>
                            </div>
                        </div>   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
