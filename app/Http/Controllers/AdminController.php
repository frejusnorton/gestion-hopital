<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAdminRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {

        $professions = Profession::orderBy('name', 'asc')->get();
        $services = Service::orderBy('name', 'asc')->get();

        $administrateurs = User::where('isadmin', true)->paginate(10);
        return view("admin.index", [
            'professions' => $professions,
            'services' => $services,
            'administrateurs' => $administrateurs
        ]);
    }
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function create(StoreAdminRequest $request)
    {
        try {
            $validated = $request->validated();
            DB::beginTransaction();

            $profilPath = null;
            if ($request->hasFile('profil')) {
                $profilPath = $request->file('profil')->store('profil', 'public');
            }

            $plainPassword = $this->generateStrongPassword();
            $admin = User::create([
                'nom' => $validated['nom'],
                'prenom' => $validated['prenom'],
                'identifiant' => $validated['identifiant'],
                'matricule' => $validated['matricule'],
                'profession_id' => $validated['profession'],
                'service_id' => $validated['service'],
                'isadmin' => true,
                'email' => $validated['email'],
                'sexe' => $validated['sexe'],
                'profil' => $profilPath,
                'password' => Hash::make($plainPassword),
            ]);

            $adminRole = Role::whereRaw('LOWER(name) = ?', ['administrateur'])
                ->where('guard_name', 'web')
                ->first();

            if (!$adminRole) {
                abort(404, "Le rôle administrateur n'existe pas.");
            }

            $admin->assignRole($adminRole);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Administrateur ajouté avec succès.',
                'password' => $plainPassword,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
            ], 500);
        }
    }

    private function generateStrongPassword($length = 10)
    {
        $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lower = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $special = '!@#$%^&*()-_=+<>?';

        
        $password = substr(str_shuffle($upper), 0, 1)
            . substr(str_shuffle($lower), 0, 1)
            . substr(str_shuffle($numbers), 0, 1)
            . substr(str_shuffle($special), 0, 1);

      
        $all = $upper . $lower . $numbers . $special;
        $remainingLength = $length - strlen($password);
        $password .= substr(str_shuffle(str_repeat($all, $remainingLength)), 0, $remainingLength);
       
        return str_shuffle($password);
    }

    public function logout(){
        
    }
}
