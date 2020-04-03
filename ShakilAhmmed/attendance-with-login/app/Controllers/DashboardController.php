<?php

namespace App\Controllers;

class DashboardController
{
    public function getIndex()
    {
        return view("Backend/dashboard");
    }
}
