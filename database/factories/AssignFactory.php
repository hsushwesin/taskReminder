<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Assign;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'person'   =>$this->faker->name,
            'id_number'=>$this->faker->randomDigit,
            'position' =>$this->faker->sentence
        ];
    }
}
