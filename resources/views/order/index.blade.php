@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Order Management</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ url('/') }}/order-new" class="btn btn-primary btn-sm">Create Order</a>
                                     
                  
                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Order ID</th>
                          <th scope="col">Date</th>
                          <th scope="col">Customer</th>
                          <th scope="col">Payment</th>
                          <th scope="col">Fullfilment</th>
                          <th scope="col">Total</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                         @foreach ($orders as $order)
                        <tr>
                          <th scope="row">{{ $order['name'] }}</th>
                          <td>{{ date("l, F t, Y", strtotime($order['created_at'])) }}</td>
                          <td>{{ ucfirst($order['customer']['first_name']) }} {{ ucfirst($order['customer']['last_name']) }}</td>
                          <td>{{ $order['financial_status'] }}</td>
                          <td>{{ $order['fulfillment_status'] == '' ? 'Unfulfilled' : $order['financial_status'] }}</td>
                          <td>${{ $order['total_price'] }}</td>
                          <td>
                            <a href="{{ url('/') }}/order-view/{{ $order['id'] }}" class="badge badge-primary">View</a>
                            <a href="{{ url('/') }}/order-edit/{{ $order['id'] }}" class="badge badge-primary">Edit</a>
                            <a href="{{ url('/') }}/order-delete/{{ $order['id'] }}" class="badge badge-primary" onClick="return confirm('Delete Order?');">Delete</a>
                            <a href="{{ url('/') }}/crear-envio/{{ $order['id'] }}" class="badge badge-primary" onClick="return confirm('Crear envio?');">Crear envio</a>
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
