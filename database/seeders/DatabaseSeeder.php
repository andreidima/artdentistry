<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Fise
        \App\Models\FisaDeTratament::factory(50)->create();

        //Programari
        for ($saptamana_zile = 0; $saptamana_zile <= 7; $saptamana_zile += 7){
            $data = \Carbon\Carbon::today()->addDays($saptamana_zile)->startOfWeek();

            for ($zile = 0; $zile < 5 ; $zile++){
                $ora = \Carbon\Carbon::parse($data);
                $ora->hour = 8;
                $ora->minute = 0;

                for ($i = 0; $i < rand(5, 10); $i++){
                    $programare = new \App\Models\Programare;
                    $programare->fisa_de_tratament_id = \App\Models\FisaDeTratament::inRandomOrder()->first()->id;
                    $programare->data = $data;
                    $programare->ora = $ora;
                    $programare->save();

                    $ora->addMinutes(rand(2, 10) * 10);
                }

                $data->addDay();
            }
        }
    }
}
