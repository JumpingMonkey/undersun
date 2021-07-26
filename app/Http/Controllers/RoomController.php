<?php

namespace App\Http\Controllers;

use App\Models\Pages\AllRoomsPageModel;
use App\Models\RoomModel;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $roomsPage = AllRoomsPageModel::getAllRoomsPage();
        $rooms = RoomModel::getAllRooms(['room_link', 'room_preview_image', 'room_name_full', 'room_area', 'room_amount_persons', 'room_bed_size']);

        return response()->json([
            'status' => 'success',
            'rooms_page' => $roomsPage,
            'rooms' => $rooms,
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
