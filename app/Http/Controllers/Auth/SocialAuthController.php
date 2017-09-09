<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'alpha_dash', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   


    public function callback(SocialAccountService $service)
    {
        $social_obj = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($social_obj["user"]);

        // check if user is new, if so ask them to update information
        if ($social_obj["new"])
            return redirect('/edit_social_user');

        // funny little note about facebook api
        // https://stackoverflow.com/questions/7131909/facebook-callback-appends-to-return-url
        return redirect('/');
    }

    
    public function editSocialUser(Request $request){

        // check if user is logged in 
        $user = Auth::user();

        if ($user)
            return view('pages.new_social', ['user' => $user]);
        else
            return view('pages.information', ['information' => 'You must be logged in to view this page']);
    }

    /**
    * Edit values for users who first logged in through social means
    */
    public function makeSocialUser(Request $request){
        
        // validate user
        $validator = $this->validator($request->all());
 
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        // get logged in user
        $user = Auth::user();
        $user->name = $request['name'];
        $user->password = bcrypt($request['password']);
        $user->email = $request['email'];

        $user->save();

        return redirect('/');

    }
    
}
