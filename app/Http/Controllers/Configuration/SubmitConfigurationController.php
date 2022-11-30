<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//

use App\Models\DOMAIN;
use App\Models\SERVER;
use App\Models\VARIANT;
use App\Models\PERIOD;

class SubmitConfigurationController extends Controller
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

		foreach ($request->DATA as $KEY => $VALUE) {
			$DATA = VARIANT::where('UUID', $VALUE)
				->whereRelation('OPTION', 'UUID', $KEY)
				->first();

			if (empty($DATA)) {
				return response()->json(500);
			}
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

		$SUB_TOTAL = $DATA['PRICE'] * $PERIOD->PERIOD;

		//

		$CART = session()->has('CART') ? session()->get('CART') : [];

		//

		$VARIANTS = VARIANT::where('TYPE', session()->get('TYPE'))
			->whereRaw('UUID IN ("' . implode('","', $request->DATA) . '")')
			->get();

		$OPTIONS = [];

		foreach ($VARIANTS as $VARIANT) {
			$SUB_TOTAL = $SUB_TOTAL + $VARIANT->PRICE;

			//

			$OPTIONS[] = [
				'UUID' => $VARIANT->OPTION->UUID,
				'NAME' => $VARIANT->OPTION->NAME,
				'VARIANT' => [
					'UUID' => $VARIANT->UUID,
					'NAME' => $VARIANT->NAME,
					'PRICE' => (float) $VARIANT->PRICE,
				],
			];
		}

		//

		$CART[$DATA['UUID']] = [
			'DATA' => $DATA,
			'OPTIONS' => $OPTIONS,
			'PERIOD' => [
				'UUID' => $PERIOD->UUID,
				'NAME' => $PERIOD->NAME,
				'PERIOD' => $PERIOD->PERIOD,
			],
			'SUB_TOTAL' => (float) $SUB_TOTAL,
		];

		session()->put('CART', $CART);

		//

		return response()->json($CART[$DATA['UUID']]);
	}
}
