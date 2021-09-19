@extends("layout.app")
@section("title",__("ZYX Admin Panel"))
@section("page")
<div class="breadcrumb">
    <h1>ZYX</h1>
    <ul>
        <li><a href="{{url('/')}}">Dashboard</a></li>
        <li><a href="{{url('/view/pages')}}">Pages</a></li>
        <li>Edit Custom</li>
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
        <form action="{{url('edit-pages')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="pages_id" value="{{$editpage->id}}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{$editpage->title}}" id="" aria-describedby="emailHelp" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category" class="form-control" id="category">
                    <option value="publish" {{ $editpage->status == 'publish' ? 'selected' : '' }}>Publish</option>  
                    <option value="unpublish" {{ $editpage->status == 'unpublish' ? 'selected' : '' }}>Unpublish </option>          	
                </select>
            </div>
            
            <div class="form-group">
                <label for="content">Answer</label>
                <textarea name="content" rows="10" class="form-control" id="content">{{$editpage->content}}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection