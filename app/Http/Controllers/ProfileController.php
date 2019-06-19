<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB; 

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = DB::select("SELECT pu2.project_id, p2.name as project_name, u2.name, u2.lastName,u2.image,u2.email
                                FROM users u2
                                inner join project_user pu2 on pu2.user_id = u2.id
                                inner join projects p2 on p2.id = pu2.project_id
                                where pu2.project_id IN
                                
                                (SELECT p.id 
                                from projects p
                                inner join project_user pu on pu.project_id = p.id
                                inner join users u on u.id = pu.user_id
                                and u.id = ".auth()->user()->id.") 
                                and u2.id <> ".auth()->user()->id."
                                group by pu2.id,u2.id
                                order by u2.name, u2.lastName");

        $projects = DB::select("SELECT p.id,p.name,p.shortName,c.name as circle_name
                                FROM projects p
                                INNER JOIN circle_project cp on cp.project_id = p.id
                                INNER JOIN circles c on c.id = cp.circle_id
                                INNER JOIN project_user pu on pu.project_id = p.id
                                INNER JOIN users u on u.id = pu.user_id
                                AND u.id = ".auth()->user()->id);
        
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
        $numContacts = sizeof($contacts);
        $numProjects = sizeof($projects);
        $numRequest = sizeof($request_projects);
        
        
        return view('profile')->with(compact('contacts','projects','request_projects','numContacts','numProjects','numRequest'));
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

    public function test(Request $request)
    {
        $dato = $request->input('test');

        echo json_encode("se devolvio $dato del servidor");
    }
}
