<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PacientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Pacient::factory(50)->create();
    }
}
