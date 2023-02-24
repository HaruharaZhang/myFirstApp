<?php

namespace App\Models;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use HasFactory;

    public function animal(){
        return $this -> belongsTo(Animal::class);
    }
}
