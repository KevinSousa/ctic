<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala;

class SalasController extends Controller
{
    public function index(){ 

        return view ('index', compact('users'));
        
    }   

    public function save(Request $req){

    }

    public function remove($id){

    }

    public function edit($id){

    }

    public function update(Request $req, $id){
        
    }
}
