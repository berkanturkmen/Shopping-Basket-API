<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartRemoveController extends Controller
{
	public function __invoke(Request $request, $KEY)
	{
		if (!session()->has('CART')) {
			return response()->json(404);
		}

		//

		$CART = session()->get('CART');

		//

		if (!array_key_exists($KEY, $CART)) {
			return response()->json(404);
		}

		//

		unset($CART[$KEY]);

		session()->put('CART', $CART);

		//

		$COLLECTION = collect($CART);

		$TOTAL = $COLLECTION->sum('SUB_TOTAL');

		//

		return response()->json([
			'CART' => $COLLECTION,
			'TOTAL' => (float) $TOTAL,
		]);
	}
}
