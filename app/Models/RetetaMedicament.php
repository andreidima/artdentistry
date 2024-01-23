<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetetaMedicament extends Model
{
    use HasFactory;

    protected $table = 'retete_medicamente';
    protected $guarded = [];
}
