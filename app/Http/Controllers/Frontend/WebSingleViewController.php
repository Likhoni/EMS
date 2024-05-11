<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebSingleViewController extends Controller
{
    public function singleView()
    {
        return view('frontend.pages.newpage4');
    }
}
