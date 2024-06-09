<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\EventInvitation;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $dances = ["Aitab!?", "Kord sadamas", "Aafrikast Eestisse", "Juured hoiavad-siin ja praegu", "Mo käes", "Eri"];
        return view('admin.events.create', compact('dances'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'nullable|string|max:255', 
            'dances' => 'nullable|string',
            'emails' => 'required|string', 
        ]);

        $event = Event::create($validatedData);

        $emails = explode(',', $request->emails);
        foreach ($emails as $email) {
            Mail::to(trim($email))->send(new EventInvitation($event, $email));
        }

        return redirect()->route('admin.events.index')->with('success', 'Event created and invitations sent!');
    }

    public function show(Event $event)
    {
        $responses = $event->responses()->get();
        return view('admin.events.show', compact('event', 'responses'));
    }

    public function edit(Event $event)
    {
        $dances = ["Aitab!?", "Kord sadamas", "Aafrikast Eestisse", "Juured hoiavad-siin ja praegu", "Mo käes", "Eri"];
        return view('admin.events.edit', compact('event', 'dances'));
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'nullable|string|max:255', 
            'dances' => 'nullable|string',
        ]);

        $event->update($validatedData);

        return redirect()->route('admin.events.show', $event)->with('success', 'Esinemine on edukalt muudetud.') ;
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
