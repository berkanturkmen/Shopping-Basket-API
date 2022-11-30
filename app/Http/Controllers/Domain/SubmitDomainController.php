<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//

use Illuminate\Support\Facades\Validator;
use App\Models\DOMAIN;

class SubmitDomainController extends Controller
{
	public function __invoke(Request $request)
	{
		$VALIDATOR = Validator::make($request->all(), [
			'DOMAIN_NAME' => ['required', 'string', 'max:255'],
		])->validate();

		$ARRAY = [];

		$request->DOMAIN_NAME = explode('.', $request->DOMAIN_NAME)[0];

		$DOMAINS = DOMAIN::all();

		session()->forget('CUSTOM_BASKET');

		foreach ($DOMAINS as $DOMAIN) {
			$AVAILABLE = $this->CONTROL_AVAILABLE($request->DOMAIN_NAME . '.' . $DOMAIN->EXTENSION);

			$ARRAY[] = [
				'DOMAIN_NAME' => $request->DOMAIN_NAME,
				'AVAILABLE' => (bool) $AVAILABLE,

				'UUID' => $DOMAIN->UUID,
				'EXTENSION' => $DOMAIN->EXTENSION,
				'PRICE' => $AVAILABLE ? (float) $DOMAIN->PRICE : null,
			];
		}

		session()->put('CUSTOM_BASKET', $ARRAY);

		return response()->json($ARRAY);
	}

	protected function CONTROL_AVAILABLE($DOMAIN_NAME)
	{
		$CURL = curl_init();

		curl_setopt($CURL, CURLOPT_URL, "https://rdap.verisign.com/com/v1/domain/$DOMAIN_NAME");
		curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);

		$RESPONSE = curl_exec($CURL);

		curl_close($CURL);

		$DATA = json_decode($RESPONSE);

		if (!empty($DATA)) {
			return false;
		}

		return true;
	}
}
