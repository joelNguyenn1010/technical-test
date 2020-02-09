<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUserRole;
use App\Users;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display all the user
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Users::with('roles')->get());
    }

    /**
     * Create new user
     *
     * @param CreateUser $request
     * @return JsonResponse
     */
    public function store(CreateUser $request)
    {
        $newUser = new Users;
        $newUser->fill($request->all());
        $newUser->save();
        return response()->json($newUser);

    }

    /**
     * Updating the user role
     *
     * @param UpdateUserRole $request
     * @return JsonResponse
     */
    public function updateRole(UpdateUserRole $request)
    {
        $user_id = $request->input('user_id');
        $role_id = $request->input('role_id');

        try {
//            find the user with given id
            $user = Users::find($user_id);
            if($user) {
//                update the role
                $user->role_id = $role_id;
                $user->save();
                return response()->json($user);
            } else {
//                throw error if we can't find user
                return response()->json(["error" => "Can't find the user with given id"],400);
            }
        } catch (\Exception $ex) {
//
            return response()->json($ex,400);
        }
    }

}
