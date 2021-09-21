<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciuCategorie extends Model
{
    use HasFactory;

    protected $table = 'servicii';
    protected $guarded = [];

    public function path()
    {
        return "/servicii-categorii/{$this->id}";
    }

    public function servicii()
    {
        return $this->hasMany(Serviciu::class, 'serviciu_id');
    }
}
