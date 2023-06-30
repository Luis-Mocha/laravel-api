<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

use App\Models\Admin\Type;


class TypeController extends Controller
{
    public function index() {

        $types = Type::All();

        return response()->json(
            [
                'success' => true,
                'types' => $types
            ]
        );

    }
}
