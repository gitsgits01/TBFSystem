<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'Place',
        'user_id',
        'user_name',
    ];

  
    public function getUsers(){
        return $this->belongsToMany(User::class,'user_destinations')->withTimestamps();
    }
}
