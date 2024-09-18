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
    $survey = SiteSurvey::findOrFail($id);
    $toolboxtalk = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja','=','SITE-SURVEY')->get()[0];
    //  return $toolboxtalk;
   // $appUrl = config('app.url');



    $html = view('LKS.site_survey_tbk', compact('toolboxtalk','survey'))->render();
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
  $output = shell_exec($command);

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

      //$toolboxtalk = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja','=','SITE-SURVEY')->get()[0];
    //  return $toolboxtalk;
   // return view('LKS.Site_Survey_Info', compact('survey','projectName'));
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

      //$toolboxtalk = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja','=','SITE-SURVEY')->get()[0];
    //  return $toolboxtalk;
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

  $filename = 'Site_survey_info' . $id . '.html';

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
      //$toolboxtalk = ToolBoxTalk::where('site_survey_id', $id)->where('skop_kerja','=','SITE-SURVEY')->get()[0];
    //  return $toolboxtalk;
    return view('LKS.site_survey', compact('survey'));
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
