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
}
