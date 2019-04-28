<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PostController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request,$shortNameProject)
    {
        $projectId = $request->input('project_id');
        $postContent = $request->input('description');
        $postPrivacy = $request->input('privacy');
        $postCategory = $request->input('category');

        $id = DB::table('posts')->insertGetId(
            array(  'user_id' => Auth::user()->id, 
                    'project_id' => $projectId,
                    'description' => $postContent,
                    'category' => $postCategory,
                    'privacy' => $postPrivacy,
                    'created_at' => new \DateTime(),
                    'state' => 1)
        );

        return redirect('/project/'.$shortNameProject.'?'.$id);
    }
}
