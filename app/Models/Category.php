<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable =[
        'image',
        'name',
        'supplier_id'
    ];
    public function supplier()
    {
        // return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
        return $this->belongsToMany(Supplier::class, 'supplier_categories','supplier_id', 'category_id' );
    }

    public function product()
    {
        return $this->hasMany(Product::class);

    }
}
