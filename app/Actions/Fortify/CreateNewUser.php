<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','string','min:11','max:15'],
            'city' => [ 'string', 'max:255'],
            'area' => [ 'string', 'max:255'],
            'serial_number' => ['required', 'string'],
            'year' => ['required', 'numeric'],
            'password' => $this->passwordRules(),
            'confirm_password' => ['required|same:password'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'city' => $input['city'],
            'area' => $input['area'],
            'year' => $input['year'],
            'serial_number' => $input['serial_number'],
            'img' => strtoupper(substr($input['name'],0,1)).'.png',
            'password' => Hash::make($input['password']),
        ]);
    }
}
