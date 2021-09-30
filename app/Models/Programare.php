<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programare extends Model
{
    use HasFactory;

    protected $table = 'programari';
    protected $guarded = [];

    public function path()
    {
        return "/programari/{$this->id}";
    }

    public function pacient()
    {
        return $this->belongsTo(Pacient::class, 'pacient_id');
    }

    public function servicii()
    {
        return $this->belongsToMany(Serviciu::class, 'programare_serviciu', 'programare_id', 'serviciu_id');
    }
}
