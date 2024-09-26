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

     @if(session('error'))
    <div id="errorAlert" class="alert alert-danger">
        {{ session('error') }}
        <button type="button" class="close-btn" onclick="closeAlert()">×</button>
    </div>
    <script>
        function closeAlert() {
            document.getElementById('errorAlert').style.display = 'none';
        }
    </script>
    @endif

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
                              <th>Material Selection </th><td><a href="/material_selec/{{$id}}" target="_blank"> Download Material Selection</a></td> 
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
                                <th>PreCabling PIW</th><td><a href="/precbale_piw/{{$id}}" target="_blank"> Download PreCabling PIW</a></td> 
                              </tr>  

                              <tr>
                                <th>PreCabling PreShutdown</th><td><a href="/precbale_shutdown/{{$id}}" target="_blank"> Download PreCabling PreShutdown</a></td> 
                              </tr>  

                               

                              <tr>
                                <th>PreCabling Images</th><td><a href="/precbale_images/{{$id}}" target="_blank"> Download PreCabling Images</a></td> 
                              </tr>  
                              

                            
                              <tr>
                                <th colspan="2" style="text-align: center;">PreCabling Attachments</th>
                            </tr>

                           
                        </tbody>
                    </table>



                    <table  class="table table-bordered table-hover data-table">
                        
                        <tbody id="myTable3">
                            <h3>Shutdown</h3>
                            <tr>
                              <th>Shutdown ToolboxTalk</th><td><a href="/sd_tbk/{{$id}}" target="_blank"> Download Shutdown ToolboxTalk</a></td> 
                            </tr>  

                            <tr>
                                <th>Shutdown Images</th><td><a href="/shutdown_images/{{$id}}" target="_blank"> Download Shutdown Images</a></td> 
                              </tr>  

                              <tr>
                                <th colspan="2" style="text-align: center;">ShutDown Attachments</th>
                            </tr>
                        </tbody>
                    </table>


                    
                    <table  class="table table-bordered table-hover data-table">
                        
                        <tbody id="myTable4">
                            <h3>SAT</h3>
                            <tr>
                              <th>SAT ToolboxTalk</th><td><a href="/sat_tbk/{{$id}}" target="_blank"> Download SAT ToolboxTalk</a></td> 
                            </tr>  

                            <tr>
                                <th>SAT Images</th><td><a href="/sat_images/{{$id}}" target="_blank"> Download SAT Images</a></td> 
                              </tr>  

                              <tr>
                                <th colspan="2" style="text-align: center;">SAT Attachments</th>
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
function Site_surveyAjax() {
    $.ajax({
        url: '/ss_attachments/{{$id}}',
        dataType: 'JSON',
        method: 'GET',
        success: function(data) {
            if (data && data.length > 0) {
                var str = '<tr><th>File Name</th><th>Description</th><th>Download</th></tr>';
                for (var i = 0; i < data.length; i++) {
                    str += '<tr><th>' + data[i].file_name + '</th><td>' + (data[i].description || 'No description available') + '</td><td><a href="/' + data[i].file_path + '" download>download</a></td></tr>';
                }
                $("#myTable1").append(str);
            } else {
                console.log("No site survey attachments found");
                $("#myTable1").append('<tr><td colspan="3">No attachments available</td></tr>');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX error:", textStatus, errorThrown);
            alert("Error fetching site survey attachments. Please try again.");
        }
    });
}



function precable_Ajax() {
    $.ajax({
        url: '/precable_attachments/{{$id}}',
        dataType: 'JSON',
        method: 'GET',
        success: function(data) {
            if (data && data.length > 0) {
                var str = '<tr><th>File Name</th><th>Description</th><th>Download</th></tr>';
                for (var i = 0; i < data.length; i++) {
                    str += '<tr><th>' + data[i].file_name + '</th><td>' + (data[i].description || 'No description available') + '</td><td><a href="/' + data[i].file_path + '" download>download</a></td></tr>';
                }
                $("#myTable2").append(str);
            } else {
                console.log("No precable attachments found");
                $("#myTable2").append('<tr><td colspan="3">No attachments available</td></tr>');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX error:", textStatus, errorThrown);
            alert("Error fetching PreCabling attachments. Please try again.");
        }
    });
}


function shutdown_Ajax() {
    $.ajax({
        url: '/shutdown_attachments/{{$id}}',
        dataType: 'JSON',
        method: 'GET',
        success: function(data) {
            if (data && data.length > 0) {
                var str = '<tr><th>File Name</th><th>Description</th><th>Download</th></tr>';
                for (var i = 0; i < data.length; i++) {
                    str += '<tr><th>' + data[i].file_name + '</th><td>' + (data[i].description || 'No description available') + '</td><td><a href="/' + data[i].file_path + '" download>download</a></td></tr>';
                }
                $("#myTable3").append(str);
            } else {
                console.log("No shutdown attachments found");
                $("#myTable3").append('<tr><td colspan="3">No attachments available</td></tr>');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX error:", textStatus, errorThrown);
            alert("Error fetching Shutdown attachments. Please try again.");
        }
    });
}



function SAT_Ajax() {
    $.ajax({
        url: '/SAT_attachments/{{$id}}',
        dataType: 'JSON',
        method: 'GET',
        success: function(data) {
            if (data && data.length > 0) {
                var str = '<tr><th>File Name</th><th>Description</th><th>Download</th></tr>';
                for (var i = 0; i < data.length; i++) {
                    str += '<tr><th>' + data[i].file_name + '</th><td>' + (data[i].description || 'No description available') + '</td><td><a href="/' + data[i].file_path + '" download>download</a></td></tr>';
                }
                $("#myTable4").append(str);
            } else {
                console.log("No shutdown attachments found");
                $("#myTable4").append('<tr><td colspan="3">No attachments available</td></tr>');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX error:", textStatus, errorThrown);
            alert("Error fetching SAT attachments. Please try again.");
        }
    });
}
$(document).ready(function(){

  Site_surveyAjax ()
  precable_Ajax ()  
  shutdown_Ajax()
  SAT_Ajax()


});


 </script> 


