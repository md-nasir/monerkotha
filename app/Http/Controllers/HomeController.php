<?php

namespace App\Http\Controllers;

use App\Events\ConversationEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('home',compact('users'));
    }


   public function sendMessage(Request $request)
    {
        $user = Auth::user();
        event(new ConversationEvent($request->message, $user->name));
        return $request->all();
    }

}
