<?php

namespace App\Http\Controllers;

use App\Exports\ServicesExport;
use Exception;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\ValidationException;

class ServiceController extends Controller
{    public function index(Request $request)
    {
        $services = Service::filter($request->search)->paginate(10);
        
        if ($request->ajax()) {
            return view('service.datapart', [
                'services' => $services
            ]);
        }
        return view('service.index', [
            'services' => $services
        ]);
    }


    public function create(Request $request)
    {
        $customMessages = [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => "Le nom n'est pas valide",
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'name.unique' => 'Ce service existe déjà.',
        ];

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:services,name',
            ], $customMessages);

            $serviceName = strtoupper($validated['name']);

            Service::create([
                'id' => Str::uuid(),
                'name' => $serviceName,
            ]);

            return response()->json([
                'message' => 'Service créée avec succès.',
                'success' => true,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            Log::error('Erreur lors de la création du service', [
                'message' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'message' => 'Une erreur est survenue lors de la création du service.',
                'success' => false,
            ], 500);
        }
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|unique:services,name,' . $service->id,
        ], [
            'name.required' => 'Le champ nom est obligatoire.',
            'name.string' => 'Le champ nom doit être une chaîne de caractères.',
            'name.unique' => 'Ce service existe déjà.',
        ]);

        $service->update(['name' => strtoupper($request->name)]);

        return response()->json([
            'message' => 'Service mise à jour avec succès.',
            'success' => true,
        ], 200);
    }



    public function delete(Service $service)
    {
        $service->delete();
        return response()->json(['message' => 'Service supprimé avec succès.'], 200);
    }


    public function export(Request $request)
    {
        $format = $request->input('format');

        if ($format === 'excel') {
            return Excel::download(new ServicesExport, 'services.xlsx');
        }

        if ($request->input('format') === 'pdf') {
            $services = Service::all();

            $pdf = app('dompdf.wrapper')->loadView('service.export.pdf', ['services' => $services]);
            return $pdf->download('services.pdf');
        }
    }
}
