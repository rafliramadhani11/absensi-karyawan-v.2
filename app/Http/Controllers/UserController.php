<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'Admin':
                return view('admin.app', compact('user'));
            case 'HRD':
                return view('hrd.app', compact('user'));
            default:
                return view('user.app', compact('user'));
        }
    }
}
