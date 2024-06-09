<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
    public function index()
    {
        return view('calendar.index');
    }

    public function events()
    {
        $events = Event::all(['name', 'event_date']);
        $calendarEvents = [];

        foreach ($events as $event) {
            $calendarEvents[] = [
                'title' => $event->name,
                'start' => $event->event_date,
            ];
        }

        return response()->json($calendarEvents);
    }
}
