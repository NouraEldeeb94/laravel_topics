@extends('admin.layouts.main')

@section('content')
    
    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Topics</h2>
                <a href="{{route('topic.add')}}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new topic</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Content</th>
                            <th scope="col">No. of views</th>
                            <th scope="col">Published</th>
                            <th scope="col">Trending</th>
                            <th scope="col">Details</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($topics as $topic)
                        <tr>
                            <th scope="row">{{\Carbon\Carbon::parse($topic['created_at'])->format('d M Y')}}</th>
                            <td><a class="text-decoration-none text-dark" href="{{route('topic.show', $topic['id'])}}">{{$topic['topic_title']}}</a>
                            </td>
                            <td>{{$topic->category->category_name}}</td>
                            <td>{{Str::Limit($topic['content'], 20, '...')}}</td>
                            <td>{{ $topic['views'] }}</td>
                            <td>@if($topic['published']==1) yes @else no @endif</td>
                            <td>@if($topic['trending']==1) yes @else no @endif</td>
                            <td><a href="{{route('topic.show', $topic['id'])}}">Details</a></td>
                            <td class="text-center"><a href="{{route('topic.edit', $topic['id'])}}" class="text-decoration-none text-dark" href="edit_topic.blade.php" ><img src="{{asset('assests/images/edit-svgrepo-com.svg')}}"></a></td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="{{route('topic.destroy', $topic['id'])}}" onclick="return confirm('Are you sure you want to delete?')"><img src="{{asset('assests/images/trash-can-svgrepo-com.svg')}}"></a></td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
 
    @endsection
  