<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return response()->json(204);
});

Auth::routes();

Route::middleware('auth')->group(function () {
	Route::get('/home', function () {
		return response()->json(auth()->user()->API_TOKEN);
	});
});

//

Route::get('/DOMAINS', App\Http\Controllers\Domain\DomainController::class);
Route::post('/DOMAINS', App\Http\Controllers\Domain\SubmitDomainController::class);

//

Route::get('/DOMAINS/{DOMAIN_NAME}.{EXTENSION}', App\Http\Controllers\Domain\DomainSetController::class);

//

Route::get('/SERVERS', App\Http\Controllers\Server\ServerController::class);
Route::get('/SERVERS/{SERVER_UUID}/SET', App\Http\Controllers\Server\ServerSetController::class);

//

Route::get('/PERIODS', App\Http\Controllers\Period\PeriodController::class);
Route::get('/PERIODS/{PERIOD_UUID}/SET', App\Http\Controllers\Period\PeriodSetController::class);

//

Route::get('/CONFIGURATIONS', App\Http\Controllers\Configuration\ConfigurationController::class);
Route::post('/CONFIGURATIONS', App\Http\Controllers\Configuration\SubmitConfigurationController::class);

//

Route::get('/CART', App\Http\Controllers\Cart\CartController::class);
Route::get('/CART/{KEY}/REMOVE', App\Http\Controllers\Cart\CartRemoveController::class);

//

Route::middleware('TOKEN')->group(function () {
	Route::middleware(['Personnel'])->group(function () {
		Route::get('/USERS', [App\Http\Controllers\User\UserController::class, 'INDEX']);
	});

	Route::middleware(['Admin'])->group(function () {
		Route::post('/USERS', [App\Http\Controllers\User\UserController::class, 'STORE']);

		Route::put('/USERS/{UUID}', [App\Http\Controllers\User\UserController::class, 'UPDATE']);
	});

	Route::middleware(['SuperAdmin'])->group(function () {
		Route::delete('/USERS/{UUID}', [App\Http\Controllers\User\UserController::class, 'DESTROY']);

		Route::post('/USERS/{UUID}/PASSWORD', [App\Http\Controllers\User\UserController::class, 'PASSWORD']);
	});
});
