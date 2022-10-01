<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Strategies\UserServiceStrategy;
use App\Services\RandomDataAPIServiceProvider;
use App\Services\RandomUserServiceProvider;

class UserController extends Controller
{
    private $user_service;

    public function __construct()
    {
        //
    }

    public function randomUser()
    {   
        $base_url = env('RANDOM_USER_URL');

        if ($base_url == 'https://randomuser.me/api/') {
            $this->user_service = new UserServiceStrategy(new RandomUserServiceProvider);        
        } else {
            $this->user_service = new UserServiceStrategy(new RandomDataAPIServiceProvider);
        }

        return $this->user_service->getRandomUser($base_url);
    }
}
