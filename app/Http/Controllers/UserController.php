<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PersonalInformationRequest;

class UserController extends Controller
{
    public function index(User $user)
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

    public function profile(User $user)
    {
        $divisions = Division::get();
        return view('user.profile', compact('user', 'divisions'));
    }

    public function profileUpdate(PersonalInformationRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();
        $user->update($validated);
        return back();
    }
}
