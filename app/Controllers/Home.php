<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('landing_page');
    }

    public function viewProfile(): string
    {
        return view('generateCertificate/profile');
    }
}
