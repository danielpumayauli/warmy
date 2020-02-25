<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Form3Controller extends Controller
{
    public function index(){
        return view('public.form3');
    }

    public function store(Request $request)
    {
        $nombreEmpresa = trim($request->input('nombreEmpresa'));
        $ceo = trim($request->input('ceo'));
        $cantMujeres = trim($request->input('cantMujeres'));
        $cantHombres = trim($request->input('cantHombres'));

        $projectId = DB::table('temporal_projects')->insertGetId(
            array('name' => $nombreEmpresa,
                  //'image' => (($fileName != '' && $moved == true) ? $fileName : null)
                'female_ceo' => $ceo,
                'quantity_female' => $cantMujeres,
                'quantity_male' => $cantHombres,
                'created_at' => new \dateTime,
                'updated_at' => new \dateTime)
      );


        echo json_encode([
            'success' => 1,
            'projectId' => $projectId
        ]);
    }
}
