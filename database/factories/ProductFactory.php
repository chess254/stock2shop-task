<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sku' => fake()->regexify('[A-Za-z0-9]{20}'),
            'attributes' => [
                '1' => 'One',
                '2' => 'Two',
                '3' => 'Three'
            ],
        ];
    }

}
