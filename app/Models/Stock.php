<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'total', 'stuff_id'];

    public function getTypeAttribute($type)
    {
    	if ($type === 'masuk') {
    		return '<span class="badge badge-success">Masuk</span>';
    	} else {
    		return '<span class="badge badge-danger">Keluar</span>';
    	}
    }

    public function stuff()
    {
    	return $this->belongsTo(Stuff::class);
    }
}
