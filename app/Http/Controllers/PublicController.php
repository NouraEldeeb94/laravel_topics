<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Topic;
use App\Traits\Common;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    use Common;

    public function show()
    {

        $testimonials = Testimonial::where('published', '=', 1)->latest()->limit(2)->get();
        return view('public.testimonials', compact('testimonials'));
    }

    public function topic_list(Request $request)
    {
        $topics = Topic::where('published', 1)->latest()->limit(10)->paginate(10);
        $trendingtopics = Topic::where('published', 1)->where('trending', 1)->latest()->limit(2)->get();
        $categories = Category::select('id', 'category_name')->get();

        return view('public.topics-listing', compact('topics', 'categories', 'trendingtopics'));
    }

    public function topic_detail(string $id)
    {
        $topic = Topic::with('category')->where('id', $id)->where('published', 1)->findOrFail($id);
        $topic->increment('views');

        return view('public.topics-detail', compact('topic'));
    }

    public function index()
    {

        $topics = Topic::where('published', 1)->with('category')->latest()->limit(5)->get();
        $trendingtopics = Topic::where('published', 1)->where('trending', 1)->latest()->limit(2)->get();
        $testimonials = Testimonial::latest()->limit(3)->get();
        $categories = Category::with(['topic' => function ($query) {$query->where('published', 1)->take(4);}])->limit(5)->get();

        // dd($categories);

        return view('public.index', compact('topics', 'testimonials', 'categories', 'trendingtopics'));

    }

    public function errorpage()
    {
        return view('errors.404');
    }

}
