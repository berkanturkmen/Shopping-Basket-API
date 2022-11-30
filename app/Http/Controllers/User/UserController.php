<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
	public function INDEX(Request $request)
	{
		$USERS = User::all();

		return response()->json(
			$USERS->map(
				fn($USER) => [
					'UUID' => $USER->UUID,

					'email' => $USER->email,

					'API_TOKEN' => $USER->API_TOKEN,
					'PERMISSION' => $USER->PERMISSION,
				]
			)
		);
	}

	public function STORE(Request $request)
	{
		$VALIDATOR = Validator::make($request->all(), [
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8'],

			'PERMISSION' => ['required', 'regex:/^(SuperAdmin|Admin|Personnel)$/i'],
		])->validate();

		return response()->json(
			User::create([
				'UUID' => Str::uuid(),

				'email' => $request->email,
				'password' => Hash::make($request->password),

				'API_TOKEN' => Crypt::encryptString($request->email),
				'PERMISSION' => $request->PERMISSION,
			])
		);
	}

	public function UPDATE(Request $request, $UUID)
	{
		$USER = User::where('UUID', $UUID)->firstOrFail();

		$VALIDATOR = Validator::make($request->all(), [
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $USER->id],

			'PERMISSION' => ['required', 'regex:/^(SuperAdmin|Admin|Personnel)$/i'],
		])->validate();

		$USER->update([
			'email' => $request->email,

			'PERMISSION' => $request->PERMISSION,
		]);

		return response()->json($USER);
	}

	public function DESTROY(Request $request, $UUID)
	{
		$USER = User::where('UUID', $UUID)->firstOrFail();

		$USER->delete();

		return response()->json(204);
	}

	//

	public function PASSWORD(Request $request, $UUID)
	{
		$USER = User::where('UUID', $UUID)->firstOrFail();

		$VALIDATOR = Validator::make($request->all(), [
			'password' => ['required', 'string', 'min:8'],
		])->validate();

		$USER->update([
			'password' => Hash::make($request->password),
		]);

		return response()->json(204);
	}
}
