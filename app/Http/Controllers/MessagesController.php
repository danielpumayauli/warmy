<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMessage(Request $request)
    {
        $textMessage = (string)$request->input('textMessage');
        $destiner = (string)$request->input('destiner');
        $data['message'] = null;
        $data['html'] = null;
        $id = null;

        // Insert

        try{
            $id = DB::table('messages')->insertGetId(
                array('user_transmitter_id' => Auth::user()->id, 
                        'user_receiver_id' => $destiner,
                        'message' => $textMessage,
                        'created_at' => new \dateTime,
                        'updated_at' => new \dateTime)
            );
        }catch(\Exception $e){
            $data['message'] = $e->getMessage();

        }finally{
            $data['idMessage'] = $id;
        }
        if($id){
            $data['html'] = $this->createHistoryChat($destiner,null);        
        }

        echo json_encode($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $receiver = $request->input('receiver');
        $nameReceiver = $request->input('nameReceiver');

        $data['html']       = $this->createHistoryChat($receiver,$nameReceiver);
        $data['receiver']   = $receiver;
        $data['nameReceiver']   = $nameReceiver;

        echo json_encode($data);
    }

    public function findUser(Request $request)
    {
        $busqueda = (string)$request->input('busqueda');
        $data['error'] = 1;
        $data['html'] = '';

        $results = DB::select("SELECT pu2.project_id, p2.name as project_name,u2.id, u2.name, u2.lastName,u2.image,u2.email
                                FROM users u2
                                inner join project_user pu2 on pu2.user_id = u2.id
                                inner join projects p2 on p2.id = pu2.project_id
                                where pu2.project_id IN
                                
                                (SELECT p.id 
                                from projects p
                                inner join project_user pu on pu.project_id = p.id
                                inner join users u on u.id = pu.user_id
                                and u.id = 1) 
                                and u2.id <> 1
                                
                                and (u2.name like '%{$busqueda}%' OR u2.lastName LIKE '%{$busqueda}%')

                                group by pu2.id,u2.id
                                order by u2.name, u2.lastName");
        if(isset($results)){
            $data['error'] = 0;
            $data['html'] = $this->drawContacts($results);
        }

        echo json_encode($data);
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

    public function createHistoryChat($destiner,$nameReceiver)
    {
        $html = '';
        $mensajes = DB::select("SELECT * FROM 
                            (SELECT user_transmitter_id as emisor_id,
                            user_receiver_id as receptor_id,
                            message as mensaje,
                            created_at as fecha,
                            DATE_FORMAT(DATE_SUB(created_at,interval 5 hour),'%d-%m-%Y') AS dia,
                            DATE_FORMAT(DATE_SUB(created_at,interval 5 hour),'%H:%i') AS hora,
                            null as contacto,
                            null as imagen_contacto
                            FROM messages
                            WHERE user_transmitter_id = ".Auth::user()->id."
                            and user_receiver_id = {$destiner}
                            UNION
                            SELECT m.user_transmitter_id,
                            m.user_receiver_id,
                            m.message,
                            m.created_at,
                            DATE_FORMAT(DATE_SUB(m.created_at,interval 5 hour),'%d-%m-%Y') AS dia,
                            DATE_FORMAT(DATE_SUB(m.created_at,interval 5 hour),'%H:%i') AS hora,
                            u.name,
                            u.image 
                            FROM messages m
                            INNER JOIN users u ON u.id = m.user_transmitter_id
                            WHERE m.user_transmitter_id = {$destiner}
                            and m.user_receiver_id = ".Auth::user()->id.") messages
                            ORDER BY fecha ASC");
        if(sizeof($mensajes) > 0){
            foreach ($mensajes as $mensaje) {
                if (Auth::user()->id === $mensaje->emisor_id) {
                    $html .= '
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                        <p>'.$mensaje->mensaje.'</p>
                        <span class="time_date">'.$mensaje->hora.' | '.$mensaje->dia.'</span> </div>
                    </div>';
                }else {
                    $html .= '
                    <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="'.$mensaje->imagen_contacto.'" alt="'.$mensaje->contacto.'" title="'.$mensaje->contacto.'"> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                            <p>'.$mensaje->mensaje.'</p>
                            <span class="time_date">'.$mensaje->hora.' | '.$mensaje->dia.'</span></div>
                        </div>
                    </div>';
                }
            }
        }else{
            $html .= '
                    <div style="width=100%; text-align:center;">
                        <p>Escriba su primer mensaje a <strong>'.$nameReceiver.'</strong></p>
                    </div>';
        }
            
        return $html;
        
    }

    public function drawContacts($results)
    {
        if($results){
            $html = '';
            foreach($results as $result){
                $html .= '<div class="chat_list" onclick="refreshChat('.$result->id.',\''.$result->name .' '. $result->lastName .'\')" style="cursor: pointer;">
                            <div class="chat_people">
                            <div class="chat_img"> <img src="'.$result->image .'" alt="'. $result->name.'" title="'.$result->name.'"> </div>
                            <div class="chat_ib">
                                <h5>'.$result->name.' '.$result->lastName.'<span class="chat_date">...</span></h5>
                            </div>
                            </div>
                        </div>';
            }
        }else{
            $html = 'No se encontraron resultados.';
        }

        return $html;
    }
}
