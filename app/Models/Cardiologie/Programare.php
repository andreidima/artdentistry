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

    // I don't know if it's needed anymore. It was replaced with smsRecenzie() function
    // To be deleted 01.06.2024
    // public function recenzieTrimisa()
    // {
    //     if (\App\Models\MesajTrimisSms::where('telefon', $this->telefon)->where('subcategorie', 'Recenzie')->where('trimis', 1)->latest()->get()->first()){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    /**
     * Get the smsRecenzie associated with the Programare
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function smsRecenzie()
    {
        return $this->hasOne(\App\Models\MesajTrimisSms::class, 'telefon', 'telefon')->where('subcategorie', 'Recenzie')->where('trimis', 1);
    }

    /**
     * Get the referatMedical associated with the Programare
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function referatMedical()
    {
        return $this->hasOne(ReferatMedical::class, 'programare_id');
    }
}
