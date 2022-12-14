<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\MainPageModel;
use App\Models\RoomModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainPageController extends Controller
{
    public function index()
    {

        $content = MainPageModel::getMainPage();

        $rooms = RoomModel::getAllRooms(['room_link', 'room_preview_image', 'room_name_full']);

        $content['rooms_items'] = $rooms;

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);

    }
}
