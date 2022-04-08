<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable =[
        'image',
        'name',
        'category_id',
        'quantity',
        'buying_price',
        'selling_price'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }
}
