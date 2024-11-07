<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PersonalInformationRequest;
use App\Http\Requests\ResetPassword;
use App\Rules\MatchCurrentPassword;
use Illuminate\Support\Facades\Hash;

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
        $positions = Position::where('id', '!=', $user->divisionPosition->id)->get();
        $divisions = Division::where('id', '!=', $user->division->id)->get();

        return view('user.profile', compact('user', 'divisions', 'positions'));
    }

    public function personalInformationUpdate(PersonalInformationRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();
        $user->update($validated);

        return back();
    }

    public function newPassword(ResetPassword $request, User $user): RedirectResponse
    {
        $validated = $request->validated();
        $user->update([
            'password' => Hash::make($validated['password'])
        ]);

        return back();
    }
}
