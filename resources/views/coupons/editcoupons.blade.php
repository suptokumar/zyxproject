@extends("layout.app")
@section("title",__("ZYX Admin Panel"))
@section("page")
<div class="breadcrumb">
    <h1>ZYX</h1>
    <ul>
        <li><a href="{{url('/')}}">Dashboard</a></li>
        <li><a href="{{url('/coupons')}}">Coupons</a></li>
        <li>Create New Coupons</li>
    </ul>
</div>
@endsection
@section("content")


<div class="row justify-content-center">
    <div class="col-md-6">
    	@if (session('failed'))
        <div class="alert alert-danger text-center">
            {{ session('failed') }}
        </div>
        @endif
        @if (session('successfully'))
        <div class="alert alert-success text-center">
            {{ session('successfully') }}
        </div>
        @endif
        <form action="{{url('editcoupons')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$coupon->id}}">
            <div class="form-group">
                <label for="code">Coupon Code</label>
                <input type="text" name="code" value="{{$coupon->code}}" class="form-control" id="code">
            </div>
            <div class="form-group">
                <label for="value">Enter Value</label>
                <input name="value" class="form-control" value="{{$coupon->value}}" id="value" type="number">
            </div>
            <div class="form-group">
                <label for="type">Coupon Type</label>
                <select name="type" class="form-control" id="type">
                    <option value="Fixed" {{$coupon->type=='Fixed'?"selected":""}}>Fixed</option>  
                    <option value="Percentage" {{$coupon->type=='Percentage'?"selected":""}}>Percentage</option>          	
                </select>
            </div>
            <div class="form-group">
                <label for="test">Coupon Test</label>
                <select name="test" onchange="con_fcl(this.value)" onload="con_fcl(this.value)" value="{{old("test")}}" class="form-control" id="test">
                    <option value="Minimum Order Value" {{$coupon->test=='Minimum Order Value'?"selected":""}}>Minimum Order Value</option>  
                    <option value="Selected Vendors" {{$coupon->test=='Selected Vendors'?"selected":""}}>Selected Vendors</option>          	
                    <option value="Minimum Order + Selected Vendors" {{$coupon->test=='Minimum Order + Selected Vendors'?"selected":""}}>Minimum Order + Selected Vendors</option>          	
                </select>
            </div>

            <div class="form-group a1">
                <label for="min_amount">Minimum Order Value</label>
                <input name="min_amount" class="form-control" value="{{$coupon->min_amount}}" id="min_amount" type="number">
            </div>

            <div class="form-group a2" style="display: none;">
                <label for="vendors">Select Vendors</label>
                <select name="vendors[]" class="form-control" id="vendors" multiple="">
                	@forelse ($vendors as $vendor)
                    <option value="{{$vendor->id}}" {{in_array($vendor->id,json_decode($coupon->vendors))?"selected":""}}>{{$vendor->vendorName}}</option>  
                    @empty     	
                    <option value="">Select</option>  
                	@endforelse
                </select>
            </div>


            <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" rows="10" class="form-control" id="description">{{$coupon->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="icon">Icon</label>
                <input name="icon" class="form-control" value="{{$coupon->icon}}" id="icon" type="file">
                @if ($coupon->icon)
                	<img src="{{url($coupon->icon)}}" style="width: 200px" alt="">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@endsection
@section("script")
<script>
	function con_fcl(value){
		if(value=="Minimum Order Value"){
			$(".a1").show();
			$(".a2").hide();
		}else if(value=="Selected Vendors"){
			$(".a1").hide();
			$(".a2").show();
		}else{
			$(".a1").show();
			$(".a2").show();
		}
	}
	con_fcl(document.querySelector("#test").value);
</script>
@endsection