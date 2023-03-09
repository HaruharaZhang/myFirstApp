<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = new User;
        $adminUser -> id = 123456;
        $adminUser -> name = "Administrator";
        $adminUser -> email = "admin@admin";
        $adminUser -> password = Hash::make("admin123");
        $adminUser -> save();

        User::factory() -> count(50) -> create();
    }
}
