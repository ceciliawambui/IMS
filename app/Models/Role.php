<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\User;
use Spatie\Permission\Models\UserRole;

class Role extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id','user_id');
    }
}
