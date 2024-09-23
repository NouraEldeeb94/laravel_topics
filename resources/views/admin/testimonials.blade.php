
@extends('admin.layouts.main')

@section('content')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Testimonials</h2>
                <a href="{{route('testimonial.add')}}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new testimonial</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Name</th>
                            <th scope="col">Content</th>
                            <th scope="col">Published</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($testimonials as $testimonial)
                        <tr>
                            <th scope="row">{{\Carbon\Carbon::parse($testimonial['created_at'])->format('d M Y')}}</th>
                            <td>{{$testimonial['name']}}</td>
                            <td>{{Str::Limit($testimonial['content'], 20, '...')}}</td>
                            <td>@if($testimonial['published']==1) yes @else no @endif</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="{{route('testimonial.edit', $testimonial['id'])}}"><img src="{{asset('assests/images/edit-svgrepo-com.svg')}}"></a></td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="{{route('testimonial.destroy', $testimonial['id'])}}" onclick="return confirm('Are you sure you want to delete?')"><img src="{{asset('assests/images/trash-can-svgrepo-com.svg')}}"></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection
  