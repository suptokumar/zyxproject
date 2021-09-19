@extends("layout.app")
@section("title",__("ZYX Admin Panel"))
@section("page")
<div class="breadcrumb">
    <h1>ZYX</h1>
    <ul>
        <li><a href="{{url('/')}}">Dashboard</a></li>
        <li><a href="{{url('/view/pages')}}">Pages</a></li>
        <li>Create Custom Pages</li>
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
        <form action="{{url('create-pages')}}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="category">Status</label>
                <select name="category" class="form-control" id="category">
                    <option value="publish">Publish</option>  
                    <option value="unpublish">Unpublish </option>          	
                </select>
            </div>
            <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" rows="10" class="form-control" id="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection