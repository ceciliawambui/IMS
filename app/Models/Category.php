<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =[
        'image',
        'name',
        'supplier_id'
    ];
    public function supplier()
    {
        // return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
        return $this->belongsToMany(Supplier::class, 'supplier_categories');
    }
}
