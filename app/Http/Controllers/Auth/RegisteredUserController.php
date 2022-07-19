<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\MyRequest;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function list()
    {
        $users = User::all();
        return view('user.list')->with(compact('users'));
    }
    
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->back();
    }

    public function view(User $user)
    {
        return view('user.view')->with(compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $data = MyRequest::all($request);
        foreach ($data['info'] as $key => $field) {
            if ($key == 'password'){
                if(is_null($field)){
                    continue;
                }
                else{
                    $user->$key = Hash::make($field);
                }
            }
            else{
                $user->$key = $field;
            }
        }
        $user->save();
        $users = User::all();
        return redirect()->route('user.list');
    }
}
