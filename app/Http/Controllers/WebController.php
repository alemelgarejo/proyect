<?php

namespace App\Http\Controllers;

use App\Models\Web;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    public function about()
    {
        return view('web.about');
    }

    public function estates()
    {
        return view('web.property-grid');
    }

    public function estate()
    {
        return view('web.property-single');
    }


    public function agents()
    {
        return view('web.agents-grid');
    }

    public function agent()
    {
        return view('web.agent-single');
    }

    public function blogs()
    {
        return view('web.blog-grid');
    }

    public function blog()
    {
        return view('web.blog-single');
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function search(Request $request)
    {
        return view('web.search');
    }

    public function login()
    {
        return view('web.login');
    }

    public function register()
    {
        return view('web.register');
    }
}
