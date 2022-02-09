<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FisaDeTratament extends Model
{
    use HasFactory;

    protected $table = 'fise_de_tratament';
    protected $guarded = [];

    protected static function booted()
    {
        static::deleting(function($fisa_de_tratament) { // before delete() method call this
            $fisa_de_tratament->chestionar_evaluare_stare_generala()->each(function($chestionar_evaluare_stare_generala) {
                $chestionar_evaluare_stare_generala->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }

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

    /**
     * Get all of the programari for the FisaDeTratament
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programari()
    {
        return $this->hasMany(Programare::class, 'fisa_de_tratament_id', 'id');
    }
}
