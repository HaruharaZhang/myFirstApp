<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Commons;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    //use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function common()
    {
        return $this->hasMany(Common::class);
    }

    public function unreadNotificationsCount()
    {
        return DB::table('notifications')
            ->where('user_id', $this->id)
            ->where('is_read', false)
            ->count();
    }
    public function getUserNotifications()
    {
        return DB::table('notifications')
            ->where('user_id', $this->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
