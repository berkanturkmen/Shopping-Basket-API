<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//

use App\Models\SERVER;

class ServerController extends Controller
{
	public function __invoke(Request $request)
	{
		$SERVERS = SERVER::all();

		return response()->json(
			$SERVERS->map(
				fn($SERVER) => [
					'UUID' => $SERVER->UUID,
					'TITLE' => $SERVER->TITLE,
					'BODY' => $SERVER->BODY,
					'PRICE' => (float) $SERVER->PRICE,
				]
			)
		);
	}
}
