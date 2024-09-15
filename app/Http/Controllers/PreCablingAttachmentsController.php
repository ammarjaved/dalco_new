<?php

namespace App\Http\Controllers;

use App\Models\PreCablingAttachments;
use App\Models\SiteSurvey;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;


class PreCablingAttachmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $siteSurvey = SiteSurvey::find($id);

        if (!$siteSurvey) {
            return redirect()->route('pre-cabling.index')->with('failed', 'Site Survey not found.');
        }
    
        $files = PreCablingAttachments::where('site_survey_id', $id)->get();
        $site_survey=$id;
    
        return view('PreCablingAttachments.index', compact('siteSurvey', 'files','site_survey'));
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
    public function store(Request $request)
    {
        //
        try {
            $destinationPath = 'assets/images/';
            if ($request->hasFile('site_file')) {
               
                $file = $request->file('site_file');
               // return $file->getMimeType();
                if ($file->getMimeType()== 'application/pdf') {

                $filename = time() . '-' . $file->getClientOriginalName();
                $request->file('site_file')->move($destinationPath, $filename);
                $file_path = $destinationPath . $filename;
               
                $parser = new Parser();
                   $pdf = $parser->parseFile( $file_path);
                 //  $imagePaths = [];
                   $imageIndex = 0;
                $objects = $pdf->getObjects();
                   foreach ($objects as $object) {
                       if ($object instanceof \Smalot\PdfParser\XObject\Image) {
                           $imageFilename = 'image_' . (++$imageIndex) . '_' . time() . '.png';
                           $fullImagePath = $destinationPath . $imageFilename;
           
                           file_put_contents($fullImagePath, $object->getContent());
           
                           // Save image info to database
                           PreCablingAttachments::create([
                            'file_name' => $imageFilename,
                            'file_path' => $fullImagePath,
                            'description' => $request->description,
                            'site_survey_id' => $request->id
                             
                           ]);
           
                          // $imagePaths[] = $imagePath;
                       }
                   }   
            

                   

                }else{
                // Save file details to the database
                $filename = time() . '-' . $file->getClientOriginalName();
                $request->file('site_file')->move($destinationPath, $filename);
                $file_path = $destinationPath . $filename;
                $uploadedFile = PreCablingAttachments::create([
                    'file_name' => $filename,
                    'file_path' => $file_path,
                    'description' => $request->description,
                    'site_survey_id' => $request->id
                ]);
               
                 }

                return redirect()->route('pre-cabling-attachment.index', ['id' => $request->id])->with('success', 'File uploaded successfully.');
            } else {
                return redirect()->route('pre-cabling-attachment.index', ['id' => $request->id])->with('failed', 'No file selected.');
            }
      
        } catch (\Throwable $th) {
            return $th->getMessage();
            return redirect()->route('pre-cabling-attachment.index', ['id' => $request->id])->with('failed', 'Request Failed: ' . $th->getMessage());
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = PreCablingAttachments::findOrFail($id);

        if (file_exists(public_path($file->file_path))) {
            unlink(public_path($file->file_path));
        } 
        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }
}
