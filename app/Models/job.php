<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
    // relation With User
    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
}
