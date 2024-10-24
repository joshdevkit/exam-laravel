<?php

namespace App\Http\Controllers;

use App\Models\InvitedUsers;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }


    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $invitedUser = InvitedUsers::where('email', $user->email)->first();

            if (!$invitedUser) {
                return view('404')->with('message', 'Account is not registered in the system. Please contact your administrator.');
            }

            if (!$invitedUser->is_activated) {
                return view('404')->with('message', 'Your account has not been activated yet. Please contact your administrator.');
            }

            $findUserByEmail = User::where('email', $user->email)->first();
            $findUserByGoogleId = User::where('google_id', $user->id)->first();

            if ($findUserByGoogleId) {
                Auth::login($findUserByGoogleId);
                return redirect()->intended('student/dashboard');
            } elseif ($findUserByEmail) {
                $findUserByEmail->update([
                    'google_id' => $user->id,
                    'avatar' => $user->avatar,
                ]);
                $findUserByEmail->assignRole('student');
                Auth::login($findUserByEmail);
                return redirect()->intended('student/dashboard');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'avatar' => $user->avatar,
                    'password' => Hash::make('12345678')
                ]);

                $newUser->assignRole('student');
                Auth::login($newUser);
                return redirect()->intended('student/dashboard');
            }
        } catch (Exception $e) {
            return redirect()->route('login')->withErrors(['An error occurred during authentication. Please try again.']);
        }
    }
}
