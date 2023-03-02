<?php

namespace Database\Seeders;

//这里要添加一个引用animal的例子
use App\Models\Animal;
use Carbon\Factory;
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
        $a -> name = "Leoooooooo";
        $a -> weight = 123.2;
        $a -> enclosure_id = 1; //添加了一对多后，这里需要指定收容所
        $a -> save();

        //这里是没有对应关系的时候的创建
        //Animal::factory() -> count(50) -> create();

        //一对多关系的创建
        //factory(App\Animal::class, 50) -> create();
        Animal::factory() -> count(50) -> create();
    }
}
