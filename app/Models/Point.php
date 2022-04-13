<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    protected $fillable =['customer_id', 'points', 'date',];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
