<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        // session()->put('test', 'first laravel session');
        return view('public.contact');
    }

    public function sendemail(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|max:50',
            'subject' => 'required|string|max:80',
            'message' => 'required|string|max:100',

        ]);

        Message::create($data);

        $data = $request->except('_token');
        Mail::to('test@examole.com')->send((new ContactMail($data)));

        return redirect()->route('index.public');

    }

    public function show(string $id)
    {

        $message = Message::findOrFail($id);

        Message::where('id', $id)->update(['is_read' => true]);

        return view('admin.message_details', compact('message'));
    }

    public function messages()
    {

        $messages = Message::get();
        $unreadmessages = Message::where('is_read', false)->get();
        $readmessages = Message::where('is_read', true)->get();

        return view('admin.messages', compact('messages', 'unreadmessages', 'readmessages'));
    }

    public function destroy(Request $request, string $id)
    {

        $id = $request->id;

        Message::where('id', $id)->delete();

        return redirect()->route('messages.admin');
    }

  

}
