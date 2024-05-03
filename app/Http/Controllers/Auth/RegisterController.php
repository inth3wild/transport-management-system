<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            // 'middle_name' => 'required|string|max:255',
            // 'dob' => 'required|string|date|before:' . Carbon::today(),
            // 'emergency' => 'required|digits:11|numeric',
            'last_name' => ['nullable', 'string', 'max:255', Rule::when(!filled($data['last_name']), ['nullable', 'string'], ['filled'])],
            'middle_name' => ['nullable', 'string', 'max:255', Rule::when(!filled($data['middle_name']), ['nullable', 'string'], ['filled'])],
            'phone_number' => 'required|digits:11|numeric|unique:users',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Password::min(6)],
            'dob' => ['nullable', 'string', 'date', 'before:' . Carbon::today(), Rule::when(!filled($data['dob']), ['nullable', 'string', 'date'], ['filled'])],
            'gender' => 'required|string|min:4|max:6|alpha',
            'address' => 'required|string|max:255',
            'emergency' => ['nullable', 'digits:11', 'numeric', Rule::when(!filled($data['emergency']), ['nullable', 'string'], ['filled'])],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Set default values for empty or missing fields
        $data['last_name'] = $data['last_name'] ?? '';
        $data['middle_name'] = $data['middle_name'] ?? '';
        $data['dob'] = $data['dob'] ?? '0000-00-00';
        $data['emergency'] = $data['emergency'] ?? 00000000000;

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middle_name' => $data['middle_name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'emergency' => $data['emergency'],
        ]);
    }
}
