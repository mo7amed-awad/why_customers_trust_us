<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Modules\About\Entities\Model as About;
use Modules\Contact\Entities\Model as Contact;

class ContactController extends Controller
{
    public function contact()
    {
        $about = About::first();

        return view('Client.contact', compact('about'));
    }

    public function store(ContactRequest $request)
    {
        Contact::create([
            'name' => $request->name,
            'phone_code' => $request->phone_code,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Message sent successfully!');
    }
}
