<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use App\Models\SitePicture;
use App\Models\SiteSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ToolBoxTalk;
use App\Models\ProjectMaterial;
use App\Models\material;
use App\Models\PreCabling;
use App\Models\PreCablingShutDown;
use App\Models\PreCablingAttachments;
use App\Models\PreCablingImages;
use App\Models\ImageShutdown; 
use App\Models\ImageShutdownAttachments;   
use App\Models\SAT;
use App\Models\SATAttachments; 
use Exception;

class LKSController extends Controller{

    public function index()
    {
        $usr_info = Auth::user();
        $surveys = SiteSurvey::where('created_by', $usr_info->name)->get();

        // Pass the surveys to the 'SAT.index' view
        return view('LKS.index', compact('surveys'));
    }


    public function create($id)
    {
        // Find the specific site survey by ID
        $survey = SiteSurvey::findOrFail($id);
        // return $survey;
        $toolboxtalk = ToolBoxTalk::where('site_survey_id', $survey->id)->get()[0];

        $pictureData = SitePicture::where('site_survey_id', $survey->id)->first();


        $files = FileUpload::where('site_survey_id', $survey->id)->get();


        $projectMaterials = ProjectMaterial::where('site_survey_id', $survey->id)->get();

        $projectName = $survey->project;

        $Piw = PreCabling::where('site_survey_id', $survey->id)->first();

        $PreShutdown= PreCablingShutDown::where('site_survey_id', $survey->id)->first();

        $PreCableFiles=PreCablingAttachments::where('site_survey_id', $survey->id)->get();

        $PreCablmages=PreCablingImages::where('site_survey_id', $survey->id)->get();

        $PreCablks = ToolBoxTalk::where('site_survey_id', $survey->id)
        ->where('skop_kerja', 'CABLING')
        ->get();

        $ImageShutImages=ImageShutdown::where('site_survey_id', $survey->id)->get();

        $ImageShutFiles=ImageShutdownAttachments::where('site_survey_id', $survey->id)->get();

        
        $ImageShutdownlks = ToolBoxTalk::where('site_survey_id', $survey->id)
        ->where('skop_kerja', 'OUTAGE')
        ->get();


        $SATImages=SAT::where('site_survey_id', $survey->id)->get();

        $SATFiles=SATAttachments::where('site_survey_id', $survey->id)->get();

        $SATlks = ToolBoxTalk::where('site_survey_id', $survey->id)
        ->where('skop_kerja', 'SAT')
        ->get();


        return view('LKS.show', compact('survey','toolboxtalk','files','pictureData','projectMaterials','projectName',
        'Piw','PreShutdown','PreCableFiles','PreCablmages','PreCablks','ImageShutImages','ImageShutFiles','ImageShutdownlks',
         'SATImages','SATFiles','SATlks'));
    }














}
















?>
