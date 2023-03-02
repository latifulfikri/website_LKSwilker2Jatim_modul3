<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationStatus extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "vaccination_status";
    protected $primaryKey = "id";

    protected $fillable = [
        'status'
    ];
}
