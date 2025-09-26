<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use App\Models\SitePicture;
use App\Models\SSImages;
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
use PDF;

class LKSController extends Controller{

    public function index($id)
    {
       
        return view('LKS.index', compact('id'));
    }


    public function siteSurveyToolboxTalk($id){
      try{
        
          $usr_info = Auth::user();
          $projectName = $usr_info->project;
        $survey = SiteSurvey::findOrFail($id);
        $toolboxtalk = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja','=','SITE-SURVEY')->first();
      
       if (!$toolboxtalk) {
       
        return redirect()->route('LKS.index', ['id' => $id])
                         ->with('error', ' siteSurvey ToolboxTalk is missing.');
    }
    
       return  view('LKS.site_survey_tbk1', compact('toolboxtalk','survey','projectName'));
    
    }catch(\Exception $e){
    
      return redirect()->route('LKS.index', ['id' => $id])
      ->with('error', ' siteSurvey ToolboxTalk is missing.');
    
    }
  
  }


  public function siteSurvey($id){
    try{
        $usr_info = Auth::user();
        $projectName = $usr_info->project;
     
          $survey = SiteSurvey::findOrFail($id);
  
          if (!$survey) {
           
            return redirect()->route('LKS.index', ['id' => $id])
                             ->with('error', ' siteSurvey data is missing.');
        }
        
    //    return  $survey;
      return view('LKS.Site_Survey_Info1', compact('survey','projectName'));
     
      }catch(\Exception $e)
      {
        return redirect()->route('LKS.index', ['id' => $id])
        ->with('error', ' siteSurvey data  is missing.');
      }
  
      }

   public function siteSurveyPics($id){
  try{
      $usr_info = Auth::user();
      $projectName = $usr_info->project;
        $survey = SiteSurvey::findOrFail($id);
        $pictureData = SitePicture::where('site_survey_id', $survey->id)->first();
        $SSImages = SSImages::where('site_survey_id', $survey->id)->get();
        

        if (!$pictureData) {
        
          return redirect()->route('LKS.index', ['id' => $id])
                           ->with('error', ' siteSurvey Pictures are missing.');
      }

        

    
    return view('LKS.Site_Survey_Pictures1', compact('survey','pictureData','projectName','SSImages'));
  }catch(\Exception $e)
  {
    return redirect()->route('LKS.index', ['id' => $id])
    ->with('error', ' siteSurvey Pictures are missing.');
  }
   
  }

    public function siteSurveyAttachments($id){
        $survey = SiteSurvey::findOrFail($id);
        $files = FileUpload::where('site_survey_id', $survey->id)->get();
   
    return $files;
  
    }


    public function PrecableToolboxTalk($id)
    {
      try{
      $usr_info = Auth::user();
      $projectName = $usr_info->project;
      $survey = SiteSurvey::findOrFail($id);

      
      $PreCablks = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja', '=', 'CABLING')->first();

      if (!$PreCablks) {
         
          return redirect()->route('LKS.index', ['id' => $id])->with('error', 'PreCabling Toolbox data is missing.');
                           
      }

        return view ('LKS.PreCabling_ToolboxTalk', compact('PreCablks','survey','projectName'));

    }catch(\Exception $e)
    {

      return redirect()->route('LKS.index', ['id' => $id])->with('error', 'PreCabling Toolbox data is missing.');

    }

      
}





public function ShutdownToolboxTalk($id)
{
  try{
  $usr_info = Auth::user();
  $projectName = $usr_info->project;
  $survey = SiteSurvey::findOrFail($id);

  

  $ImageShutdownlks = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja','=','OUTAGE')->first();

  if (!$ImageShutdownlks) {
   
    return redirect()->route('LKS.index', ['id' => $id])
                     ->with('error', ' Shutdown ToolboxTalk data is missing.');
}


    return view('LKS.Shutdown_ToolboxTalk', compact('ImageShutdownlks','survey','projectName'));
  }catch(\Exception $e)
  {
    return redirect()->route('LKS.index', ['id' => $id])
    ->with('error', ' Shutdown ToolboxTalk data is missing.');
  }
    

}


public function SATToolboxTalk($id)
{
  try{

  $usr_info = Auth::user();
  $projectName = $usr_info->project;
  $survey = SiteSurvey::findOrFail($id);

  

  $SATlks = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja','=','SAT')->first();

  if (!$SATlks) {
   
    return redirect()->route('LKS.index', ['id' => $id])
                     ->with('error', ' SAT ToolboxTalk data is missing.');
}



   return view('LKS.SAT_ToolboxTalk', compact('SATlks','survey','projectName'));
}catch(\Exception $e){
  return redirect()->route('LKS.index', ['id' => $id])
  ->with('error', ' SAT ToolboxTalk data is missing.');
}

 
}


    public function PreCabling_Attachments($id){
      $survey = SiteSurvey::findOrFail($id);
      $PreCableFiles=PreCablingAttachments::where('site_survey_id', $survey->id)->get();
 
  return $PreCableFiles;
  }


  
  public function Shutdown_Attachments($id){
    $survey = SiteSurvey::findOrFail($id);
    $ImageShutFiles=ImageShutdownAttachments::where('site_survey_id', $survey->id)->get();

return $ImageShutFiles;

}



public function SAT_Attachments($id){
  $survey = SiteSurvey::findOrFail($id);
  $SATFiles=SATAttachments::where('site_survey_id', $survey->id)->get();

return $SATFiles;
}



public function Material_Selection($id){
  $usr_info = Auth::user();
  $projectName = $usr_info->project;
  $survey = SiteSurvey::findOrFail($id);
 
  $projectMaterials = ProjectMaterial::where('site_survey_id', $survey->id)->get();
 

  return view('LKS.Material_Selection', compact('survey','projectMaterials','projectName'));
}

public function Precable_Piw($id)
{
  try{
  $usr_info = Auth::user();
  $projectName = $usr_info->project;
  $survey = SiteSurvey::findOrFail($id);
 
  $Piw = PreCabling::where('site_survey_id', $survey->id)->first();

  if (!$Piw) {
    return redirect()->route('LKS.index', ['id' => $id])
        ->with('error', 'PreCabling data is missing.');
  }

  return  view('LKS.PreCabling_PIW1', compact('survey','Piw','projectName'));
  }catch(\Exception $e){
   
   return redirect()->route('LKS.index', ['id' => $id])
   ->with('error', 'PreCabling data is missing.');
  }


  }


    public function Precable_Shutdown($id)
    { try{
      $usr_info = Auth::user();
      $projectName = $usr_info->project;
      $survey = SiteSurvey::findOrFail($id);
      $PreShutdown= PreCablingShutDown::where('site_survey_id', $survey->id)->first();

      if (!$PreShutdown) {
      
        return redirect()->route('LKS.index', ['id' => $id])
                         ->with('error', 'PreCabling Shutdown data is missing.');
    }
    
     
    
      return view('LKS.PreCabling_PreShutdown1', compact('survey','PreShutdown','projectName'));
  }catch(\Exception $e)
  {
  
      return redirect()->route('LKS.index', ['id' => $id])
                       ->with('error', 'PreCabling Shutdown data is missing.');
  

  }
 }
    


 public function Precable_Images($id)
{
    try {
        $usr_info = Auth::user();
        $projectName = $usr_info->project;
        $survey = SiteSurvey::findOrFail($id);
        $PreCablmages = PreCablingImages::where('site_survey_id', $survey->id)->get();
        
        // Check if the collection is empty
        if ($PreCablmages->isEmpty()) {
            return redirect()->route('LKS.index', ['id' => $id])
                             ->with('error', 'PreCabling Image is missing.');
        }
        
        return view('LKS.PreCabling_Images1', compact('survey', 'PreCablmages', 'projectName'));
    } catch (\Exception $e) {
        return redirect()->route('LKS.index', ['id' => $id])
                         ->with('error', 'An error occurred: ' . $e->getMessage());
    }
}



public function Shutdown_Images($id)
{
  try{
  $usr_info = Auth::user();
  $projectName = $usr_info->project;
  $survey = SiteSurvey::findOrFail($id);
  $ImageShutImages=ImageShutdown::where('site_survey_id', $survey->id)->get();

  if ($ImageShutImages->isEmpty()) {
  return redirect()->route('LKS.index', ['id' => $id])
                   ->with('error', 'Shutdown Image is missing.');
}

  return view ('LKS.Shutdown_Images1', compact('survey','ImageShutImages','projectName'));
}catch(\Exception $e){
return redirect()->route('LKS.index', ['id' => $id])
->with('error', 'Shutdown Image is missing.');
}

  }


  public function SAT_Images($id)
{
    try {
        $usr_info = Auth::user();
        $projectName = $usr_info->project;
        $survey = SiteSurvey::findOrFail($id);
        
        // Filter SAT images based on the specified image types
        $SATImages = SAT::where('site_survey_id', $survey->id)
            ->whereIn('image_type', ['BEFORE', 'AFTER', 'DURING']) // Add filtering condition
            ->get();

        if ($SATImages->isEmpty()) {
            return redirect()->route('LKS.index', ['id' => $id])
                             ->with('error', 'SAT Image is missing.');
        }

        return view('LKS.SAT_Images', compact('survey', 'SATImages', 'projectName'));
    } catch (\Exception $e) {
        return redirect()->route('LKS.index', ['id' => $id])
                         ->with('error', 'SAT Image is missing.');
    }
}


}
















?>
