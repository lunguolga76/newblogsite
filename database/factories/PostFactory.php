<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'title'=>$this->faker->words(3,true),
            'slug'=>'',
            'description'=>$this->faker->paragraph(15),
            'content'=>$this->faker->paragraph(30),
            'category_id'=>$this->faker->numberBetween(1,5),
            'views'=>$this->faker->numberBetween(1,500),
            'thumbnail'=>$this->faker->image('public/uploads',640,480, null, false),
            'created_at'=>$this->faker->dateTime(),
            'updated_at'=>$this->faker->dateTime(),

        ];
    }
}
