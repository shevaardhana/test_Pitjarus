<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreArea extends Model
{
    use HasFactory;
    protected $table = 'store_area';

    protected $fillable = [
        'area_name',
    ];

    public function Store(){
    	return $this->hasMany(Store::class, 'area_id');
    }
}
