<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\User;

class MessageController extends Controller
{
    public function index($user_id){
        if ($user_id == auth()->id()) {
            return back();
        }
        // dd($user_id);
        $receiver = User::find($user_id);
        // dd($receiver);
        return view('user.message', compact('receiver'));
    }
}
