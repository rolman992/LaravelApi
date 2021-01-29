<?php
Use App\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Grupo de rutas protegidas por clave y Token
Route::group(['middleware' => ['auth:api']], function (){
    //Rutas para hacer CRUD
    Route::ApiResource('hotels', 'HotelController');
    //Ruta para cerrar sesion
    Route::post('logout', 'UserController@logout'); 
    //Ruta para validar habitaciones disponibles y no disponibles
    Route::get('disponibilidad', 'HotelController@dispon');
});
    //Ruta para crear un nuevo usuario
    Route::post('users', 'UserController@store');
    //Ruta para inicio de sesion
    Route::post('login', 'UserController@login');


