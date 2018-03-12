<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class StudentPhysicalFitness extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;

    protected $table = 'student_physical_fitness';

}
