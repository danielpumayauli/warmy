<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use DB; 
use App\Project;
use App\Circle;
use App\User;
use Auth;

use Illuminate\Validation\Rule;

class CircleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = auth()->user()->projects->join('circle_project', 'circle_project.id', '=', 'circles.id');
        
        $projects = DB::table('projects')
                    ->select('projects.id AS project_id','projects.name AS project_name','projects.shortName AS project_shortName','projects.participants AS project_participants',
                            'circles.name AS circle_name')
                    ->join('project_user', 'project_user.project_id', '=', 'projects.id')
                    ->leftJoin('circle_project','circle_project.project_id','=','projects.id')
                    ->leftJoin('circles','circles.id','=','circle_project.circle_id')
                    ->where('project_user.user_id',auth()->user()->id)
                    ->get();
                    // ->toSQL();
        // dd($projects);
        
        $usersProjects = DB::select('select pp.project_id,u.id,u.name,u.lastName,u.image from 
                                    (select pu.project_id 
                                    from project_user pu
                                    where pu.user_id = '.auth()->user()->id.'
                                    group by pu.project_id) pp
                                    left join project_user pu2 on pu2.project_id = pp.project_id
                                    left join users u on u.id = pu2.user_id');

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
    
        return view('circles')->with(compact('projects','usersProjects','request_projects','numRequest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $warmy_categories = Circle::where('is_active', true)->pluck('name', 'id');

        // $warmy_categories = DB::select("SELECT id, name from circles");

        // dd($warm_categories);

        return view('circle.create',compact('warmy_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->name = preg_replace('/\s+/', ' ', $request->name);
        $this->validate($request, [
            'name' => [
                'max:255',
                    Rule::unique('projects')->where(function ($query) {
                    return $query->where('is_active', 1);
                }),
            ],
        ]);

        // crear func para obtener su image (null), y shortname
        
        $warmy_data['name'] = $request->name;
        $warmy_data['description'] = $request->description;
        $warmy_data['goals'] = $request->goals;
        $warmy_data['circle_id'] = $request->circle_id;
        $warmy_data['is_active'] = true;
        $user_id=Auth::user()->id;
        $warmy_data['user_id'] = $user_id;

   

       $projectNew = Project::create($warmy_data);

       // Insertando en tabla circle_project (para cuando un proyecto pertenezca a varios circulos)        
       $newProjectInCircle = DB::table('circle_project')->insertGetId(
        array('project_id' => $projectNew->id, 
                'circle_id' => $request->circle_id,
                'created_at' => new \dateTime,
                'updated_at' => new \dateTime )
        );

       // Insertando en tabla project_user al creador (primer miembro)
       $id = DB::table('project_user')->insertGetId(
            array('user_id' => Auth::user()->id, 
                    'project_id' => $projectNew->id)
        );

        //Se incrementa la cantidad de parcipantes
        DB::table('projects')
                ->where('id', $projectNew->id)
                ->update(['participants' => 1]);

        return redirect('my-circles')->with('message', 'Data inserted successfully');
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
