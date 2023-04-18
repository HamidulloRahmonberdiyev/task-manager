<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use App\Models\Answer;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:manager');        
    }

    public function create(Application $application)
    {
        return view('answer.create')->with([
            'application' => $application,
        ]);
    }

    public function store(Application $application, StoreAnswerRequest $request)
    {
        $application->answer()->create([
            'body' => $request->body,
        ]);

        return redirect()->route('dashboard')->with('success', "Javob jo'natildi!");
    }
}
