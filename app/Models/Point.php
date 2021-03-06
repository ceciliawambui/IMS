<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Point extends Model
{
    use HasFactory;
    protected $fillable =['customer_id', 'points', 'date',];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
