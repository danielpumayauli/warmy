<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table('projects')
                        ->select(   'circles.name AS circle_name',
                                    'projects.id AS project_id',
                                    'projects.name AS project_name',
                                    'projects.shortName AS project_shortName',
                                    'projects.description AS project_description',
                                    'projects.goals AS project_goals',
                                    'projects.participants AS project_participants'
                                )
                        ->join('project_user', 'project_user.project_id', '=', 'projects.id')
                        
                        ->leftJoin('circle_project','circle_project.project_id','=','projects.id')
                        ->leftJoin('circles','circles.id','=','circle_project.circle_id')
                        ->where('project_user.user_id',auth()->user()->id)
                        ->orderBy('circle_name')
                        ->get();
                    //->toSQL();
       // dd($projects);

       $circles = DB::table('projects')
                        ->select(   'circles.name AS circle_name')
                        ->join('project_user', 'project_user.project_id', '=', 'projects.id')                        
                        ->leftJoin('circle_project','circle_project.project_id','=','projects.id')
                        ->leftJoin('circles','circles.id','=','circle_project.circle_id')
                        ->where('project_user.user_id',auth()->user()->id)
                        ->groupBy('circle_name')
                        ->orderBy('circle_name')
                        ->get();

        $request_projects = DB::select("SELECT pr.id AS request_id, 
                                    pr.project_id as project_id, 
                                    pr.user_id as user_id, 
                                    p.name as project_name, 
                                    p.image as project_image, 
                                    p.shortName as project_shortName, 
                                    u.name as user_name, 
                                    u.lastName user_lastName, 
                                    u.email AS user_email, 
                                    u.career AS user_career, 
                                    u.image AS user_image,
                                    u.lookingFor as user_looking 
                            FROM project_requests pr INNER JOIN projects p ON p.id = pr.project_id INNER JOIN users u ON u.id = pr.user_id 
                            WHERE pr.project_id IN (SELECT project_id FROM project_user WHERE user_id = ".auth()->user()->id." GROUP BY project_id) AND pr.state = 0 
                            ");
        $numRequest = sizeof($request_projects);


       

        return view('activity')->with(compact('projects','circles','request_projects','numRequest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
