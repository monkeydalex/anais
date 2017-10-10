<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
//use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //
    public function index (){
    	Session::put('clef.a', ['valeur0', 'valeur1', 'valeur2']);
    	Session::push('clef.a', 'valeur3');
    	//dd(session::all());
    	//Session::all();
    	Session::flash('success', 'Bien joué mon gars !!!');
    	return view('test');
    }
}
