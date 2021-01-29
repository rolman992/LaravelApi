<?php

namespace App\Http\Requests;
use App\Hotel;
use Illuminate\Foundation\Http\FormRequest;

class CreateHotelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Hotel::rules();
    }
}
