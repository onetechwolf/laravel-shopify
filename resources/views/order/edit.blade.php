@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Order</div>

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

                    <form action="{{ url('/') }}/order-put" method="post">  
                         {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $order['id'] }}">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <div class="form-group row">
                                    <label for="first_name" class="col-sm-3 col-form-label">Customer</label>
                                    <div class="col-sm-8">
                                      <select id="email" class="form-control" name="email">
                                        <option selected> - </option>
                                         @foreach ($customers as $customer)
                                        <option value="{{ $customer['email'] }}" {{ $order['email'] == $customer['email'] ? 'selected' : '' }}>{{ ucfirst($customer['first_name']) }} {{ ucfirst($customer['last_name']) }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <label for="first_name" class="col-sm-3 col-form-label">Line Item</label>
                                    <div class="col-sm-8">
                                      <p><strong>{{ $order['line_items'][0]['title'] }}</strong></p>
                                      <p>{{ $order['line_items'][0]['variant_title'] }}</p>
                                      <p>SKU: {{ $order['line_items'][0]['sku'] }}</p>
                                      <p>Vendor: {{ $order['line_items'][0]['vendor'] }}</p>
                                      <p><strong>Sub Total:</strong> ${{ $order['subtotal_price'] }}</p>
                                      <p><strong>Total:</strong> ${{ $order['total_price'] }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-4 col-form-label">Update Phone</label>
                                    <div class="col-sm-6">
                                      <input type="text" class="form-control" id="phone" name="phone" value="{{ $order['phone'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">                                
                                <h4>Shipping Address</h4>
                                <div class="form-group row">
                                    <label for="shipping_first_name" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="shipping_first_name" name="shipping_first_name" value="{{ $order['shipping_address']['first_name'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="shipping_last_name" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="shipping_last_name" name="shipping_last_name" value="{{ $order['shipping_address']['last_name'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="shipping_phone" class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="shipping_phone" name="shipping_phone"  value="{{ $order['shipping_address']['phone'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address1" class="col-sm-3 col-form-label">Address 1</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="address1" name="address1"  value="{{ $order['shipping_address']['address1'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="city" name="city"  value="{{ $order['shipping_address']['city'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="province" class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="province" name="province" value="{{ $order['shipping_address']['province'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="country" class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="country" name="country" value="{{ $order['shipping_address']['country'] }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="zip" class="col-sm-3 col-form-label">Zipcode</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" id="zip" name="zip" value="{{ $order['shipping_address']['zip'] }}">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">         
                                <hr>                   
                                <input type="submit" class="btn btn-primary btn-sm" value="Save">
                                <a href="{{ url('/') }}/order-delete/{{ $order['id'] }}" class="btn btn-primary btn-sm" onClick="return confirm('Delete Order?');">Delete</a>
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
