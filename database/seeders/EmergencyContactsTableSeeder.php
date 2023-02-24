<?php

namespace Database\Seeders;

use App\Models\EmergencyContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmergencyContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $e = new EmergencyContact;
        $e -> name = 'Max';
        $e -> phone_number = '12341234';
        $e -> animal_id = 1;
        $e -> save();
    }
}
