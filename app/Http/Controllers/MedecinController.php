<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    public function index(){
        $medecin = Medecin::paginate(10);
        return view('medecin.index',[
            'medecins'=>  $medecin
        ]);
    }
}
