<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//

use App\Models\SERVER;

class ServerSetController extends Controller
{
	public function __invoke(Request $request, $SERVER_UUID)
	{
		$SERVER = SERVER::where('UUID', $SERVER_UUID)->firstOrFail();

		//

		session()->put('SERVER', [
			'UUID' => $SERVER->UUID,
			'TITLE' => $SERVER->TITLE,
			'BODY' => $SERVER->BODY,
			'PRICE' => $SERVER->PRICE,
		]);

		session()->put('TYPE', 2);

		//

		return response()->json(204);
	}
}
