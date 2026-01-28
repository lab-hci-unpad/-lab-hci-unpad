<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatasetController extends Controller
{
    public function index()
    {
        return view('user.pages.dataset');
    }
}