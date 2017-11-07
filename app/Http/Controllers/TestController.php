<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Models\User;
use App\Http\Models\Site;
//use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //
    public function index ()
    {
    	Session::put('clef.a', ['valeur0', 'valeur1', 'valeur2']);
    	Session::push('clef.a', 'valeur3');
    	//dd(session::all());
    	//Session::all();
    	Session::flash('success', 'Bien joué mon gars !!!');
    	return view('test');
    }

    public function relation ()
    {
    	$users = User::withCount('sites')->get();
        //$users = User::all()->toJson();

        //dd($users);
    	//$users = User::find(1)->sites;

    	//$sites = Site::has('users')->get();
    	$sites = Site::withCount('users')->FilterColonneSearch('nom_site', 'asc', '')->get();
        //$yop = Site::Select('nom_site', 'code_site')->FilterColonneSearch('nom_site', 'asc', 'M')->get();
        //sdump($yop);
    	//dd($users);
    	//dd(session::all());
    	//Session::all();
    	Session::flash('success', 'Relation');
    	return view('relationNN', compact('users', 'sites', 'yop'));
    }
}
