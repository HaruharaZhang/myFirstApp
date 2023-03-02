<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Commons;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function post(){
        return $this -> hasMany(Post::class);
    }
    public function common(){
        return $this -> hasMany(Common::class);
    }
}
