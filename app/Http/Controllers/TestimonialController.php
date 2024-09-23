<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Traits\Common;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    use Common;

    public function create()
    {

        return view('admin.add_testimonial');

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string|max:1000',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',

        ]);

        $data['image'] = $this->uploadfile($request->image, 'assests/images/testimonials');
        $data['published'] = isset($request->published);

        Testimonial::create($data);
        return redirect()->route('testimonial.admin');

    }

    public function index()
    {

        $testimonials = Testimonial::get();
        return view('admin.testimonials', compact('testimonials'));
    }

    public function edit(string $id)
    {

        $testimonial = Testimonial::findOrFail($id);
        return view('admin.edit_testimonial', compact('testimonial'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string|max:1000',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',

        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadfile($request->image, 'assests/images/testimonials');
        }

        $data['published'] = isset($request->published);

        Testimonial::where('id', $id)->update($data);

        return redirect()->route('testimonial.admin');

    }

    public function destroy(Request $request, string $id)
    {

        $id = $request->id;
        Testimonial::where('id', $id)->delete();

        return redirect()->route('testimonial.admin');
    }

}
