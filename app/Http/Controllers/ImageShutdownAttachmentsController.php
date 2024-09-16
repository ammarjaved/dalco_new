<?php

namespace App\Http\Controllers;

use App\Models\ImageShutdownAttachments;
use App\Models\SiteSurvey;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;


class ImageShutdownAttachmentsController  extends Controller
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
            return redirect()->route('image-shutdown.index')->with('failed', 'Site Survey not found.');
        }
    
        $files = ImageShutdownAttachments::where('site_survey_id', $id)->get();
        $site_survey=$id;
    
        return view('ImageShutdownAttachments.index', compact('siteSurvey', 'files','site_survey'));
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
            // if ($request->hasFile('site_file')) {
            //     $file = $request->file('site_file');
            //     $filename = time() . '-' . $file->getClientOriginalName();

            //     $request->file('site_file')->move($destinationPath, $filename);
            //     $file_path = $destinationPath . $filename;

            //     // Save file details to the database
            //     $uploadedFile = ImageShutdownAttachments::create([
            //         'file_name' => $filename,
            //         'file_path' => $file_path,
            //         'description' => $request->description,
            //         'site_survey_id' => $request->id
            //     ]);

            if ($request->hasFile('site_file')) {
               
                $file = $request->file('site_file');
               // return $file->getMimeType();
                // if ($file->getMimeType()== 'application/pdf') {

                // $filename = time() . '-' . $file->getClientOriginalName();
                // $request->file('site_file')->move($destinationPath, $filename);
                // $file_path = $destinationPath . $filename;
               
                // $parser = new Parser();
                //    $pdf = $parser->parseFile( $file_path);
                //  //  $imagePaths = [];
                //    $imageIndex = 0;
                // $objects = $pdf->getObjects();
                //    foreach ($objects as $object) {
                //        if ($object instanceof \Smalot\PdfParser\XObject\Image) {
                //            $imageFilename = 'image_' . (++$imageIndex) . '_' . time() . '.png';
                //            $fullImagePath = $destinationPath . $imageFilename;
           
                //            file_put_contents($fullImagePath, $object->getContent());
           
                //            // Save image info to database
                //            ImageShutdownAttachments::create([
                //             'file_name' => $imageFilename,
                //             'file_path' => $fullImagePath,
                //             'description' => $request->description,
                //             'site_survey_id' => $request->id
                             
                //            ]);
           
                //           // $imagePaths[] = $imagePath;
                //        }
                //    }   
            

                   

                // }else{
                // Save file details to the database
                $filename = time() . '-' . $file->getClientOriginalName();
                $request->file('site_file')->move($destinationPath, $filename);
                $file_path = $destinationPath . $filename;
                $uploadedFile = ImageShutdownAttachments::create([
                    'file_name' => $filename,
                    'file_path' => $file_path,
                    'description' => $request->description,
                    'site_survey_id' => $request->id
                ]);
               
             //    }



                return redirect()->route('image-shutdown-attachment.index', ['id' => $request->id])->with('success', 'File uploaded successfully.');
            } else {
                return redirect()->route('image-shutdown-attachment.index', ['id' => $request->id])->with('failed', 'No file selected.');
            }
      
        } catch (\Throwable $th) {
            return $th->getMessage();
            return redirect()->route('image-shutdown-attachment.index', ['id' => $request->id])->with('failed', 'Request Failed: ' . $th->getMessage());
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
        $file = ImageShutdownAttachments::findOrFail($id);

        if (file_exists(public_path($file->file_path))) {
            unlink(public_path($file->file_path));
        } 
        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }
}
