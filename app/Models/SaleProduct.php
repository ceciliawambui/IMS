<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable=['product_id','quantity', 'price','total'];


    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
