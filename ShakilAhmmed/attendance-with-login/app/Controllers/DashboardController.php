<?php

namespace App\Controllers;

class DashboardController
{
	 public function getIndex ()
	 {
		  return view("Backend/dashboard");
	 }

	 public function getLogout ()
	 {
		  unset($_SESSION['user']);

		  $_SESSION['success'] = 'You have been logged out.';
		  return redirect('/');
	 }
}
