<?php

namespace App\Http\Controllers;

use App\Models\RoomModel;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $content = RoomModel::getAllRooms();

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }

    public function show(RoomModel $room)
    {

        $content = RoomModel::getCurrentRoom($room);

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }
}
