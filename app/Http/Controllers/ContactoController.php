<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function formulario() {
    return view('formulario-contacto');
    }

    function newContact(Request $request) {
    //return view('procesar_formulario');
    //dd($request->all(), $request->name);

    $request->validate([
        'nombre' => 'required|min:3|max:255',
        'correo' => 'required|email',
        'asunto' => ['required', 'min:3'],
        'mensaje' => ['required', 'min:10']
    ]);

    $contacto = new Contacto();
    $contacto->nombre = $request->nombre;
    $contacto->correo = $request->correo;
    $contacto->asunto = $request->asunto;
    $contacto->mensaje = $request->mensaje;
    $contacto->save();

    return redirect('/contacto');
}
}