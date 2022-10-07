<?php

namespace App\Models\Cardiologie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FisaConsultatie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cardiologie_fise_consultatie';
    protected $guarded = [];

    public function path()
    {
        return "/cardiologie/fise-consultatie/{$this->id}";
    }

    /**
     * Get the programare that owns the BuletinEcocardiografic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function programare()
    {
        return $this->belongsTo(Programare::class, 'programare_id');
    }

    /**
     * Get all of the medicamente for the FisaConsultatie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicamente()
    {
        return $this->hasMany(FisaConsultatieMedicament::class, 'fisa_consultatie_id', 'id');
    }
}
