<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'empresa' => $this->faker->company,
            'mid' => $this->faker->numberBetween(1, 100),
            'rowid' => $this->faker->uuid,
            'idempresa' => $this->faker->numberBetween(1, 100),
            'foto' => null, // Ajusta esto si manejas las imágenes de otra manera
            'razonsocial' => $this->faker->company,
            'cif' => $this->faker->bothify('????########'),
            'direccion' => $this->faker->streetAddress,
            'poblacion' => $this->faker->city,
            'codpostal' => $this->faker->postcode,
            'provincia' => $this->faker->state,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
