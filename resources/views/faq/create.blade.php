@extends("layout.app")
@section("title",__("ZYX Admin Panel"))
@section("page")
<div class="breadcrumb">
    <h1>ZYX</h1>
    <ul>
        <li><a href="{{url('/')}}">Dashboard</a></li>
        <li><a href="{{url('/faqs')}}">Faqs</a></li>
        <li>Create FAQs</li>
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
        <form action="{{url('create-faqs')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" id="category_id">
                    @foreach($faqCategory as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach                	
                </select>
            </div>
            <div class="form-group">
                <label for="question">Questions</label>
                <input type="text" name="question" class="form-control" id="question">
            </div>
            
            <div class="form-group">
            <label for="answer">Answer</label>
            <textarea name="answer" rows="10" class="form-control" id="answer"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection