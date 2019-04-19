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

    public function addEvent(){
        return view('calendar.addEvent');   
    }

    public function saveEvent(Request $request){

        $validator = Validator::make($request->all(), [
            'event_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if($validator->fails()){
            \Session::flash('warning', 'Erro ao efetuar agendamento');
            return Redirect::to('/calendar/addEvent')->withInput()->withErrors($validator);
        }

        $event = new Event;
        $event->event_name = $request['event_name'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event -> save();

        \Session::flash('success', 'Agendamento efetuado com sucesso.');
        return Redirect::to('/calendar/addEvent');
    }
}
