<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollaborationController extends Controller
{
    public function index()
    {
        return view('user.pages.collaboration');
    }
}