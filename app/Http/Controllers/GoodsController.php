<?php

namespace App\Http\Controllers;

use App\Good;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function showAction(Request $request)
    {
        if ($request->ajax()) {
            return Good::select('id', 'title', 'description')->where('id', $request->id)->first();
        }
    }
}
