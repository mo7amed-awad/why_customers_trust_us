<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Modules\Contact\Entities\Model as Contact;

class ContactController extends Controller
{
    public function contact()
    {
        return view('Client.contact');
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->validated());

        return back()->with('success', 'Message sent successfully!');
    }
}
