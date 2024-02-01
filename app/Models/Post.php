<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Http\Controllers\DashboardController;
use PDO;

class Post extends Model
{
    use HasFactory;
    protected $foreignKey='user_id';
    protected $fillable = [
        'title',
        "image",
        'user_id',
        'user_name',
    ];
    public function user()  {
        return $this->belongsTo(User::class);
    }
    // protected $guarded=[];
    // public function feedItem(){
    //     return $this->morphOne(Feeditem::class,'feedable');
    // }
    // public function creatorName(){
    //     return $this->name;
    // }

    
}
