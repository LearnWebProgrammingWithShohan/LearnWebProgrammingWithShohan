<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
	 protected $table = "attendance_preview";
	 protected $primaryKey = "attendance_id";
	 protected $fillable = ['user_id' , 'attendance_time' , 'date'];

}