<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// importo il modello
use App\Models\Admin\Project;

class ProjectController extends Controller
{
    public function index(Request $request) {
        // $projects = Project::all();

        // $projects = Project::with('type', 'technologies')->paginate(4);

        // if( $request->has('type_id') ) {
        //     $projects = Project::with('type', 'technologies')->where('type_id', $request->type_id)->paginate(4);
        // } else {
        //     $projects = Project::with('type', 'technologies')->paginate(4);
        // };

        // return response()->json([
        //     'success' => true,
        //     'projects' => $projects
        // ]);


        $query = Project::with(['type', 'technologies']);

        if ($request->has('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        if ($request->has('technologies_ids')) {
            $techIds = explode( ',', $request->technologies_ids);

            $query->whereHas('technologies', function($query) use ($techIds) {
                $query->whereIn('id', $techIds);
            });
        }

        $projects = $query->paginate(4);

        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);

    }


    public function show($slug) {

        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();

        if($project) {
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Non risulta alcun post'
            ])->setStatusCode(404);
        }

        
    }
}
