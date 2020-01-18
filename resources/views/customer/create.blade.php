@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">New Customer</div>

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

                    <form action="{{ url('/') }}/customer-post" method="post">  
                         {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="first_name" name="first_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="last_name" name="last_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="phone" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Address</h4>
                                <div class="form-group row">
                                    <label for="address_first_name" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-8">
                                     <input type="text" class="form-control" id="address_first_name" name="address_first_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address_last_name" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-8">
                                     <input type="text" class="form-control" id="address_last_name" name="address_last_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address1" class="col-sm-3 col-form-label">Address</label>
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
                                    <label for="zip" class="col-sm-3 col-form-label">Zip Code</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="zip" name="zip">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">         
                                <hr>                   
                                <input type="submit" class="btn btn-primary btn-sm" value="Save">
                                <a href="{{ url('/') }}/customers" class="btn btn-primary btn-sm">Cancel</a>
                            </div>
                        </div>   
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
