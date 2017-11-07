<?php

namespace App\Http\Controllers;
/*
use Illuminate\Http\Request;
*/
use App\Http\Requests\SiteRequest;
/*
use App\Http\Controllers;
*/
use App\Http\Models\Site;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::all();
        
        return view('site.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteRequest $request)
    {
        // Methode Store Validation de create
        //dd($request);
        $nom_site = $request->input('nom_site');
        $code_site = $request->input('code_site');
        //Site::create($request->all());
        //return 'Site crée';

        $site = new Site;
        $site->nom_site = $nom_site;
        $site->code_site = $code_site;

        $site->save();

        session()->flash('insert', 'Le Site ('.$nom_site.') a été crée');
        
        return redirect('sites');
        /*
        return view('site.index', compact('sites'));
        */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = Site::find($id);
        return view('site.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiteRequest $request, $id)
    {
        $nom_site = $request->input('nom_site');
        $code_site = $request->input('code_site');

        $site = Site::find($id);
        $site->nom_site = $nom_site;
        $site->code_site = $code_site;
        $site->save();
        //dd($site);
        $sites = Site::all();
        session()->flash('update', 'Le Site ('.$nom_site.') a été modifié');
        
        return view('site.index', compact('sites'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd('yyyyyyyyyyyyyy');
        $site = Site::find($id);
        $site->users()->detach();
        $site->delete();


        session()->flash('delete', 'Le Site ('.$site->nom_site.') a été supprimé');
        
        return redirect('sites');
    }
}
