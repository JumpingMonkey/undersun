<?php

namespace App\Http\Controllers;

use App\Models\Parts\FooterModel;
use App\Models\Parts\HeaderModel;
use Illuminate\Http\Request;

class PagePartsController extends Controller
{
    public function index()
    {
        $header = HeaderModel::getHeader();
        $footer = FooterModel::getFooter();

        return response()->json([
            'status' => 'success',
            'header' => $header,
            'footer' => $footer,
        ]);
    }
}
