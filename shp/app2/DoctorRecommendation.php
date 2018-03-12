<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class DoctorRecommendation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;

    protected $table = 'doctor_recommendation';

}
