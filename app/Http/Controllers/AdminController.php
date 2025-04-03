<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {

        $role = Role::all();

        $administrateurs = User::where('isadmin', true)->paginate(10);
        return view("admin.index", ['administrateurs' =>  $administrateurs, 'roles' =>  $role]);
    }

    public function create(Request $request)
    {
        dd($request->all());
    }
}
