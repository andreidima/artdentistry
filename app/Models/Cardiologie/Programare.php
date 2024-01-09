<?php

namespace App\Models\Cardiologie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Programare extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cardiologie_programari';
    protected $guarded = [];

    public function path()
    {
        return "/cardiologie/programari/{$this->id}";
    }

    /**
     * Get the buletin_ecocardiografic associated with the Programare
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function buletin_ecocardiografic()
    {
        return $this->hasOne(BuletinEcocardiografic::class, 'programare_id');
    }

    /**
     * Get the fisa_consultatie associated with the Programare
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fisa_consultatie()
    {
        return $this->hasOne(FisaConsultatie::class, 'programare_id');
    }

    public function sms_confirmare()
    {
        return $this->hasMany(\App\Models\MesajTrimisSms::class, 'referinta_id', 'id')->where('categorie', 'Programari Cardiologie')->where('subcategorie', 'Confirmare');
    }

    public function recenzieTrimisa()
    {
        if (\App\Models\MesajTrimisSms::where('telefon', $this->telefon)->where('subcategorie', 'Recenzie')->where('trimis', 1)->latest()->get()->first()){
            return true;
        } else {
            return false;
        }
    }
}
