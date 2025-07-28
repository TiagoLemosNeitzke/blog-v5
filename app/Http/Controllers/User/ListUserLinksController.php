<?php

namespace App\Http\Controllers\User;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListUserLinksController extends Controller
{
    public function __invoke(Request $request) : View
    {
        return view('user.links', [
            'links' => $request->user()->links()->paginate(10),
        ]);
    }
}
