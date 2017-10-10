<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DeploiementRequest;
use App\Http\Models\Deploiement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class DeploiementController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function list () {

        $joncs = DB::table('deploiement')
                ->select('deploiement.deploiement_id', 'site.nom_site', 'societe.nom_societe', 'type.nom_type') // Colonne à récupérer
                ->join('site', 'site_id', '=', 'site.id_site')
                ->join('societe', 'societe_id', '=', 'societe.id_societe')
                ->join('type', 'type_id', '=', 'type.id_type')
                ->orderBy('nom_site', 'asc')
                ->get();
        //dd($jonc);

        return view('locate.list', ['joncs' => $joncs]);
    }

    public function index () {

    	$sites = DB::table('site')->get();
    	$societes = DB::table('societe')->get();
    	$types = DB::table('type')->get();
    	//dd($sites);

        return view('locate.index', ['sites' => $sites, 'societes' => $societes, 'types' => $types]);
    }

    public function store (DeploiementRequest $request) {

        $site =  Input::get('site');
        $societe =  $request->input('societe');
        $type =  $request->input('type');

        $all = Input::all();

        $req = DB::table('deploiement')
                ->where('site_id', '=', $site)
                ->where('societe_id', '=', $societe)
                ->get();
        //dd(count($req));

        if(count($req) > 0) {
        // UPDATE SI SITE et SOCIETE sont déjà en base    
                $yo = DB::table('deploiement')
                            ->where('site_id', '=', $site)
                            ->where('societe_id', '=', $societe)
                            ->update(['type_id' => $type]);
        $request->session()->flash('update', 'Enregistrement modifié');

        } else {

        // INSERT dans la table deploiement    
        $sql = DB::table('deploiement')->insert(
                    [
                    'site_id' => $site, 
                    'societe_id' => $societe,
                    'type_id' => $type
                    ]
                );
        $request->session()->flash('insert', 'Enregistré en base');
        }

        $data = $request->session()->all();
        

        //dd($sql);
    	return view ("locate.confirm");
    }
}
