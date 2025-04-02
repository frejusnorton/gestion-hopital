<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $administrateurs = User::where('isadmin', true)->paginate(10);
        return view("admin.index", ['administrateurs' =>  $administrateurs]);
    }

    public function create(){
        
    }
}
