<?php

namespace App\Http\Controllers;

use App\Models\SAT;
use App\Models\SiteSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Repositories\SiteVisitRepository;
use App\Models\ToolBoxTalk;
use Illuminate\Support\Facades\Storage;

class SATController extends Controller
{


    private $siteRepository;

    public function __construct(SiteVisitRepository $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }

    
    // Method to list all SAT records for a specific Site Survey
    public function index()
    {
        $usr_info = \Auth::user();

        // Retrieve all Site Surveys created by the logged-in user
        // $surveys = SiteSurvey::where('created_by', $usr_info->name)->get();

        $surveys = SiteSurvey::with(['ToolBoxTalkSAT'])->get();

        // Pass the surveys to the 'SAT.index' view
        return view('SAT.index', compact('surveys'));
    }

    // Method to show the form for creating a new SAT
    public function create($id)
    {
        // Find the specific site survey by ID
        $survey = SiteSurvey::findOrFail($id);
    
        // Retrieve all SAT records related to this site survey
        $satRecords = SAT::where('site_survey_id', $id)->get();

        $site_survey=$id;
    
        // Pass the site survey and SAT records to the 'SAT.create' view
        return view('SAT.create', compact('survey', 'satRecords','site_survey'));
    }

    // Method to store a new SAT record
    public function store(Request $request) 
    {
        try {
    
            // Store the uploaded image in the 'images' directory within the 'public' disk
            $filePath = $request->file('image_url')->store('images', 'public');
    
            // Prepare data for creating a new SAT record
            $sat_data = [
                'image_name' => $request->image_name,
                'image_url' => $filePath,
                'image_type' => $request->image_type,
                'site_survey_id' => $request->site_survey_id,
                'created_by' => \Auth::user()->email,
            ];
    
            // Create a new SAT record in the database
            SAT::create($sat_data);
    
            // Redirect to the sat.create route with the site_survey_id and a success message
            return redirect()->route('sat.create', ['id' => $request->site_survey_id])
                             ->with('success', 'Image shutdown added successfully!');
        } catch (Exception $e) {
            // Redirect back to the create page with an error message
            return redirect()->route('sat.create', ['id' => $request->site_survey_id])
                             ->with('failed', 'Request Failed: ' . $e->getMessage());
        }
    }
    

public function edit($id)
{
    // Find the SAT record by ID
    $satRecord = SAT::findOrFail($id);
    $site_survey=$satRecord->site_survey_id;
    

    // Pass the SAT record to the 'SAT.edit' view
    return view('SAT.edit', compact('satRecord','site_survey'));
}

public function update(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'image_name' => 'required|string',
        'image_type' => 'required|string',
        'image_url' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation for optional file
    ]);

    // Find the record
    $satRecord = SAT::find($id);
    if (!$satRecord) {
        return redirect()->route('sat.index')->with('error', 'Record not found');
    }

    // Process the file upload
    if ($request->hasFile('image_url')) {
        $file = $request->file('image_url');
        $filename = time() . '-' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $filename, 'public'); // Save file in 'public/uploads'

        // Update the image_url field with the new file path
        $satRecord->image_url = $filePath;
    }

    // Update other fields
    $satRecord->image_name = $request->input('image_name');
    $satRecord->image_type = $request->input('image_type');
    // No need to set image_url here if no new file is uploaded
    $satRecord->save();

    // Redirect to the sat.create route with the site_survey_id from the updated record
    return redirect()->route('sat.create', ['id' => $satRecord->site_survey_id])
                     ->with('success', 'Record updated successfully');
}

public function destroy($id)
{
    try {
        // Find the SAT record by ID
        $satRecord = SAT::findOrFail($id);

        // Check if the file exists and delete it
        if ($satRecord->image_url && Storage::exists($satRecord->image_url)) {
            Storage::delete($satRecord->image_url);
        }

        // Delete the SAT record from the database
        $satRecord->delete();

        return redirect()->back()->with('success', 'Record and associated file successfully deleted.');
    } catch (\Exception $e) {
        return redirect()->back()->with('failed', 'Failed to delete record: ' . $e->getMessage());
    }
}

    public function createToolboxTalk($id)
    {
        $sitesurveydata = SiteSurvey::find($id);
        $site_survey=$id;
        

      // return compact('sitesurveydata');

        return view('SAT.toolboxtalk',compact('sitesurveydata','site_survey'));
    }

    public function editToolboxTalk($id)
    {
        $toolboxtalk = ToolBoxTalk::find($id);
        $site_survey=$toolboxtalk->site_survey_id;

       // return $toolboxtalk;

       // $toolboxtalk = ToolBoxTalk::where('site_survey_id',$id)->where('skop_kerja','=','CABLING')->get()[0] ;

      // return compact('sitesurveydata');

     // return  $toolboxtalk;

        return view('SAT.toolboxtalkedit',compact('toolboxtalk','site_survey'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function storeToolboxtalk(Request $request)
     {
         try {
             $usr_info = \Auth::user();
     
             // Add the toolbox talk using the repository
             $toolbox = $this->siteRepository->addToolBoxTalk($request, $request->site_survey_id, $request->nama_pe, $usr_info);
             
             // Create the toolbox talk record
             $newToolboxTalk = ToolBoxTalk::create($toolbox);
     
             // Redirect to the SAT.toolboxtalkedit route with the new toolbox talk ID
             return redirect()->route('SAT.toolboxtalkedit', ['id' => $newToolboxTalk->id])
                              ->with('success', 'Request Success');
         } catch (\Throwable $th) {
             // Redirect back with a failure message
             return redirect()->route('sat.index')->with('failed', 'Request Failed');
         }
     }
     
     public function updateToolboxtalk(Request $request, $id)
     {
         try {
             $usr_info = \Auth::user();
             
             // Update the toolbox talk using the repository
             $toolbox = $this->siteRepository->updateToolBoxTalk($request, $id, $usr_info);
     
             // Update or create the toolbox talk record
             ToolBoxTalk::updateOrCreate(
                 ['id' => $id],
                 $toolbox
             );
     
             
             return redirect()->route('SAT.toolboxtalkedit', ['id' => $id])
                              ->with('success', 'Request Success');
         } catch (\Throwable $th) {
             // Redirect back with a failure message if something goes wrong
             return redirect()->route('sat.index')->with('failed', 'Request Failed');
         }
     }
     
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyToolboxTalk($id)
{
    try {
        // Find the Toolbox Talk by ID
        $toolboxtalk = ToolBoxTalk::findOrFail($id);
        
        // Retrieve the site_survey_id from the Toolbox Talk record
        $siteSurveyId = $toolboxtalk->site_survey_id;
        
        // Delete the Toolbox Talk record from the database
        $toolboxtalk->delete();

        // Redirect to the SAT.toolboxtalk route with the site_survey_id
        return redirect()->route('SAT.toolboxtalk', ['id' => $siteSurveyId])
                         ->with('success', 'Toolbox Talk deleted successfully.');
    } catch (\Exception $e) {
        // Redirect back with an error message if something goes wrong
        return redirect()->route('SAT.toolboxtalk', ['id' => $siteSurveyId])
                         ->with('failed', 'Deletion failed: ' . $e->getMessage());
    }
}

    

}
