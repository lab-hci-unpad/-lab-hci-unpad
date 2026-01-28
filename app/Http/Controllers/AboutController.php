<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function profile()
    {
        return view('user.pages.about.profile');
    }

    public function members()
    {
        return view('user.pages.about.members');
    }

    public function facilities()
    {
        return view('user.pages.about.facilities');
    }
}