<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        try {

            $credentials = $request->only('identifiant', 'password');

            if (Auth::attempt(['identifiant' => $credentials['identifiant'], 'password' => $credentials['password']])) {
                return response()->json([
                    'redirect' => route('home'),
                    'message' => 'Connexion réussie, vous êtes redirigé vers votre tableau de bord.'
                ]);
            }
            throw new AuthenticationException('Nom d\'utilisateur ou mot de passe incorrects.');
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        } catch (AuthenticationException $e) {
            return response()->json([
                'errors' => [
                    'identifiants' => [$e->getMessage()],
                ]
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'general' => ['Une erreur est survenue, veuillez réessayer plus tard.']
                ]
            ], 500);
        }
    }
}
