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

    <section class="content-header">
        <div class="container-  ">
            <div class="row mb-2" style="flex-wrap:nowrap">
                <div class="col-sm-6">
                    <h3 style="color: #8e44ad;">Pre Cabling</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="">index</a></li>
                        <li class="breadcrumb-item active">create</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="container bg-white  shadow my-4 " style="border-radius: 10px">

                <h3 class="text-center mb-4"> PIW Checklist</h3>

                <form
                    action="{{ isset($piw['id']) ? route('pre-cabling.update', $piw['id']) : route('pre-cabling.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($piw))
                        @method('PUT')
                    @endif
                    @csrf

                    {{-- <div class="row">
                        <div class="col-md4"><label for="pe_name"></label></div>
                        <div class="col-md4"></div>
                    </div> --}}
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <md-outlined-text-field 
                                    label="Kontraktor PIW" 
                                    type="text"  
                                     class="label"
                                    id="kontraktor_piw" 
                                    name="kontraktor_piw" 
                                    value="{{!isset($site_survey_id) ? $piw->kontraktor_piw : Auth::user()->project }}" 
                                    readonly 
                                    required>
                                </md-outlined-text-field>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <md-outlined-text-field 
                                    type="text" 
                                     class="label"
                                    label="Kontraktor RTU" 
                                    id="kontraktor_rtu" 
                                    name="kontraktor_rtu" 
                                    value="{{!isset($site_survey_id) ? $piw->kontraktor_rtu : Auth::user()->vendor }}" 
                                    readonly 
                                    required>
                                </md-outlined-text-field>
                            </div>
                        </div>
                   
                        <div class="col-md-4">
                            <div class="form-group">
                                <md-outlined-text-field  
                                    type="text" 
                                    label="Nama PE" 
                                     class="label"
                                    id="nama_pe" 
                                    name="pe_name" 
                                    value="{{!isset($site_survey_id) ? $piw->pe_name : $nama_pe }}" 
                                    readonly 
                                    required>
                                </md-outlined-text-field>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-container" style="margin-top:5px">
                                <input 
                                    type="date"  
                                    style=" height:50px !important;border-radius: 5px !important;width:60% !important;" 
                                     
                                    id="tarikh" 
                                    name="tarikh" 
                                    value="{{!isset($site_survey_id) ? date('Y-m-d',strtotime($piw->tarikh)) : now() }}" 
                                    required>
                                
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="site_survey_id" value="{{ isset($site_survey_id) ? $site_survey_id : $piw->site_survey_id }}">

                    <div class="row">
                        @foreach ([
    'lokasi_efi' => 'Lokasi EFI Seteah Dipasang',
    'lokasi_rcb' => 'Lokasi RCB Seteah Dipasang',
    'connection_rcb' => 'Connection RCB',
    'lokasi_battary' => 'Lokasi Battery Charger Setelah Dipasang',
    'plate_battary' => 'Plate Battery Charger / Serial No',
    'lokasi_rtu' => 'Lokasi RTU Setelah Dipasang',
    'connection_rtu' => 'Connection RTU',
    'plate_rtu' => 'Plate RTU / Serial No',
    'laluan_cable_piw' => 'Laluan Cable (PIW)',
    'laluan_cable' => 'Laulan Cable'
] as $key => $field)
    <div class="col-md-4">
        <div class="form-group">
            <md-label for="{{ $key }}">{{ $field }}</label><br>

            <!-- Hidden input to ensure 'no' is submitted by default if nothing is selected -->
            <input type="hidden" name="{{ $key }}" value="no">

            <!-- Tabs for Yes/No -->
            <md-tabs id="tab-{{ $key }}" class="toggle-btn">
                <!-- Yes Tab -->
                <md-secondary-tab 
                    value="yes" 
                    id="tab-{{ $key }}-yes"
                    onclick="document.getElementById('{{ $key }}_yes').checked = true"
                    {{ ($piw->$key ?? old($key, 'yes')) === 'yes' ? 'active' : '' }}
                >
                    Yes
                </md-secondary-tab>

                <!-- No Tab -->
                <md-secondary-tab 
                    value="no" 
                    id="tab-{{ $key }}-no"
                    onclick="document.getElementById('{{ $key }}_no').checked = true"
                    {{ ($piw->$key ?? old($key, 'yes')) === 'no' ? 'active' : '' }}
                >
                    No
                </md-secondary-tab>
            </md-tabs>

            <!-- Hidden radio buttons to maintain functionality -->
            <input type="radio" id="{{ $key }}_yes" name="{{ $key }}" value="yes" style="display:none;" 
                {{ ($piw->$key ?? old($key)) === 'yes' || !isset($piw) ? 'checked' : '' }}>
            <input type="radio" id="{{ $key }}_no" name="{{ $key }}" value="no" style="display:none;" 
                {{ ($piw->$key ?? old($key)) === 'no' ? 'checked' : '' }}>
        </div>
    </div>
@endforeach

                    </div>
                    





                    <div class="text-center">
                        @if (isset($piw))
                        <a href="{{route('pre-cabling-piw.delete', $piw->id)}}">
                            <md-filled-tonal-button type="button" 
                                type="submit">Remove</md-filled-tonal-button>
                            </a>
                        @endif
                            <md-filled-tonal-button 
                                type="submit">{{ isset($piw) ? 'Update' : 'Create' }}</md-filled-tonal-button>
                    </div>

                </form>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
   
@endsection
