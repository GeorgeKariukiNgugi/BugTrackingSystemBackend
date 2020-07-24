<?php

namespace App\Http\Controllers;

use App\ApplicationLead;
use Illuminate\Http\Request;
use App\Http\Resources\ApplicationLeadResource;
use App\Http\Requests\AddingApplicationLead;
use App\Http\Requests\UpdatingApplicationLead;
use App\Http\Resources\ApplicationLeadResourceCollection;

class ApplicationLeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApplicationLeadResourceCollection::collection(ApplicationLead::all());
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
    public function store(AddingApplicationLead $request)
    {
        //! storing the application leads.         
        $applicationLead = new ApplicationLead();
        $applicationLead->userId= $request->userId;
        $applicationLead->applicationId= $request->applicationId;
        $applicationLead->typeOfLead= $request->typeOfLead;

        $applicationLead->save();

        // ! assigning the role to the user. 
        $applicationLead->applicationLeadIsAUser->assignRole('technicalLead'); 

        return response('Successfully Added Application Lead',200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ApplicationLead  $applicationLead
     * @return \Illuminate\Http\Response
     */
    public function show( $applicationLead)
    {
        //! getting a single application Lead. 

        $applicationLead = ApplicationLead::where('id',$applicationLead)->first();
        return new ApplicationLeadResource($applicationLead);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ApplicationLead  $applicationLead
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationLead $applicationLead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApplicationLead  $applicationLead
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatingApplicationLead $request,  $applicationLead)
    {
        //! updating an application Lead. 
        $applicationLead = ApplicationLead::where('id',$applicationLead)->first();
        $applicationLead->update($request->all());

        return response('The application Lead Has Been Updated Successfully.',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApplicationLead  $applicationLead
     * @return \Illuminate\Http\Response
     */
    public function destroy( $applicationLead)
    {
        //! deleting an application Lead.  
        $applicationLead = ApplicationLead::where('id',$applicationLead)->first();
        $applicationLead->delete();

        return response('The Application Lead has successfully been deleted.',200);

    }
}
