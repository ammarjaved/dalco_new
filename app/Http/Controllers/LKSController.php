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
use PDF;

class LKSController extends Controller{

    public function index($id)
    {
        // $usr_info = Auth::user();
        // $surveys = SiteSurvey::where('created_by', $usr_info->name)->get();

        // Pass the surveys to the 'SAT.index' view
        return view('LKS.index', compact('id'));
    }


    public function siteSurveyToolboxTalk($id){
      $usr_info = \Auth::user();
      $projectName = $usr_info->project;
    $survey = SiteSurvey::findOrFail($id);
    $toolboxtalk = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja','=','SITE-SURVEY')->first();
    //  return $toolboxtalk;
   // $appUrl = config('app.url');
   
   if (!$toolboxtalk) {
    // Redirect back if PreCabling data is not found or is empty
    return redirect()->route('LKS.index', ['id' => $id])
                     ->with('error', ' siteSurvey ToolboxTalk is missing.');
}

   return  view('LKS.site_survey_tbk', compact('toolboxtalk','survey','projectName'));


    $html = view('LKS.site_survey_tbk', compact('toolboxtalk','survey','projectName'))->render();
    $html = preg_replace_callback(
      '/<img[^>]+src=([\'"])?(?!http|https|ftp|data:)([^"\']+)([\'"])/',
      function ($matches) {
          $path = public_path(ltrim($matches[2], '/'));
          return str_replace($matches[2], $path, $matches[0]);
      },
      $html
  );

    $directory = 'assets/debug_html';

    $filename = 'site_survey_tbk_' . $id . '.html';

    $htmlFilePath=$directory . '/' . $filename;

    if (!file_exists($directory)) {
      mkdir($directory, 0755, true);
  }
  file_put_contents($htmlFilePath, $html);




  $pdfFilePath='assets/debug_html'.'/'.'site_survey_tbk_' . $id . '.pdf';

  $wkhtmltopdfPath = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'; // Adjust this path as needed
 // $command = "{$wkhtmltopdfPath} --lowquality \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
 $command = "{$wkhtmltopdfPath} --enable-local-file-access --javascript-delay 1000 --no-stop-slow-scripts --debug-javascript \"{$htmlFilePath}\" \"{$pdfFilePath}\"";

  // Execute the command
  //$output = shell_exec($command);

  $return_var = 0;
exec($command, 'site_survey_tbk.pdf', $return_var);

  // Check if the PDF was generated
  if (file_exists($pdfFilePath)) {
      // Return the PDF file for download
      return response()->download($pdfFilePath, 'site_survey_tbk.pdf')->deleteFileAfterSend(true);
      } else {
          // If PDF generation failed, return the error output
          return response()->json([
              'error' => 'PDF generation failed',
              'output' => $output
          ], 500);
      }


  }


    public function siteSurvey($id){
      $usr_info = \Auth::user();
      $projectName = $usr_info->project;
     //return $projectName;
        $survey = SiteSurvey::findOrFail($id);

        if (!$survey) {
          // Redirect back if PreCabling data is not found or is empty
          return redirect()->route('LKS.index', ['id' => $id])
                           ->with('error', ' siteSurvey  is missing.');
      }
      

      //$toolboxtalk = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja','=','SITE-SURVEY')->get()[0];
    //  return $toolboxtalk;
    return view('LKS.Site_Survey_Info', compact('survey','projectName'));
    $html=  view('LKS.Site_Survey_Info', compact('survey','projectName'))->render();
    $html = preg_replace_callback(
      '/<img[^>]+src=([\'"])?(?!http|https|ftp|data:)([^"\']+)([\'"])/',
      function ($matches) {
          $path = public_path(ltrim($matches[2], '/'));
          return str_replace($matches[2], $path, $matches[0]);
      },
      $html
  );
    
    $directory = 'assets/debug_html';

    $filename = 'Site_survey_info' . $id . '.html';

    $htmlFilePath=$directory . '/' . $filename;

    if (!file_exists($directory)) {
      mkdir($directory, 0755, true);
  }
  file_put_contents($htmlFilePath, $html);

  $pdfFilePath='assets/debug_html'.'/'.'Site_survey_info_' . $id . '.pdf';

  $wkhtmltopdfPath = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'; // Adjust this path as needed
 // $command = "{$wkhtmltopdfPath} --lowquality \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
 $command = "{$wkhtmltopdfPath} --enable-local-file-access --javascript-delay 1000 --no-stop-slow-scripts --debug-javascript \"{$htmlFilePath}\" \"{$pdfFilePath}\"";

  // Execute the command
  $output = shell_exec($command);

  // Check if the PDF was generated
  if (file_exists($pdfFilePath)) {
      // Return the PDF file for download
      return response()->download($pdfFilePath, 'Site_survey_info.pdf')->deleteFileAfterSend(true);
      } else {
          // If PDF generation failed, return the error output
          return response()->json([
              'error' => 'PDF generation failed',
              'output' => $output
          ], 500);
      }



    }

    public function siteSurveyPics($id){
      $usr_info = \Auth::user();
      $projectName = $usr_info->project;
        $survey = SiteSurvey::findOrFail($id);
        $pictureData = SitePicture::where('site_survey_id', $survey->id)->first();

        if (!$pictureData) {
          // Redirect back if PreCabling data is not found or is empty
          return redirect()->route('LKS.index', ['id' => $id])
                           ->with('error', ' siteSurvey Pics are missing.');
      }

        

      //$toolboxtalk = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja','=','SITE-SURVEY')->get()[0];
    //  return $toolboxtalk;
    return view('LKS.Site_Survey_Pictures', compact('survey','pictureData','projectName'));
    $html=  view('LKS.Site_Survey_Pictures', compact('survey','pictureData','projectName'))->render();
    $html = preg_replace_callback(
      '/<img[^>]+src=([\'"])?(?!http|https|ftp|data:)([^"\']+)([\'"])/',
      function ($matches) {
          $path = public_path(ltrim($matches[2], '/'));
          return str_replace($matches[2], $path, $matches[0]);
      },
      $html
  );

  $directory = 'assets/debug_html';

  $filename = 'Site_survey_pics' . $id . '.html';

  $htmlFilePath=$directory . '/' . $filename;

  if (!file_exists($directory)) {
    mkdir($directory, 0755, true);
}
file_put_contents($htmlFilePath, $html);

$pdfFilePath='assets/debug_html'.'/'.'Site_Survey_Pictures_' . $id . '.pdf';

$wkhtmltopdfPath = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'; // Adjust this path as needed
// $command = "{$wkhtmltopdfPath} --lowquality \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
$command = "{$wkhtmltopdfPath} --enable-local-file-access --javascript-delay 1000 --no-stop-slow-scripts --debug-javascript \"{$htmlFilePath}\" \"{$pdfFilePath}\"";

// Execute the command
$output = shell_exec($command);

// Check if the PDF was generated
if (file_exists($pdfFilePath)) {
    // Return the PDF file for download
    return response()->download($pdfFilePath, 'Site_Survey_Pictures.pdf')->deleteFileAfterSend(true);
    } else {
        // If PDF generation failed, return the error output
        return response()->json([
            'error' => 'PDF generation failed',
            'output' => $output
        ], 500);
    }

    }

    public function siteSurveyAttachments($id){
        $survey = SiteSurvey::findOrFail($id);
        $files = FileUpload::where('site_survey_id', $survey->id)->get();
   

    // return view('LKS.Site_Survey_Files', compact('survey','files'));
    return $files;
    // }
    }


    public function PrecableToolboxTalk($id)
    {
      $usr_info = \Auth::user();
      $projectName = $usr_info->project;
      $survey = SiteSurvey::findOrFail($id);

      
      $PreCablks = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja', '=', 'CABLING')->first();

      if (!$PreCablks) {
          // Redirect back if PreCabling data is not found or is empty
          session()->flash('error', 'Pre cable ToolboxTalk data is missing.');
          return redirect()->route('LKS.index', ['id' => $id]);
                           
      }

        return view ('LKS.PreCabling_ToolboxTalk', compact('PreCablks','survey','projectName'));

        $html = view('LKS.PreCabling_ToolboxTalk', compact('PreCablks','survey','projectName'))->render();
  $html = preg_replace_callback(
    '/<img[^>]+src=([\'"])?(?!http|https|ftp|data:)([^"\']+)([\'"])/',
    function ($matches) {
        $path = public_path(ltrim($matches[2], '/'));
        return str_replace($matches[2], $path, $matches[0]);
    },
    $html
);

  $directory = 'assets/debug_html';

  $filename = 'PreCabling_ToolboxTalk_' . $id . '.html';

  $htmlFilePath=$directory . '/' . $filename;

  if (!file_exists($directory)) {
    mkdir($directory, 0755, true);
}
file_put_contents($htmlFilePath, $html);




$pdfFilePath='assets/debug_html'.'/'.'PreCabling_ToolboxTalk_' . $id . '.pdf';

$wkhtmltopdfPath = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'; // Adjust this path as needed
// $command = "{$wkhtmltopdfPath} --lowquality \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
$command = "{$wkhtmltopdfPath} --enable-local-file-access --javascript-delay 1000 --no-stop-slow-scripts --debug-javascript \"{$htmlFilePath}\" \"{$pdfFilePath}\"";

// Execute the command
//$output = shell_exec($command);

$return_var = 0;
exec($command, 'PreCabling_ToolboxTalk.pdf', $return_var);

// Check if the PDF was generated
if (file_exists($pdfFilePath)) {
    // Return the PDF file for download
    return response()->download($pdfFilePath, 'PreCabling_ToolboxTalk.pdf')->deleteFileAfterSend(true);
    } else {
        // If PDF generation failed, return the error output
        return response()->json([
            'error' => 'PDF generation failed',
            'output' => $output
        ], 500);
    }


}






public function ShutdownToolboxTalk($id)
{
  $usr_info = \Auth::user();
  $projectName = $usr_info->project;
  $survey = SiteSurvey::findOrFail($id);

  

  $ImageShutdownlks = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja','=','OUTAGE')->first();

  if (!$ImageShutdownlks) {
    // Redirect back if PreCabling data is not found or is empty
    return redirect()->route('LKS.index', ['id' => $id])
                     ->with('error', ' Shutdown ToolboxTalk data is missing.');
}


    return view('LKS.Shutdown_ToolboxTalk', compact('ImageShutdownlks','survey','projectName'));

    $html = view('LKS.Shutdown_ToolboxTalk', compact('ImageShutdownlks','survey','projectName'))->render();

    $html = preg_replace_callback(
    '/<img[^>]+src=([\'"])?(?!http|https|ftp|data:)([^"\']+)([\'"])/',
    function ($matches) {
        $path = public_path(ltrim($matches[2], '/'));
        return str_replace($matches[2], $path, $matches[0]);
    },
    $html
);

  $directory = 'assets/debug_html';

  $filename = 'Shutdown_ToolboxTalk_' . $id . '.html';

  $htmlFilePath=$directory . '/' . $filename;

  if (!file_exists($directory)) {
    mkdir($directory, 0755, true);
}
file_put_contents($htmlFilePath, $html);




$pdfFilePath='assets/debug_html'.'/'.'Shutdown_ToolboxTalk_' . $id . '.pdf';

$wkhtmltopdfPath = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'; // Adjust this path as needed
// $command = "{$wkhtmltopdfPath} --lowquality \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
$command = "{$wkhtmltopdfPath} --enable-local-file-access --javascript-delay 1000 --no-stop-slow-scripts --debug-javascript \"{$htmlFilePath}\" \"{$pdfFilePath}\"";

// Execute the command
//$output = shell_exec($command);

$return_var = 0;
exec($command, 'Shutdown_ToolboxTalk.pdf', $return_var);

// Check if the PDF was generated
if (file_exists($pdfFilePath)) {
    // Return the PDF file for download
    return response()->download($pdfFilePath, 'Shutdown_ToolboxTalk.pdf')->deleteFileAfterSend(true);
    } else {
        // If PDF generation failed, return the error output
        return response()->json([
            'error' => 'PDF generation failed',
            'output' => $output
        ], 500);
    }


}


public function SATToolboxTalk($id)
{

  $usr_info = \Auth::user();
  $projectName = $usr_info->project;
  $survey = SiteSurvey::findOrFail($id);

  

  $SATlks = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja','=','SAT')->first();

  if (!$SATlks) {
    // Redirect back if PreCabling data is not found or is empty
    return redirect()->route('LKS.index', ['id' => $id])
                     ->with('error', ' SAT ToolboxTalk data is missing.');
}



   return view('LKS.SAT_ToolboxTalk', compact('SATlks','survey','projectName'));

    $html =  view('LKS.SAT_ToolboxTalk', compact('SATlks','survey','projectName'))->render();

    $html = preg_replace_callback(
      '/<img[^>]+src=([\'"])?(?!http|https|ftp|data:)([^"\']+)([\'"])/',
      function ($matches) {
          $path = public_path(ltrim($matches[2], '/'));
          return str_replace($matches[2], $path, $matches[0]);
      },
      $html
  );

  $directory = 'assets/debug_html';

$filename = 'SAT_ToolboxTalk_' . $id . '.html';

$htmlFilePath=$directory . '/' . $filename;

if (!file_exists($directory)) {
  mkdir($directory, 0755, true);
}
file_put_contents($htmlFilePath, $html);




$pdfFilePath='assets/debug_html'.'/'.'SAT_ToolboxTalk_' . $id . '.pdf';

$wkhtmltopdfPath = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'; // Adjust this path as needed
// $command = "{$wkhtmltopdfPath} --lowquality \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
$command = "{$wkhtmltopdfPath} --enable-local-file-access --javascript-delay 1000 --no-stop-slow-scripts --debug-javascript \"{$htmlFilePath}\" \"{$pdfFilePath}\"";

// Execute the command
//$output = shell_exec($command);

$return_var = 0;
exec($command, 'SAT_ToolboxTalk.pdf', $return_var);

// Check if the PDF was generated
if (file_exists($pdfFilePath)) {
  // Return the PDF file for download
  return response()->download($pdfFilePath, 'SAT_ToolboxTalk.pdf')->deleteFileAfterSend(true);
  } else {
      // If PDF generation failed, return the error output
      return response()->json([
          'error' => 'PDF generation failed',
          'output' => $output
      ], 500);
  }


}
    public function PreCabling_Attachments($id){
      $survey = SiteSurvey::findOrFail($id);
      $PreCableFiles=PreCablingAttachments::where('site_survey_id', $survey->id)->get();
 

  // return view('LKS.Site_Survey_Files', compact('survey','files'));
  return $PreCableFiles;
  // }
  }


  
  public function Shutdown_Attachments($id){
    $survey = SiteSurvey::findOrFail($id);
    $ImageShutFiles=ImageShutdownAttachments::where('site_survey_id', $survey->id)->get();


// return view('LKS.Site_Survey_Files', compact('survey','files'));
return $ImageShutFiles;
// }
}



public function SAT_Attachments($id){
  $survey = SiteSurvey::findOrFail($id);
  $SATFiles=SATAttachments::where('site_survey_id', $survey->id)->get();


// return view('LKS.Site_Survey_Files', compact('survey','files'));
return $SATFiles;
// }
}



public function Material_Selection($id){
  $usr_info = \Auth::user();
  $projectName = $usr_info->project;
  $survey = SiteSurvey::findOrFail($id);
 
  $projectMaterials = ProjectMaterial::where('site_survey_id', $survey->id)->get();

  return view('LKS.Material_Selection', compact('survey','projectMaterials','projectName'));


  $html =  view('LKS.Material_Selection', compact('survey','projectMaterials','projectName'))->render();
  $html = preg_replace_callback(
    '/<img[^>]+src=([\'"])?(?!http|https|ftp|data:)([^"\']+)([\'"])/',
    function ($matches) {
        $path = public_path(ltrim($matches[2], '/'));
        return str_replace($matches[2], $path, $matches[0]);
    },
    $html
);

  $directory = 'assets/debug_html';

  $filename = 'Material_Selection_' . $id . '.html';

  $htmlFilePath=$directory . '/' . $filename;

  if (!file_exists($directory)) {
    mkdir($directory, 0755, true);
}
file_put_contents($htmlFilePath, $html);




$pdfFilePath='assets/debug_html'.'/'.'Material_Selection_' . $id . '.pdf';

$wkhtmltopdfPath = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'; // Adjust this path as needed
// $command = "{$wkhtmltopdfPath} --lowquality \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
$command = "{$wkhtmltopdfPath} --enable-local-file-access --javascript-delay 1000 --no-stop-slow-scripts --debug-javascript \"{$htmlFilePath}\" \"{$pdfFilePath}\"";

// Execute the command
$output = shell_exec($command);

// Check if the PDF was generated
if (file_exists($pdfFilePath)) {
    // Return the PDF file for download
    return response()->download($pdfFilePath, 'Material_Selection.pdf')->deleteFileAfterSend(true);
    } else {
        // If PDF generation failed, return the error output
        return response()->json([
            'error' => 'PDF generation failed',
            'output' => $output
        ], 500);

}



}

public function Precable_Piw($id)
{
  $usr_info = \Auth::user();
  $projectName = $usr_info->project;
  $survey = SiteSurvey::findOrFail($id);
 
  $Piw = PreCabling::where('site_survey_id', $survey->id)->first();


  if (!$Piw) {
    // Redirect back if PreCabling data is not found or is empty
    return redirect()->route('LKS.index', ['id' => $id])
                     ->with('error', 'PreCabling data is missing.');
}




 
 

  return  view('LKS.PreCabling_PIW', compact('survey','Piw','projectName'));

  $html =  view('LKS.PreCabling_PIW', compact('survey','Piw','projectName'))->render();

  $html = preg_replace_callback(
      '/<img[^>]+src=([\'"])?(?!http|https|ftp|data:)([^"\']+)([\'"])/',
      function ($matches) {
          $path = public_path(ltrim($matches[2], '/'));
          return str_replace($matches[2], $path, $matches[0]);
      },
      $html
  );
    
    $directory = 'assets/debug_html';

    $filename = 'PreCabling_PIW' . $id . '.html';

    $htmlFilePath=$directory . '/' . $filename;

    if (!file_exists($directory)) {
      mkdir($directory, 0755, true);
  }
  file_put_contents($htmlFilePath, $html);

  $pdfFilePath='assets/debug_html'.'/'.'PreCabling_PIW_' . $id . '.pdf';

  $wkhtmltopdfPath = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'; // Adjust this path as needed
 // $command = "{$wkhtmltopdfPath} --lowquality \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
 $command = "{$wkhtmltopdfPath} --enable-local-file-access --javascript-delay 1000 --no-stop-slow-scripts --debug-javascript \"{$htmlFilePath}\" \"{$pdfFilePath}\"";

  // Execute the command
  $output = shell_exec($command);

  // Check if the PDF was generated
  if (file_exists($pdfFilePath)) {
      // Return the PDF file for download
      return response()->download($pdfFilePath, 'PreCabling_PIW.pdf')->deleteFileAfterSend(true);
      } else {
          // If PDF generation failed, return the error output
          return response()->json([
              'error' => 'PDF generation failed',
              'output' => $output
          ], 500);
      }



    }




    public function Precable_Shutdown($id)
    {
      $usr_info = \Auth::user();
      $projectName = $usr_info->project;
      $survey = SiteSurvey::findOrFail($id);
      $PreShutdown= PreCablingShutDown::where('site_survey_id', $survey->id)->first();

      if (!$PreShutdown) {
        // Redirect back if PreCabling data is not found or is empty
        return redirect()->route('LKS.index', ['id' => $id])
                         ->with('error', 'PreCabling data is missing.');
    }
    
     
    
      return view('LKS.PreCabling_PreShutdown', compact('survey','PreShutdown','projectName'));
    
    
      $html =  view('LKS.PreCabling_PreShutdown', compact('survey','PreShutdown','projectName'))->render();
    
      $html = preg_replace_callback(
          '/<img[^>]+src=([\'"])?(?!http|https|ftp|data:)([^"\']+)([\'"])/',
          function ($matches) {
              $path = public_path(ltrim($matches[2], '/'));
              return str_replace($matches[2], $path, $matches[0]);
          },
          $html
      );
        
        $directory = 'assets/debug_html';
    
        $filename = 'PreCabling_PreShutdown' . $id . '.html';
    
        $htmlFilePath=$directory . '/' . $filename;
    
        if (!file_exists($directory)) {
          mkdir($directory, 0755, true);
      }
      file_put_contents($htmlFilePath, $html);
    
      $pdfFilePath='assets/debug_html'.'/'.'PreCabling_PreShutdown_' . $id . '.pdf';
    
      $wkhtmltopdfPath = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'; // Adjust this path as needed
     // $command = "{$wkhtmltopdfPath} --lowquality \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
     $command = "{$wkhtmltopdfPath} --enable-local-file-access --javascript-delay 1000 --no-stop-slow-scripts --debug-javascript \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
    
      // Execute the command
      $output = shell_exec($command);
    
      // Check if the PDF was generated
      if (file_exists($pdfFilePath)) {
          // Return the PDF file for download
          return response()->download($pdfFilePath, 'PreCabling_PreShutdown.pdf')->deleteFileAfterSend(true);
          } else {
              // If PDF generation failed, return the error output
              return response()->json([
                  'error' => 'PDF generation failed',
                  'output' => $output
              ], 500);
          }
    
    
    
        }
    


        public function Precable_Images($id)
        {
          $usr_info = \Auth::user();
          $projectName = $usr_info->project;
          $survey = SiteSurvey::findOrFail($id);
          $PreCablmages=PreCablingImages::where('site_survey_id', $survey->id)->get();
         
         
          if (!$PreCablmages) {
            // Redirect back if PreCabling data is not found or is empty
            return redirect()->route('LKS.index', ['id' => $id])
                             ->with('error', 'PreCabling data is missing.');
        }
         
         
        
        //    if ($PreCablmages->isEmpty()) {
        //     return redirect()->back()->withErrors(['message' => 'No images found for this survey.']);
        // } 
        
          return view('LKS.PreCabling_Images', compact('survey','PreCablmages','projectName'));
        
          $html =  view('LKS.PreCabling_Images', compact('survey','PreCablmages','projectName'))->render();
        
          $html = preg_replace_callback(
            '/<img[^>]+src=([\'"])?(?!http|https|ftp|data:)([^"\']+)([\'"])/',
            function ($matches) {
                $path = public_path(ltrim($matches[2], '/'));
                return str_replace($matches[2], $path, $matches[0]);
            },
            $html
        );
        
        $directory = 'assets/debug_html';
        
        $filename = 'PreCabling_Images' . $id . '.html';
        
        $htmlFilePath=$directory . '/' . $filename;
        
        if (!file_exists($directory)) {
          mkdir($directory, 0755, true);
        }
        file_put_contents($htmlFilePath, $html);
        
        $pdfFilePath='assets/debug_html'.'/'.'PreCabling_Images_' . $id . '.pdf';
        
        $wkhtmltopdfPath = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'; // Adjust this path as needed
        // $command = "{$wkhtmltopdfPath} --lowquality \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
        $command = "{$wkhtmltopdfPath} --enable-local-file-access --javascript-delay 1000 --no-stop-slow-scripts --debug-javascript \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
        
        // Execute the command
        $output = shell_exec($command);
        
        // Check if the PDF was generated
        if (file_exists($pdfFilePath)) {
          // Return the PDF file for download
          return response()->download($pdfFilePath, 'PreCabling_Images.pdf')->deleteFileAfterSend(true);
          } else {
              // If PDF generation failed, return the error output
              return response()->json([
                  'error' => 'PDF generation failed',
                  'output' => $output
              ], 500);
          }
        
          }

          public function Shutdown_Images($id)
          {
            $usr_info = \Auth::user();
            $projectName = $usr_info->project;
            $survey = SiteSurvey::findOrFail($id);
            $ImageShutImages=ImageShutdown::where('site_survey_id', $survey->id)->get();
          
            return view ('LKS.Shutdown_Images', compact('survey','ImageShutImages','projectName'));
          
            $html =  view('LKS.Shutdown_Images', compact('survey','ImageShutImages','projectName'))->render();
          
            $html = preg_replace_callback(
              '/<img[^>]+src=([\'"])?(?!http|https|ftp|data:)([^"\']+)([\'"])/',
              function ($matches) {
                  $path = public_path(ltrim($matches[2], '/'));
                  return str_replace($matches[2], $path, $matches[0]);
              },
              $html
          );
          
          $directory = 'assets/debug_html';
          
          $filename = 'Shutdown_Images' . $id . '.html';
          
          $htmlFilePath=$directory . '/' . $filename;
          
          if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
          }
          file_put_contents($htmlFilePath, $html);
          
          $pdfFilePath='assets/debug_html'.'/'.'Shutdown_Images_' . $id . '.pdf';
          
          $wkhtmltopdfPath = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'; // Adjust this path as needed
          // $command = "{$wkhtmltopdfPath} --lowquality \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
          $command = "{$wkhtmltopdfPath} --enable-local-file-access --javascript-delay 1000 --no-stop-slow-scripts --debug-javascript \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
          
          // Execute the command
          $output = shell_exec($command);
          
          // Check if the PDF was generated
          if (file_exists($pdfFilePath)) {
            // Return the PDF file for download
            return response()->download($pdfFilePath, 'Shutdown_Images.pdf')->deleteFileAfterSend(true);
            } else {
                // If PDF generation failed, return the error output
                return response()->json([
                    'error' => 'PDF generation failed',
                    'output' => $output
                ], 500);
            }
          
            }



            public function SAT_Images($id)
            {
              $usr_info = \Auth::user();
              $projectName = $usr_info->project;
              $survey = SiteSurvey::findOrFail($id);
              $SATImages=SAT::where('site_survey_id', $survey->id)->get();
            
              return view('LKS.SAT_Images', compact('survey','SATImages','projectName'));
            
              $html =  view('LKS.SAT_Images', compact('survey','SATImages','projectName'))->render();
            
              $html = preg_replace_callback(
                '/<img[^>]+src=([\'"])?(?!http|https|ftp|data:)([^"\']+)([\'"])/',
                function ($matches) {
                    $path = public_path(ltrim($matches[2], '/'));
                    return str_replace($matches[2], $path, $matches[0]);
                },
                $html
            );
            
            $directory = 'assets/debug_html';
            
            $filename = 'SAT_Images' . $id . '.html';
            
            $htmlFilePath=$directory . '/' . $filename;
            
            if (!file_exists($directory)) {
              mkdir($directory, 0755, true);
            }
            file_put_contents($htmlFilePath, $html);
            
            $pdfFilePath='assets/debug_html'.'/'.'SAT_Images_' . $id . '.pdf';
            
            $wkhtmltopdfPath = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'; // Adjust this path as needed
            // $command = "{$wkhtmltopdfPath} --lowquality \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
            $command = "{$wkhtmltopdfPath} --enable-local-file-access --javascript-delay 1000 --no-stop-slow-scripts --debug-javascript \"{$htmlFilePath}\" \"{$pdfFilePath}\"";
            
            // Execute the command
            $output = shell_exec($command);
            
            // Check if the PDF was generated
            if (file_exists($pdfFilePath)) {
              // Return the PDF file for download
              return response()->download($pdfFilePath, 'SAT_Images.pdf')->deleteFileAfterSend(true);
              } else {
                  // If PDF generation failed, return the error output
                  return response()->json([
                      'error' => 'PDF generation failed',
                      'output' => $output
                  ], 500);
              }
            
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
