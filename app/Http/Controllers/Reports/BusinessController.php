<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\TemporalProject;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::select('SELECT * FROM temporal_projects');

        return view('public.report')->with(compact('companies'));
    }

    /**
     * Download the resource from $id temporal_project
     *
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $project = TemporalProject::find($id);
        // dd($project->name);
        $name = $project->name;
        $cantMujeres = $project->quantity_female;
        $cantHombres = $project->quantity_male;
        $ceo = $project->female_ceo;

        $pdf = \PDF::loadView('pdf/company',compact('name','cantMujeres','cantHombres','ceo'));
        // // dd('descargare el id '. $id);
        return $pdf->download('report.pdf');
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
