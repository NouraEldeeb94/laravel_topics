<section class="featured-section">
            <div class="container">
                <div class="row justify-content-center">
                @foreach($trendingtopics as $topic)
                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block bg-white shadow-lg">
                            <a href="{{ route('index.topics-detail', ['id' => $topic->id]) }}">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="mb-2">{{$topic['topic_title']}}</h5>

                                        <p class="mb-0">{{Str::Limit($topic['content'], 20, '...')}}</p>
                                    </div>

                                    <span class="badge bg-design rounded-pill ms-auto">{{$topic->views}}</span>
                                </div>

                                <img src="{{asset('assests/images/topics/' .$topic->image)}}"
                                    class="custom-block-image img-fluid" alt="">
                            </a>
                        </div>
                    </div>
            @endforeach
        </section>