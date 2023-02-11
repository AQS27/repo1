<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $actividades = Actividades::all();
        return view('actividades.index', compact('actividades')); //ruta index
    }

    public function create()
    {
        return view('actividades.create');
    }

    public function sendData(Request $request)
    {
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre de la actividad es obligatorio.',
            'name.min' => 'El nombre de la actividad debe de tener mas de 3 caracteres'
        ];

        $this->validate($request, $rules, $messages);

        $actividades = new Actividades();
        $actividades->nombre = $request->input('name');
        $actividades->descripcion = $request->input('description');
        $actividades->save();
        $notificacion = 'La activida ha sido creada correctamente.';

        return redirect('/actividades')->with(compact('notificacion'));
    }

    public function edit(Actividades $actividades)
    {
        return view('actividades.editar', compact('actividades'));
    }

    public function update(Request $request, Actividades $actividades)
    {
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre de la actividad es obligatorio.',
            'name.min' => 'El nombre de la actividad debe de tener mas de 3 caracteres'
        ];

        $this->validate($request, $rules, $messages);

        $actividades->nombre = $request->input('name');
        $actividades->descripcion = $request->input('description');
        $actividades->save();

        return redirect('/actividades');
    }

    public function eliminar(Actividades $actividades )
    {
        $actividadEliminada = $actividades->nombre;
        $actividades->delete();
        $notificacion = 'La actividad '. $actividadEliminada .'ha sido eliminada correctamente.';
        return redirect('/actividades')->with(compact('notificacion'));
    }
}
