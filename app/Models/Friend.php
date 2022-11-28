<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Friend extends Model
{
    public function user1() {
        return $this->belongsTo(User::class, 'user_id_1');
    }
    public function user2() {
        return $this->belongsTo(User::class, 'user_id_2');
    }
}
