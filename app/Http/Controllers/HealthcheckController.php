<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthcheckController extends Controller
{
    public function index()
    {
        return ['status' => 'health'];
    }
}
