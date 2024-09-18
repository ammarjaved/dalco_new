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
                <h3 style="color: #8e44ad;">SAT</h3>
            </div>
            <div class="col-sm-6 text-right">
                <ol class="breadcrumb float-right" >
                    <li class="breadcrumb-item"><a href="" style="color: #8e44ad;">index</a></li>
                    <li class="breadcrumb-item active" style="color: #8e44ad;">create</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container">
<h3 class="mt-3">ToolBoxTalk</h3> 
  
<form action="{{ isset($toolboxtalk['id']) ? route('SAT.toolboxtalkedit',$toolboxtalk['id']) : route('SAT.toolboxtalk.store') }}" method="POST" enctype="multipart/form-data">
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
        <div class="input-container" style="margin-top:5px">
            <input type="date" style=" height:50px !important;border-radius: 5px !important;width:60% !important;" id="tarikh" name="tarikh" value="{{ $toolboxTalk->tarikh ?? old('tarikh') }}" required>
            <label for="tarikh">Tarikh</label>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <md-outlined-text-field type="text" label="Skop Kerja" id="skop_kerja" name="skop_kerja" class="label" value="SAT" readonly>
        </div>
    </div>
</div>

   
    <!-- PPD Safety fields -->
    <h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">PPD</span></h4>
    <div class="row">
        @foreach(['ppd_safety_helment', 'ppd_safety_vest', 'ppd_safety_shoes', 'ppd_safety'] as $field)
        <div class="col-md-6">
            <div class="form-group">
                <md-label for="{{ $field }}">{{ ucwords(str_replace(['ppd_', '_'], ['PPD ', ' '], $field)) }}:</md-label><br>
                
                <!-- Hidden input to ensure 'no' is submitted by default if nothing is selected -->
                <input type="hidden" name="{{ $field }}" value="no">
    
                <!-- Tabs for Yes/No -->
                <md-tabs id="tab-{{ $field }}" class="toggle-btn">
                    <!-- Yes Tab -->
                    <md-secondary-tab 
                        value="yes" 
                        id="tab-{{ $field }}-yes"
                        onclick="document.getElementById('{{ $field }}_yes').checked = true; document.getElementById('{{ $field }}_no').checked = false;"
                        {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                    </md-secondary-tab>
    
                    <!-- No Tab -->
                    <md-secondary-tab 
                        value="no" 
                        id="tab-{{ $field }}-no"
                        onclick="document.getElementById('{{ $field }}_no').checked = true; document.getElementById('{{ $field }}_yes').checked = false;"
                        {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'no' ? 'active' : '' }}
                    >
                        No
                    </md-secondary-tab>
                </md-tabs>
    
                <!-- Hidden radio buttons to maintain functionality -->
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'yes' ? 'checked' : '' }}>
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'no' ? 'checked' : '' }}>
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
                        onclick="document.getElementById('{{ $field }}_yes').checked = true; document.getElementById('{{ $field }}_no').checked = false;"
                        {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                    </md-secondary-tab>
    
                    <!-- No Tab -->
                    <md-secondary-tab 
                        value="no" 
                        id="tab-{{ $field }}-no"
                        onclick="document.getElementById('{{ $field }}_no').checked = true; document.getElementById('{{ $field }}_yes').checked = false;"
                        {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'no' ? 'active' : '' }}
                    >
                        No
                    </md-secondary-tab>
                </md-tabs>
    
                <!-- Hidden radio buttons to maintain functionality -->
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'yes' ? 'checked' : '' }}>
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'no' ? 'checked' : '' }}>
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
                    {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'yes' ? 'active' : '' }}
                >
                    Yes
                </md-secondary-tab>

                <!-- No Tab -->
                <md-secondary-tab 
                    value="no" 
                    id="tab-{{ $field }}-no"
                    onclick="document.getElementById('{{ $field }}_no').checked = true; document.getElementById('{{ $field }}_yes').checked = false;"
                    {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'no' ? 'active' : '' }}
                >
                    No
                </md-secondary-tab>
            </md-tabs>

            <!-- Hidden radio buttons to maintain functionality -->
            <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" 
                {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'yes' ? 'checked' : '' }}>
            <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" 
                {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'no' ? 'checked' : '' }}>
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
                        {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                    </md-secondary-tab>
        
                    <!-- No Tab -->
                    <md-secondary-tab 
                        value="no" 
                        id="tab-{{ $field }}-no"
                        onclick="document.getElementById('{{ $field }}_no').checked = true; document.getElementById('{{ $field }}_yes').checked = false;"
                        {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'no' ? 'active' : '' }}
                    >
                        No
                    </md-secondary-tab>
                </md-tabs>
        
                <!-- Hidden radio buttons to maintain functionality -->
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'yes' ? 'checked' : '' }}>
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'no' ? 'checked' : '' }}>
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
                        {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                    </md-secondary-tab>
        
                    <!-- No Tab -->
                    <md-secondary-tab 
                        value="no" 
                        id="tab-{{ $field }}-no"
                        onclick="document.getElementById('{{ $field }}_no').checked = true; document.getElementById('{{ $field }}_yes').checked = false;"
                        {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'no' ? 'active' : '' }}
                    >
                        No
                    </md-secondary-tab>
                </md-tabs>
        
                <!-- Hidden radio buttons to maintain functionality -->
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'yes' ? 'checked' : '' }}>
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'no' ? 'checked' : '' }}>
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
                        onclick="document.getElementById('{{ $field }}_yes').checked = true; document.getElementById('{{ $field }}_no').checked = false;"
                        {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                    </md-secondary-tab>
    
                    <!-- No Tab -->
                    <md-secondary-tab 
                        value="no" 
                        id="tab-{{ $field }}-no"
                        onclick="document.getElementById('{{ $field }}_no').checked = true; document.getElementById('{{ $field }}_yes').checked = false;"
                        {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'no' ? 'active' : '' }}
                    >
                        No
                    </md-secondary-tab>
                </md-tabs>
    
                <!-- Hidden radio buttons to maintain functionality -->
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'yes' ? 'checked' : '' }}>
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" 
                    {{ ($toolboxTalk->$field ?? old($field, 'yes')) === 'no' ? 'checked' : '' }}>
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
                    <md-secondary-tab 
                        value="yes" 
                        id="val-tab-picture_during_toolbox_yes"
                        onclick="document.getElementById('picture_during_toolbox_yes').checked = true; document.getElementById('picture_during_toolbox_no').checked = false; document.getElementById('picture_during_toolbox_images').style.display = 'block';"
                        {{ ($toolboxTalk->picture_during_toolbox ?? old('picture_during_toolbox', 'yes')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                        <input type="radio" id="picture_during_toolbox_yes" name="picture_during_toolbox" value="yes" style="display:none;" {{ ($toolboxTalk->picture_during_toolbox ?? old('picture_during_toolbox', 'yes')) === 'yes' ? 'checked' : '' }}>
                    </md-secondary-tab>
                
                    <!-- No Radio Button -->
                    <md-secondary-tab 
                        value="no" 
                        id="val-tab-picture_during_toolbox_no"
                        onclick="document.getElementById('picture_during_toolbox_no').checked = true; document.getElementById('picture_during_toolbox_yes').checked = false; document.getElementById('picture_during_toolbox_images').style.display = 'none';"
                        {{ ($toolboxTalk->picture_during_toolbox ?? old('picture_during_toolbox', 'yes')) === 'no' ? 'active' : '' }}
                    >
                        No
                        <input type="radio" id="picture_during_toolbox_no" name="picture_during_toolbox" value="no" style="display:none;" {{ ($toolboxTalk->picture_during_toolbox ?? old('picture_during_toolbox', 'yes')) === 'no' ? 'checked' : '' }}>
                    </md-secondary-tab>
                </md-tabs>
                <!-- Image Uploads Section -->
                <div id="picture_during_toolbox_images" style="{{ ($toolboxTalk->picture_during_toolbox ?? old('picture_during_toolbox', 'yes')) === 'yes' ? '' : 'display: none;' }}">
                    @for ($i = 1; $i <= 2; $i++)
                        <div class="form-group">
                            <md-label for="toolbox_image{{ $i }}">
                                Toolbox Image {{ $i }}
                            </md-label>
                            <input type="file" class="form-control-file" id="toolbox_image{{ $i }}" name="toolbox_image{{ $i }}" onchange="previewImage(this, 'img_toolbox{{ $i }}')" {{ isset($toolboxTalk->{"toolbox_image{$i}"}) ? '' : 'hidden' }}>
                            @if (isset($toolboxTalk->{"toolbox_image{$i}"}) && $toolboxTalk->{"toolbox_image{$i}"})
                                <img onclick="document.getElementById('toolbox_image{{ $i }}').click();" src="{{ asset($toolboxTalk->{"toolbox_image{$i}"}) }}" id="img_toolbox{{ $i }}" alt="Toolbox Image {{ $i }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                            @else
                                <img onclick="document.getElementById('toolbox_image{{ $i }}').click();" src="{{ URL::asset('assets/web-images/download.png') }}" id="img_toolbox{{ $i }}" alt="Toolbox Image {{ $i }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                            @endif
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

<div class="mt-3">
    <md-filled-tonal-button type="submit"  id="submitBtn" >{{ isset($siteSurvey) ? 'Update' : 'Create' }}</md-filled-tonal-button>
  </div>
 </div>

 
    </form> 
    </div>
 @endsection 

 <script>
    function toggleImageInputs(show) {
    document.getElementById('image_inputs').style.display = show ? 'block' : 'none';
}


function toggleToolboxImageUpload(fieldName, show) {
    var imagesDiv = document.getElementById(fieldName + '_images');
    var yesRadio = document.getElementById(fieldName + '_yes');
    var noRadio = document.getElementById(fieldName + '_no');

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

 </script>   