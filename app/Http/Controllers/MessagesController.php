<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $contacts = DB::select("SELECT pu2.project_id, p2.name as project_name,u2.id, u2.name, u2.lastName,u2.image,u2.email
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
        // Mensajes hard
        $mensajes = DB::select("SELECT * FROM 
                            (SELECT user_transmitter_id as emisor_id,
                            user_receiver_id as receptor_id,
                            message as mensaje,
                            created_at as fecha,
                            null as contacto,
                            null as imagen_contacto
                            FROM messages
                            WHERE user_transmitter_id = 1
                            and user_receiver_id = 2
                            UNION
                            SELECT m.user_transmitter_id,
                            m.user_receiver_id,
                            m.message,
                            m.created_at,
                            u.name,
                            u.image 
                            FROM messages m
                            INNER JOIN users u ON u.id = m.user_transmitter_id
                            WHERE m.user_transmitter_id = 2
                            and m.user_receiver_id = 1) messages
                            ORDER BY fecha ASC");
        // dd($mensajes);
        $numRequest = sizeof($request_projects);

        return view('messages')->with(compact('request_projects','numRequest','contacts','mensajes'));
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
