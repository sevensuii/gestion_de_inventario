<?php

use App\Http\Controllers\DepartamentoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\ObjetoController;
use App\Http\Controllers\ReplicaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');
        // Route::get('objetos', 'ObjetoController@index')->name('objetos');
        Route::get('objetos/show/{codigo}', [ObjetoController::class, 'show'])->name('objetos.show');
        Route::get('objetos/destroy/{id}', [ObjetoController::class, 'destroy'])->name('objetos.destroy');
        Route::get('objetos', [ObjetoController::class, 'index'])->name('objetos');
        Route::get('itemsAulas/{id}', [ObjetoController::class, 'buscaItemsAula'])->name('itemsAulas');
        Route::get('itemsDepartamento/{id}', [ObjetoController::class, 'buscaItemsDepartamento'])->name('itemsDepartamento');
        Route::get('midepartamento/edit/{id}', [ObjetoController::class, 'edit'])->name('midepartamento.edit');
        Route::post('midepartamento/edit/{id}', [ObjetoController::class, 'update'])->name('midepartamento.update');
        Route::get('midepartamento/create', [ObjetoController::class, 'create'])->name('midepartamento.create');
        Route::post('midepartamento/create', [ObjetoController::class, 'store'])->name('midepartamento.store');
        Route::get('replica/update', [ReplicaController::class, 'update'])->name('replica.update');
        Route::get('replica/destroy', [ReplicaController::class, 'destroy'])->name('replica.destroy');
        Route::get('replica/create', [ReplicaController::class, 'create'])->name('replica.create');
        // Route::post('midepartamento/store/{nombre}/{descripcion}/{imageInput}/{custom-input-number}', [ObjetoController::class, 'store'])->name('midepartamento.store');
        Route::get('midepartamento', [DepartamentoController::class, 'index'])->name('midepartamento');
        Route::get('replicasPorObjeto/{id}', [ReplicaController::class, 'buscaReplicasPorObjeto'])->name('replicasPorObjeto');
        Route::view('escanear', 'codigos_qr.index')->name('escanear');
        // Route::get('send-mail', function () {

        //     $details = [
        //         'title' => 'Inventario CIFP ZONZAMAS',
        //         'body' => 'Bienvenido a nuestro sistema'
        //     ];

        //     \Mail::to('severyn00@gmail.com')->send(new \App\Mail\MyTestMail($details));
        //     dd("Email is Sent.");

        // });

    });

    URL::forceScheme('https');
