<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Event;
use App\Sala;
use Illuminate\Support\Facades\DB;
use Calendar;

class EventController extends Controller
{
    public function index(Request $request){

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
        $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        $calendar_details = Calendar::addEvents($event_list);

        return view('calendar.index', compact('calendar_details', 'ajax'));

    }

    public function addEvent(Request $request){
         $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        $salas = Sala::all();
        return view('calendar.addEvent', compact('ajax','salas'));   
    }

    public function saveEvent(Request $request){


        $inicio = $request['start_date']; 
        $fim = $request['end_date'];
        
        $reservas = DB::table('events')->where('start_date','=<',$inicio)->where('end_date','>=',$fim)->value('start_date','end_date');// Aqui faz um select  e pega todos os resultados maiores que a data de termino e de fim.
        
        $conflitoStart = DB::table('events')->whereBetween('start_date', [$inicio, $fim])->whereDate('start_date', $inicio)->count('start_date');//aqui ele verifica se tem alguma data de inicio entre a data de inicio e fim 
        $conflitoEnd = DB::table('events')->whereBetween('end_date', [$inicio, $fim])->count('end_date');

        //aqui ele faz a mesma coisa de cima só tem se é a data de fim que está entre.
        $dados = $request->validate([
            'event_name' => 'required',
            'description' => 'max:300',
            'event_sala' => 'required',
            'start_date' => 'required|date:Y-m-d H:i',
            'end_date' => 'required|date:Y-m-d H:i|after:start_date',
            ],[
            'event_name.required' => 'É obrigatório preencher o nome do Agendamento',
            'description.max' => 'Digite menos de 300 caracteres na Descrição',
            'event_sala.required' => 'É obrigatório selecionar uma Sala',
            'start_date.required' => 'É obrigatório ter uma Data de Início',
            'start_date.date' => 'Adicione uma Data de Início em um formato aceitavel',
            'end_date.required' => 'É obrigatório ter uma Data de Término',
            'end_date.date' => 'Adicione uma Data de Término em um formato aceitavel',
            'end_date.after' => 'A Data de Término está maior que a Data de Início',
        ]);


        if ($reservas != null || $conflitoStart != false || $conflitoEnd != false ){
            \Session::flash('warning', 'Erro ao efetuar agendamento');
            return Redirect::to('/calendar/addEvent')->withInput()->withErrors($reservas);
        }

        $event = new Event;
        $event->event_name = $request['event_name'];
        $event->description = $request['description'];
        $event->event_sala = $request['event_sala'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event -> save();

        
        \Session::flash('success', 'Agendamento efetuado com sucesso.');
        return Redirect::to('/calendar/addEvent');
    }
}
