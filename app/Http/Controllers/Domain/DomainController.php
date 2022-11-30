<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//

use App\Models\DOMAIN;

class DomainController extends Controller
{
	public function __invoke(Request $request)
	{
		$DOMAINS = DOMAIN::all();

		return response()->json(
			$DOMAINS->map(
				fn($DOMAIN) => [
					'UUID' => $DOMAIN->UUID,
					'EXTENSION' => $DOMAIN->EXTENSION,
					'PRICE' => (float) $DOMAIN->PRICE,
				]
			)
		);
	}
}
