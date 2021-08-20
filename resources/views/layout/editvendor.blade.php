@extends("layout.app")
@section("title",__("ZYX Admin Panel"))
@section("page")
<div class="breadcrumb">
    <h1>ZYX</h1>
    <ul>
        <li><a href="{{url('/')}}">Dashboard</a></li>
        <li>Edit vendor</li>
    </ul>
</div>
@endsection
@section("content")


<div class="row justify-content-center">
    <div class="col-md-6">
        @if (session('successfully'))
        <div class="alert alert-success text-center">
            {{ session('successfully') }}
        </div>
        @endif
        <form action="{{url('update-vendor')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="vendor_id" value="{{$editvendor->id}}">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$editvendor->name}}" id="" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="">Email address</label>
                <input type="email" class="form-control" name="email" value="{{$editvendor->email}}" id="" aria-describedby="emailHelp"placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="">Password </label>
                <input type="text" class="form-control" name="password" value="{{$editvendor->password}}" id="" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="">OTP Verified </label>
                <select class="form-control" name="otp_verified">
                    <option value="1" {{$editvendor->otp_verified==1?'selected':""}}>Yes</option>
                    <option value="0" {{$editvendor->otp_verified==0?'selected':""}}>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Store Name </label>
                <input type="text" class="form-control" name="store_name" value="{{$editvendor->store_name}}" id="" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Store Category </label>
                <input type="text" class="form-control" name="store_category" value="{{$editvendor->store_category}}" id="" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Store Category ID</label>
                <input type="text" class="form-control" name="store_category_id" value="{{$editvendor->store_category_id}}" id="" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Country Code </label>
                <input type="text" class="form-control" name="country_code" value="{{$editvendor->country_code }}" id="" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="">WhatsApp</label>
                <input type="text" class="form-control" name="whatsapp" value="{{$editvendor->whatsapp}}" id="" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{$editvendor->phone}}" id="" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" name="address" value="{{$editvendor->address}}" id="" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Logo</label>
                <input type="file" class="form-control" name="logo" id="logo" aria-describedby="emailHelp" placeholder="">
                @if ($editvendor->logo!='')
                <label for="logo">
                <img src="{{url($editvendor->logo)}}" alt="" style="width:100px;">
                </label>
                @endif
            </div>
            <div class="form-group">
                <label for="">Featured Image</label>
                <input type="file" id="featured_image" class="form-control" name="featured_image" value="" aria-describedby="emailHelp" placeholder="">
                @if ($editvendor->featured_image!='')
                <label for="featured_image">
                <img src="{{url($editvendor->featured_image)}}" alt="" style="width:100px;">
                </label>
                @endif
            </div>
            <div class="form-group">
                <label for="">URL</label>
                <input type="text" class="form-control" name="url" value="{{$editvendor->url}}" id="" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Map Lattitude</label>
                <input type="text" class="form-control" name="map_lattitude" value="{{$editvendor->map_lattitude}}" id="" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Map Longitude</label>
                <input type="text" class="form-control" name="map_longitude" value="{{$editvendor->map_longitude}}" id="" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Shop in App</label>
                <select class="form-control" name="shop_in_app">
                    <option value="1" {{$editvendor->shop_in_app==1?'selected':""}}>Yes</option>
                    <option value="0" {{$editvendor->shop_in_app==0?'selected':""}}>No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection