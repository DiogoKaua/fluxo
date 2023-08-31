<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LancamentoController,
    CentroCustoController,
    TipoController};
use App\Models\CentroCusto;

Route::get('/', function () {
    return redirect()->route('lancamento.index');
})->middleware(['auth', 'verified'])->name('home');;

Route::get('/dashboard', function () {
    return redirect()->route('lancamento.index');
 })->middleware(['auth', 'verified'])->name('deshboard');;
 

/**
 * ----------------------
 * |Centro de Custo     |
 * ----------------------
 */
Route::prefix('lancamento')
->controller(lancamentoController::class)->middleware('auth')
->group(
    function(){
        route::get('/','index')->name('lancamento.index');
        route::get('/novo', 'create')->name('lancamento.create');
        route::get('/editar/{id}', 'edit')->name('lancamento.edit');
        route::get('exibir/{id}', 'Show');
        route::post('cadastrar','store')->name('lancamento.store');
        route::post('atualizar/{id}','update' )->name('lancamento.update');
        route::post('excluir/{id}', 'destroy')->name('lancamento.destroy');
    }
);


/**
 * ----------------------
 * |lancamento   |
 * ----------------------
 */
Route::prefix('centro-custo')
->controller(CentroCustoController::class)->middleware('auth')
->group(
    function(){
        route::get('/','index')->name('centro.index');
        route::get('/novo', 'create')->name('centro.create');
        route::get('/editar/{id}', 'edit')->name('centro.edit');
        route::get('exibir/{id}', 'Show');
        route::post('cadastrar','store')->name('centro.store');
        route::post('atualizar/{id}','update' )->name('centro.update');
        route::post('excluir/{id}', 'destroy')->name('centro.destroy');
    }
);

/**
 * ----------------------
 * |Profile             |
 * ----------------------
 */
Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/profile', [ 'edit'])->name('profile.edit');
    Route::patch('/profile', [ 'update'])->name('profile.update');
    Route::delete('/profile', [ 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


