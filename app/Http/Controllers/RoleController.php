<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRole;
use App\Roles;
use Illuminate\Http\JsonResponse;


class RoleController extends Controller
{
    //
    /**
     * Display all the roles
     *
     * @return JsonResponse
     */
    public function index()
    {
//       If there are too many role, considering using pagination https://laravel.com/docs/master/pagination
        return response()->json(Roles::all());
    }

    /**
     * Create new role
     *
     * @param CreateRole $request
     * @return JsonResponse
     */
    public function store(CreateRole $request)
    {
        $newRole = new Roles;
        $newRole->fill($request->all());
        $newRole->save();
        return response()->json($newRole);
    }

}
