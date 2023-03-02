<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacCenter extends Model
{
    use HasFactory;

    protected $table = "vac_center";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'address',
        'contact',
    ];
}
