<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date,
            'country_code' => 'US',
            'phone_number' => '3192083701',
            'email' => $this->faker->firstName . '.' . $this->faker->lastName . '@gmail.com',
            'bank_account_number' => $this->faker->bankAccountNumber,
        ];
    }
}
