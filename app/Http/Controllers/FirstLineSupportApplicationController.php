<?php

namespace App\Http\Controllers;

use App\FirstLineSupportApplication;
use Illuminate\Http\Request;
use App\Http\Resources\FirstLineSupportResource;
use App\Http\Resources\FirstLineSupportResourceCollection;
use App\Http\Requests\UpdatingFirstLineSupport;
use App\Http\Requests\AddingFirstLineSupport;

class FirstLineSupportApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ! getting all the first line support system
        return FirstLineSupportResourceCollection::collection(FirstLineSupportApplication::all());

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
    public function store(AddingFirstLineSupport $request)
    {
        //! storing the application first line support.         
        $newFirstLineSupport = new FirstLineSupportApplication();
        $newFirstLineSupport->firstLineSupportId= $request->firstLineSupportId;
        $newFirstLineSupport->applicationId= $request->applicationId;

        $newFirstLineSupport->save();

        // ! adding the role of the firstLine Support Engineer. 

        $newFirstLineSupport->bugBelongsToUser->assignRole('firstLineSupport');

        return response('The new firstLine support  engineer has been added successfully',200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FirstLineSupportApplication  $firstLineSupportApplication
     * @return \Illuminate\Http\Response
     */
    public function show( $firstLineSupportApplication)
    {
        //! getting a single first line support individual. 
        $firstLineSupportApplication = FirstLineSupportApplication::where('id',$firstLineSupportApplication)->first();
        return new FirstLineSupportResource($firstLineSupportApplication);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FirstLineSupportApplication  $firstLineSupportApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(FirstLineSupportApplication $firstLineSupportApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FirstLineSupportApplication  $firstLineSupportApplication
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatingFirstLineSupport $request, $firstLineSupportApplication)
    {
        //
        
        $firstLineSupportApplication = FirstLineSupportApplication::where('id',$firstLineSupportApplication)->first();
        
        $firstLineSupportApplication->update($request->all());

        return response('Update Successful.',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FirstLineSupportApplication  $firstLineSupportApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy($firstLineSupportApplication)
    {
        //
        $firstLineSupportApplication = FirstLineSupportApplication::where('id',$firstLineSupportApplication)->first();
        $firstLineSupportApplication->delete();
        return response('Deleting Successful',200);
    }
}
