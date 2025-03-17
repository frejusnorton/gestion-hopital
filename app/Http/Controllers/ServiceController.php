<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {

        $services = Service::orderBy('nom', 'asc')->paginate(10);

        if ($request->ajax()) {
            $search = $request->input('search', '');
            $services = Service::filter($search)->paginate(10);
            return view('services.datapart', ['services' => $services]);
        }
        return view('services.index', [
            'services' => $services
        ]);
    }
}
