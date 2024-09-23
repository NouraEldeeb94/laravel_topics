<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use App\Traits\Common;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    use Common;

    public function create()
    {

        $categories = Category::select('id', 'category_name')->get();
        return view('admin.add_topic', compact('categories'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'topic_title' => 'required|string',
            'content' => 'required|string|max:1000',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'published' => 'boolean',
            'trending' => 'boolean',

        ]);

        $data['image'] = $this->uploadfile($request->image, 'assests/images/topics');

        $data['published'] = isset($request->published);
        $data['trending'] = isset($request->trending);

        Topic::create($data);
        return redirect()->route('topic.admin');

    }

    public function index()
    {

        $topics = Topic::with('category')->get();
        // dd($topics[0]->category->category_name);
        return view('admin.topics', compact('topics'));
    }

    public function show(string $id)
    {

        $topic = topic::findOrFail($id);
        $topic->increment('views');

        return view('admin.topic_details', compact('topic'));
    }

    public function edit(string $id)
    {

        $topic = Topic::findOrFail($id);
        $categories = Category::select('id', 'category_name')->get();

        return view('admin.edit_topic', compact('topic', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'topic_title' => 'required|string',
            'content' => 'required|string|max:1000',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadfile($request->image, 'assests/images/topics');
        }

        $data['published'] = isset($request->published);
        $data['trending'] = isset($request->trending);

        Topic::where('id', $id)->update($data);

        return redirect()->route('topic.admin');

    }

    public function destroy(Request $request, string $id)
    {

        $id = $request->id;

        topic::where('id', $id)->delete();

        return redirect()->route('topic.admin');
    }

}
