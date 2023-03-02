<?php

namespace Database\Seeders;

use App\Models\Enclosure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnclosureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $e = new Enclosure;
        $e -> name = 'Central Enclosure';
        $e -> save();
    }
}
