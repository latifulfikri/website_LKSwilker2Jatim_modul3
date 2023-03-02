<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaVaccinationStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'peserta_vaccination_status';
    protected $primaryKey = 'id';

    protected $fillable = [
        'peserta_id',
        'peserta_nik',
        'vaccination_status_id',
    ];
}
