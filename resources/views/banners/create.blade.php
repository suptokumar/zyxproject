@extends("layout.app")
@section("title",__("ZYX Admin Panel"))
@section("page")
<div class="breadcrumb">
    <h1>ZYX</h1>
    <ul>
        <li><a href="{{url('/')}}">Dashboard</a></li>
        <li><a href="{{url('/view/banners')}}">Banners</a></li>
        <li>Create Banners</li>
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
        <form action="{{url('create-banners')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="bannerName">Name of Banner</label>
                <input name="bannerName" class="form-control" id="bannerName">
            </div>
            <div class="form-group">
                <label for="category">Banner Category</label>
                <select name="category" class="form-control" id="category">
                    @foreach($bannerCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach             	
                </select>
            </div>
            <div class="form-group">
                <label for="location">Banner Location </label>
                <select name="location" class="form-control" id="location">
                    @foreach($bannerLocation as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach        	
                </select>
            </div>
            
            <div class="form-group">
            <label for="answer">Answer</label>
            <input type="file" name ="bannerImg" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection