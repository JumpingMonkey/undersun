<?php

use App\Http\Controllers\PagePartsController;
use App\Http\Controllers\Pages\ActivitiesServiceController;
use App\Http\Controllers\Pages\MainPageController;
use App\Http\Controllers\Pages\PrivatPolicyController;
use App\Http\Controllers\RoomController;
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

Route::middleware('locale')->group(function (){
    Route::get('/parts', [PagePartsController::class, 'index']);
    Route::get('/main', [MainPageController::class, 'index']);
    Route::get('/rooms', [RoomController::class, 'index']);
    Route::get('/rooms/{room:room_link}', [RoomController::class, 'show']);
    Route::get('/activities', [ActivitiesServiceController::class, 'index']);
    Route::get('/policy', [PrivatPolicyController::class, 'index']);
});
