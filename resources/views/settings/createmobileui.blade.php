@extends("layout.app")
@section("title",__("ZYX Admin Panel"))
@section("page")
<div class="breadcrumb">
    <h1>ZYX</h1>
    <ul>
        <li><a href="{{url('/')}}">Dashboard</a></li>
        <li>Create MobileUI</li>
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
        <form action="{{url('create-mobileui')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" class="form-control" id="category">
                	<option value="User App">User App</option>
                	<option value="Vendor App">Vendor App</option>
                	<option value="Driver App">Driver App</option>
                </select>
            </div>
            <div class="form-group">
                <label for="file">File Unique Name (the extension will be .json automatically, no need to add it)</label>
                <input type="text" name="file" class="form-control" id="file">
            </div>
            
            <div class="form-group">
            <label for="json">JSON records</label>
            <textarea name="json" rows="20" class="form-control" id="json"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection