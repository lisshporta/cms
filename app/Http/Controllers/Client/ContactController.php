<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\Tenant\MessageReceived;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $owner = User::where('id', tenant('user_id'))->first();

        return view('client.contact', ['owner' => $owner]);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $owner = User::where('id', tenant('user_id'))->first();

        if ($owner) {
            $owner->notify(new MessageReceived($request));
            flash()->success('Your message has been sent successfully.');
        } else {
            flash()->error('We were unable to send your message at this time. Please try contacting user via their support details below.');
        }

        return redirect()->back();
    }
}
