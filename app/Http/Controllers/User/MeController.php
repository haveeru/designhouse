<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeController extends Controller
{
    public function getMe()
    {
        if (auth()->check()) {
            return response()->json(["user" => auth()->user()], 200);
        }
        return response()->json(null, 401);
    }
}
