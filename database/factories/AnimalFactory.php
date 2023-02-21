<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake() -> name(),
            'weight' => fake() -> randomFloat(2, 300, 500),
            //最小值300，最大值500，定点算法为2
            //使用faker可以实现更多功能
            //https://github.com/fzaninotto/Faker
            //这里需要安装
        ];
    }
}
