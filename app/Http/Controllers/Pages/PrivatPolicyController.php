<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\PrivatPolicyModel;
use Illuminate\Http\Request;

class PrivatPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $content = PrivatPolicyModel::getPolicyPage();

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }
}
