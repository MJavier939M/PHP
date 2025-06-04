<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //Carga de todos los elementos que vamos a mostrar
        $income = Income::all();

        $tableData = ["cabecera" => ["id","fecha","categoria","cantidad"],"data" => []];
        
        foreach ($income as $incomes) {
            $tableData["data"][] = [
                $incomes->id,
                $incomes->fecha,
                $incomes->categoria,
                $incomes->cantidad
            ]; 
        }
        
        $nombreEnlace = ["enlace" => "https://www.google.com/","nombre" => "BOTON"];
        $title='Ingresos de USUARIO';
        
        
        return view('income.index',['tableData' => $tableData,'title' => $title,"nombreEnlace" => $nombreEnlace]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('income.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate(["fecha" => "required|date","cantidad" => "required|numeric","categoria" => "required|string"]); 
       
       try {
        Income::create($request->all());
        return redirect()->route('incomes.index')->with("success","Ingreso creado correctamente");
       } catch (\Throwable $th) {
        return redirect()->route('incomes.create')->with("error","Error al crear el ingreso");
       } 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        return view('income.edit')->with("income",Income::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dato = Income::find($id);

        $request->validate(["fecha" => "required|date","cantidad" => "required|numeric","categoria" => "required|string"]); 

        $dato->update($request->all());
        return redirect()->route('incomes.index')->with("success","Ingreso actualizado correctamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dato = Income::find($id);

        $dato->delete();
        return redirect()->route('incomes.index')->with("success","Ingreso borrado correctamente");

    }
}
