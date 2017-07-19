<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\ActivationKey;
use App\Traits\ActivationKeyTrait;
use App\User;

class ActivationKeyController extends Controller
{
    use ActivationKeyTrait; 
     
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
 
        $validator = Validator::make($data,
            [
                'email'                 => 'required|email',
            ],
            [
                'email.required'        => 'Email is required',
                'email.email'           => 'Email is invalid',
            ]
        );
 
        return $validator;
 
    }


    public function showKeyResendForm(){
        return view('auth.resend_key');
    }

    public function activateKey($activation_key)
    {
        // determine if the user is logged-in already
        if (Auth::check()) {
            if (auth()->user()->activated) {
 
                return redirect()->route('login')
                    ->with('message', 'Your email is already activated.')
                    ->with('status', 'success');
            }
 
        }
         
        // get the activation key and chck if its valid
        $activationKey = ActivationKey::where('activation_key', $activation_key)
            ->first();
         
        if (empty($activationKey)) {
 
            return redirect()->route('login')
                ->with('message', 'The provided activation key appears to be invalid')
                ->with('status', 'warning');
 
        }
         
        // process the activation key we're received
        $this->processActivationKey($activationKey);      
         
        // redirect to the login page after a successful activation
        return redirect()->route('login')
            ->with('message', 'You successfully activated your email! You can now login')
            ->with('status', 'success');
             
 
    }

    public function resendKey(Request $request)
    {
         
        $validator = $this->validator($request->all());
 
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
         
        $email = $request->get('email');
         
        // get the user associated to this activation key
        $user = User::where('email', $email)
            ->first();
         
        if (empty($user)) {
            return redirect()->route('login')
                ->with('message', 'We could not find this email in our system')
                ->with('status', 'warning');
        }
         
        if ($user->activated) {
            return redirect()->route('login')
                ->with('message', 'This email address is already activated')
                ->with('status', 'success');
        }
         
        // queue up another activation email for the user
        $this->queueActivationKeyNotification($user);
 
        return redirect()->route('login')
            ->with('message', 'The activation email has been re-sent.')
            ->with('status', 'success');
    }

}
