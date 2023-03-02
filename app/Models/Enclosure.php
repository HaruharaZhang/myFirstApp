<?php

namespace App\Models;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enclosure extends Model
{
    use HasFactory;

    //一对多
    public function animals(){
        return $this -> hasMany(Animal::class);
    }
}
