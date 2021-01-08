<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    public $timestamps = false;
    protected $table='emp_salary';
    protected $primaryKey = 'id';
}
