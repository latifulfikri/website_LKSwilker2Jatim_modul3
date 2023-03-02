<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminsVacCenter extends Model
{
    use HasFactory;

    protected $table = "admins_vac_center";
    protected $primaryKey = "username";

    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
    ];
}
