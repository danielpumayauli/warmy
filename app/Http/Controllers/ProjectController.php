<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $membersIds = array();
        $publicInfo = DB::select("SELECT * FROM projects
        where shortName = '".$id."'");
        $members = DB::select("SELECT u.id, u.name, u.lastName,u.image FROM users u
        inner join project_user pu on u.id = pu.user_id
        and pu.project_id = ".$publicInfo[0]->id);
        $posts = DB::select("SELECT p.id,p.description,p.category,p.privacy,u.name,u.lastName,u.image 
                            FROM posts p inner join users u on u.id = p.user_id 
                            where project_id = ".$publicInfo[0]->id." 
                            order by p.id desc");

        foreach ($members as $member) {
            $membersIds[] = $member->id;
        }
        if(isset(Auth::user()->id)){
            $userInProject = in_array(Auth::user()->id,$membersIds);
        }else{
            $userInProject = false;
        }
        // dd($membersIds,Auth::user()->id,$members,$userInProject);
        return view('public.project')->with(compact('id','publicInfo','members','userInProject','posts'));
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

    /**
     * Register the specified user id on project selected.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function registerUser(Request $request)
    {
        $projectSelected = $request->input('project_id');
        $user = $request->input('user_id');

        DB::table('project_requests')->insert(
            array('project_id' => $projectSelected, 
                    'user_id' => $user,
                    'state' => 0)
        );

        return redirect('/other-circles');
    }

    /* PARA CUANDO SE ACEPTE LA SOLICITUD DE UN USUARIO A UN PROYECTO*/

    public function approveUser(Request $request)
    {
        $requestId = $request->input('input_request_id');
        $projectId = $request->input('input_project_id');
        $userId = $request->input('input_user_id');
        $userApproved = $request->input('input_user_approved');



            $id = DB::table('project_user')->insertGetId(
                ['user_id' => $userId, 'project_id' => $projectId]
            );
            if(isset($id)){
                DB::table('project_requests')
                    ->where('id', $requestId)
                    ->update([  'state' => 1,
                                'responded_by' => $userApproved]);
                DB::table('projects')->where('id', $projectId)->increment('participants');
            }

        return redirect('/my-circles');
    }
}
