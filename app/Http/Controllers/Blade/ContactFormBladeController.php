<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactFormBladeController extends Controller
{
    public function index()
    {
        return "<p>Contact Form Directive</p>";
    }
}
