<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * View the welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.welcome');
    }

    /**
     * View the sign up page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.register');
    }

    /**
     * Store the newly created user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'min:5', 'max:20', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:5', 'max:20'],
            'phone_number' => ['required', 'numeric', 'digits_between:10,13'],
            'address' => ['required', 'min:5']
        ]);

        $credentials['password'] = Hash::make($credentials['password']);

        User::create($credentials);

        return redirect('/login');
    }

    /**
     * View the sign in page.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('pages.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required', 'min:5', 'max:20']
        ]);

        if ($request->remember)
        {
            Cookie::queue('user_email', $credentials['email'], 5);
            Cookie::queue('user_password', $credentials['password'], 5);
        }

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'Incorrect email address.',
            'password' => 'Incorrect password.'
        ]);
    }

    /**
     * Display the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.profile');
    }

    /**
     * View either the edit profile or edit password page.
     *
     * @param  string   $type
     * @return \Illuminate\Http\Response
     */
    public function edit($type)
    {
        return ($type == 'profile') ? view('pages.edit.profile') : view('pages.edit.password');
    }

    /**
     * Update either the user's profile or password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string   $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type)
    {
        $user = Auth::user();

        if ($type == 'profile')
        {
            $credentials = $request->validate([
                'username' => ['required', 'min:5', 'max:20', 'unique:users'],
                'email' => ['required', 'email:dns', 'unique:users'],
                'phone_number' => ['required', 'digits_between:10,13'],
                'address' => ['required', 'min:5']
            ]);

            User::where('id', $user->id)->update($credentials);
        }
        else if ($type == 'password')
        {
            $credentials = $request->validate([
                'old_password' => ['required', 'min:5', 'max:20', 'current_password'],
                'new_password' => ['required', 'different:old_password', 'min:5', 'max:20']
            ]);

            User::where('id', $user->id)->update([
                'password' => Hash::make($credentials['new_password'])
            ]);
        }

        return redirect(route('profile'));
    }

    /**
     * Log the user out of the application.
     *
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
