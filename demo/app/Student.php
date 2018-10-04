<?php
/**
 * Created by PhpStorm.
 * User: Rambo
 * Date: 2018/9/30
 * Time: 22:28
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    public $timestamps = true;
    protected $fillable = ['name','age','sex'];
    protected function getDateFormat()
    {
        return time();
    }
    protected function asDateTime($value)
    {
        return $value;
    }
}