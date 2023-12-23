<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{

    public function store(Request $request, Url $url)
    {
        $url = $url->short_url($request->long_url);
        return response()->json([
            'short_url' => url('/') . '/' . $url
        ]);
    }
}
