@extends('admin.layouts.main')

@section('content')

  <div class="container my-5">
    <div class="mx-2">
      <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Topic</h2>
      <form action="{{route('topic.update', $topic->id)}}" method="POST" class="px-md-5" enctype="multipart/form-data">
      @csrf
      @method('put')
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Topic Title:</label>
          <div class="col-md-10">
            <input type="text" placeholder="e.g. Design Patterns" class="form-control py-2"  name="topic_title" value="{{old('topic_title', $topic->topic_title)}}"/>
            @error('topic_title')
              <div class="alert alert-warning">{{$message}}</div>
              @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Category:</label>
          <div class="col-md-10">
            <select name="category_id" id="" class="form-control py-1">
              <option value="">Computer Science</option>
              @foreach($categories as $category)
              <option value="{{$category->id}}" @selected(old('category_id', $topic->category_id) == $category->id)>"{{$category->category_name}}"</option>
              @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-warning">{{$message}}</div>
              @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
          <div class="col-md-10">
            <textarea  id="" rows="5" class="form-control" name="content">{{old('content', $topic->content)}}</textarea>
            @error('content')
              <div class="alert alert-warning">{{$message}}</div>
              @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Trending:</label>
          <div class="col-md-10">
            <input type="checkbox" class="form-check-input" style="padding: 0.7rem;"   name="trending"  @checked(old('trending',$topic->trending)) />
          </div>
        </div>
        <div class="form-group mb-3 row">
  
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
          <div class="col-md-10">
            <input type="checkbox" class="form-check-input" style="padding: 0.7rem;"  name="published" @checked(old('published',$topic->published))/>
          </div>
        </div>
        <hr>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
          <div class="col-md-10">
            <input type="file" class="form-control" style="padding: 0.7rem; margin-bottom: 10px;" name="image" value="{{$topic->image}}" />
            <img src="{{asset('assests/images/topics/' .$topic->image)}}" alt="" style="width: 10rem;">
            @error('image')
              <div class="alert alert-warning">{{$message}}</div>
              @enderror
          </div>
        </div>
        <div class="text-md-end">
          <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            Edit Topic
          </button>
        </div>
      </form>
    </div>
  </div>
 
  @endsection