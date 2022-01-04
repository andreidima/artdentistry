<?php

namespace Database\Factories;

use App\Models\FisaDeTratament;
use Illuminate\Database\Eloquent\Factories\Factory;

class FisaDeTratamentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FisaDeTratament::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fisa_numar' => $this->faker->numberBetween(1000, 9999),
            'nume' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'telefon' => '074' . $this->faker->numberBetween(1000000, 9999999),
            'sex' => 'M',
            'cnp' => '1700512394468',
            'user_id' => 1
        ];
    }
}
