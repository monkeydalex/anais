<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

	public $timestamps = false;
    protected $fillable = [
      'item_name',
      'item_code',
      'item_price',
      'item_qty',
      'item_tax',
      'item_status',
      'created_at'
    ];
}