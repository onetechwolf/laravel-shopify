@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">View Customer</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif     

                        <div class="row">
                            <div class="col-md-6">
                                <h4>Information</h4>
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-8">
                                      {{ $customer['first_name'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="product_type" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-8">
                                      {{ $customer['last_name'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="vendor" class="col-sm-3 col-form-label">Email </label>
                                    <div class="col-sm-8">
                                      {{ $customer['email'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="body_html" class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-8">
                                        {{ $customer['phone'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Address</h4>
                                <div class="form-group row">
                                    <label for="vendor" class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-8">
                                     {{ $customer['addresses'][0]['first_name'] }} 
                                     {{ $customer['addresses'][0]['last_name'] }}
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-8">
                                    {{ $customer['addresses'][0]['address1'] }} 
                                    {{ $customer['addresses'][0]['address2'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sku" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-8">
                                      {{ $customer['addresses'][0]['city'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sku" class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-8">
                                      {{ $customer['addresses'][0]['province'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sku" class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-8">
                                      {{ $customer['addresses'][0]['country'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sku" class="col-sm-3 col-form-label">Zip Code</label>
                                    <div class="col-sm-8">
                                      {{ $customer['addresses'][0]['zip'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">         
                                <hr>                   
                                <a href="{{ url('/') }}/customer-edit/{{ $customer['id'] }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('/') }}/customer-delete/{{ $customer['id'] }}" class="btn btn-primary btn-sm" onClick="return confirm('Delete Customer?');">Delete</a>
                                <a href="{{ url('/') }}/customers" class="btn btn-primary btn-sm">Back</a>
                            </div>
                        </div>   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
