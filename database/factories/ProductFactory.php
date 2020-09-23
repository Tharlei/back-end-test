<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'sku' => $this->faker->numberBetween(0, 9999),
            'weight' => $this->faker->randomFloat(2, 0.1, 10),
            'height' => $this->faker->numberBetween(10, 100),
            'width' => $this->faker->numberBetween(10, 100),
            'length' => $this->faker->numberBetween(10, 100),
            'price' => $this->faker->randomFloat(2, 5, 1000),
        ];
    }
}
