<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(Property $property, PropertyContactRequest $resquest)
    {
        Mail::send(new PropertyContactMail($property, $resquest->validated()));
        return back()->with('success', 'Your contact request has been sent');
    }
}
