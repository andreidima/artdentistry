<?php

namespace App\Models\Cardiologie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programare extends Model
{
    use HasFactory;

    protected $table = 'cardiologie_programari';
    protected $guarded = [];

    public function path()
    {
        return "/cardiologie/programari/{$this->id}";
    }
}
