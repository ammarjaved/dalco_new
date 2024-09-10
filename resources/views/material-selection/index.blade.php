 @extends('layouts.app')


@section('content')


<style>
    md-filled-text-field {
      resize: horizontal;
    }
  </style>

<section class="content-header" >
    <div class="container-  ">
        <div class="row mb-2" style="flex-wrap:nowrap">
            <div class="col-sm-6">
                <h3 style="color: #8e44ad;">Material Selection</h3>
            </div>
            <div class="col-sm-6 text-right">
                <ol class="breadcrumb float-right" >
                    <li class="breadcrumb-item"><a href="{{ route('material-selection.index') }}" style="color: #8e44ad;">index</a></li>
                    <li class="breadcrumb-item active" style="color: #8e44ad;">create</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <h2>Material Selection</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

        <!-- <div class="input-group"> -->
            

                <div class="row">
                    <div style="background-color: white" >
                        <md-outlined-text-field  type="text" label="Search" style=" min-width: 500px;margin:2px"  name="search" id="search_input1"  placeholder="Search by material"></md-outlined-text-field>
                        
                    </div>
        
                    <div class="col-sm-1">
                        
                        <md-filled-tonal-button style="horizontal-align: center; margin:5px" type="button" onclick="addData()">Add</md-filled-tonal-button>
                     </div>
        
                    </div>

            
            
            
            
        <!-- </div> -->
 
    <!-- Use the dynamic siteSurvey ID -->
    <form action="{{ route('material-selection.save', ['id' => $siteSurvey->id]) }}" method="POST">
        @csrf
        
        <table class="table" style="background-color:#fef7ff;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Material Code</th>
                    <th>Description</th>
                    <th>Bun</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody id='mat_sel'>

               
                 
            

            </tbody>
        </table>

        <md-filled-tonal-button type="submit">Save Selections</md-filled-tonal-button>
    </form>
</div>

<style>
   .twitter-typeahead {
    width: 80%;
    border: none;
    
    
}

/* Input field styling */
.typeahead {
    width: 80%;
    padding: 8px 12px;
    font-size: 14px;
    /* line-height: 1.428571429; */
    /* border: 1px solid #ccc;
    border-radius: 4px; */
}

.typeahead:focus {
    border-color: #66afe9;
    outline: 0;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
}

/* Dropdown menu styling */
.tt-dropdown-menu {
    width: 100%;
    padding: 3px 0;
    margin-top: 2px;
    background-color: #fff;
    /* border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 4px; */
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

/* Dropdown item styling */
.tt-suggestion {
    padding: 3px 20px;
    font-size: 14px;
    line-height: 24px;
}

.tt-suggestion.tt-cursor {
    color: #fff;
    background-color: #0097cf;
}

.tt-suggestion p {
    margin: 0;
}
 </style>   
@endsection

<script>

document.addEventListener('DOMContentLoaded', function () {
    var searchMaterialUrl = '{{ route("search.material") }}';
$('#search_input1').typeahead({
                name: 'hce1',
                remote: searchMaterialUrl+'?key=%QUERY',
                limit: 100
});

    });


var i=0;    
function addData(){
var myval=$('#search_input1').val();
if(myval!=''){
var searchMaterialUrl = '{{ route("data.material") }}';

$.ajax({
        url: searchMaterialUrl+'?desc='+myval,
        dataType: 'JSON',
        //data: data,
        method: 'GET',
        async: false,
        success: function callback(data) {
            
        var str='<tr><td><input type="text"  name="data['+i+'][id]" value="'+data[0].id+'"'+ 
        '/></td><td><input type="text"  name="data['+i+'][mat_code]" value="'+data[0].mat_code+'"'+ 
        '/></td><td><input type="text"  name="data['+i+'][mat_desc]" value="'+data[0].mat_desc+'" />'+
       '</td><td><input type="text"  name="data['+i+'][bun]" value="'+data[0].bun+'" /></td>'+
        '<td><input type="text"  name="data['+i+'][quantity]" value="0"/></td></tr>'   
         $("#mat_sel").append(str);
         $('#search_input1').val('');
         i++;
        }
    });
}else{
    alert("please select material first")
}

}


</script> 







 