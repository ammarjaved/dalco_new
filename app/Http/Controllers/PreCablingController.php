<?php

namespace App\Http\Controllers;

use App\Models\PreCabling;
use App\Models\SiteSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\SiteVisitRepository;
use App\Models\ToolBoxTalk;


class PreCablingController extends Controller
{

    private $siteRepository;

    public function __construct(SiteVisitRepository $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = SiteSurvey::with(['PreCabling', 'PreCablingShutDown','ToolBoxTalk'])->get();

      //  return $data;
                
        return view('PreCabling.index', ['surveys' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $sitesurveydata = SiteSurvey::find($id);
       // return  $sitesurveydata;

        return view('PreCabling.create', ['site_survey_id' => $id,'site_survey' => $id,'nama_pe'=> $sitesurveydata->nama_pe]);
    }


    public function createToolboxTalk($id)
    {
        $sitesurveydata = SiteSurvey::find($id);
        $site_survey=$id;


      // return compact('sitesurveydata');

        return view('PreCabling.toolboxtalk',compact('sitesurveydata','site_survey'));
    }


    public function editToolboxTalk($id)
    {
        $toolboxtalk = ToolBoxTalk::find($id);
        //   return  $toolboxtalk;
        $site_survey=$toolboxtalk->site_survey_id;

       // return $toolboxtalk;

       // $toolboxtalk = ToolBoxTalk::where('site_survey_id',$id)->where('skop_kerja','=','CABLING')->get()[0] ;

      // return compact('sitesurveydata');

     // return  $toolboxtalk;

        return view('PreCabling.toolboxtalkedit',compact('toolboxtalk','site_survey'));
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
            //  return  $request;
            $request['created_by'] = Auth::user()->name;
           $precable_id= PreCabling::create($request->all());
          
            
        } catch (\Throwable $th) {
            return redirect()->route('pre-cabling.create')->with('failed', 'Request Failed');
        }

        return redirect()->route ('pre-cabling.edit',$precable_id->id)->with('success', 'Request Success');
    }



    public function storeToolboxtalk(Request $request)
    {
        try {
            $usr_info = Auth::user();
            // Add the toolboxtalk using the repository method
            $toolbox = $this->siteRepository->addToolBoxTalk($request, $request->site_survey_id, $request->nama_pe, $usr_info);
            $site_survey = SiteSurvey::find( $request->site_survey_id);
            $site_survey->overall_status='cabling';
            $site_survey->save();
            // Create the toolboxtalk record
            $toolboxTalk = ToolBoxTalk::create($toolbox);

     
            // Redirect to the PreCabling.toolboxtalkedit route with the ID of the created toolbox talk
            return redirect()->route('PreCabling.toolboxtalkedit', ['id' => $toolboxTalk->id])
                             ->with('success', 'Request Success');
        } catch (\Throwable $th) {
            // If there's an error, redirect to pre-cabling.index with a failure message
            return redirect()->route('pre-cabling.index')->with('failed', 'Request Failed');
        }
    }


    public function updateToolboxtalk(Request $request, $id)
{
    try {
        $usr_info = Auth::user();
        
        // Update the toolbox talk using the repository method
        $toolbox = $this->siteRepository->updateToolBoxTalk($request, $id, $usr_info);

        // Update or create the toolbox talk
        ToolBoxTalk::updateOrCreate(
            ['id' => $id],
            $toolbox
        );     

        // Redirect to the PreCabling.toolboxtalkedit route with the updated toolbox talk ID
        return redirect()->route('PreCabling.toolboxtalkedit', ['id' => $id])
                         ->with('success', 'Request Success');
    } catch (\Throwable $th) {
        // If there's an error, redirect to pre-cabling.index with a failure message
        return redirect()->route('pre-cabling.index')->with('failed', 'Request Failed');
    }
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
        //return $id;
        $piw = PreCabling::find($id);
        return $piw ? view('PreCabling.create', ['site_survey' => $piw->site_survey_id,'piw' => $piw]) : abort(404);
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
            $preCabling = PreCabling::find($id);
            
            if (!$preCabling) {
                abort(404);
            }
            $preCabling->update($request->all());
        } catch (\Throwable $th) {
            return redirect()->route('pre-cabling.index')->with('failed', 'Request Failed');
        }

        return redirect()->route('pre-cabling.edit',$preCabling->id)->with('success', 'Request Success');
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
        try {
            $piw = PreCabling::findOrFail($id); 
           
            $piw->delete();
            

        } catch (\Throwable $th) {
            return redirect()->route('pre-cabling.index')->with('failed', 'Request Failed');
        }
        

        return redirect()->route('pre-cabling-piw.create',$piw->site_survey_id)->with('success', 'Request Success');
    }

    public function destroyToolboxTalk($id)
{
    try {
        // Find and delete the ToolBoxTalk by ID
        $toolBoxTalk = ToolBoxTalk::findOrFail($id);
        $toolBoxTalk->delete();

        // Redirect to the PreCabling.toolboxtalk route with the same ID after deletion
        return redirect()->route('PreCabling.toolboxtalk', ['id' => $id])
                         ->with('success', 'ToolBoxTalk deleted successfully');
    } catch (\Throwable $th) {
        // Handle any failure in deletion
        return redirect()->route('pre-cabling.index')->with('failed', 'Failed to delete ToolBoxTalk');
    }
}


}
