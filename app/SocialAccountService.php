<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\SocialAccount;
use App\User;

/**
* Class contains functions for creating accounts on facebook
*/
class SocialAccountService
{
    /**
    * If Facebook Id - used login
    * if not create an account
    * @param ProviderUser : Socialite user object 
    */
    public function createOrGetUser(ProviderUser $providerUser)
    {
        // get account
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        // if account exists return 
        if ($account) {
            return array(
                "user" => $account->user,
                "new" => false
            );
        } 
        
        // if account does not exist make one for user then return
        else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            // check if user name is unique
            $username = $providerUser->getName();
            $counter = 0;
            while(!$this->check_if_username_unique($username)) {
                $username = $username . $counter;
                $counter++;
            }

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $username,
                    'activated' => true,
                    'password' => bcrypt($this->generateRandomString())
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return array(
                "user" => $user,
                "new" => true
            );

        }
    }

    private function generateRandomString() {
        $length = 10;
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    /**
    * Check if the username already exists in database
    * @param username : String containing the username we are checking
    */
    private function check_if_username_unique($username) {

        $tempname = User::where('name', $username)->first();
        return !$tempname;
    }
}
