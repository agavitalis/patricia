<?php

namespace App\Http\Controllers;

use  App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
     /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function profile()
    {
        $profile = $this->userRepository->getCurrentUserProfile();
        return response()->json(['user' => $profile], 200);
    }

    /**
     * Get all User.
     *
     * @return Response
     */
    public function allUsers()
    {
        $users = $this->userRepository->getAllUsers();
        return response()->json(['users' => $users], 200);
    }

    /**
     * Get one user.
     *
     * @return Response
     */
    public function singleUser($id)
    {
        try {

            $user = $this->userRepository->getASingleUser($id);
            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'User not found!'], 404);
        }

    }

}