<?php

namespace App\Models\Cardiologie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuletinEcocardiografic extends Model
{
    use HasFactory;
    use SoftDeletes;

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
