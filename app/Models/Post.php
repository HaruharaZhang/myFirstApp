<?php

namespace App\Models;

use App\Models\User;
use App\Models\Commons;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'message',
        'user_id',
    ];

    public function user(){
        return $this -> belongsTo(User::class);
    }
    public function common(){
        return $this -> hasMany(Common::class);
    }
}
