<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use App\Requests\addingAnApplication;
use App\Requests\UpdatingAnApplication;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //! getting a single application and its details. 

        $applications = Application::all();

        return response()->json($applications, 200);

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
    public function store(addingAnApplication $request)
    {
        //! adding an application. 

        $newApplication = new Application();
        $newApplication->name=$request->name;
        $newApplication->commencingDate=$request->commencingDate;
        $newApplication->currentVersion=$request->currentVersion;
        $newApplication->nextUpdate=$request->nextUpdate;

        $newApplication->save();

        return response()->json('Successfully Added New Application.', 200); 


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatingAnApplication $request, Application $application)
    {
        //
        $application->update($request->all());
        return response('Successfully Updated Application.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return response(
            'Successfully Deleted Application.', 200
        );
    }
}
