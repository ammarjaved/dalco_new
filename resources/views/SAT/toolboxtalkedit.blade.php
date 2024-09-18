@extends('layouts.app', ['page_title' => 'Create'])

<style>
    .label{
    min-width: 300px;
    max-width: 300px;
}


.toggle-btn {
      border-width: 2px;
      margin: auto;
      border: 3px solid transparent;
      border-radius: 15px;
    }

    .input-container {
            position: relative;
            margin-bottom: 10px;
           
        }
        
        label {
            position: absolute;
            top: -10px;
            left: 10px;
            color:black;
            font-family: 'Roboto';
            background-color: #F4F6F9;
            padding: 0 5px;
            font-size: 12px;
            color: #666;
        }
        .ppd-safety {
            color: #666;
            font-size: 14px;
        }



</style>

@section('content')

@php

    $navContent = Blade::render(
        '@include("nav.index", ["survey" => $survey, "id" => $id])', 
        [
            'survey' => app(\App\Http\Controllers\TopnavbarController::class)->index($site_survey)->getData()['survey'],
            'id' => $site_survey
        ]
    );
@endphp
{!! $navContent !!}

<section class="content-header" >
    <div class="container-  ">
        <div class="row mb-2" style="flex-wrap:nowrap">
            <div class="col-sm-6">
                <h3 style="color: #8e44ad;">Pre Cabling</h3>
            </div>
            <div class="col-sm-6 text-right">
                <ol class="breadcrumb float-right" >
                    <li class="breadcrumb-item"><a href="" style="color: #8e44ad;">index</a></li>
                    <li class="breadcrumb-item active" style="color: #8e44ad;">edit</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container">
<h3 class="mt-3">ToolBoxTalk</h3> 

<form action="{{route('SAT.toolboxtalk.update',$toolboxtalk['id'])}}" method="POST" enctype="multipart/form-data">
                @csrf
        @if(isset($siteSurvey))
            @method('PUT')
@endif
<div style="display:none;">
<input type="text" value="{{$toolboxtalk->pe_name}}" name="nama_pe" />
     <input type="text" value="{{$toolboxtalk->site_survey_id}}" name="site_survey_id"/>
</div>     

<div class="row">
    <div class="col-md-6">
        <div class="input-container" style="margin-top:5px">
                {{-- <label for="tarikh">Tarikh</label> --}}
                <input  type="date" style=" height:50px !important;border-radius: 5px !important;width:60% !important;" id="tarikh" name="tarikh" value="{{ $toolboxtalk->tarikh}}" required>
                <label for="tarikh">Tarikh</label>
            </div>
    
    
        </div>
    
    
         
    <div class="col-md-6">
        <div class="form-group">
            {{-- <label for="skop_kerja">Skop Kerja</label><br> --}}
            <md-outlined-text-field label="Skop Kerja" class="label" type="text" id="skop_kerja" name="skop_kerja" class="form-control" value="SAT" readonly>
        </div>
    </div>
    
    </div>


   
    <!-- PPD Safety fields -->
    <h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">PPD</span></h4>
    <div class="row">
        @foreach(['ppd_safety_helment', 'ppd_safety_vest', 'ppd_safety_shoes', 'ppd_safety'] as $field)
        <div class="col-md-6">
            <div class="form-group">
                <md-label style="display: block; margin-bottom: 5px;">
                    {{ ucwords(str_replace('_', ' ', $field)) }}:
                </md-label>
                <md-tabs id="tab-{{ $field }}" class="toggle-btn">
                    <!-- Yes Radio Button -->
                    <md-secondary-tab 
                        value="yes" 
                        id="val-tab-{{ $field }}_yes"
                        onclick="setRadioValue('{{ $field }}', 'yes')"
                        {{ ($toolboxtalk->$field ?? old($field,'no')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                        <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                    </md-secondary-tab>
    
                    <!-- No Radio Button -->
                    <md-secondary-tab 
                        value="no" 
                        id="val-tab-{{ $field }}_no"
                        onclick="setRadioValue('{{ $field }}', 'no')"
                        {{ ($toolboxtalk->$field ?? old($field,'no')) === 'no' ? 'active' : '' }}
                    >
                        No
                        <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
                    </md-secondary-tab>
                </md-tabs>
            </div>
        </div>
        @endforeach
    </div>
    <br>


    <!-- Equipment fields -->
   <h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">EQUIPMENT & INSTRUMENT</span></h4>
    <div class="row">
        @foreach(['equipment_condition', 'instrument_condition', 'instrument_kit_condition'] as $field)
        <div class="col-md-6">
            <div class="form-group">
                <md-label style="display: block; margin-bottom: 5px;">
                    {{ ucwords(str_replace('_', ' ', $field)) }}:
                </md-label>
                <md-tabs id="tab-{{ $field }}" class="toggle-btn">
                    <!-- Yes Radio Button -->
                    <md-secondary-tab 
                        value="yes" 
                        id="val-tab-{{ $field }}_yes"
                        onclick="setRadioValue('{{ $field }}', 'yes')"
                        {{ ($toolboxtalk->$field ?? old($field,'no')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                        <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                    </md-secondary-tab>
    
                    <!-- No Radio Button -->
                    <md-secondary-tab 
                        value="no" 
                        id="val-tab-{{ $field }}_no"
                        onclick="setRadioValue('{{ $field }}', 'no')"
                        {{ ($toolboxtalk->$field ?? old($field,'no')) === 'no' ? 'active' : '' }}
                    >
                        No
                        <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
                    </md-secondary-tab>
                </md-tabs>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    

    <!-- Vehicle fields -->
    <h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">VEHICLE</span></h4>
    <div class="row">
        @foreach(['vehicle_fire_extinguisher', 'vehicle_condition'] as $field)
        <div class="col-md-6">
            <div class="form-group">
                <md-label style="display: block; margin-bottom: 5px;">
                    {{ ucwords(str_replace('_', ' ', $field)) }}:
                </md-label>
                <md-tabs id="tab-{{ $field }}" class="toggle-btn">
                    <!-- Yes Radio Button -->
                    <md-secondary-tab 
                        value="yes" 
                        id="val-tab-{{ $field }}_yes"
                        onclick="setRadioValue('{{ $field }}', 'yes')"
                        {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                        <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'yes' ? 'checked' : '' }}>
                    </md-secondary-tab>
    
                    <!-- No Radio Button -->
                    <md-secondary-tab 
                        value="no" 
                        id="val-tab-{{ $field }}_no"
                        onclick="setRadioValue('{{ $field }}', 'no')"
                        {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                    >
                        No
                        <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'no' ? 'checked' : '' }}>
                    </md-secondary-tab>
                </md-tabs>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    

    <!-- Traffic fields -->
    <h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">TRAFFIC</span></h4>
    <div class="row">
        @foreach(['traffic_safety_kon', 'traffic_sign_board', 'traffic_chargeman'] as $field)
        <div class="col-md-6">
            <div class="form-group">
                <md-label style="display: block; margin-bottom: 5px;">
                    {{ ucwords(str_replace('_', ' ', $field)) }}:
                </md-label>
                <md-tabs id="tab-{{ $field }}" class="toggle-btn">
                    <!-- Yes Radio Button -->
                    <md-secondary-tab 
                        value="yes" 
                        id="val-tab-{{ $field }}_yes"
                        onclick="setRadioValue('{{ $field }}', 'yes')"
                        {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                        <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'yes' ? 'checked' : '' }}>
                    </md-secondary-tab>
    
                    <!-- No Radio Button -->
                    <md-secondary-tab 
                        value="no" 
                        id="val-tab-{{ $field }}_no"
                        onclick="setRadioValue('{{ $field }}', 'no')"
                        {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                    >
                        No
                        <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'no' ? 'checked' : '' }}>
                    </md-secondary-tab>
                </md-tabs>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    


    <!-- Team fields -->
    <h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">TEAM</span></h4>
    <div class="row">
        @foreach(['team_ap_tnp', 'team_cp_tnb'] as $field)
        <div class="col-md-6">
            <div class="form-group">
                <md-label style="display: block; margin-bottom: 5px;">
                    {{ ucwords(str_replace('_', ' ', $field)) }}:
                </md-label>
                <md-tabs id="tab-{{ $field }}" class="toggle-btn">
                    <!-- Yes Radio Button -->
                    <md-secondary-tab 
                        value="yes" 
                        id="val-tab-{{ $field }}_yes"
                        onclick="setRadioValue('{{ $field }}', 'yes')"
                        {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                        <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'yes' ? 'checked' : '' }}>
                    </md-secondary-tab>
    
                    <!-- No Radio Button -->
                    <md-secondary-tab 
                        value="no" 
                        id="val-tab-{{ $field }}_no"
                        onclick="setRadioValue('{{ $field }}', 'no')"
                        {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                    >
                        No
                        <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'no' ? 'checked' : '' }}>
                    </md-secondary-tab>
                </md-tabs>
            </div>
        </div>
        @endforeach
    </div>
    <br>

    <!-- NIOSH fields -->
    <h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">NIOS & PERMIT</span></h4>
    <div class="row">
        @foreach(['niosh_staff_ntsp', 'permit_special', 'permit_work'] as $field)
        <div class="col-md-6">
            <div class="form-group">
                <md-label style="display: block; margin-bottom: 5px;">
                    {{ ucwords(str_replace('_', ' ', $field)) }}:
                </md-label>
                <md-tabs id="tab-{{ $field }}" class="toggle-btn">
                    <!-- Yes Tab -->
                    <md-secondary-tab 
                        value="yes" 
                        id="val-tab-{{ $field }}_yes"
                        onclick="setRadioValue('{{ $field }}', 'yes')"
                        {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                        <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'yes' ? 'checked' : '' }}>
                    </md-secondary-tab>
    
                    <!-- No Tab -->
                    <md-secondary-tab 
                        value="no" 
                        id="val-tab-{{ $field }}_no"
                        onclick="setRadioValue('{{ $field }}', 'no')"
                        {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                    >
                        No
                        <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" {{ ($toolboxtalk->$field ?? old($field, 'no')) === 'no' ? 'checked' : '' }}>
                    </md-secondary-tab>
                </md-tabs>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    

    <h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">TOOLBOX PICTURE</span></h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <md-label style="display: block; margin-bottom: 5px;">
                    Picture During Toolbox:
                </md-label>
                <md-tabs id="tab-picture_during_toolbox" class="toggle-btn">
                    <!-- Yes Radio Button -->
                    <md-secondary-tab value="yes" id="val-tab-picture_during_toolbox" onclick="toggleToolboxImageUpload('picture_during_toolbox', true, 'yes')" {{ isset($toolboxtalk) && $toolboxtalk->picture_during_toolbox == 'yes' ? 'active' : '' }}>
                        Yes
                        <input type="radio" id="yes-picture_during_toolbox" name="picture_during_toolbox" value="yes" style="display:none;" {{ isset($toolboxtalk) && $toolboxtalk->picture_during_toolbox == 'yes' ? 'checked' : '' }}>
                    </md-secondary-tab>
    
                    <!-- No Radio Button -->
                    <md-secondary-tab value="no" id="val-tab-picture_during_toolbox" onclick="toggleToolboxImageUpload('picture_during_toolbox', false, 'no')" {{ !isset($toolboxtalk) || $toolboxtalk->picture_during_toolbox == 'no' ? 'active' : '' }}>
                        No
                        <input type="radio" id="no-picture_during_toolbox" name="picture_during_toolbox" value="no" style="display:none;" {{ !isset($toolboxtalk) || $toolboxtalk->picture_during_toolbox == 'no' ? 'checked' : '' }}>
                    </md-secondary-tab>
                </md-tabs>
    
                <!-- Image Uploads Section -->
                <div id="picture_during_toolbox_images" style="{{ (isset($toolboxtalk) && $toolboxtalk->picture_during_toolbox == 'yes') ? '' : 'display: none;' }}">
                    @for ($i = 1; $i <= 2; $i++)
                        <div class="form-group">
                            <md-label for="toolbox_image{{ $i }}">
                                Toolbox Image {{ $i }}
                            </md-label>
                            <input type="file" onchange="previewImage(this, 'img_toolbox{{ $i }}')" hidden class="form-control-file" id="toolbox_image{{ $i }}" name="toolbox_image{{ $i }}">
                            @if (isset($toolboxtalk) && $toolboxtalk->{"toolbox_image{$i}"})
                                <img onclick="document.getElementById('toolbox_image{{ $i }}').click();" src="{{ asset($toolboxtalk->{"toolbox_image{$i}"}) }}" id="img_toolbox{{ $i }}" alt="Toolbox Image {{ $i }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                            @else
                                <img onclick="document.getElementById('toolbox_image{{ $i }}').click();" src="{{ URL::asset('assets/web-images/download.png') }}" id="img_toolbox{{ $i }}" alt="Toolbox Image {{ $i }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                            @endif
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

 <div class="mt-3" id="button-container">
      <md-filled-tonal-button type="submit"  id="submitBtn" >Update</md-filled-tonal-button>
    </div>

    </form> 
    </div>
    <form action="{{ route('toolbox-talks.destroy', $toolboxtalk->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Toolbox Talk?');">
        @csrf
        @method('DELETE')
        <md-filled-tonal-button style="margin-left:190px; margin-top:-70px" type="submit" >Delete Toolbox</md-filled-tonal-button>
    </form>
    
    
 @endsection 

 <script>

function setRadioValue(fieldName, value) {
    document.getElementById(fieldName + '_' + value).checked = true;
}


    function toggleImageInputs(show) {
        const imageInputs = document.getElementById('image_inputs');
        const updateButton = document.getElementById('submitBtn');
        const buttonContainer = document.getElementById('button-container');

        if (show) {
            imageInputs.style.display = 'block';
            if (updateButton && !imageInputs.contains(updateButton)) {
                imageInputs.appendChild(updateButton);
            }
        } else {
            imageInputs.style.display = 'none';
            if (updateButton && !buttonContainer.contains(updateButton)) {
                buttonContainer.appendChild(updateButton);
            }
        }
    }


    function toggleToolboxImageUpload(fieldName, show, value) {
    var imagesDiv = document.getElementById(fieldName + '_images');
    var yesRadio = document.getElementById('yes-' + fieldName);
    var noRadio = document.getElementById('no-' + fieldName);

    if (show) {
        imagesDiv.style.display = '';
        yesRadio.checked = true;
    } else {
        imagesDiv.style.display = 'none';
        noRadio.checked = true;
    }
}

function previewImage(input, imgId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(imgId).src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var isYes = document.querySelector('input[name="picture_during_toolbox"]:checked')?.value === 'yes';
    toggleImageInputs(isYes);
});


</script>
  