@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">New Order</div>

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

                    <form action="{{ url('/') }}/order-post" method="post">  
                         {{ csrf_field() }}                         
                        <input type="hidden" name="fulfillment_status" value="unfulfilled">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <div class="form-group row">
                                    <label for="first_name" class="col-sm-3 col-form-label">Customer</label>
                                    <div class="col-sm-8">
                                      <select id="email" class="form-control" name="email">
                                        <option selected> - </option>
                                         @foreach ($customers as $customer)
                                        <option value="{{ $customer['email'] }}">{{ ucfirst($customer['first_name']) }} {{ ucfirst($customer['last_name']) }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <label for="first_name" class="col-sm-3 col-form-label">Products</label>
                                    <div class="col-sm-8">
                                      <select id="variant_id" class="form-control" name="variant_id">
                                        <option selected> - </option>
                                         @foreach ($products as $product)
                                        <option value="{{ $product['variants'][0]['id'] }}">{{ $product['title'] }} - {{ $product['variants'][0]['title'] }} - ${{ $product['variants'][0]['price'] }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" id="quantity" name="quantity">
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="send_receipt" name="send_receipt">
                                          <label class="form-check-label" for="gridCheck">
                                            Send order confirmation to customer?
                                          </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="send_fulfillment_receipt" name="send_fulfillment_receipt">
                                          <label class="form-check-label" for="gridCheck">
                                            Send shipping confirmation to customer?
                                          </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">                                
                                <h4>Shipping Address</h4>
                                <div class="form-group row">
                                    <label for="shipping_first_name" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="shipping_first_name" name="shipping_first_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="shipping_last_name" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="shipping_last_name" name="shipping_last_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="shipping_phone" class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="shipping_phone" name="shipping_phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address1" class="col-sm-3 col-form-label">Address 1</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="address1" name="address1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="city" name="city">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="province" class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="province" name="province">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="country" class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="country" name="country">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="zip" class="col-sm-3 col-form-label">Zipcode</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" id="zip" name="zip">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">         
                                <hr>                   
                                <input type="submit" class="btn btn-primary btn-sm" value="Save">
                                <a href="{{ url('/') }}/orders" class="btn btn-primary btn-sm">Cancel</a>
                            </div>
                        </div>   
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
