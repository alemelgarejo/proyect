<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\Message;
use App\Models\User;
use App\Models\Web;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index', [
            'properties' => Estate::where('estates.published', 'yes')->orderBy('created_at', 'DESC')->take(6)->get(),
            'agents' => User::where('users.role_id', 1)->orWhere('users.role_id', 2)->orWhere('users.role_id', 3)->get()
        ]);
    }

    public function about()
    {
        return view('web.about', [
            'agents' => User::where('users.role_id', 1)
                ->orWhere('users.role_id', 2)
                ->orWhere('users.role_id', 3)
                ->get()
        ]);
    }

    public function estates()
    {
        return view('web.property-grid', [
            'properties' => Estate::where('estates.published', 'yes')->paginate(6),
            'type' => 'All'
        ]);
    }
    /*  public function estatesNewToOld()
    {
        return view('web.property-grid', [
            'properties' => Estate::where('estates.published', 'yes')->orderBy('created_at', 'DESC')->paginate(6),
            'type' => 'New to Old'
        ]);
    } */

    public function estate(Estate $property)
    {
        if ($property->published == 'yes') {
            return view('web.property-single', [
                'property' => $property,
                'owner' => $property->owner
            ]);
        }
        return back();
    }

    public function storeMessageEstate(Request $request, Estate $estate)
    {
        Message::create([
            'user_id' => auth()->user()->id,
            'to_user_id' => $request['to_user_id'],
            'estate_id' => $estate->id,
            'message' => $request['message'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('web.estate', $estate->id)->with('status', 'Mensaje enviado con éxito.');
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
    {/*
        if ($agent->role_id == 1 or $agent->role_id == 2 or $agent->role_id == 3) { */
        return view('web.agent-single', [
            'agent' => $agent,
            'estates' => Estate::join('owners', 'estates.owner_id', '=', 'owners.id')
                ->where('owners.user_id', '=', $agent->id)->where('estates.published', 'yes')->select('estates.*')->get(),
        ]);/*
        }
        return back(); */
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
            'estate_id' => Null,
            'message' => $request['message'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('web.contact')->with('status', 'Mensaje enviado con éxito.');
    }

    public function search(Request $request)
    {
        $interest_type = $request->input('interest_type');
        $city = $request->input('city');
        $max_value = $request->input('max_value');
        $min_surface = $request->input('min_surface');
        $rooms = $request->input('rooms');
        $baths = $request->input('baths');
        return view('web.search', [
            'properties' => Estate::where('estates.published', 'LIKE', "%yes%")
                ->where('estates.interest_type', 'LIKE', "%$interest_type%")
                ->where('estates.city', 'LIKE', "%$city%")
                ->where('estates.rooms', 'LIKE', "%$rooms%")
                ->where('estates.baths', 'LIKE', "%$baths%")
                ->whereBetween('estates.value', [0, $max_value])
                ->paginate(6)
        ]);
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
