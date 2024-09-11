<?php

namespace App\Http\Controllers;

use App\Models\PreCablingShutDown;
use App\Models\SiteSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreCablingShutDownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $nama_pe = SiteSurvey::findOrFail($id)->nama_pe;
        return view('PreCablingShutDown.create', ['site_survey_id' => $id,'site_survey' => $id,'nama_pe'=>$nama_pe]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //code...

            $request['created_by'] = Auth::user()->name;
            $preshutdown_id= PreCablingShutDown::create($request->all());

        } catch (\Throwable $th) {
            return redirect()->route('pre-cabling.index')->with('failed', 'Request Failed');

        }

        return redirect()->route('pre-cabling-shut-down.edit',$preshutdown_id->id)->with('success', 'Request Success');
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
        $piw = PreCablingShutDown::find($id);
        return $piw ? view('PreCablingShutDown.create',['site_survey' => $piw->site_survey_id,'piw'=>$piw]) : abort(404);
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
        try {
 
            $preCabling = PreCablingShutDown::find($id);
            if (!$preCabling) {
                 abort(404);
            }
                 $preCabling->update($request->all());
 
         } catch (\Throwable $th) {
             return redirect()->route('pre-cabling.index')->with('failed', 'Request Failed');
 
         }
 
         return redirect()->route('pre-cabling-shut-down.edit', $preCabling->id)->with('success', 'Request Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    try {
        // Find the record and get the site_survey_id before deleting
        $shutDown = PreCablingShutDown::findOrFail($id);
        $siteSurveyId = $shutDown->site_survey_id; // Save the site survey ID

        // Delete the shutdown record
        $shutDown->delete();
    } catch (\Throwable $th) {
        return redirect()->route('pre-cabling.index')->with('failed', 'Request Failed');
    }

    // Redirect using the site_survey_id instead of the deleted shutdown id
    return redirect()->route('pre-cabling-shut-down.create', $siteSurveyId)->with('success', 'Request Success');
}

    
}
