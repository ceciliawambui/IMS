<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierCategory extends Model
{
    use HasFactory;
    public $table = 'supplier_categories';
    protected $fillable = ['id', 'supplier_id', 'category_id'];
}
