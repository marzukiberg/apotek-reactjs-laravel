<?php

use App\Http\Controllers\DrugController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return response(['message' => 'welcome to apotek\'s api', 'routes' => ['/drugs', '/purchases', '/sales', '/suppliers', '/units']]);
});

Route::get("drugs/last_row",[DrugController::class, 'last_row']);

Route::resources([
    'drugs' => DrugController::class,
    'purchases' => PurchaseController::class,
    'sales' => SaleController::class,
    'suppliers' => SupplierController::class,
    'units' => UnitController::class
]);
