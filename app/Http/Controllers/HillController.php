<?php

namespace App\Http\Controllers;

use App\Models\Hill;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HillController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render(
            'Hills/Index',
            [
                'hills' => Hill::all()
            ]
        );
    }
}
