@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Product</div>

                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Error!</strong> Check the required input fields.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif      

                    <form action="{{ url('/') }}/product-post" method="post">  
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="product_type" class="col-sm-3 col-form-label">Product Type</label>
                                    <div class="col-sm-8">
                                      <select id="product_type" class="form-control" name="product_type">
                                        <option selected> - </option>
                                        <option value="Mounts">Mounts</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="vendor" class="col-sm-3 col-form-label">Vendor</label>
                                    <div class="col-sm-8">
                                      <select id="vendor" class="form-control" name="vendor">
                                        <option selected> - </option>
                                        <option value="Tule Mounts Store">Tule Mounts Store</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="body_html" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="body_html" name="body_html" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Variants</h4>
                                <div class="form-group row">
                                    <label for="vendor" class="col-sm-3 col-form-label">Color</label>
                                    <div class="col-sm-8">
                                      <select id="color" class="form-control" name="color">
                                        <option selected> - </option>
                                        <option value="Black">Black</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="price" name="price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sku" class="col-sm-3 col-form-label">Sku</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="sku" name="sku">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">         
                                <hr>                   
                                <input type="submit" class="btn btn-primary btn-sm" value="Save">
                                <a href="{{ url('/') }}/home" class="btn btn-primary btn-sm">Cancel</a>
                            </div>
                        </div>               
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
