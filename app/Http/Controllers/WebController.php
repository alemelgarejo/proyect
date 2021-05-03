<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\User;
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
        return view('web.property-grid', [
            'properties' => Estate::where('estates.status', 1)->paginate(6)
        ]);
    }

    public function estate(Estate $property)
    {
        if ($property->status == 1) {
            return view('web.property-single', [
                'property' => $property
            ]);
        }
        return back();
    }


    public function agents()
    {
        return view('web.agents-grid', [
            'agents' => User::where('users.role_id', 1)
                ->orWhere('users.role_id', 2)
                ->orWhere('users.role_id', 3)
                ->paginate(6),
        ]);
    }

    public function agent(User $agent)
    {
        if ($agent->role_id == 1 or $agent->role_id == 2 or $agent->role_id == 3) {
            return view('web.agent-single', [
                'agent' => $agent,
                /* 'estates' => , */
            ]);
        }
        return back();
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
