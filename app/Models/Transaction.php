<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'money', 'invoice'];

    public function getDateAttribute()
    {
        return localDate($this->created_at);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function stuffs()
    {
    	return $this->belongsToMany(Stuff::class)->withPivot('total');
    }
}
