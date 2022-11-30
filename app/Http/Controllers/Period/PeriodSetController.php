<?php

namespace App\Http\Controllers\Period;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//

use App\Models\PERIOD;

class PeriodSetController extends Controller
{
	public function __invoke(Request $request, $PERIOD_UUID)
	{
		if (!session()->has('DOMAIN') && !session()->has('SERVER')) {
			return response()->json(404);
		}

		//

		if (!session()->has('TYPE')) {
			return response()->json(404);
		}

		//

		$PERIOD = PERIOD::where([['UUID', $PERIOD_UUID], ['TYPE', session()->get('TYPE')]])->firstOrFail();

		session()->put('PERIOD', $PERIOD);

		//

		return response()->json(204);
	}
}
