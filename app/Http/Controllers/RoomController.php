<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\RoomModel;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {

        $content = RoomModel::getFullData();

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }
}
