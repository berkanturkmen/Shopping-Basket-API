<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

//

use App\Models\User;

class Personnel
{
	public function handle(Request $request, Closure $next)
	{
		$TOKEN = $request->header('TOKEN');

		if (empty($TOKEN)) {
			return response()->json('Unauthenticated.');
		}

		$DATA = User::where('API_TOKEN', $TOKEN)
			->whereIn('PERMISSION', ['SuperAdmin', 'Admin', 'Personnel'])
			->first();

		if (empty($DATA)) {
			return response()->json('Unauthorized.');
		}

		return $next($request);
	}
}
