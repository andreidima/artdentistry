<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChestionarAcordulPacientuluiInformat extends Model
{
    use HasFactory;

    protected $table = 'chestionare_acordul_pacientului_informat';
    protected $guarded = [];

    /**
     * Get the fisa_de_tratament that owns the ChestionarAcordulPacientuluiInformat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fisa_de_tratament()
    {
        return $this->belongsTo(FisaDeTratament::class, 'fisa_de_tratament_id', 'id');
    }
}
