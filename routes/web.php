<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\InfirmierController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\SpecialitesController;

Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    //  ROLES 
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('roles', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/supprimer/{role}', [RoleController::class, 'delete'])->name('roles.delete');
    Route::post('roles/edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::get('roles/export', [RoleController::class, 'export'])->name('roles.export');
    Route::get('roles/details/{role}', [RoleController::class, 'details'])->name('roles.details');

    //  Professions 
    Route::get('profession', [ProfessionController::class, 'index'])->name('profession.index');
    Route::post('profession', [ProfessionController::class, 'create'])->name('profession.create');
    Route::post('profession/supprimer/{profession}', [ProfessionController::class, 'delete'])->name('profession.delete');
    Route::post('profession/edit/{profession}', [ProfessionController::class, 'update'])->name('profession.edit');
    Route::post('profession/export', [ProfessionController::class, 'export'])->name('profession.export');

    //ADMIN
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('admin', [AdminController::class, 'create'])->name('admin.create');
    Route::post('admin/{admin}/supprimer', [AdminController::class, 'delete'])->name('admin.delete');
    Route::post('admin/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('admin/export', [AdminController::class, 'export'])->name('admin.export');

    //PERMISSION
    Route::get('permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::post('permission', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('permission/edit/{permission}', [PermissionController::class, 'update'])->name('permission.edit');
    Route::post('permission/delete/{permission}', [PermissionController::class, 'delete'])->name('permission.delete');


    //  MEDECIN 
    Route::get('medecin', [MedecinController::class, 'index'])->name('medecin.index');
    Route::post('medecin', [MedecinController::class, 'create'])->name('medecin.create');
    Route::post('medecin/{medecin}/supprimer', [MedecinController::class, 'delete'])->name('medecin.delete');
    Route::post('medecin/{medecin}/edit', [MedecinController::class, 'edit'])->name('medecin.edit');
    Route::get('medecin/export', [MedecinController::class, 'export'])->name('medecin.export');



    // LISTES DES INFIRMIERS 
    Route::get('infirmier', [InfirmierController::class, 'index'])->name('infirmier.index');
    Route::post('infirmier', [InfirmierController::class, 'create'])->name('infirmier.create');
    Route::post('infirmier/{infirmier}/supprimer', [InfirmierController::class, 'delete'])->name('infirmier.delete');
    Route::post('infirmier/{infirmier}/edit', [InfirmierController::class, 'edit'])->name('infirmier.edit');
    Route::get('infirmier/export', [InfirmierController::class, 'export'])->name('infirmier.export');

    // LISTES DES SERVICES 
    Route::get('service', [ServiceController::class, 'index'])->name('service.index');
    Route::post('service', [ServiceController::class, 'create'])->name('service.create');
    Route::post('service/supprimer/{service}', [ServiceController::class, 'delete'])->name('service.delete');
    Route::post('service/edit/{service}', [ServiceController::class, 'update'])->name('service.edit');
    Route::post('service/export', [ServiceController::class, 'export'])->name('service.export');

    //PATIENTS
    Route::get('patients', [PatientController::class, 'index'])->name('patient.index');

    //PROFIL
    Route::get('profil/{user}', [ProfilController::class, 'index'])->name('profil.index');

});



// Route pour la connexion
Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});
