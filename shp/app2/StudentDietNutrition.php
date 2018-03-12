<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class StudentDietNutrition extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;

    protected $table = 'student_diet_nutrition';

}
