<?php

use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/incomes',[IncomeController::class, 'index'])->name('incomes.index');
Route::get('/create',[IncomeController::class, 'create']);
Route::get('/outcomes',[OutcomeController::class,'index'])->name('outcomes.index');
Route::get('/incomes/create',[IncomeController::class,'create'])->name('incomes.create');
Route::post('/incomes',[IncomeController::class,'store'])->name('incomes.store');
Route::get('/incomes/{id}/edit',[IncomeController::class, "edit"])->name('incomes.edit');
Route::put('/incomes/{id}',[IncomeController::class,'update'])->name('incomes.update');
Route::delete('/incomes/{id}',[IncomeController::class,'destroy'])->name('incomes.destroy');
Route::get('/mi-primer-api-point', function () {

    
    $miArray = [
        'clave1'=>'valor1',
        'clave2'=>'valor2',
        'clave3'=>[
            3,24
        ]
    ];
    return $miArray;
    //return '<p>Mi primera página</p>';
});
