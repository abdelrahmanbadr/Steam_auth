<?php

namespace App\Http\Controllers;


use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class Auth_controller extends Controller
{
    

    private $steam;

    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    public function login()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();
            if (!is_null($info)) {
                $user = User::where('steamid', $info->getSteamID64())->first();
                if (is_null($user)) {
                    $user = User::create([
                        'username' => $info->getNick(),
                        'avatar'   => $info->getProfilePictureFull(),
                        'steamid'  => $info->getSteamID64()
                    ]);
                }
                Auth::login($user, true);
                return redirect('/'); // redirect to site
            }
        }
     //  return redirect('/test');
        return $this->steam->redirect(); // redirect to Steam login page
    }
}