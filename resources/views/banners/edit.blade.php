@extends("layout.app")
@section("title",__("ZYX Admin Panel"))
@section("page")
<div class="breadcrumb">
    <h1>ZYX</h1>
    <ul>
        <li><a href="{{url('/')}}">Dashboard</a></li>
        <li><a href="{{url('/faqs')}}">FAQs</a></li>
        <li>Edit FAQs</li>
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
        <form action="{{url('edit-faqs')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="faqs_id" value="{{$editfaqs->id}}">
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" id="category_id">
                    @foreach($faqCategory as $category)
                    <option value="{{ $category->id }}" {{ $editfaqs->faq_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach                	
                </select>
            </div>
            <div class="form-group">
                <label for="">Question</label>
                <input type="text" class="form-control" name="question" value="{{$editfaqs->question}}" id="" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="">Answer</label>
                <textarea name="answer" rows="10" class="form-control" id="answer">{{$editfaqs->answer}}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection