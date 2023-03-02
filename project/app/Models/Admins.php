<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    use HasFactory;

    protected $table="admins";
    protected $primaryKey = "id";

    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
    ];
}
