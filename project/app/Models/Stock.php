<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'stock';
    protected $primaryKey = 'id';

    protected $fillable = [
        'vac_center_id',
        'vaccines_id',
        'stock',
    ];
}
