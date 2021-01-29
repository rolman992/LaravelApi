<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str as Str;

class UserController extends Controller
{
    //funcion para creacion de nuevo usuario
    public function store(Request $request){
        $input = $request->all();
        //Encriptar clave ingresada al crear nuevo usuario
        $input['password'] = Hash::make($request->password);
        User::create($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro creado exitosamente'
        ], 200);
    }
    //funcion para inicio de sesion
    public function login(Request $request){
        //Capturar usuario en BD que tenga mismo correo que el ingresado por motodo post
        $user = User::whereEmail($request->email)->first();
        //Se valida que exista el usuario para proceder a comprobar que la clave
        //ingresada coincide con la clave en la BD de dicho usuario
        if(!is_null($user) && Hash::check($request->password, $user->password)){
            //Crear un token random de 50 caracteres
            $user->api_token = Str::random(50);
            $user->save();
            return response()->json([
                'res' => true,
                'token' => $user->api_token,
                'message' => 'Bienvenido al sistema'
            ], 200);
        }else{
            return response()->json([
                'res' => false,
                'message' => 'Email o Password incorrecto'
            ], 200);
        }
    }
    //Funcion para cerrar sesion
    public function logout(){
        //Se captura el usuario con sesion activa
        $user = auth()->user();
        //Se elimina el token del usuario para cerrarle la sesion
        $user->api_token = null;
        $user->save();
        return response()->json([
            'res' => true,
            'message' => 'Desconexion exitosa'
        ], 200);
    }
}
