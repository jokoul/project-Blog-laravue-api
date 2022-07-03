<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        //$faker can generate random texte here we want a sentence of 3 words
        //10 paragraphs, true : to return paragraphs as a text not an array by default
        //$faker->text : generate fake text of 200 letters
        return [
            "title" => $this->faker->sentence(3),
            "content" => $this->faker->paragraphs(10,true),
            "lead" => $this->faker->text(200),
            "author_id" => random_int(1, 20),//generate random number between min and max
            "topic_id" => random_int(1, 3)
        ];
    }
}
