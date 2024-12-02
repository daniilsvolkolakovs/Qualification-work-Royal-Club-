<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->usertype == 'user' || Auth::user()->usertype == 'manager') {
                return view('home');
            } else {
                return view('home');
            }
        } else {

            return view('home', ['isAuthenticated' => false]);
        }
    }

    public function page()
    {
        return view('admin.user');
    }
}