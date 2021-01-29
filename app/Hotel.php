<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';
    
    protected $fillable = [ 'tipo', 'vacante', 'hab', 'ocupantes' ];

    protected $hidden = [ 'created_at', 'updated_at' ];

    //validaciones para creacion y modificacion de habitaciones
    public static function rules($isNew = true)
    {
    //Se valida que el campo 'tipo' y 'hab' sean obligarios
    //Se valida tambien que el campo hab sea unico, sin embargo al momento de editar
    //una habitacion esta validacion no tendra efecto siempre y cuando no se intente poner
    //el codigo de otra habitacion ya existente, en ese caso saltara la validacion 
    //indicando que el campo 'hab' debe ser un campo unico
        return [
            'tipo' => 'required',
            'hab' => 'required|unique:hotels,hab,' . ($isNew ? '' : request('hotel')->id)
        ];
    }
}
