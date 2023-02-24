<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $adminUser -> userEmail = "admin@admin";
        $adminUser -> userName = "Administrator";
        $adminUser -> icon = "noIcon";
        $adminUser -> save();

        User::factory() -> count(50) -> create();
    }
}
