<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\Message;
use App\Models\User;
use App\Models\Web;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index', [
            'properties' => Estate::where('estates.status', 1)->orderBy('created_at', 'DESC')->take(6)->get(),
            'agents' => User::where('users.role_id', 1)->orWhere('users.role_id', 2)->orWhere('users.role_id', 3)->get()
        ]);
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
        return view('web.contact', [
            'users' => User::where('users.role_id', 2)
                ->orWhere('users.role_id', 3)
                ->get()
        ]);
    }

    public function storeMessage(Request $request)
    {
        Message::create([
            'user_id' => auth()->user()->id,
            'to_user_id' => $request['to_user_id'],
            'message' => $request['message'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('web.contact')->with('status', 'Mensaje enviado con éxito.');
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
