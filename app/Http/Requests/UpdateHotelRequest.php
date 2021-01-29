<?php

namespace App\Http\Requests;
use App\Hotel;
use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class UpdateHotelRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Hotel::rules(false);
    }
}
