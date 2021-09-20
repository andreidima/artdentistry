<?php

namespace Database\Factories;

use App\Models\Pacient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pacient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nume' => $this->faker->name(),
            'telefon' => '074' . $this->faker->numberBetween(1000000, 9999999),
            'email' => $this->faker->email(),
            'adresa' => $this->faker->address(),
            'observatii' => $this->faker->text($maxNbChars = 200),
        ];
    }
}
