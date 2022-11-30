<?php

namespace App\Http\Controllers\Period;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//

use App\Models\PERIOD;

class PeriodController extends Controller
{
	public function __invoke(Request $request)
	{
		if (!session()->has('DOMAIN') && !session()->has('SERVER')) {
			return response()->json(404);
		}

		//

		if (!session()->has('TYPE')) {
			return response()->json(404);
		}

		//

		$PERIODS = PERIOD::where('TYPE', session()->get('TYPE'))->get();

		return response()->json(
			$PERIODS->map(
				fn($PERIOD) => [
					'UUID' => $PERIOD->UUID,
					'NAME' => $PERIOD->NAME,
					'PERIOD' => $PERIOD->PERIOD,
				]
			)
		);
	}
}
