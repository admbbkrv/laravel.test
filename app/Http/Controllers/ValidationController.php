<?php

namespace App\Http\Controllers;

use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ValidationController extends Controller
{
    public function create(Request $request){
        return view('test.create');
    }

    public function store(Request $request){
        $data = [
            $request->input('column_name') => $request->input('column_content')
//            'delivery' => [
//                'date' => '2022.12.15',
//                'time' => '23:12:12'
//            ],
        ];
        $validated = validate($data, [
//            'first_name' => ['required', 'string', 'max:50'],
//            'last_name' => ['nullable', 'string', 'max:50'],
//            'age' => ['nullable', 'integer', 'min:18', 'max:100'],
//            'amount' => ['required', 'numeric', 'min:1', 'max:99999999'],
//            'gender' => ['nullable', 'string', 'in:male,female'],
//            'zip' => ['required', 'digits:6'],
//            'subscription' => ['nullable', 'boolean'],
//            'agreement' => ['accepted'],
//            'password' => ['required' , 'string', Password::min(8)->letters()->mixedCase()->numbers(), 'confirmed'],
//            'current_password' => ['required', 'string', 'current_password'],
//            'email' => ['required', 'string', 'email', 'exists:users'],
//            'country_id' => ['required', 'integer', 'exists:countries,id'],
//            'country_id' => ['required', 'integer', Rule::exists('countries', 'id')->where('active', true)],
//            'website' => ['nullable', 'string', 'url'],
//            'uuid' => ['nullable', 'string', 'uuid'],
//            'ip' => ['nullable', 'string', 'ip'],
//            'avatar' => ['required', 'file', 'image', 'max:1024']
//            'birth_date' => ['nullable', 'string', 'date'],
//            'start_date' => ['required', 'string', 'date', 'after_or_equal:today'],
//            'finish_date' => ['required', 'string', 'date', 'after:start_date'],
//            'phone' => ['required', 'string', 'unique:users,phone', 'max:11'],
//            'phone' => ['required', 'string', new Phone, Rule::unique('users', 'phone')->ignore('1')],
//            'services' => ['nullable', 'array', 'min:1', 'max:10'],
//            'services.*' => ['required', 'integer'],
//            'delivery' => ['required', 'array', 'size:2'],
//            'delivery.date' => ['required', 'string', 'date_format:Y.m.d'],
//            'delivery.time' => ['required', 'string', 'date_format:H:i:s'],
            'app_name' => ['nullable', 'string', function($attributes, $value, \Closure $fail){
                if ($value != config('app.name')){
                    $fail('Че то не то приложение ты выбрал');
                }
            }]
      ]);
        dd($validated);
    }
}
