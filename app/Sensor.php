<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $table = 'table';
    protected $fillable = [
        'yTemperatura','yHumedad','x'
    ];
}
