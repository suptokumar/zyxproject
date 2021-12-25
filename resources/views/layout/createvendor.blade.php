@extends("layout.app")
@section("title",__("ZYX Admin Panel"))
@section("page")
<div class="breadcrumb">
    <h1>ZYX</h1>
    <ul>
        <li><a href="{{url('/')}}">Dashboard</a></li>
        <li>Create vendor</li>
    </ul>
</div>
@endsection
@section("content")


<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="{{url('create-vendor')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="vendorName">Name</label>
                <input type="text" required class="form-control" name="vendorName" id="vendorName" aria-describedby="vendorName">
            </div>
            <div class="form-group">
                <label for="vendorEmail">Email address</label>
                <input type="email" class="form-control" name="vendorEmail" id="vendorEmail" aria-describedby="vendorEmail">
            </div>
            <div class="form-group">
                <label for="">Password </label>
                <input type="text" class="form-control" required name="password" id="" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="vendorCategory">Vendor Category </label>
                <select class="form-control" required name="vendorCategory" id="vendorCategory">
                    <option>Select</option>
                    @foreach($vendorCategories as $vendorCategory)
                        <option value="{{$vendorCategory->id}}" >
                            {{$vendorCategory->categoryName}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="vendorType">Vendor Type </label>
                <select class="form-control"  required name="vendorType" id="vendorType">
                    <option>Select</option>
                    @foreach($vendorTypes as $vendorCategory)
                        <option value="{{$vendorCategory->id}}">
                            {{$vendorCategory->typeName}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="isOtpVerify">OTP Verified </label>
                <select class="form-control" name="isOtpVerify" id="isOtpVerify">
                    <option value="1" >Yes</option>
                    <option value="0" >No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="storeName">Store Name </label>
                <input type="text" class="form-control" name="storeName" id="" aria-describedby="storeName" placeholder="">
            </div>
            <div class="form-group">
                <label for="gstNumber">GST Number</label>
                <input type="text" class="form-control" name="gstNumber" id="gstNumber" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
                <label for="storeCounty">Store Country</label>
                <input type="text" class="form-control" name="storeCounty" id="storeCounty" aria-describedby="storeCounty" placeholder="">
            </div>
            <div class="form-group">
                <label for="storeCity">Store City</label>
                <input type="text" class="form-control" name="storeCity" id="storeCity" aria-describedby="storeCity" placeholder="">
            </div>
            <div class="form-group">
                <label for="storeAddress">Store Address</label>
                <input type="text" class="form-control" name="storeAddress" id="storeAddress" aria-describedby="storeAddress" placeholder="">
            </div>

            <div class="form-group">
                <label for="vendorCountryCode">Country Code</label>
                <input type="text" required class="form-control" name="vendorCountryCode" id="vendorCountryCode" aria-describedby="emailHelp" placeholder="">
            </div>

            <div class="form-group">
                <label for="vendorContactNumber">Contact Number</label>
                <input type="text" required class="form-control" name="vendorContactNumber"  id="" aria-describedby="vendorContactNumber" placeholder="">
            </div>
            <div class="form-group">
                <label for="storeLatitude">Map Lattitude</label>
                <input type="text" required class="form-control" name="storeLatitude"  id="storeLatitude" aria-describedby="storeLatitude" placeholder="">
            </div>
            <div class="form-group">
                <label for="storeLongitude">Map Longitude</label>
                <input type="text" required class="form-control" name="storeLongitude" id="storeLongitude" aria-describedby="emailHelp" placeholder="">
            </div>

            <div class="form-group">
                <label for="storeWebLogo">Web Logo</label>
                <input type="file" class="form-control" name="storeWebLogo" id="storeWebLogo" aria-describedby="emailHelp" placeholder="">

            </div>
            <div class="form-group">
                <label for="storeAppLogo">App Logo</label>
                <input type="file" class="form-control" name="storeAppLogo" id="storeAppLogo" aria-describedby="emailHelp" placeholder="">

            </div>

            <div class="form-group">
                <label for="vendorDomainUrl">Domain URL</label>
                <input type="text" class="form-control" name="vendorDomainUrl" id="vendorDomainUrl" placeholder="">
            </div>

            <div class="form-group">
                <label for="vendorStatus">Vendor Status</label>
                <select class="form-control" name="vendorStatus">
                    <option value="1" >Open</option>
                    <option value="2" >Delete</option>
                    <option value="0">Close</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
