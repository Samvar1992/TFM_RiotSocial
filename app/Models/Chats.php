<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chats extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_send', 
        'user_recive',  
    ];

    public function usersend(){
        return $this->belongsTo(User::class);
    }

    public function userrecive(){
        return $this->belongsTo(User::class);
    }

    public function messages(){
        return $this->hasMany(messages::class, 'chat_id');
    }
}
