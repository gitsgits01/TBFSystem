<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $foreignKey='user_id';
    protected $fillable = [
       
        'location',
        'destination',
        'date',
        'days',
        'user_id',
        'user_name',
    ];
    // protected $guarded=[];
    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
    // public function feedItem(){
    //     return $this->morphOne(Feeditem::class,'feedable');
    // }
    // public function creatorName(){
    //     return $this->user->name;
    // }
}
