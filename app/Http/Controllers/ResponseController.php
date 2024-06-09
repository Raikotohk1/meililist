<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResponseController extends Controller
{
    public function create(Request $request, Event $event)
    {
        $email = $request->query('email');
        Log::info('Create form loaded for event ID: ' . $event->id . ' with email: ' . $email);
        return view('responses.create', compact('event', 'email'));
    }

    public function store(Request $request, Event $event)
    {

        Log::info('Store method called for event ID: ' . $event->id);
        
        $validatedData = $request->validate([
            'email' => 'required|email',
            'response' => 'required|in:yes,no,maybe',
        ]);

        Log::info('Validated data:', $validatedData);

        try {
            Response::create([
                'event_id' => $event->id,
                'email' => $validatedData['email'],
                'response' => $validatedData['response']
            ]);

            Log::info('Response created successfully for event ID: ' . $event->id);
        } catch (\Exception $e) {
            Log::error('Error inserting response: ' . $e->getMessage());
        }

        return redirect()->route('responses.thankyou');
    }

    public function thankyou()
    {
        Log::info('Thank you page loaded');
        return view('responses.thankyou');
    }
}
