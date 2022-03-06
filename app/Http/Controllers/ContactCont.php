<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactCont extends Controller
{
    public function contact()
    {
        return view('fe.contact');
    }
}
