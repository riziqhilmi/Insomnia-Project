<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SleepPrediction extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'sleep_predictions';

    protected $fillable = [
        'year',
        'gender',
        'sleep_hours',
        'concentration_difficulty',
        'miss_class',
        'device_use',
        'caffeine',
        'exercise',
        'stress_level',
        'academic_performance',
        'insomnia_level'
    ];
}
