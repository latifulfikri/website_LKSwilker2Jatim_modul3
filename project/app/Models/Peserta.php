<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nik',
        'password',
        'first_name',
        'last_name',
        'dob',
        'address',
        'contact',
        'age',
        'vac_center_id',
    ];
}
