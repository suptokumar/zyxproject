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
                <label for="vendorName">Name</label>
                <input type="text" class="form-control" name="vendorName" value="{{$editvendor->vendorName}}" id="vendorName" aria-describedby="vendorName">
            </div>
            <div class="form-group">
                <label for="vendorEmail">Email address</label>
                <input type="email" class="form-control" name="vendorEmail" value="{{$editvendor->vendorEmail}}" id="vendorEmail" aria-describedby="vendorEmail">
            </div>
            <div class="form-group">
                <label for="">Password </label>
                <input type="text" class="form-control" name="password" placeholder="Leave it empty if you don't want to edit it" id="" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="vendorCategory">Vendor Category </label>
                <select class="form-control" name="vendorCategory" id="vendorCategory">
                    <option>Select</option>
                    @foreach($vendorCategories as $vendorCategory)
                        <option value="{{$vendorCategory->id}}" {{$editvendor->vendorCategory==$vendorCategory->id?'selected':""}}>
                            {{$vendorCategory->categoryName}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="vendorType">Vendor Type </label>
                <select class="form-control" name="vendorType" id="vendorType">
                    <option>Select</option>
                    @foreach($vendorTypes as $vendorCategory)
                        <option value="{{$vendorCategory->id}}" {{$editvendor->vendorType==$vendorCategory->id?'selected':""}}>
                            {{$vendorCategory->typeName}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="isOtpVerify">OTP Verified </label>
                <select class="form-control" name="isOtpVerify" id="isOtpVerify">
                    <option value="1" {{$editvendor->isOtpVerify==1?'selected':""}}>Yes</option>
                    <option value="0" {{$editvendor->isOtpVerify==0?'selected':""}}>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="storeName">Store Name </label>
                <input type="text" class="form-control" name="storeName" value="{{$editvendor->storeName}}" id="" aria-describedby="storeName" placeholder="">
            </div>
            <div class="form-group">
                <label for="gstNumber">GST Number</label>
                <input type="text" class="form-control" name="gstNumber" value="{{$editvendor->gstNumber}}" id="gstNumber" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="storeCounty">Store Country</label>
                <input type="text" class="form-control" name="storeCounty" value="{{$editvendor->storeCounty}}" id="storeCounty" aria-describedby="storeCounty" placeholder="">
            </div>
            <div class="form-group">
                <label for="storeCity">Store City</label>
                <input type="text" class="form-control" name="storeCity" value="{{$editvendor->storeCity}}" id="storeCity" aria-describedby="storeCity" placeholder="">
            </div>
            <div class="form-group">
                <label for="storeAddress">Store Address</label>
                <input type="text" class="form-control" name="storeAddress" value="{{$editvendor->storeAddress}}" id="storeAddress" aria-describedby="storeAddress" placeholder="">
            </div>

            <div class="form-group">
                <label for="vendorCountryCode">Country Code</label>
                <input type="text" class="form-control" name="vendorCountryCode" value="{{$editvendor->vendorCountryCode}}" id="vendorCountryCode" aria-describedby="emailHelp" placeholder="">
            </div>

            <div class="form-group">
                <label for="vendorContactNumber">Contact Number</label>
                <input type="text" class="form-control" name="vendorContactNumber" value="{{$editvendor->vendorContactNumber}}" id="" aria-describedby="vendorContactNumber" placeholder="">
            </div>
            <div class="form-group">
                <label for="storeLatitude">Map Lattitude</label>
                <input type="text" class="form-control" name="storeLatitude" value="{{$editvendor->storeLatitude}}" id="storeLatitude" aria-describedby="storeLatitude" placeholder="">
            </div>
            <div class="form-group">
                <label for="storeLongitude">Map Longitude</label>
                <input type="text" class="form-control" name="storeLongitude" value="{{$editvendor->storeLongitude}}" id="storeLongitude" aria-describedby="emailHelp" placeholder="">
            </div>

            <div class="form-group">
                <label for="storeWebLogo">Web Logo</label>
                <input type="file" class="form-control" name="storeWebLogo" id="storeWebLogo" aria-describedby="emailHelp" placeholder="">
                @if ($editvendor->storeWebLogo!='')
                <label for="logo">
                <img src="{{url("public/uploads/storeweblogo/".$editvendor->storeWebLogo)}}" alt="" style="width:100px;">
                </label>
                @endif
            </div>
            <div class="form-group">
                <label for="storeAppLogo">App Logo</label>
                <input type="file" class="form-control" name="storeAppLogo" id="storeAppLogo" aria-describedby="emailHelp" placeholder="">
                @if ($editvendor->storeAppLogo!='')
                <label for="logo">
                <img src="{{url("public/uploads/storeapplogo/".$editvendor->storeAppLogo)}}" alt="" style="width:100px;">
                </label>
                @endif
            </div>

            <div class="form-group">
                <label for="vendorDomainUrl">Domain URL</label>
                <input type="text" class="form-control" name="vendorDomainUrl" value="{{$editvendor->vendorDomainUrl}}" id="vendorDomainUrl" placeholder="">
            </div>

            <div class="form-group">
                <label for="vendorStatus">Vendor Status</label>
                <select class="form-control" name="vendorStatus">
                    <option value="1" {{$editvendor->vendorStatus==1?'selected':""}}>Open</option>
                    <option value="2" {{$editvendor->vendorStatus==2?'selected':""}}>Delete</option>
                    <option value="0" {{$editvendor->vendorStatus==0?'selected':""}}>Close</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
