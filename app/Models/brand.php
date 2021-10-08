<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;
    public $primaryKey = 'id_brand';
    protected $fillable = [
        'nama_brand',
    ];
}
