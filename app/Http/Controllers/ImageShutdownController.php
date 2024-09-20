<?php

namespace App\Http\Controllers;

use App\Models\ImageShutdown;
use App\Models\SiteSurvey; // Ensure this is imported
use Illuminate\Http\Request;
use App\Models\ToolBoxTalk;
use Illuminate\Support\Facades\Auth;
use App\Repositories\SiteVisitRepository;

class ImageShutdownController extends Controller
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
    // Method to show the form for creating a new ImageShutdown
    public function create($id)
    {
        $survey = SiteSurvey::findOrFail($id);
        $imageShutdowns = ImageShutdown::where('site_survey_id', $id)->get(); // Get related image shutdowns

        return view('image_shutdown.create', ['survey' => $survey,'site_survey' => $id,'imageShutdowns' => $imageShutdowns  ]);
    }


    public function index()
    {
        // Fetch surveys from the database, including related ImageShutdown data
        $surveys = SiteSurvey::with(['ToolBoxTalkOutage'])->get(); // Use the correct model and relation


      //    return $surveys;

        // Return the index view with the fetched surveys
        return view('image_shutdown.index', ['surveys' =>$surveys]);

    }
    // Method to store a new ImageShutdown record
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_type' => 'required|string',
            'site_survey_id' => 'required|exists:tbl_site_survey,id',
        ]);
    
        // Handle the file upload
       // $imagePath = $request->file('image_url')->store('images/shutdown', 'public');;
       $imagePath='';
       $destinationPath = 'assets/images/';
        if ($request->hasFile('image_url')) {
            $img_ext =$request->file('image_url')->getClientOriginalExtension();
            $filename ='image_url' . '-' . strtotime(now()) . '.' . $img_ext;
            $request->file('image_url')->move($destinationPath, $filename);
           // $pictureData[$field] = $request->file($field)->store('images', 'public');
           $imagePath =$destinationPath . $filename;
        }
    
        // Create the ImageShutdown record
        ImageShutdown::create([
            'image_name' => $request->input('image_name'),
            'image_url' => $imagePath,
            'image_type' => $request->input('image_type'),
            'site_survey_id' => $request->input('site_survey_id'),
            'created_by' => auth()->user()->id, // Assuming user authentication is set up
        ]);
    
        // Redirect with success message
        return redirect()->route('image-shutdown.create',['id'=>$request->site_survey_id])->with('success', 'Image Shutdown created successfully.');
    }
    public function edit($id)
    {
        $imageShutdown = ImageShutdown::findOrFail($id);
        $site_survey=$imageShutdown->site_survey_id;
        return view('image_shutdown.edit', compact('imageShutdown','site_survey'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image_type' => 'required|string',
            // Add validation rules for other fields as needed
        ]);

        $imageShutdown = ImageShutdown::findOrFail($id);
        
        $imagePath='';
        $destinationPath = 'assets/images/';
         if ($request->hasFile('image_url')) {
             $img_ext =$request->file('image_url')->getClientOriginalExtension();
             $filename ='image_url' . '-' . strtotime(now()) . '.' . $img_ext;
             $request->file('image_url')->move($destinationPath, $filename);
            // $pictureData[$field] = $request->file($field)->store('images', 'public');
            $imagePath =$destinationPath . $filename;
         }

        $req_data=$request->all();
        $req_data['image_url']=$imagePath;
        $imageShutdown->update($req_data);

        return redirect()->route('image-shutdown.create', $imageShutdown->site_survey_id)
                         ->with('success', 'Image Shutdown updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $imageShutdown = ImageShutdown::findOrFail($id);
        $imageShutdown->delete();

        return redirect()->route('image-shutdown.create', $imageShutdown->site_survey_id)
                         ->with('success', 'Image Shutdown deleted successfully.');
    }

    
    public function createToolboxTalk($id)
    {
        $sitesurveydata = SiteSurvey::find($id);
        $site_survey=$id;

      // return compact('sitesurveydata');

        return view('image_shutdown.toolboxtalk',compact('sitesurveydata','site_survey'));
    }

    public function editToolboxTalk($id)
    {
        $toolboxtalk = ToolBoxTalk::find($id);
        $site_survey=$toolboxtalk->site_survey_id;

       // return $toolboxtalk;

       // $toolboxtalk = ToolBoxTalk::where('site_survey_id',$id)->where('skop_kerja','=','CABLING')->get()[0] ;

      // return compact('sitesurveydata');

     // return  $toolboxtalk;

        return view('image_shutdown.toolboxtalkedit',compact('toolboxtalk','site_survey'));
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
             // Get the current authenticated user
             $usr_info = \Auth::user();
             
             // Add the toolbox talk using the repository method
             $toolbox = $this->siteRepository->addToolBoxTalk($request, $request->site_survey_id, $request->nama_pe, $usr_info);
             $site_survey = SiteSurvey::find( $request->site_survey_id);
             $site_survey->overall_status='outage';
             $site_survey->save();
             // Create a new ToolBoxTalk record and capture the instance
             $toolboxTalk = ToolBoxTalk::create($toolbox);
     
             // Redirect to the image_shutdown.toolboxtalkedit route with the ID of the created toolbox talk
             return redirect()->route('image_shutdown.toolboxtalkedit', ['id' => $toolboxTalk->id])
                              ->with('success', 'Request Success');
         } catch (\Throwable $th) {
             // If there's an error, redirect to image-shutdown.index with a failure message
             return redirect()->route('image-shutdown.index')->with('failed', 'Request Failed');
         }
     }
     

     public function updateToolboxtalk(Request $request, $id)
     {
         try {
             $usr_info = \Auth::user();
             
             // Update the toolbox talk using the repository method
             $toolbox = $this->siteRepository->updateToolBoxTalk($request, $id, $usr_info);
     
             // Update or create the toolbox talk record
             ToolBoxTalk::updateOrCreate(
                 ['id' => $id],
                 $toolbox
             );     
     
             // Redirect to the image_shutdown.toolboxtalkedit route with the updated toolbox talk ID
             return redirect()->route('image_shutdown.toolboxtalkedit', ['id' => $id])
                              ->with('success', 'Request Success');
         } catch (\Throwable $th) {
             // If there's an error, redirect to image-shutdown.index with a failure message
             return redirect()->route('image-shutdown.index')->with('failed', 'Request Failed');
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
             // Find and delete the ToolBoxTalk by ID
             $toolboxtalk = ToolBoxTalk::findOrFail($id);
             $siteSurveyId = $toolboxtalk->site_survey_id;
             $toolboxtalk->delete();
     
             // Redirect to the image_shutdown.toolboxtalk route with the ID of the deleted toolbox talk
             return redirect()->route('image_shutdown.toolboxtalk', ['id' => $siteSurveyId])
                              ->with('success', 'Toolbox Talk deleted successfully.');
         } catch (\Throwable $th) {
             // If there's an error, redirect to the image-shutdown.index with a failure message
             return redirect()->route('image-shutdown.index')->with('failed', 'Failed to delete Toolbox Talk.');
         }
     }
     



    
}
