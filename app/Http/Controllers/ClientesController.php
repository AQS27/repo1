<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = User::clientes()->paginate(10);
        return view('clientes.index', compact('clientes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.crearClientes');
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
            'name.required' => 'El nombre del cliente es obligatorio',
            'name.min' => 'El nombre del cliente debe de tener más de 3 caracteres',
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
                'rol' => 'cliente',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notificacion = 'El cliente se ha creado correctamente.';
        return redirect('/clientes')->with(compact('notificacion'));
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
        $cliente = User::clientes()->findOrFail($id);
        return view('clientes.editarClientes', compact('cliente'));
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
            'name.required' => 'El nombre del cliente es obligatorio',
            'name.min' => 'El nombre del cliente debe de tener más de 3 caracteres',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'Ingresa un correo valido',
            'dni.required' => 'El DNI es obligatorio',
            'dni.digits' => 'El DNI debe de tener 8 números y una letra',
            'direccion.min' => 'La direccion debe de tener más de 6 caracteres',
            'telefono.required' => 'El número de telefono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);
        $user = User::Clientes()->findOrFail($id);

        $data = $request->only('name', 'email', 'dni', 'direccion', 'telefono');
        $password = $request->input('password');
        
        if($password)
            $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();
        
        $notificacion = 'La informacion del cliente se actualizo correctamente.';
        return redirect('/clientes')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::Clientes()->findOrFail($id);
        $nombreCliente = $user->name;
        $user->delete();

        $notificacion = "El cliente $nombreCliente se elimino correctamente";

        return redirect('/clientes')->with(compact('notificacion'));
    }
}
