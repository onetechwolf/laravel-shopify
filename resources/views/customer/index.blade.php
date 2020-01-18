@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Customer Management</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ url('/') }}/customer-new" class="btn btn-primary btn-sm">Add Customer</a>
                                     
                  
                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Customer ID</th>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                         @foreach ($customers as $customer)
                        <tr>
                          <th scope="row">{{ $customer['id'] }}</th>
                          <td>{{ $customer['first_name'] }}</td>
                          <td>{{ $customer['last_name'] }}</td>
                          <td>{{ $customer['email'] }}</td>
                          <td>{{ $customer['phone'] }}</td>
                          <td>
                            <a href="{{ url('/') }}/customer-view/{{ $customer['id'] }}" class="badge badge-primary">View</a>
                            <a href="{{ url('/') }}/customer-edit/{{ $customer['id'] }}" class="badge badge-primary">Edit</a>
                            <a href="{{ url('/') }}/customer-delete/{{ $customer['id'] }}" class="badge badge-primary" onClick="return confirm('Delete Customer?');">Delete</a>
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
