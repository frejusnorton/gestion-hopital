<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecialitesMedecin;
use App\Http\Controllers\InfirmierController;
use App\Http\Controllers\PermissionController;

Route::middleware(['auth'])->group(function () {});
Route::get('/', [HomeController::class, 'index'])->name('home');

//  ROLES 
Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
Route::post('roles', [RoleController::class, 'create'])->name('roles.create');
Route::post('roles/{role}/supprimer', [RoleController::class, 'delete'])->name('roles.delete');
Route::post('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::get('roles/export', [RoleController::class, 'export'])->name('roles.export');

//PERMISSION POUR ROLES
Route::get('permissions', [PermissionController::class, 'index'])->name('permission.index');
Route::post('permission', [PermissionController::class, 'create'])->name('permission.create');


//  MEDECIN 
Route::get('medecin', [MedecinController::class, 'index'])->name('medecin.index');
Route::post('medecin', [MedecinController::class, 'create'])->name('medecin.create');
Route::post('medecin/{medecin}/supprimer', [MedecinController::class, 'delete'])->name('medecin.delete');
Route::post('medecin/{medecin}/edit', [MedecinController::class, 'edit'])->name('medecin.edit');
Route::get('medecin/export', [MedecinController::class, 'export'])->name('medecin.export');

//  SPECIALITE MEDECIN 
Route::get('specialite-medecin', [SpecialitesMedecin::class, 'index'])->name('specialite-medecin.index');
Route::post('specialite-medecin', [SpecialitesMedecin::class, 'create'])->name('specialite-medecin.create');
Route::post('specialite-medecin/{specialite}/supprimer', [SpecialitesMedecin::class, 'delete'])->name('specialite-medecin.delete');
Route::post('specialite-medecin/{specialite}/edit', [SpecialitesMedecin::class, 'edit'])->name('specialite-medecin.edit');
Route::get('specialite-medecin/export', [SpecialitesMedecin::class, 'export'])->name('specialite-medecin.export');

// LISTES DES INFIRMIERS 
Route::get('infirmier', [InfirmierController::class, 'index'])->name('infirmier.index');
Route::post('infirmier', [InfirmierController::class, 'create'])->name('infirmier.create');
Route::post('infirmier/{infirmier}/supprimer', [InfirmierController::class, 'delete'])->name('infirmier.delete');
Route::post('infirmier/{infirmier}/edit', [InfirmierController::class, 'edit'])->name('infirmier.edit');
Route::get('infirmier/export', [InfirmierController::class, 'export'])->name('infirmier.export');

// LISTES DES SERVICES 
Route::get('service', [ServiceController::class, 'index'])->name('service.index');
Route::post('service', [ServiceController::class, 'create'])->name('service.create');
Route::post('service/{service}/supprimer', [ServiceController::class, 'delete'])->name('service.delete');
Route::post('service/{service}/edit', [ServiceController::class, 'edit'])->name('service.edit');
Route::get('service/export', [ServiceController::class, 'export'])->name('service.export');


// Route pour la connexion
Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});
