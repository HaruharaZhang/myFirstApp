<?php

namespace App\Models;

use App\Models\EmergencyContact;
use App\Models\Enclosures;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    //一对一
    public function emergencyContact(){
        return $this -> hasOne(EmergencyContact::class);
    }

    //一对多
    public function enclosure(){
        return $this -> belongsTo(Enclosures::class);
    }
}
