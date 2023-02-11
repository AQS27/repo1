<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EntrenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrenadores = User::entrenadores()->paginate(10);
        return view('entrenadores.index', compact('entrenadores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entrenadores.crearEntrenadores');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validaciones
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'required|digits:9',
            'direccion' => 'nullable|min:6',
            'telefono' => 'required',
        ];

        //Personalizar los mensajes
        $messages =[
            'name.required' => 'El nombre del entrenador es obligatorio',
            'name.min' => 'El nombre del entrenador debe de tener más de 3 caracteres',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'Ingresa un correo valido',
            'dni.required' => 'El DNI es obligatorio',
            'dni.digits' => 'El DNI debe de tener 8 números y una letra',
            'direccion.min' => 'La direccion debe de tener más de 6 caracteres',
            'telefono.required' => 'El número de telefono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);

        //Creamos un arreglo asociativo para obtener la informacion del request
        User::create(
            $request->only('name', 'email', 'dni', 'direccion', 'telefono')
            + [
                'rol' => 'entrenador',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notificacion = 'El entrenado se ha creado correctamente.';
        return redirect('/entrenadores')->with(compact('notificacion'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrenador = User::entrenadores()->findOrFail($id);
        return view('entrenadores.editarEntrenadores', compact('entrenador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validaciones
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'required|digits:9',
            'direccion' => 'nullable|min:6',
            'telefono' => 'required',
        ];

        //Personalizar los mensajes
        $messages =[
            'name.required' => 'El nombre del entrenador es obligatorio',
            'name.min' => 'El nombre del entrenador debe de tener más de 3 caracteres',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'Ingresa un correo valido',
            'dni.required' => 'El DNI es obligatorio',
            'dni.digits' => 'El DNI debe de tener 8 números y una letra',
            'direccion.min' => 'La direccion debe de tener más de 6 caracteres',
            'telefono.required' => 'El número de telefono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);
        $user = User::entrenadores()->findOrFail($id);

        $data = $request->only('name', 'email', 'dni', 'direccion', 'telefono');
        $password = $request->input('password');
        
        if($password)
            $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();
        
        $notificacion = 'La informacion del entrenador se actualizo correctamente.';
        return redirect('/entrenadores')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::entrenadores()->findOrFail($id);
        $nombreEntrenador = $user->name;
        $user->delete();

        $notificacion = "El entrenador $nombreEntrenador se elimino correctamente";

        return redirect('/entrenadores')->with(compact('notificacion'));
    }
}
