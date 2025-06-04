<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    public function index() {

        $outcome = Outcome::all();
       
        $title = "Outcomes";

        $tableData = ["cabecera" => ["fecha","categoria","cantidad"],"data" => []];

        foreach ($outcome as $outcomes) {
            $tableData["data"][] = [
                $outcomes->fecha,
                $outcomes->categoria,
                $outcomes->cantidad
            ]; 
        }

        return view("outcome.index",["tableData" => $tableData,"title" => $title]);
    }
}
