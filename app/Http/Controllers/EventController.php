<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Event;
use Calendar;

class EventController extends Controller
{
    public function index(){

        $events = Event::get();
        $event_list = [];

        foreach ($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->event_name,
                true,
                new \Datetime($event->start_date),
                new \Datetime($event->end_date . ' +1 day')
            );
        }

        $calendar_details = Calendar::addEvents($event_list);

        return view('calendar.index', compact('calendar_details'));

    }
}
