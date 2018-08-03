<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct() {
        // Allow users to logout
        $this->middleware('guest')->except(['destroy']);
    }

    public function create() {
        return view('login.index');
    }

    public function store() {
        // Attempt to authenticate user and sign user in
        if(! auth()->attempt(request(['email', 'password']))) {
            // Redirect back if failed
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        // Redirect to home
        return redirect()->home();
    }

    public function destroy() {
        auth()->logout();

        return redirect()->home();
    }
}
