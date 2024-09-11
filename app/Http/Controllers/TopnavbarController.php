<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSurvey;

class TopnavbarController extends Controller
{
    public function index($id){

        $data = SiteSurvey::with(['PreCabling', 'PreCablingShutDown','ToolBoxTalk'])->where('id', $id)
        ->get();

      // return ['surveys' =>  $data[0],'id' => $id];
        return view('nav.index', ['survey' =>  $data[0],'id' => $id]);

    }
}
