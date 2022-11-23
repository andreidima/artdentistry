<?php

namespace App\Models\Cardiologie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramareIstoric extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'cardiologie_programari_istoric';
    protected $primaryKey = 'id_pk';
    protected $guarded = [];

    public function path()
    {
        return "/cardiologie/programari-istoric/{$this->id}";
    }
}
