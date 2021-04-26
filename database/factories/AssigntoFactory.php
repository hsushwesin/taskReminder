<?php

namespace Database\Factories;

use App\Models\Assignto;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssigntoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assignto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'to'   =>$this->faker->name,
            'id_number'=>$this->faker->randomDigit,
            'position' =>$this->faker->sentence
        ];
    }
}
