<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function index() {

        $technologies = Technology::All();

        return response()->json(
            [
                'success' => true,
                'technologies' => $technologies
            ]
        );

    }
}
