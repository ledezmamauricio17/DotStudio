<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\UserVerification;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        foreach ($users as $user) {
            if ($user['type'] == '1') {
                $user['type'] = 'Viewer';
            }else{
                $user['type'] = 'Administrador';
            }
        }

        return $users;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'telefono' => 'required'
        ]);

        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->telefono = $request->telefono;
        $users->save();
        return true;
    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'telefono' => 'required'
        ]);
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->telefono = $request->telefono;
        $user->save();

        return true;
    }

    public function destroy($id)
    {
        $user = User::destroy($id);
        return $user;
    }

    public function login(Request $request)
    {
        $data = array();

        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", "=", $request->email)->first();

        if (isset($user->id)) {

            if (Hash::check($request->password, $user->password)) {
                //creamos el token
                $token = $user->createToken("auth_token")->plainTextToken;                
                $data['token']=$token;
                $data['user']=$user;
                return $data;
            } else {
                return 1;
            }
        } else {
            return 2;
        }
    }
    public function logout()
    {
        Auth::guard('api')->logout();       

        return true;
    }

    public function mail(Request $request)
    {
        Mail::mailer(name: 'smtp')->to($request->email)->send(new UserVerification($request));
        return true;
    }
}
