<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding post.
     *
     * @var string
     */
    protected $post = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->word,//titleというカラムにword型のデータを入れる
            'content' => $this->faker->realText//contentにrealText型のデータを入れる
        ];
    }
}
