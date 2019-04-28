<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FormController extends Controller
{
    public function index()
    {   
        return view('public.form');
    }
    public function store(Request $request)
    {   
        $name = $request->input('input-client');
        $category = $request->input('input-category');
        $fileName = '';
        $moved = false;
        //Recoger en una variable la imagen en el proyecto temporalmente
        if($request->file('photo-project') != null){
            $file = $request->file('photo-project');
            $path = public_path() . '/projects';
            $fileName = '/projects/'.uniqid() .'_'. $this->cleanUpperName($file->getClientOriginalName());
            $moved = $file->move($path, $fileName);
        }


            $id = DB::table('temporal_projects')->insertGetId(
                array('name' => $name, 
                        'category' => $category,
                        'image' => (($fileName != '' && $moved == true) ? $fileName : null) )
            );
            $project = DB::table('temporal_projects')->where('id', $id)->first();
    	echo json_encode($project);
    }
    public function storeMember(Request $request)
    {
        $member = $request->input('input-member');
        $role = $request->input('input-role');
        // $gender = $request->input('input-gender');
        $gender = 'Femenino';
        $project = $request->input('input-block');
        $data = array();

        $id = DB::table('temporal_members')->insertGetId(
            array('temporal_project_id' => $project, 
                    'fullname' => $member,
                    'role' => $role,
                    'gender' => $gender)
        );

        

        $member = DB::table('temporal_members')->where('id', $id)->first();
        $members = DB::select("SELECT role
                            FROM temporal_members
                            where temporal_project_id = ".$project." 
                            order by id");
        $data['member'] = $member;
        $data['members'] = $members;

        echo json_encode($data);
    }

    protected function cleanUpperName($name)
    {
      $characters = array("CURSO BASE: ","CURSO BASE2: ", " ", "-", "_", "+", ":","¿","?","Ñ","ñ");
      $name = strtoupper(str_replace($characters, "", $name));
      $name = str_replace('Ó','O',$name);
      $name = str_replace('Í','I',$name);
      $name = str_replace('Á','A',$name);
      $name = str_replace('É','E',$name);
      $name = str_replace('Ú','U',$name);
      return $name;
    }
    
}
