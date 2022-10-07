<?php

namespace App\Models\Cardiologie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FisaConsultatieMedicament extends Model
{
    use HasFactory;

    protected $table = 'cardiologie_fise_consultatie_medicamente';
    protected $guarded = [];
}
