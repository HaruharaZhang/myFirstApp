<?php

namespace Database\Seeders;

use App\Models\Common;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Common::factory() -> count(50) -> create();
    }
}
