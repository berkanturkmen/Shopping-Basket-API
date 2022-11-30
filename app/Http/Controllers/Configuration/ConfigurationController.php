<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//

use App\Models\DOMAIN;
use App\Models\SERVER;
use App\Models\OPTION;
use App\Models\PERIOD;

class ConfigurationController extends Controller
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

		if (!session()->has('PERIOD')) {
			return response()->json(404);
		}

		//

		$DOMAIN = session()->has('DOMAIN') ? session()->get('DOMAIN') : null;

		//

		$SERVER = session()->has('SERVER') ? session()->get('SERVER') : null;

		//

		$OPTIONS = OPTION::where('TYPE', session()->get('TYPE'))
			->has('VARIANTS')
			->get();

		//

		$PERIOD = PERIOD::where([['UUID', session()->get('PERIOD')->UUID], ['TYPE', session()->get('TYPE')]])->firstOrFail();

		//

		if (session()->get('TYPE') == 1) {
			$DATA = [
				'DOMAIN_NAME' => $DOMAIN['DOMAIN_NAME'],

				'UUID' => $DOMAIN['UUID'],
				'EXTENSION' => $DOMAIN['EXTENSION'],
				'PRICE' => (float) $DOMAIN['PRICE'],
			];
		} elseif (session()->get('TYPE') == 2) {
			$DATA = [
				'UUID' => $SERVER['UUID'],
				'TITLE' => $SERVER['TITLE'],
				'BODY' => $SERVER['BODY'],
				'PRICE' => (float) $SERVER['PRICE'],
			];
		}

		//

		if (empty($DATA)) {
			return response()->json(500);
		}

		//

		$SUB_TOTAL = $DATA['PRICE'] * $PERIOD->PERIOD;

		//

		return response()->json([
			'DATA' => $DATA,
			'OPTIONS' => $OPTIONS->map(
				fn($OPTION) => [
					'UUID' => $OPTION->UUID,
					'NAME' => $OPTION->NAME,
					'VARIANTS' => $OPTION->VARIANTS->map(
						fn($VARIANT) => [
							'UUID' => $VARIANT->UUID,
							'NAME' => $VARIANT->NAME,
							'PRICE' => (float) $VARIANT->PRICE,
						]
					),
				]
			),
			'PERIOD' => [
				'UUID' => $PERIOD->UUID,
				'NAME' => $PERIOD->NAME,
				'PERIOD' => $PERIOD->PERIOD,
			],
			'SUB_TOTAL' => (float) $SUB_TOTAL,
		]);
	}
}
