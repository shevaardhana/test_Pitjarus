<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $fillable = [
        'product_name',
        'brand_id',
    ];

    public function Brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }

    public function ReportProduct(){
    	return $this->hasMany(ReportProduct::class, 'product_id');
    }
}
