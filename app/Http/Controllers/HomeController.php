<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Estate;
use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('CheckNormalRole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
            'customers' => Customer::where('customers.user_id', '=', auth()->user()->id)
                ->select('customers.*')
                ->orderBy('created_at', 'DESC')
                ->take(3)->get(),
            'estates' => Estate::join('owners', 'estates.owner_id', '=', 'owners.id')
                ->where('owners.user_id', '=', auth()->user()->id)
                ->orderBy('status', 'DESC')
                ->select('estates.*')
                ->take(3)->get(),
            'not_readed' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->paginate(5),
        ]);
    }

    public function set_language($lang)
    {
        if (array_key_exists($lang, config('languages'))) {
            session()->put('applocate', $lang);
        }
        return redirect()->back();
    }
}
