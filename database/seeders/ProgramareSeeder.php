<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProgramareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserare programari 01.10.2021 - 31.10.2021
        for ($i=0; $i<31; $i++){
            for ($j=1; $j<=8; $j++){
                $programare = new \App\Models\Programare;

                $programare->pacient_id = rand(12, 37);
                $programare->data = \Carbon\Carbon::now()->startOfMonth()->addDays($i);
                $programare->ora_inceput = ($j + 8) . ':00';
                $programare->ora_sfarsit = ($j + 9) . ':00';
                $programare->pret_total = rand(10, 49) . '0';

                $programare->save();
            }
        }
    }
}
