<?php

namespace Database\Seeders;

use App\Models\Enclosures;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnclosuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $e = new Enclosures;
        $e -> name = 'Central Enclosure';
        $e -> save();
    }
}
