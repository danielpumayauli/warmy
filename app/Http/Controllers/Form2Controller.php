<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Form2Controller extends Controller
{
    public function index()
    {
        return view('public.form2');
    }

    /* Se guarda el proyecto */
    public function store(Request $request)
    {
        $company = trim($request->input('company'));
        $category = ((trim($request->input('category')) !== '') ? trim($request->input('category')) : null);
        $companyt = trim($request->input('companyt'));
        $companyf = trim($request->input('companyf'));
        $participant = trim($request->input('participant'));
        $cargo = trim($request->input('cargo'));

        $projectId = DB::table('temporal_projects')->insertGetId(
              array('name' => $company,
                    'category' => $category,
                    //'image' => (($fileName != '' && $moved == true) ? $fileName : null)
                    'created_at' => new \dateTime,
                    'updated_at' => new \dateTime,
                   'total_members' => $companyt,
                   'women_members' => $companyf )
        );

        // insertar al primer usuario

        $userId = DB::table('temporal_members')->insertGetId(
              array('temporal_project_id' => $projectId,
                    'fullname' => $participant,
                    'role' => $cargo,
                    'gender' => 'F',
                    'created_at' => new \dateTime,
                    'updated_at' => new \dateTime)
        );

        $project = DB::table('temporal_projects')->where('id', $projectId)->first();

        // Respuesta final
        echo json_encode([
          'project' => $project,
          'first_member_id' => $userId
        ]);
    }

    public function registerMember(Request $request)
    {
      $idProject = $request->input('idProject');
      $participant = $request->input('participant');
      $cargo = $request->input('cargo');

      // DB::table('temporal_members')->insert(
      //     array('temporal_project_id' => $idProject,
      //             'fullname' => $participant,
      //             'role' => $cargo,
      //             'gender' => 'F'));
      //
      // // Solicitando los miembros
      // $members = DB::select("SELECT role
      //                     FROM temporal_members
      //                     where temporal_project_id = ".$project."
      //                     ORDER by id");
      


    }





}
