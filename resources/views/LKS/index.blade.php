@extends('layouts.app')


@section('content')



@php

    $navContent = Blade::render(
        '@include("nav.index", ["survey" => $survey, "id" => $id])', 
        [
            'survey' => app(\App\Http\Controllers\TopnavbarController::class)->index($id)->getData()['survey'],
            'id' => $id
        ]
    );
@endphp
{!! $navContent !!}


    <div class="container">
        <h2>LKS</h2>

        <div class="card" style="background-color:#fef7ff;">
          

            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-hover data-table">
                        
                        <tbody>
                            <h3>Site Survey Collection</h3>
                            <tr>
                              <th>Site Survey ToolboxTalk</th><td><a href="/ss_tbk/{{$id}}" target="_blank">Download Site survey Toolbox Talk</a></td> 
                            </tr>    
                            <tr>
                                <th>Site Survey Pictures</th><td><a href="" target="_blank">Download Site survey Pictures</a></td> 
                            </tr>

                            <tr>
                                <th>Site Survey Information</th><td><a href="" target="_blank">Download Site Survey Info</a></td> 
                            </tr>

                            <tr>
                                <th>Site Survey Files</th><td><a href="" target="_blank">Download Site Survey Files</a></td> 
                            </tr>
                        </tbody>
                    </table>



                    
                    <table id="myTable" class="table table-bordered table-hover data-table">
                        
                        <tbody>
                            <h3>Material Selection</h3>
                            <tr>
                              <th>Material Selection </th><td><a href="" target="_blank"> Download Material Selection</a></td> 
                            </tr>  
                              
                          

                           
                        </tbody>
                    </table>


                    <table id="myTable" class="table table-bordered table-hover data-table">
                        
                        <tbody>
                            <h3>PreCabling</h3>
                            <tr>
                              <th>PreCabling ToolboxTalk</th><td><a href="" target="_blank"> Download PreCabling ToolboxTalk</a></td> 
                            </tr>  

                            <tr>
                                <th>PreCabling PIW</th><td><a href="" target="_blank"> Download PreCabling PIW</a></td> 
                              </tr>  

                              <tr>
                                <th>PreCabling PreShutdown</th><td><a href="" target="_blank"> Download PreCabling PreShutdown</a></td> 
                              </tr>  

                              <tr>
                                <th>PreCabling Attachments</th><td><a href="" target="_blank"> Download PreCabling Attachments</a></td> 
                              </tr>  

                              <tr>
                                <th>PreCabling Images</th><td><a href="" target="_blank"> Download PreCabling Images</a></td> 
                              </tr>  
                              
                          

                           
                        </tbody>
                    </table>



                    <table id="myTable" class="table table-bordered table-hover data-table">
                        
                        <tbody>
                            <h3>Shutdown</h3>
                            <tr>
                              <th>Shutdown ToolboxTalk</th><td><a href="" target="_blank"> Download Shutdown ToolboxTalk</a></td> 
                            </tr>  

                            <tr>
                                <th>Shutdown Images</th><td><a href="" target="_blank"> Download Shutdown Images</a></td> 
                              </tr>  

                              <tr>
                                <th>Shutdown Attachments</th><td><a href="" target="_blank"> Download Shutdown Attachments</a></td> 
                              </tr>  
                           
                        </tbody>
                    </table>


                    
                    <table id="myTable" class="table table-bordered table-hover data-table">
                        
                        <tbody>
                            <h3>SAT</h3>
                            <tr>
                              <th>SAT ToolboxTalk</th><td><a href="" target="_blank"> Download SAT ToolboxTalk</a></td> 
                            </tr>  

                            <tr>
                                <th>SAT Images</th><td><a href="" target="_blank"> Download SAT Images</a></td> 
                              </tr>  

                              <tr>
                                <th>SAT Attachments</th><td><a href="" target="_blank"> Download SAT Attachments</a></td> 
                              </tr>  
                           
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
@endsection






