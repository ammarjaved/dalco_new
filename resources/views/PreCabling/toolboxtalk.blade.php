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

<section class="content-header">
    <div class="container-  ">
        <div class="row mb-2" style="flex-wrap:nowrap">
            <div class="col-sm-6">
                <h3>Pre Cabling</h3>
            </div>
            <div class="col-sm-6 text-right">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ route('pre-cabling.index') }}">index</a></li>
                    <li class="breadcrumb-item active">create</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container">
<h3 class="mt-3">ToolBoxTalk</h3> 
  
<form action="{{ isset($toolboxtalk['id']) ? route('PreCabling.toolboxtalkedit',$toolboxtalk['id']) : route('PreCabling.toolboxtalk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        @if(isset($siteSurvey))
            @method('PUT')
@endif
<div style="display:none;">
<input type="text" value="{{$sitesurveydata->nama_pe}}" name="nama_pe" />
     <input type="text" value="{{$sitesurveydata->id}}" name="site_survey_id"/>
</div>     

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <md-outlined-text-field label="Tarikh" type="date" class="label" id="tarikh" name="tarikh" value="{{ $toolboxTalk->tarikh ?? old('tarikh') }}" required></md-outlined-text-field>
        </div>
    </div>



    <div class="col-md-6">
        <div class="form-group">
            <md-outlined-text-field type="text" label="Skop Kerja" id="skop_kerja" name="skop_kerja" class="label" value="CABLING" readonly></md-outlined-text-field>
        </div>
    </div>

</div>


   
    <!-- PPD Safety fields -->
    <h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">PPD</span></h4>
    <div class="row">
        @foreach(['ppd_safety_helment', 'ppd_safety_vest', 'ppd_safety_shoes', 'ppd_safety'] as $field)
        <div class="col-md-6">
            <div class="form-group">
                <md-label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</md-label><br>
    
                <!-- Hidden input to ensure 'no' is submitted by default if nothing is selected -->
                <input type="hidden" name="{{ $field }}" value="no">
    
                <!-- Tabs for Yes/No -->
                <md-tabs id="tab-{{ $field }}" class="toggle-btn">
                    <!-- Yes Tab -->
                    <md-secondary-tab 
                        value="yes" 
                        id="tab-{{ $field }}-yes"
                        onclick="document.getElementById('{{ $field }}_yes').checked = true"
                        {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                    </md-secondary-tab>
    
                    <!-- No Tab -->
                    <md-secondary-tab 
                        value="no" 
                        id="tab-{{ $field }}-no"
                        onclick="document.getElementById('{{ $field }}_no').checked = true"
                        {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                    >
                        No
                    </md-secondary-tab>
                </md-tabs>
    
                <!-- Hidden radio buttons to maintain functionality -->
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field)) === 'yes' ? 'checked' : '' }}>

                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field)) === 'no' ? 'checked' : '' }}>
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
            <md-label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</md-label><br>

            <!-- Hidden input to ensure 'no' is submitted by default if nothing is selected -->
            <input type="hidden" name="{{ $field }}" value="no">

            <!-- Tabs for Yes/No -->
            <md-tabs id="tab-{{ $field }}" class="toggle-btn">
                <!-- Yes Tab -->
                <md-secondary-tab 
                    value="yes" 
                    id="tab-{{ $field }}-yes"
                    onclick="document.getElementById('{{ $field }}_yes').checked = true"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                >
                    Yes
                </md-secondary-tab>

                <!-- No Tab -->
                <md-secondary-tab 
                    value="no" 
                    id="tab-{{ $field }}-no"
                    onclick="document.getElementById('{{ $field }}_no').checked = true"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                >
                    No
                </md-secondary-tab>
            </md-tabs>

            <!-- Hidden radio buttons to maintain functionality -->
            <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" 
                {{ ($toolboxTalk->$field ?? old($field)) === 'yes' ? 'checked' : '' }}>
            <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" 
                {{ ($toolboxTalk->$field ?? old($field)) === 'no' ? 'checked' : '' }}>
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
                <md-label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</md-label><br>
    
                <!-- Hidden input to ensure 'no' is submitted by default if nothing is selected -->
                <input type="hidden" name="{{ $field }}" value="no">
    
                <!-- Tabs for Yes/No -->
                <md-tabs id="tab-{{ $field }}" class="toggle-btn">
                    <!-- Yes Tab -->
                    <md-secondary-tab 
                        value="yes" 
                        id="tab-{{ $field }}-yes"
                        onclick="document.getElementById('{{ $field }}_yes').checked = true; document.getElementById('{{ $field }}_no').checked = false;"
                        {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                    </md-secondary-tab>
    
                    <!-- No Tab -->
                    <md-secondary-tab 
                        value="no" 
                        id="tab-{{ $field }}-no"
                        onclick="document.getElementById('{{ $field }}_no').checked = true; document.getElementById('{{ $field }}_yes').checked = false;"
                        {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                    >
                        No
                    </md-secondary-tab>
                </md-tabs>
    
                <!-- Hidden radio buttons to maintain functionality -->
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field)) === 'yes' ? 'checked' : '' }}>
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field)) === 'no' ? 'checked' : '' }}>
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
            <md-label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</md-label><br>

            <!-- Hidden input to ensure 'no' is submitted by default if nothing is selected -->
            <input type="hidden" name="{{ $field }}" value="no">

            <!-- Tabs for Yes/No -->
            <md-tabs id="tab-{{ $field }}" class="toggle-btn">
                <!-- Yes Tab -->
                <md-secondary-tab 
                    value="yes" 
                    id="tab-{{ $field }}-yes"
                    onclick="document.getElementById('{{ $field }}_yes').checked = true; document.getElementById('{{ $field }}_no').checked = false;"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                >
                    Yes
                </md-secondary-tab>

                <!-- No Tab -->
                <md-secondary-tab 
                    value="no" 
                    id="tab-{{ $field }}-no"
                    onclick="document.getElementById('{{ $field }}_no').checked = true; document.getElementById('{{ $field }}_yes').checked = false;"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                >
                    No
                </md-secondary-tab>
            </md-tabs>

            <!-- Hidden radio buttons to maintain functionality -->
            <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" 
                {{ ($toolboxTalk->$field ?? old($field)) === 'yes' ? 'checked' : '' }}>
            <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" 
                {{ ($toolboxTalk->$field ?? old($field)) === 'no' ? 'checked' : '' }}>
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
            <md-label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</md-label><br>

            <!-- Hidden input to ensure 'no' is submitted by default if nothing is selected -->
            <input type="hidden" name="{{ $field }}" value="no">

            <!-- Tabs for Yes/No -->
            <md-tabs id="tab-{{ $field }}" class="toggle-btn">
                <!-- Yes Tab -->
                <md-secondary-tab 
                    value="yes" 
                    id="tab-{{ $field }}-yes"
                    onclick="document.getElementById('{{ $field }}_yes').checked = true; document.getElementById('{{ $field }}_no').checked = false;"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                >
                    Yes
                </md-secondary-tab>

                <!-- No Tab -->
                <md-secondary-tab 
                    value="no" 
                    id="tab-{{ $field }}-no"
                    onclick="document.getElementById('{{ $field }}_no').checked = true; document.getElementById('{{ $field }}_yes').checked = false;"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                >
                    No
                </md-secondary-tab>
            </md-tabs>

            <!-- Hidden radio buttons to maintain functionality -->
            <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" 
                {{ ($toolboxTalk->$field ?? old($field)) === 'yes' ? 'checked' : '' }}>
            <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" 
                {{ ($toolboxTalk->$field ?? old($field)) === 'no' ? 'checked' : '' }}>
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
            <md-label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</md-label><br>

            <!-- Hidden input to ensure 'no' is submitted by default if nothing is selected -->
            <input type="hidden" name="{{ $field }}" value="no">

            <!-- Tabs for Yes/No -->
            <md-tabs id="tab-{{ $field }}" class="toggle-btn">
                <!-- Yes Tab -->
                <md-secondary-tab 
                    value="yes" 
                    id="tab-{{ $field }}-yes"
                    onclick="handleTabClick('{{ $field }}', 'yes')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                >
                    Yes
                </md-secondary-tab>

                <!-- No Tab -->
                <md-secondary-tab 
                    value="no" 
                    id="tab-{{ $field }}-no"
                    onclick="handleTabClick('{{ $field }}', 'no')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                >
                    No
                </md-secondary-tab>
            </md-tabs>

            <!-- Hidden radio buttons to maintain functionality -->
            <input type="radio" id="{{ $field }}_yes_hidden" name="{{ $field }}" value="yes" style="display:none;" 
                {{ ($toolboxTalk->$field ?? old($field)) === 'yes' ? 'checked' : '' }}>
            <input type="radio" id="{{ $field }}_no_hidden" name="{{ $field }}" value="no" style="display:none;" 
                {{ ($toolboxTalk->$field ?? old($field)) === 'no' ? 'checked' : '' }}>
        </div>
    </div>
    @endforeach
</div>
<br>



<h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">TOOLBOX PICTURE</span></h4>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="picture_during_toolbox">Picture During Toolbox</label><br>
            <md-tabs id="tab-picture_during_toolbox" class="toggle-btn">
                <!-- Yes Radio Button -->
                <md-secondary-tab 
                    value="yes" 
                    id="tab-yes-picture_during_toolbox" 
                    onclick="toggleToolboxImageUpload('picture_during_toolbox', true, 'yes')"
                    {{ ($toolboxTalk->picture_during_toolbox ?? old('picture_during_toolbox', 'no')) === 'yes' ? 'active' : '' }}>
                    Yes
                    <input type="radio" id="picture_during_toolbox_yes" name="picture_during_toolbox" value="yes" style="display:none;" {{ ($toolboxTalk->picture_during_toolbox ?? old('picture_during_toolbox', 'no')) === 'yes' ? 'checked' : '' }}>
                </md-secondary-tab>
    
                <!-- No Radio Button -->
                <md-secondary-tab 
                    value="no" 
                    id="tab-no-picture_during_toolbox" 
                    onclick="toggleToolboxImageUpload('picture_during_toolbox', false, 'no')"
                    {{ ($toolboxTalk->picture_during_toolbox ?? old('picture_during_toolbox', 'no')) === 'no' ? 'active' : '' }}>
                    No
                    <input type="radio" id="picture_during_toolbox_no" name="picture_during_toolbox" value="no" style="display:none;" {{ ($toolboxTalk->picture_during_toolbox ?? old('picture_during_toolbox', 'no')) === 'no' ? 'checked' : '' }}>
                </md-secondary-tab>
            </md-tabs>
            
        </div>
    </div>
</div>

{!!$toolboxTalk!!}

<!-- Conditional Image Inputs -->
<div class="row">
    <div class="col-md-6">
        <div id="picture_during_toolbox_images" style="{{ ($toolboxTalk->picture_during_toolbox ?? old('picture_during_toolbox', 'no')) === 'yes' ? '' : 'display: none;' }}">
            <div class="form-group">
                <label for="toolbox_image1">Toolbox Image 1</label>
                <input type="file" class="form-control-file" id="toolbox_image1" name="toolbox_image1" onchange="previewImage(this, 'img_toolbox1')">
                @if(isset($toolboxTalk->toolbox_image1) && $toolboxTalk->toolbox_image1)
                    <img src="{{ asset($toolboxTalk->toolbox_image1) }}" alt="Toolbox Image 1" class="img-thumbnail mt-2" id="img_toolbox1" style="max-width: 200px;" onclick="document.getElementById('toolbox_image1').click();">
                @else
                    <img src="{{ URL::asset('assets/web-images/download.png') }}" alt="Toolbox Image 1" class="img-thumbnail mt-2" id="img_toolbox1" style="max-width: 200px;" onclick="document.getElementById('toolbox_image1').click();">
                @endif
            </div>
            
            <div class="form-group">
                <label for="toolbox_image2">Toolbox Image 2</label>
                <input type="file" class="form-control-file" id="toolbox_image2" name="toolbox_image2" onchange="previewImage(this, 'img_toolbox2')">
                @if(isset($toolboxTalk->toolbox_image2) && $toolboxTalk->toolbox_image2)
                    <img src="{{ asset($toolboxTalk->toolbox_image2) }}" alt="Toolbox Image 2" class="img-thumbnail mt-2" id="img_toolbox2" style="max-width: 200px;" onclick="document.getElementById('toolbox_image2').click();">
                @else
                    <img src="{{ URL::asset('assets/web-images/download.png') }}" alt="Toolbox Image 2" class="img-thumbnail mt-2" id="img_toolbox2" style="max-width: 200px;" onclick="document.getElementById('toolbox_image2').click();">
                @endif
            </div>
        </div>
    </div>
</div>


<div class="mt-3">
    <md-filled-tonal-button  type="submit"  id="submitBtn">{{ isset($siteSurvey) ? 'Update' : 'Create' }}</md-filled-tonal-button >
</div>
 </div>

 
    </form> 
    </div>
 @endsection 

 <script>
    function toggleImageInputs(show) {
    document.getElementById('image_inputs').style.display = show ? 'block' : 'none';
}

// Function to toggle the visibility of the image inputs based on the radio button selection
function toggleToolboxImageUpload(fieldName, show) {
    var imagesDiv = document.getElementById(fieldName + '_images');
    var yesRadio = document.getElementById(fieldName + '_yes');
    var noRadio = document.getElementById(fieldName + '_no');

    // Show or hide the images section based on the 'show' parameter
    if (show) {
        imagesDiv.style.display = '';
        yesRadio.checked = true;
    } else {
        imagesDiv.style.display = 'none';
        noRadio.checked = true;
    }
}

function handleTabClick(fieldName, value) {
    // Update hidden radio buttons based on the tab selection
    document.getElementById(`${fieldName}_${value}_hidden`).checked = true;
    document.getElementById(`${fieldName}_${value === 'yes' ? 'no' : 'yes'}_hidden`).checked = false;
    
    // Optionally, you can also add logic to manage UI changes based on the selected tab
    // For example, showing/hiding additional sections based on the selected value
}

// Function to preview an image before uploading
function previewImage(input, imgId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            // Set the src of the img element to the base64-encoded image data
            document.getElementById(imgId).src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Ensure these functions are properly called on document load or form initialization
document.addEventListener('DOMContentLoaded', function() {
    // Example to set initial state based on existing data
    var fieldName = 'picture_during_toolbox';
    var fieldValue = document.querySelector(`input[name="${fieldName}"]:checked`).value;
    toggleToolboxImageUpload(fieldName, fieldValue === 'yes');
});

 </script>   