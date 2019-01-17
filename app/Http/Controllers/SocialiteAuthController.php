<?php
/**
 * Created by PhpStorm.
 * User: TinyPoro
 * Date: 12/8/18
 * Time: 5:58 PM
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteAuthController extends Controller
{
    /** @todo SocialiteAuthController */

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider){
        try{
            $user =  Socialite::driver($provider)->user();

            $authUser = $this->findOrCreateUser($user, $provider);
            \Auth::login($authUser, true);
            return redirect()->route('home').'?type=app_giai_ngay&team=team1';
        }catch (\Exception $e){
            dd($e->getMessage());
            return redirect()->route('home');
        }
    }

    private function findOrCreateUser($user, $provider){
        $social_columns = '';

        switch ($provider){
            case 'google' :
                $social_columns = 'google_id';
                break;
            case 'facebook' :
                $social_columns = 'facebook_id';
                break;

        }
        if($social_columns !== ''){
            $authUser = User::where($social_columns, $user->id)->first();

            if ($authUser) {
                return $authUser;
            }
            return User::create([
                'name'     => $user->name,
                'email'    => $user->email,
                'password' => Hash::make('data123'),
                $social_columns => $user->id
            ]);
        }

        return false;
    }
}