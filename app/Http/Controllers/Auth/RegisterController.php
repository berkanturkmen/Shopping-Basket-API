<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
	use RegistersUsers;

	protected $redirectTo = RouteServiceProvider::HOME;

	public function __construct()
	{
		$this->middleware('guest');
	}

	protected function validator(array $data)
	{
		return Validator::make($data, [
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8'],
		]);
	}

	protected function create(array $data)
	{
		return User::create([
			'UUID' => Str::uuid(),
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
			'API_TOKEN' => Crypt::encryptString($data['email']),
		]);
	}

	public function showRegistrationForm()
	{
		abort(404);
	}
}
