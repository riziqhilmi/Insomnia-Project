<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PredictionResult extends Model
{
    protected $fillable = [
        'user_id', 'prediction_result', 'prediction_label',
        'input_json', 'mapped_json', 'created_at'
    ];

    public $timestamps = false;
}
