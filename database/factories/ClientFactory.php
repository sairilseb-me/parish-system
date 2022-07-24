<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $genderArray = ['male', 'female'];
        $selectedGender = $genderArray[random_int(0, 1)];
        return [
            'id'=> $this->faker->uuid(),
            'firstName' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'birthDate' => $this->faker->date(),
            'gender' => $selectedGender,
            'contact' => $this->faker->phoneNumber(),
            'barangay' => $this->faker->streetAddress(),
            'municipality' => $this->faker->city(),
            'province' => $this->faker->state(),
        ];
    }
}
