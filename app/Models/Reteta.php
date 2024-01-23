<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reteta extends Model
{
    use HasFactory;

    protected $table = 'retete';
    protected $guarded = [];

    public function path()
    {
        return "/retete/{$this->id}";
    }

    /**
     * Get all of the retetaMedicamente for the FisaCaz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicamente(): HasMany
    {
        return $this->hasMany(RetetaMedicament::class, 'reteta_id');
    }
}
