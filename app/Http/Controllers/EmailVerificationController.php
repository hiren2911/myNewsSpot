<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class EmailVerificationController extends Controller
{
   /**
    * Show user's verification status
    * @param string $token user's unique token
    * @param Request $request Http request object
    * @return \Illuminate\Http\Response
    */
    public function show($token)
    {
        $user = User::where('verification_token', $token)->first();
        return View('verification',[ 'user'=> $user]);
    }

    /**
     * Get a validator for an incoming upate verification request.
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


    /**
    * Update user's verification status
    * @param string $token user's unique token
    * @param Request $request Http request object
    * @return \Illuminate\Http\Response
    */
    public function update($token, Request $request)
    {
         $this->validator($request->all())->validate();
         $user = User::where('verification_token', $token)->first();
         // update user status to verified and set password
         $user->verification_status = '1';
         $user->password = bcrypt($request->get('password'));
         $user->save();

         Session::flash('flash_message', 'Account verified Successfully');
         // make user login and redirect to news listing
         Auth::login($user);
         return redirect(route('news.index'));
        
    }
}
