<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'site';
    protected $primaryKey = 'id_site';
    protected $fillable = ['nom_site', 'code_site'];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('App\Http\Models\User', 'site_user', 'site_id', 'user_id');
    }

    public function getCodeSite()
    {
    	return $this->code_site;
    }

    public function scopeFilterColonneSearch($query, $Colonne, $Direction, $Search)
    {
    	$query->orWhere($Colonne, 'like', '%' . $Search . '%')
    		  ->orderBy($Colonne, $Direction);
    	return $query;	  
    }
}
