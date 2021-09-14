<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\SpaPageModel;
use Illuminate\Http\Request;

class SpaPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $content = SpaPageModel::getSpaPage();

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }
}
