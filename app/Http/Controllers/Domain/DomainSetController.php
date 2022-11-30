<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//

use App\Models\DOMAIN;

class DomainSetController extends Controller
{
	public function __invoke(Request $request, $DOMAIN_NAME, $EXTENSION)
	{
		$DOMAIN = DOMAIN::where('EXTENSION', $EXTENSION)->firstOrFail();

		//

		$CONTROL_CUSTOM = collect(session()->get('CUSTOM_BASKET'))
			->where('DOMAIN_NAME', $DOMAIN_NAME)
			->where('EXTENSION', $EXTENSION)
			->where('AVAILABLE', true)
			->first();

		if (empty($CONTROL_CUSTOM)) {
			return response()->json(404);
		}

		//

		session()->put('DOMAIN', [
			'DOMAIN_NAME' => $DOMAIN_NAME,

			'UUID' => $DOMAIN->UUID,
			'EXTENSION' => $DOMAIN->EXTENSION,
			'PRICE' => (float) $DOMAIN->PRICE,
		]);

		session()->put('TYPE', 1);

		//

		return response()->json(204);
	}
}
