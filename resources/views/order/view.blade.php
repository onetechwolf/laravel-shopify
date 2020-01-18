@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Order Details</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif     

                        <div class="row">
                            <div class="col-md-6">
                                <h4>Fullfilment {{ $order['fulfillment_status'] == '' ? 'Unfulfilled' : $order['financial_status'] }}</h4>
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 col-form-label">Line Item</label>
                                    <div class="col-sm-8">
                                      <p><strong>{{ $order['line_items'][0]['title'] }}</strong></p>
                                      <p>{{ $order['line_items'][0]['variant_title'] }}</p>
                                      <p>SKU: {{ $order['line_items'][0]['sku'] }}</p>
                                      <p>Vendor: {{ $order['line_items'][0]['vendor'] }}</p>
                                    </div>
                                </div>
                                <hr>
                                <h4>Payment {{ $order['financial_status'] }}</h4>
                                <div class="form-group row">
                                    <label for="product_type" class="col-sm-3 col-form-label">Sub Total</label>
                                    <div class="col-sm-8">
                                      ${{ $order['subtotal_price'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="body_html" class="col-sm-3 col-form-label">Total</label>
                                    <div class="col-sm-8">
                                     ${{ $order['total_price'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Customer/Shipping Address</h4>
                                <div class="form-group row">
                                    <label for="vendor" class="col-sm-3 col-form-label">Customer</label>
                                    <div class="col-sm-8">
                                        {{ $order['shipping_address']['name'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        {{ $order['email'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-8">
                                        {{ $order['phone'] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sku" class="col-sm-3 col-form-label">Shipping Address</label>
                                    <div class="col-sm-8">
                                      <p>{{ $order['shipping_address']['address1'] }}</p>
                                      <p>{{ $order['shipping_address']['city'] }}</p>
                                      <p>{{ $order['shipping_address']['province'] }}</p>
                                      <p>{{ $order['shipping_address']['country'] }}</p>
                                      <p>{{ $order['shipping_address']['zip'] }}</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">         
                                <hr>                   
                                <a href="{{ url('/') }}/order-edit/{{ $order['id'] }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('/') }}/order-delete/{{ $order['id'] }}" class="btn btn-primary btn-sm" onClick="return confirm('Delete Order?');">Delete</a>
                                <a href="{{ url('/') }}/orders" class="btn btn-primary btn-sm">Back</a>
                            </div>
                        </div>   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
