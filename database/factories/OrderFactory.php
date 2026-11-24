<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        $subtotal = fake()->numberBetween(20, 200);

        return [
            'status' => 'pending',
            'payment_method' => 'cod',
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->numerify('+7 ### ###-##-##'),
            'country' => 'Russia',
            'city' => fake()->city(),
            'address' => fake()->streetAddress(),
            'postcode' => fake()->postcode(),
            'subtotal' => $subtotal,
            'shipping' => 5,
            'total' => $subtotal + 5,
        ];
    }
}
