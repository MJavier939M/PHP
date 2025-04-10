<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaController extends Controller
{
    public function holaMundo() {
        $mensaje = "Hola Mundo";
        $color = "blue";
        return view("inicio", ["mensaje" => $mensaje,"color" => $color]);
    }
}
