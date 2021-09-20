<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serviciu extends Model
{
    use HasFactory;

    protected $table = 'servicii';
    protected $guarded = [];

    public function path()
    {
        return "/servicii/{$this->id}";
    }

    public function categorie()
    {
        return $this->belongsTo(Serviciu::class, 'serviciu_id');
    }
}
