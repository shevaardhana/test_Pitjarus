<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportProduct extends Model
{
    use HasFactory;
    protected $table = 'report_product';

    protected $fillable = [
        'store_id',
        'product_id',
        'compliance',
        'tanggal',
    ];

    public function Store(){
        return $this->belongsTo(Store::class, 'store_id', 'store_id');
    }

    public function Product(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
