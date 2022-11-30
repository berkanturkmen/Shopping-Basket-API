<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
	public function __invoke(Request $request)
	{
		session()->forget(['DOMAIN', 'SERVER', 'TYPE', 'PERIOD']);

		if (!session()->has('CART')) {
			return response()->json(204);
		}

		//

		$COLLECTION = collect(session()->get('CART'));

		$TOTAL = $COLLECTION->sum('SUB_TOTAL');

		//

		return response()->json([
			'CART' => $COLLECTION,
			'TOTAL' => (float) $TOTAL,
		]);
	}
}
