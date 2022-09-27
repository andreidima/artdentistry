<?php

namespace App\Models\Cardiologie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programare extends Model
{
    use HasFactory;

    protected $table = 'cardiologie_programari';
    protected $guarded = [];

    public function path()
    {
        return "/cardiologie/programari/{$this->id}";
    }

    /**
     * Get the buletin_ecocardiografic associated with the Programare
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function buletin_ecocardiografic()
    {
        return $this->hasOne(BuletinEcocardiografic::class, 'programare_id');
    }
}
