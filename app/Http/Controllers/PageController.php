<?php

namespace App\Http\Controllers;

use App\Models\Message;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}", [
                'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get()
            ]);
        }
        return abort(404);
    }
}
