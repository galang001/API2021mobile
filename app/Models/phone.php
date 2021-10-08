<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class phone extends Model
{
    use HasFactory;

    public $primaryKey = 'id_phone';
    protected $fillable = [
        'kd_phone','nama','tahun','merk','asalhp','foto',
    ];
    
   static function getPhone(){
        $return=DB::table('phones')
        ->join('brands','phones.merk','=','brands.id_brand');
        return $return;
}
}