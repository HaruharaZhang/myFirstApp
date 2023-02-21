<?php

namespace Database\Seeders;

//这里要添加一个引用animal的例子
use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Animal;
        $a -> name = "Leo";
        $a -> weight = 123.2;
        $a -> save();

        Animal::factory() -> count(50) -> create();
    }
}
