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

    public function fisa_de_tratament()
    {
        return $this->belongsTo(FisaDeTratament::class, 'fisa_de_tratament_id');
    }

    public function etichete()
    {
        return $this->belongsToMany(Eticheta::class, 'eticheta_programare', 'programare_id', 'eticheta_id')->withTimestamps();
    }

    public function sms_confirmare()
    {
        return $this->hasMany(MesajTrimisSms::class, 'referinta_id', 'id')->where('categorie', 'Programari')->where('subcategorie', 'Confirmare');
    }

    public function recenzieTrimisa()
    {
        if (MesajTrimisSms::where('telefon', $this->fisa_de_tratament->telefon)->where('subcategorie', 'Recenzie')->where('trimis', 1)->latest()->get()->first()){
            return true;
        } else {
            return false;
        }
    }
}
