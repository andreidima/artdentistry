<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FisaDeTratament extends Model
{
    use HasFactory;

    protected $table = 'fise_de_tratament';
    protected $guarded = [];

    public function path()
    {
        return "/fise-de-tratament/{$this->id}";
    }

    /**
     * Get the chestionar_evaluare_stare_generala associated with the FisaDeTratament
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function chestionar_evaluare_stare_generala()
    {
        return $this->hasOne(ChestionarEvaluareStareGenerala::class, 'fisa_de_tratament_id', 'id');
    }
}
