<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Assign;
use App\Models\Assignto;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'input_date'=> $this->faker->sentence,
            'project'=> Project::factory(),
            'task_name'=> $this->faker->sentence,
            'task_detail'=> $this->faker->sentence,
            'type_task'=> $this->faker->sentence,
            'workday'=> $this->faker->sentence,
            'weekend'=> $this->faker->sentence,
            'start_date'=> $this->faker->dateTimeBetween('-30 days', '+30 days')->format('Y-m-d'),
            'end_date'=> $this->faker->dateTimeBetween('-30 days', '+30 days')->format('Y-m-d'),
            'assigned_person'=> Assign::factory(),
            'assigned_to'=> Assignto::factory(),
            'message'=> $this->faker->sentence,
            'progress'=> $this->faker->sentence,  
            'remark'=> $this->faker->sentence,          
            'status'=> $this->faker->sentence,
            'completedate'=> $this->faker->sentence
        ];
    }
}


