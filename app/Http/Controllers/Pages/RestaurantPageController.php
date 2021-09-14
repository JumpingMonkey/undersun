<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\RestaurantPageModel;
use Illuminate\Http\Request;

class RestaurantPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $content = RestaurantPageModel::getRestaurantPage();

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }
}
