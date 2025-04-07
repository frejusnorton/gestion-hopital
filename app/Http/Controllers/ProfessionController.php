<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade as PDF;

use App\Models\Profession;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ProfessionsExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\ValidationException;


class ProfessionController extends Controller
{
    public function index(Request $request)
    {
        $professions = Profession::filter($request->search)->paginate(10);

        if ($request->ajax()) {
            return view('profession.datapart', [
                'professions' => $professions
            ]);
        }
        return view('profession.index', [
            'professions' => $professions
        ]);
    }

    public function create(Request $request)
    {
        $customMessages = [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => "Le nom n'est pas valide",
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'name.unique' => 'Cette profession existe déjà.',
        ];

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:professions,name',
            ], $customMessages);

            $professionName = strtoupper($validated['name']);

            Profession::create([
                'id' => Str::uuid(),
                'name' => $professionName,
            ]);

            return response()->json([
                'message' => 'Profession créée avec succès.',
                'success' => true,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            Log::error('Erreur lors de la création de la profession', [
                'message' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'message' => 'Une erreur est survenue lors de la création de la profession.',
                'success' => false,
            ], 500);
        }
    }

    public function update(Request $request, Profession $profession)
    {
        $request->validate([
            'name' => 'required|string|unique:professions,name,' . $profession->id,
        ], [
            'name.required' => 'Le champ nom est obligatoire.',
            'name.string' => 'Le champ nom doit être une chaîne de caractères.',
            'name.unique' => 'Ce nom de permission existe déjà.',
        ]);

        $profession->update(['name' => strtoupper($request->name)]);

        return response()->json([
            'message' => 'Permission mise à jour avec succès.',
            'success' => true,
        ], 200);
    }



    public function delete(Profession $profession)
    {
        $profession->delete();
        return response()->json(['message' => 'Profession supprimé avec succès.'], 200);
    }


    public function export(Request $request)
    {
        $format = $request->input('format');

        if ($format === 'excel') {
            return Excel::download(new ProfessionsExport, 'professions.xlsx');
        }

        if ($request->input('format') === 'pdf') {
            $professions = Profession::all();

            $pdf = app('dompdf.wrapper')->loadView('profession.export.pdf', ['professions' => $professions]);
            return $pdf->download('professions.pdf');
        }
    }
}
