<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function showHome()
    {
        return view('home');
    }

    public function showAboutMe()
    {
        return view('aboutMe');
    }

    public function showSamplePost()
    {
        return view('samplePost');
    }

    public function showContact()
    {
        return view('contact');
    }
}
