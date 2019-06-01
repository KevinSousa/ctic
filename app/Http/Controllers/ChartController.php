<?php

namespace App\Http\Controllers;

use Khill\Lavacharts\Lavacharts;
use Illuminate\Http\Request;
use App\TiposProblemasController;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index(){

		$lava = new Lavacharts; // See note below for Laravel

		$hardware = DB::table('chamados')
            ->join('sublista_tipo_problemas', 'chamados.cham_sublista_problema', '=', 'sublista_tipo_problemas.sub_id')
            ->join('tipo_problemas', 'sublista_tipo_problemas.sub_probl', '=', 'tipo_problemas.probl_id')
            ->where('tipo_problemas.probl_id', '=', '1')
            ->count();

		$software = DB::table('chamados')
		            ->join('sublista_tipo_problemas', 'chamados.cham_sublista_problema', '=', 'sublista_tipo_problemas.sub_id')
		            ->join('tipo_problemas', 'sublista_tipo_problemas.sub_probl', '=', 'tipo_problemas.probl_id')
		            ->where('tipo_problemas.probl_id', '=', '2')
		            ->count();
				
		$redes = DB::table('chamados')
		            ->join('sublista_tipo_problemas', 'chamados.cham_sublista_problema', '=', 'sublista_tipo_problemas.sub_id')
		            ->join('tipo_problemas', 'sublista_tipo_problemas.sub_probl', '=', 'tipo_problemas.probl_id')
		            ->where('tipo_problemas.probl_id', '=', '3')
		            ->count();

		$reasons = $lava->DataTable();

		$reasons->addStringColumn('Reasons')
		        ->addNumberColumn('Percent')
		        ->addRow(['Hardware', $hardware])
		        ->addRow(['Software', $software])
		        ->addRow(['Rede', $redes]);

		$lava->DonutChart('IMDB', $reasons, [
		    'title' => 'Percentual de Chamados por tipo',
		    'width' => 1000,
        	'height' => 400,
        	'legend' => [
        		'position' => 'right'
        	]
		]);

	    return View('123', compact('lava'));


    }

}
