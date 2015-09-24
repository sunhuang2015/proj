<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectFile;
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
        $projects=Project::with('company','step')->get();
       return view('project.index',compact('projects'));
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
    public function store(Requests\ProjectRequest $request)
    {
        //
        $data=$request->except('_token');
        $project_id=Project::create($data)->id;

        if($request->hasFile('project_file')){
            $date=Carbon::now()->timestamp;
            $filename= trim($request->get('req'))."_".$date.'.'.$request->file('project_file')->getClientOriginalExtension();
            $path=base_path().'/public/up/INIT/';
            $request->file('project_file')->move($path,$filename);
            $projectfile=new ProjectFile();
            $projectfile->project_id=$project_id;
            $projectfile->project_file=$path.$filename;
            $projectfile->step_id=1;
            $projectfile->save();
        }
       // return back();
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
