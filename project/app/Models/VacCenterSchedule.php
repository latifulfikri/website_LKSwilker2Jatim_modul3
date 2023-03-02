<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacCenterSchedule extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "vac_center_schedule";
    protected $primaryKey = "id";

    protected $fillable = [
        'vac_center_id',
        'schedule_id',
    ];
}
