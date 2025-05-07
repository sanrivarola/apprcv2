<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\ForgotPasswordPage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HistorialStockController;
use App\Http\Controllers\AreaInventarioController;
use App\Http\Controllers\SubareaInventarioController;
use App\Http\Controllers\CompraController;



Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/forgot-password', ForgotPasswordPage::class)
     ->name('password.request');

Route::get('/', fn() => redirect()->route('login'));

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');


Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('usuarios')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('usuarios.index');
    Route::patch('/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('usuarios.toggleStatus');
    Route::get('/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('/', [UserController::class, 'store'])->name('usuarios.store');  Route::get('/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('usuarios.update');
});


Route::middleware(['auth'])->group(function() {
    Route::get('/horarios', [HorarioController::class, 'index'])
         ->name('horarios.index');
    Route::post('/horarios/entrada', [HorarioController::class, 'entrada'])
         ->name('horario.entrada');
    Route::post('/horarios/salida', [HorarioController::class, 'salida'])
         ->name('horario.salida');
    Route::get('/horarios/{id}/edit', [HorarioController::class, 'edit'])
         ->name('horario.edit');
    Route::put('/horarios/{id}', [HorarioController::class, 'update'])
         ->name('horario.update');
    Route::post('/horarios/ausente', [HorarioController::class, 'ausente'])
         ->name('horario.ausente');
    Route::get('/horarios/historial', [HorarioController::class, 'history'])
         ->name('horarios.history');
    Route::get('/horarios/jornales', [HorarioController::class, 'jornales'])
         ->name('horarios.jornales');
    Route::get('/horarios/jornales/export', [HorarioController::class, 'exportJornales'])
         ->name('horarios.jornales.export');
});


Route::get('/tareas', function () {
    return view('tareas.index');
    })->middleware(['auth'])->name('tareas.index');

Route::get('/mantenimientos', function () {
    return view('mantenimientos.index');
    })->middleware(['auth'])->name('mantenimientos.index');   

Route::get('/relevamientos', function () {
    return view('relevamientos.index');
    })->middleware(['auth'])->name('relevamientos.index');  

Route::get('/pluviometro', function () {
    return view('pluviometro.index');
    })->middleware(['auth'])->name('pluviometro.index');   

Route::get('/inventario', function () {
    return view('inventario.index');
    })->middleware(['auth'])->name('inventario.index'); 

// Áreas
Route::resource('areas', AreaInventarioController::class);

// Subáreas
Route::get('/subareas/create/{area_id}', [SubareaInventarioController::class, 'create'])->name('subareas.create');
Route::post('subareas/store', [SubareaInventarioController::class, 'store'])->name('subareas.store');
Route::get('subareas/{subarea}/edit', [SubareaInventarioController::class, 'edit'])->name('subareas.edit');
Route::put('subareas/{subarea}', [SubareaInventarioController::class, 'update'])->name('subareas.update');
Route::delete('subareas/{subarea}', [SubareaInventarioController::class, 'destroy'])->name('subareas.destroy');

Route::get('/compras', function () {
    return view('compras.index');
    })->middleware(['auth'])->name('compras.index'); 
Route::get('compras/create/{producto}', [CompraController::class, 'create'])->name('compras.create');
Route::post('compras/store/{producto}', [CompraController::class, 'store'])->name('compras.store');
    
Route::resource('productos', ProductoController::class);

// Para movimientos de stock
Route::post('/productos/{producto}/stock/entrada', [HistorialStockController::class, 'entrada'])->name('stock.entrada');
Route::post('/productos/{producto}/stock/salida', [HistorialStockController::class, 'salida'])->name('stock.salida');
    
require __DIR__.'/auth.php';