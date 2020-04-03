<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	 protected $table = "users";
	 protected $primaryKey = "id";
	 protected $fillable = ['user_name' , 'email' , 'password'];
}