<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eticheta extends Model
{
    use HasFactory;

    protected $table = 'etichete';
    protected $guarded = [];

    public function path()
    {
        return "/etichete/{$this->id}";
    }

    public function programare()
    {
        return $this->belongsTo(Programare::class, 'programare_id');
    }
}
