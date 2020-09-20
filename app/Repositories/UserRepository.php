<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function getASingleUser($id)
    {
        return User::findOrFail($id);
    }

    public function getCurrentUserProfile(){
        return Auth::user();
    }
}