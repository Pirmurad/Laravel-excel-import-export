<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => random_int(1,200),
            'bank_acc_number' => $this->faker->numerify('###-###-####'),
            'company' => $this->faker->company(),
        ];
    }
}
