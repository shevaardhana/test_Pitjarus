<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'store';

    protected $fillable = [
        'store_name',
        'account_id',
        'area_id',
        'is_active',
    ];

    public function Account(){
        return $this->belongsTo(StoreAccount::class, 'account_id', 'account_id');
    }

    public function Area(){
        return $this->belongsTo(StoreArea::class, 'area_id', 'area_id');
    }

    public function ReportProduct(){
    	return $this->hasMany(ReportProduct::class, 'store_id');
    }
}
