<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        return view('web.homepage', [
            'title' => 'Dashboard Customer'
        ]);
    }
}
