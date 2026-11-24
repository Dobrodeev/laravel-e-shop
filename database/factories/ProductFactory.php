<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);

        return [
            'name' => Str::ucfirst($name),
            'slug' => Str::slug($name),
            'sku' => strtoupper(fake()->unique()->bothify('GB-####')),
            'description' => fake()->paragraphs(2, true),
            'price' => fake()->numberBetween(15, 80),
            'old_price' => null,
            'image' => 'img/cartmini.jpg',
            'stock' => fake()->numberBetween(0, 50),
            'is_active' => true,
            'is_featured' => false,
        ];
    }

    public function onSale(): static
    {
        return $this->state(fn (array $a) => ['old_price' => $a['price'] + fake()->numberBetween(5, 20)]);
    }

    public function featured(): static
    {
        return $this->state(['is_featured' => true]);
    }
}
