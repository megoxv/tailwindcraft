<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontUserController extends Controller
{
    public function profile() {
        return view('front.user.profile');
    }

    public function security() {
        return view('front.user.security');
    }
}