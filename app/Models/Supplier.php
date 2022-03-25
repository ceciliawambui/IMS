<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'address',
        'location',
        'contact_person',
        'phone',
        'product_category'
    ];
    public function category()
    {
        // return $this->hasMany(Category::class);
        return $this->belongsToMany(Category::class, 'supplier_categories');
    }


    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
