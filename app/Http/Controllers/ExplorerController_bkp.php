<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; 
use App\Project;

class ExplorerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = DB::select('SELECT p.*, c.name AS circle_name,pr.state AS request_state
                            FROM projects p
                            LEFT JOIN circle_project cp ON p.id = cp.project_id
                            LEFT JOIN circles c ON c.id = cp.circle_id
                            LEFT JOIN project_requests pr on pr.project_id = p.id and pr.user_id =  '.auth()->user()->id.'
                            WHERE p.id NOT IN (SELECT project_id FROM project_user WHERE user_id = '.auth()->user()->id.' GROUP BY project_id)');

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

        $groups = $this->groupByCategory($projects);

        //dd($groups);
        

        return view('other-circles')->with(compact('groups','request_projects','numRequest'));
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

    protected function groupByCategory($projects)
    {
        $comercials = $laborals = $socials = $startups = $groups = array();
        foreach($projects as $project){
            switch ($project->circle_name) {
                case 'Comercial':
                    $comercials[] = $project;
                break;
                case 'Laboral':
                    $laborals[] = $project;
                break;
                case 'Social':
                    $socials[] = $project;
                break;
                case 'StartUp':
                    $startups[] = $project;
                break;    
                default:
                    # code...
                    break;
            }
        }
        $groups[] = $comercials;
        $groups[] = $laborals;
        $groups[] = $socials;
        $groups[] = $startups;

        return $groups;
    }
}
