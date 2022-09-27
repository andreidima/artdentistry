<?php

namespace App\Models\Cardiologie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuletinEcocardiografic extends Model
{
    use HasFactory;

    protected $table = 'cardiologie_buletine_ecocardiografice';
    protected $guarded = [];

    public function path()
    {
        return "/cardiologie/buletine-ecocardiografice/{$this->id}";
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
}
