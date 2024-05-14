<?php

namespace App\Models\Cardiologie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferatMedical extends Model
{
    use HasFactory;

    protected $table = 'cardiologie_referate_medicale';
    protected $guarded = [];

    public function path()
    {
        return "/cardiologie/referate-medicale/{$this->id}";
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
