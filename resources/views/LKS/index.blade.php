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
                    <table  class="table table-bordered table-hover data-table">
                        
                        <tbody id="myTable1">
                            <h3>Site Survey Collection</h3>
                            <tr>
                              <th>Site Survey ToolboxTalk</th><td><a href="/ss_tbk/{{$id}}" target="_blank">Download Site survey Toolbox Talk</a></td> 
                            </tr>    
                            <tr>
                                <th>Site Survey Pictures</th><td><a href="/ss_pics/{{$id}}" target="_blank">Download Site survey Pictures</a></td> 
                            </tr>

                            <tr>
                                <th>Site Survey Information</th><td><a href="/ss_info/{{$id}}" target="_blank">Download Site Survey Info</a></td> 
                            </tr>

                            <tr>
                                <th colspan="2" style="text-align: center;">Site Survey Attachments</th>
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


                    <table  class="table table-bordered table-hover data-table">
                        
                        <tbody id="myTable2">
                            <h3>PreCabling</h3>
                            <tr>
                              <th>PreCabling ToolboxTalk</th><td><a href="/pc_tbk/{{$id}}" target="_blank"> Download PreCabling ToolboxTalk</a></td> 
                            </tr>  

                            <tr>
                                <th>PreCabling PIW</th><td><a href="" target="_blank"> Download PreCabling PIW</a></td> 
                              </tr>  

                              <tr>
                                <th>PreCabling PreShutdown</th><td><a href="" target="_blank"> Download PreCabling PreShutdown</a></td> 
                              </tr>  

                               

                              <tr>
                                <th>PreCabling Images</th><td><a href="" target="_blank"> Download PreCabling Images</a></td> 
                              </tr>  
                              

                            
                              <tr>
                                <th colspan="2" style="text-align: center;">PreCabling Attachments</th>
                            </tr>

                           
                        </tbody>
                    </table>



                    <table id="myTable" class="table table-bordered table-hover data-table">
                        
                        <tbody>
                            <h3>Shutdown</h3>
                            <tr>
                              <th>Shutdown ToolboxTalk</th><td><a href="/sd_tbk/{{$id}}" target="_blank"> Download Shutdown ToolboxTalk</a></td> 
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
                              <th>SAT ToolboxTalk</th><td><a href="/sat_tbk/{{$id}}" target="_blank"> Download SAT ToolboxTalk</a></td> 
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
function Site_surveyAjax ()  
     {
       $.ajax({
         url:  '/ss_attachments/{{$id}}' ,
         dataType: 'JSON',
         method: 'GET',
         success: function(data) {
          var str='';
         for(var i=0;i<data.length;i++){
        
          str=str+'<tr><th>'+data[i].file_name+'</th><td><a href="/'+data[i].file_path+'" download>download</a></td><tr>'
          
         }

         $("#myTable1").append(str);

         },
         error: function(jqXHR, textStatus, errorThrown) {
             console.error("AJAX error:", textStatus, errorThrown);
             alert("Error fetching material data. Please try again.");
         }
     });
 
     }



     function precable_Ajax ()  
     {
       $.ajax({
         url:  '/precable_attactments/{{$id}}' ,
         dataType: 'JSON',
         method: 'GET',
         success: function(data) {
          var str='';
         for(var i=0;i<data.length;i++){
        
          str=str+'<tr><th>'+data[i].file_name+'</th><td><a href="/'+data[i].file_path+'" download>download</a></td><tr>'
          
         }

         $("#myTable2").append(str);

         },
         error: function(jqXHR, textStatus, errorThrown) {
             console.error("AJAX error:", textStatus, errorThrown);
             alert("Error fetching material data. Please try again.");
         }
     });
 
     }
$(document).ready(function(){

  Site_surveyAjax ()
  precable_Ajax ()  

});


 </script> 


