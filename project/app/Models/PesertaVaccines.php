<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaVaccines extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'peserta_vaccines';
    protected $primaryKey = 'id';

    protected $fillable = [
        'peserta_id',
        'peserta_nik',
        'vaccines_id',
    ];
}
