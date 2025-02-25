<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::paginate(10);
        return view('services.index',[
           'services' => $services
        ]);
    }
}
