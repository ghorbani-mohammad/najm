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
    // public function create()
    // {
    //     return view('auth.register');
    // }

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
        $user = new User();
        $user->name = $request->info['name'];
        $user->email = $request->info['email'];
        $user->username = $request->info['username'];
        $user->type = $request->info['type'];
        $user->password = Hash::make($request->info['password']);
        $user->save();
        return redirect()->route('user.list');
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

    public function create(User $user)
    {
        return view('user.create');
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
