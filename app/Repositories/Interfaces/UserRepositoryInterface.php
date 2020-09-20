<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getAllUsers();

    public function getASingleUser($id);

    public function getCurrentUserProfile();

}
