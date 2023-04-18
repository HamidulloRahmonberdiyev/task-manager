<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Jobs\SendEmailJob;
use App\Mail\ApplicationCreated;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(StoreApplicationRequest $request): RedirectResponse
    {
        if ($request->hasFile('file_url')) {
            $path = $request->file('file_url')->store('files', 'public');
        }

        $application = Application::create([
            'user_id' => auth()->user()->id,
            'subject' => $request->subject,
            'message' => $request->message,
            'file_url' => $path,
        ]);

        dispatch(new SendEmailJob($application));

        return redirect()->back()->with('success', "Xabarnoma yuborildi!");
    }
}
