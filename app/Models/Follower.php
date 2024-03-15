<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;


class Follower extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'following_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function following()
    {
        return $this->belongsTo(User::class, 'followers','following_id','user_id');
    }
    
    public function scopeOfUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
    public function isFollowing(User $user): bool
    {
        return $this->followers()->where('user_id', $user->id)->exists();
    }

}
