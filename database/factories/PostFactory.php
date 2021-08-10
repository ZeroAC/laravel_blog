<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * 为模型Post生成的模型工厂 用来测试
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;//绑定模型

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //生成测试数据
        return [
            'title' => $this->faker->sentence(mt_rand(3, 10)),
            'content' => join("\n\n", $this->faker->paragraphs(mt_rand(3, 6))),
            'published_at' => $this->faker->dateTimeBetween('-1 month', '+3 days'),
        ];
    }
}
