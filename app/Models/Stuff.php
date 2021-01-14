<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'price', 'stock', 'category_id'];

    public function getBarcodeImageAttribute()
    {
    	return '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($this->code, 'UPCA') . '" alt="barcode"   />';
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
