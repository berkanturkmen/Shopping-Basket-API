<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

//

use App\Models\User;

class TOKEN
{
	public function handle(Request $request, Closure $next)
	{
		$TOKEN = $request->header('TOKEN');

		if (empty($TOKEN)) {
			return response()->json('Unauthenticated.');
		}

		$DATA = User::where('API_TOKEN', $TOKEN)->first();

		if (empty($DATA)) {
			return response()->json('Unauthenticated.');
		}

		//

		if ($DATA->PERMISSION == 'Personnel') {
			if ($request->PERMISSION == 'Admin' || $request->PERMISSION == 'SuperAdmin') {
				return response()->json('Unauthorized.1');
			}
		}

		if ($DATA->PERMISSION == 'Admin') {
			if ($request->PERMISSION == 'SuperAdmin') {
				return response()->json('Unauthorized.2');
			}
		}

		//

		return $next($request);
	}
}
