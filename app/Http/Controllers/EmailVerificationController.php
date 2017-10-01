<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmailVerificationController extends Controller
{
    //

    public function show($token)
    {
        $user = User::where('verification_token', $token)->first();
        return View('verification',[ 'user'=> $user]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|string|min:6|confirmed', // App : Remove password validation
        ]);
    }

    public function update($token, Request $request)
    {
         $this->validator($request->all())->validate();
         $user = User::where('verification_token', $token)->first();
         $user->verification_status = '1';
         $user->password = bcrypt($request->get('password'));
         $user->save();
         Auth::login($user);
         return redirect('/home');
        
    }
}
