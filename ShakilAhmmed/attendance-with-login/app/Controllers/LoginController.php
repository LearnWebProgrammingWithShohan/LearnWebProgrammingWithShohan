<?php

namespace App\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Respect\Validation\Validator;

class LoginController
{
	 public function getIndex ()
	 {
		  /*User::create([
			  'user_name' => "Shakil Ahmmed" ,
			  'email' => "shakilfci461@gmail.com" ,
			  'password' => password_hash('12345678' , PASSWORD_BCRYPT) ,
		  ]);*/
		  return view("Login/login");
	 }


	 public function postLogin ()
	 {

		  $email = $_POST['email'];
		  $password = $_POST['password'];

		  $validator = new Validator();
		  $errors = [];

		  // validation
		  if ($validator::email()->validate($email) === false) {
			   $errors['email'] = 'Email must be a valid email address';
		  }

		  if (strlen($password) < 8) {
			   $errors['password'] = 'Password is too short';
		  }

		  if (empty($errors)) {
			   $get_user = User::where('email' , $email)->first();

			   if ($get_user) {

					if (password_verify($password , $get_user->password) === true) {
						 $_SESSION['success'] = 'Logged in.';
						 $_SESSION['user'] = [
							 'id' => $get_user->id ,
							 'email' => $get_user->email ,
							 'user_name' => $get_user->user_name ,
						 ];
						 $today_date = date('Y-m-d');
						 $is_already_get_today_attendance = Attendance::where('user_id' , $get_user->id)
							 ->where('date' , $today_date)
							 ->first();
						 if (empty($is_already_get_today_attendance)) {
							  Attendance::create([
								  "user_id" => $get_user->id ,
								  "attendance_time" => Carbon::now() ,
								  "date" => date('Y-m-d') ,
							  ]);
						 }
						 return redirect("/dashboard");
					}

					$errors[] = 'Invalid credentials';
					$_SESSION['errors'] = $errors;
					return redirect("/");
			   }

			   $errors[] = 'User not found';
			   $_SESSION['errors'] = $errors;
			   return redirect("/");
		  } else {
			   $_SESSION['errors'] = $errors;
			   return redirect("/");
		  }

	 }
}
