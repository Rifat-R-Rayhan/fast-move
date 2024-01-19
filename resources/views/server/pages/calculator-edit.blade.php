@extends('server.layouts.masterlayout')

@section('content')

<div class="row">
    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-home"></i>
                        </span> Update Delivery Charge
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                        </ul>
                    </nav>
                </div>
                <form action="{{route('deliverycharge.update', $deliverycharge->id)}}" class="forms-sample" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">From</label>
                        <div class="col-sm-9">
                            <input type="text" name="from_location" value="{{$deliverycharge->from_location}}" class="form-control" id="exampleInputEmail2" value="{{old('from')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Destination</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputMobile" name="destination" value="{{$deliverycharge->destination}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputPassword2" name="category" value="{{$deliverycharge->category}}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Regular</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="regular" value="{{$deliverycharge->regular}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Same Day</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="same_day" value="{{$deliverycharge->same_day}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Pickup</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pickup" value="{{$deliverycharge->pickup}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Pickup & Drop</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pickup_drop" value="{{$deliverycharge->pickup_drop}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Weight</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="weight" value="{{$deliverycharge->weight}}">
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="price" value="{{$deliverycharge->price}}">
                        </div>
                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                    <button class="btn btn-gradient-primary me-2 "><a href="{{route('deliverycharge.index')}}" class="text-decoration-none text-white">Cancel</a></button>
                    </div>
                    
                    
                </form>
            </div>
        </div>
    </div>
</div>







{{-- 

<h1>Update Delivery Charge</h1>
    <form action="{{route('calculator.update', $calculator->id)}}" method="post">
        @csrf
        @method ('PUT')
        <br><label for="from">From</label>
        <input type="text" name="from" value="{{$calculator->from}}">

        <br><label for="destination">Destinationn</label>
        <input type="text" name="destination" value="{{$calculator->destination}}">

        <br><label for="category">Category</label>
        <input type="text" name="category" value="{{$calculator->category}}">

        <br><label for="service">Service</label>
        <input type="text" name="service" value="{{$calculator->service}}">
        
        <br><label for="weight">Weight</label>
        <input type="text" name="weight" value="{{$calculator->weight}}">

        <br><label for="price">Price</label>
        <input type="text" name="price" value="{{$calculator->price}}">

        <br><button type="submit">Update</button>
    </form> --}}
@endsection