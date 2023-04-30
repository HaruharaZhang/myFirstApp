<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
    use HasFactory;
    protected $fillable = [
        'CommonMsg',
    ];

    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function post(){
        return $this -> belongsTo(Post::class);
    }
}
