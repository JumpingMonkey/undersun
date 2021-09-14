<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\ActivitiesServicesModel;
use Illuminate\Http\Request;

class ActivitiesServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $content = ActivitiesServicesModel::getActivitiPage();

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }
}
