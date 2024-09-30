@extends('layouts.app', ['page_title' => 'Create'])

@section('content')


<style>
    .dropdown {
        position: relative;
    }
    .labels{
        width: 70vw;
    }
    
    .dropdown-menu {
        position: absolute;
        right: 100%; /* This positions the menu to the left of the icon */
        top: 0;
        display: none;
        
        
        border-radius: 4px;
        padding: 5px 0;
        z-index: 1000; /* Ensures the menu appears above other elements */
    }
    
    .dropdown-item {
        display: block;
        width: 100%;
        padding: 5px 15px;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
       
        border: 0;
    }
    
    
    .three-dots-icon{
        cursor: pointer;
    }
    
    /* Adjust the positioning of the dropdown to the right */
    .dropdown-menu {
        right: -20px; /* Moves the dropdown more to the right */
        position: absolute;
    }
    
    .dropdown-item:hover {
        background-color: #e2e6ea;
        border-radius: 5px;
    }
    
    .dropdown-menu {
        min-width: 150px;
        background-color: #fff;
        padding: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
            @media (max-width: 1024px) {
                .row {
                    flex-direction: column;
                }
                .col-md-4, .col-md-3 {
                    width: 100%;
                    margin-bottom: 15px;
                }
            }
    
            @media (max-width: 768px) {
                md-tabs {
                    flex-direction: column;
                }
                md-secondary-tab {
                    width: 100%;
                    margin-bottom: 5px;
                }
            }
    
            @media (max-width: 375px) {
                md-outlined-text-field,
                md-outlined-select {
                    width: 100%;
                }
                .input-container {
                    width: 100%;
                }
                input[type="date"] {
                    width: 100% !important;
                }
            }
    
            /* General improvements */
            .form-group {
                margin-bottom: 20px;
            }
            md-outlined-text-field,
            md-outlined-select,
            .input-container {
                width: 100%;
                max-width: 100%;
            }
            .toggle-btn {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }
            md-secondary-tab {
                flex: 1;
                min-width: 100px;
            }
    
    </style>



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



  <style>
        .tab-content > div {
            display: none;
            padding: 20px;
        }
        .tab-content > div.active {
            display: block;
        }
        .input-container {
            position: relative;
            margin-bottom: 10px;
           
        }
        md-menu-button {
        margin-left: 20px;
    }
    md-filled-tonal-button, md-filled-button {
        --md-sys-color-primary: #D7b4f3;
        --md-sys-color-on-primary: white;
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
        .disabled-tabs md-secondary-tab {
    pointer-events: none;
    opacity: 0.5;
}
.labels{
    width: 70vw;
}


       
    </style>



  <style>

.label{
    width: 70vw;
}


</style>

    <section class="content-header" >
        <div class="container-  ">
            <div class="row mb-2" style="flex-wrap:nowrap">
                <div class="col-sm-6">
                    <h3 style="color: #8e44ad;">Site Data</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <ol class="breadcrumb float-right" >
                        <li class="breadcrumb-item"><a href="{{ route('delco-summary') }}" style="color: #8e44ad;">index</a></li>
                        <li class="breadcrumb-item active" style="color: #8e44ad;">create</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content" >
        <div class="container-fluid" >
            <div class="container   shadow my-4 " style="border-radius: 10px;background-color:#f8f9f9;" >

                <h3 class="text-center mb-4"> Site Data Collections</h3>
                
<form action="{{ isset($siteSurvey['id']) ? route('site_survey.update', $siteSurvey['id']) : route('site_survey.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        @if(isset($siteSurvey))
            @method('PUT')
        @endif


        <md-tabs id="myTab">
            <md-primary-tab id="tab1-tab" active>Site Survey Info</md-primary-tab>
            <md-primary-tab id="tab2-tab">Site Survey Pic</md-primary-tab>
            <md-primary-tab id="tab3-tab">Tool Box Talk</md-primary-tab>
        </md-tabs>


    <div class="tab-content">
        <div id="tab1-content">
        <h3 class="mt-3">Site Survey Information</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <!-- <label for="nama_pe">Nama PE <span style="color: red;">*</span></label> -->
                    <md-outlined-text-field disabled label="Nama PE" class="label" id="nama_pe" name="nama_pe" value="{{ $siteSurvey->nama_pe ?? old('nama_pe') }}" required></md-outlined-text-field>
                    <div id="nama_pe_error" class="text-danger" style="display: none;">Please fill this field.</div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <!-- <label for="kawasan">Kawasan <span style="color: red;">*</span></label> -->
                    <md-outlined-text-field disabled label="Kawasan" class="label" id="kawasan" name="kawasan" value="{{ $siteSurvey->kawasan ?? \Auth::user()->area }}" required></md-outlined-text-field>
                    <div id="kawasan_error" class="text-danger" style="display: none;">Please fill this field.</div>
                </div>
            </div>

           
            <div  class="col-md-4" >
                <div class="form-group"  >
                    <!-- Peparit Label -->
                    <md-label  style="display: block; margin-top: -20px;">Peparit:</md-label>
            
                    <!-- Tabs for Peparit -->
                    <md-tabs  id="tab-peparit" class="disabled-tabs">
                        <!-- Yes Tab -->
                        <md-secondary-tab 
                            value="yes" 
                            ng-disabled="true" 
                            id="val-tab-peparit-yes" 
                            onclick="updateFieldValue('peparit', 'yes')"
                            {{ ($siteSurvey->peparit ?? old('peparit', 'no')) === 'yes' ? 'active' : '' }}
                        >
                            Yes
                            <input type="radio"  id="yes-peparit" name="peparit" value="yes" style="display:none;" 
                            {{ ($siteSurvey->peparit ?? old('peparit', 'no')) === 'yes' ? 'checked' : '' }}>
                        </md-secondary-tab>
            
                        <!-- No Tab -->
                        <md-secondary-tab 
                            value="no" 
                            ng-disabled="true" 
                            id="val-tab-peparit-no" 
                            onclick="updateFieldValue('peparit', 'no')"
                            {{ ($siteSurvey->peparit ?? old('peparit', 'no')) === 'no' ? 'active' : '' }}
                        >
                            No
                            <input type="radio"  id="no-peparit" name="peparit" value="no" style="display:none;" 
                            {{ ($siteSurvey->peparit ?? old('peparit', 'no')) === 'no' ? 'checked' : '' }}>
                        </md-secondary-tab>
                    </md-tabs>
                </div>
            </div>
        


        <div class="col-md-4">
        <div class="form-group">
            {{-- <label for="jenis">PE Jenis</label> --}}
            <md-outlined-select class="label" label="PE Jenis" name="jenis" id="jenis"  value="{{ $siteSurvey->jenis ?? old('jenis') }}">
                                <md-select-option value="" hidden>Select Type</md-select-option>
                                <md-select-option disabled value="STAND-ALONE"  {{ (old('jenis', $siteSurvey->jenis ?? '') == 'STANDALONE') ? 'selected' : '' }}>STANDALONE</md-select-option>
                                <md-select-option disabled value="ATTACHED" {{ (old('jenis', $siteSurvey->jenis ?? '') == 'ATTACHED') ? 'selected' : '' }}>ATTACHED</md-select-option>
                                <md-select-option  disabled value="OUTDOOR" {{ (old('jenis', $siteSurvey->jenis ?? '') == 'OUTDOOR') ? 'selected' : '' }}>OUTDOOR</md-select-option>
                                <md-select-option  disabled value="COMPACT" {{ (old('jenis', $siteSurvey->jenis ?? '') == 'COMPACT') ? 'selected' : '' }}>COMPACT</md-select-option>
            </md-outlined-select>
        </div>
        </div>

        
        <div class="col-md-4">
            <div class="form-group">
                <!-- <label for="fl">FL</label> -->
                <md-outlined-text-field disabled label="FL" id="fl" class="label" name="fl" value="{{ $siteSurvey->fl ?? old('fl') }}"/>
            </div>
            </div>

        <div class="col-md-4">
                <div class="form-group">
                    {{-- <label for="jenis_kompaun">Jenis Kompaun</label> --}}
                    <md-outlined-select label="Jenis Kompaun" class="label" id="jenis_kompaun" name="jenis_kompaun">
                {{-- <md-select-option value="">Pilih Jenis Kompaun</md-select-option> --}}
                <md-select-option disabled value="SIMEN" {{ (old('jenis_kompaun', $siteSurvey->jenis_kompaun ?? '') == 'Simen') ? 'selected' : '' }}>Simen</md-select-option>
                <md-select-option disabled value="RUMPUT" {{ (old('jenis_kompaun', $siteSurvey->jenis_kompaun ?? '') == 'Rumput') ? 'selected' : '' }}>Rumput</md-select-option>
                <md-select-option disabled value="INTER-LOCKING" {{ (old('jenis_kompaun', $siteSurvey->jenis_kompaun ?? '') == 'inter-locking') ? 'selected' : '' }}>inter-locking</md-select-option>
                <md-select-option disabled value="CRUSHER-RUN" {{ (old('jenis_kompaun', $siteSurvey->jenis_kompaun ?? '') == 'Crusher Run') ? 'selected' : '' }}>Crusher Run</md-select-option>
                <md-select-option disabled value="TIDAK" {{ (old('jenis_kompaun', $siteSurvey->jenis_kompaun ?? '') == 'Tidak') ? 'selected' : '' }}>Tidak</md-select-option>
            </md-outlined-select>

                </div>
        </div>   
        
        

        <div class="col-md-4">       
            <div class="form-group">
                <md-outlined-select label="Jenis Perkakasuis" id="jenis_perkakasuis" class="label" name="jenis_perkakasuis" value="{{ $siteSurvey->jenis_perkakasuis ?? old('jenis_perkakasuis') }}" onchange="konfiDisable(this.value)">
                    <md-select-option disabled value="VCB" {{ (old('jenis_perkakasuis', $siteSurvey->jenis_perkakasuis ?? '') == 'VCB') ? 'selected' : '' }}>VCB</md-select-option>
                    <md-select-option disabled value="RMU" {{ (old('jenis_perkakasuis', $siteSurvey->jenis_perkakasuis ?? '') == 'RMU') ? 'selected' : '' }}>RMU</md-select-option>
                    <md-select-option disabled value="CSU" {{ (old('jenis_perkakasuis', $siteSurvey->jenis_perkakasuis ?? '') == 'CSU') ? 'selected' : '' }}>CSU</md-select-option>
                </md-outlined-select>
            </div>
        </div>
        
        <div class="col-md-4">    
            <div class="form-group">
                <md-outlined-select disabled label="Konfigurasi" class="label" id="konfigurasi" name="konfigurasi" value="{{ $siteSurvey->konfigurasi ?? old('konfigurasi') }}" onchange="showOtherField(this.value)"> 
                    <!-- Options will be dynamically added here -->
                </md-outlined-select>
            </div>
        </div>
        
        <!-- Field to show when 'Other' is selected -->
        <div class="col-md-4" id="konfigurasi_other_field" style="display:none;">
            <div class="form-group">
                {{-- <label for="konfigurasi_other">Other Konfigurasi</label> --}}
                <md-outlined-text-field disabled type="text" label="Other Konfigurasi" class="label"  id="konfigurasi_other" name="konfigurasi_other" value="{{ $siteSurvey->konfigurasi_other ?? old('konfigurasi_other') }}">
                
            </div>
        </div>

        <div class="col-md-4">
                <div class="form-group">
                    {{-- <label for="jenama_alatsuis">Jenama Alatsuis</label> --}}
                    <md-outlined-text-field disabled label="Jenama Alatsuis" class="label" type="text" id="jenama_alatsuis" name="jenama_alatsuis" value="{{ $siteSurvey->jenama_alatsuis ?? old('jenama_alatsuis') }}">
                </div>
        </div>


        <div class="col-md-4">
                <div class="form-group">
                    {{-- <label for="jenis_model">Jenis Model</label> --}}
                    <md-outlined-text-field disabled label="Jenis Model" class="label" type="text"  id="jenis_model" name="jenis_model" value="{{ $siteSurvey->jenis_model ?? old('jenis_model') }}">
                </div>
        </div>
        
        <div class="col-md-4">
            <input type="date" id="tahun_pembinaan" 
            class="label" 
            name="tahun_pembinaan" 
            value="{{ isset($siteSurvey->tahun_pembinaan) ? \Carbon\Carbon::parse($siteSurvey->tahun_pembinaan)->format('Y-m-d') : old('tahun_pembinaan') }}" 
            readonly>
        </div>
        
        

        <div class="col-md-4">    
                <div class="form-group">
                    {{-- <label for="siri_alatsuis">Siri Alatsuis</label> --}}
                    <md-outlined-text-field disabled label="Siri Alatsuis" class="label" type="text"  id="siri_alatsuis" name="siri_alatsuis" value="{{ $siteSurvey->siri_alatsuis ?? old('siri_alatsuis') }}">
                </div>
        </div>


        <!-- Repeat for suis_no1, suis_label1, kabel_jenis1, kabel_saiz1 -->
        @for ($i = 1; $i <= 5; $i++)
        <div class="col-md-3">
            <div class="form-group">
                {{-- <label for="suis_no{{ $i }}">Suis No {{ $i }}</label> --}}
                <md-outlined-text-field disabled type="text" class="labels" label="Suis No {{ $i }}"  id="suis_no{{ $i }}" name="suis_no{{ $i }}" value="{{ $siteSurvey->{"suis_no{$i}"} ?? old("suis_no{$i}") }}">
            </div>
        </div>

        <div class="col-md-3"> 
                    <div class="form-group">
                        {{-- <label for="suis_label{{ $i }}">Suis Label {{ $i }}</label> --}}
                        <md-outlined-text-field  disabled type="text" label="Suis Label {{ $i }}" class="labels"  id="suis_label{{ $i }}" name="suis_label{{ $i }}" value="{{ $siteSurvey->{"suis_label{$i}"} ?? old("suis_label{$i}") }}">
                    </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                {{-- <label for="kabel_jenis{{ $i }}">Kabel Jenis {{ $i }}</label> --}}
                <!-- <input type="text" class="form-control" id="kabel_jenis{{ $i }}" name="kabel_jenis{{ $i }}" value="{{ $siteSurvey->{"kabel_jenis{$i}"} ?? old("kabel_jenis{$i}") }}"> -->
            <md-outlined-select class="labels" label="Kabel Jenis {{ $i }}" id="kabel_jenis{{ $i }}" name="kabel_jenis{{ $i }}">
                {{-- <option value="">Jenis Perkakasuis</option> --}}
                <md-select-option disabled value="PILC" {{ (old('kabel_jenis'.$i, $siteSurvey->{"kabel_jenis{$i}"} ?? '') == 'PILC') ? 'selected' : '' }}>PILC</md-select-option>
                <md-select-option disabled value="XLPE" {{ (old('kabel_jenis'.$i, $siteSurvey->{"kabel_jenis{$i}"} ?? '') == 'XLPE') ? 'selected' : '' }}>XLPE</md-select-option>
            </md-outlined-select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                        {{-- <label for="kabel_saiz{{ $i }}">Kabel Saiz {{ $i }}</label> --}}
                        <!-- <input type="text" class="form-control" id="kabel_saiz{{ $i }}" name="kabel_saiz{{ $i }}" value="{{ $siteSurvey->{"kabel_saiz{$i}"} ?? old("kabel_saiz{$i}") }}"> -->
            <md-outlined-select class="labels" label="Kabel Saiz {{ $i }}" id="kabel_saiz{{ $i }}" name="kabel_saiz{{ $i }}">
                {{-- <md-select-option value="">Jenis Perkakasuis</md-select-option> --}}
                <md-select-option disabled value="70MM" {{ (old('kabel_saiz'.$i, $siteSurvey->{"kabel_saiz{$i}"} ?? '') == '70MM') ? 'selected' : '' }}>70MM</md-select-option>
                <md-select-option disabled value="185MM" {{ (old('kabel_saiz'.$i, $siteSurvey->{"kabel_saiz{$i}"} ?? '') == '185MM') ? 'selected' : '' }}>185MM</md-select-option>
                <md-select-option disabled value="150MM" {{ (old('kabel_saiz'.$i, $siteSurvey->{"kabel_saiz{$i}"} ?? '') == '150MM') ? 'selected' : '' }}>150MM</md-select-option>
                <md-select-option disabled value="240MM" {{ (old('kabel_saiz'.$i, $siteSurvey->{"kabel_saiz{$i}"} ?? '') == '240MM') ? 'selected' : '' }}>240MM</md-select-option>
                <md-select-option disabled value="500MM" {{ (old('kabel_saiz'.$i, $siteSurvey->{"kabel_saiz{$i}"} ?? '') == '500MM') ? 'selected' : '' }}>500MM</md-select-option>
            </md-outlined-select>
            </div>
        </div>    
        @endfor

        <div class="col-md-4">
        <div class="form-group">
            {{-- <label for="fius_saiz">Fius Saiz</label> --}}
            <md-outlined-text-field  disabled label="Fius Saiz" class="label" type="text"  id="fius_saiz" name="fius_saiz" value="{{ $siteSurvey->fius_saiz ?? old('fius_saiz') }}">
        </div>
        </div>


        <div class="col-md-4">  
        <div class="form-group">
            {{-- <label for="ct_saiz_protection">CT Saiz Protection</label> --}}
            <md-outlined-text-field disabled type="text" label="CT Saiz Protection" class="label"  id="ct_saiz_protection" name="ct_saiz_protection" value="{{ $siteSurvey->ct_saiz_protection ?? old('ct_saiz_protection') }}">
        </div>
        </div>


        <div class="col-md-4">
        <div class="form-group">
            {{-- <label for="ct_saiz_metering">CT Saiz Metering</label> --}}
            <md-outlined-text-field disabled label="CT Saiz Metering" type="text" class="label" id="ct_saiz_metering" name="ct_saiz_metering" value="{{ $siteSurvey->ct_saiz_metering ?? old('ct_saiz_metering') }}">
        </div>
        </div>

        

        <div class="col-md-4">
            <div class="form-group">
                {{-- <label for="bacaan_beban">Bacaan Beban</label> --}}
                <md-outlined-text-field disabled class="label" type="text" label="Bacaan Beban"   id="bacaan_beban" name="bacaan_beban" value="{{ $siteSurvey->bacaan_beban ?? old('bacaan_beban') }}">
            </div>
            </div>



            <div class="col-md-4">
                <div class="form-group">
                    {{-- <label for="genset">Genset</label> --}}
                    <md-outlined-text-field disabled class="label" type="text" label="Genset"  id="genset" name="genset" value="{{ $siteSurvey->genset ?? old('genset') }}">
                </div>
                </div>
            



                <div class="col-md-4">
                    <div class="form-group">
                        {{-- <label for="keperluan_khas_kerja">Keperluan Khas Kerja</label> --}}
                        <md-outlined-text-field disabled class="label" type="text" label="Keperluan Khas Kerja"  id="keperluan_khas_kerja" name="keperluan_khas_kerja" value="{{ $siteSurvey->keperluan_khas_kerja ?? old('keperluan_khas_kerja') }}">
                    </div>
                    </div>
        


        <div class="col-md-4">
            <div class="form-group">
                <!-- Jenis LVDB Label -->
                <md-label style="display: block; ">Jenis LVDB:</md-label>
        
                <!-- Tabs for Jenis LVDB -->
                <md-tabs id="tab-jenis-lvdb" class="disabled-tabs">
                    <!-- DIN Tab -->
                    <md-secondary-tab 
                        value="DIN" 
                        id="val-tab-jenis-lvdb-din" 
                        onclick="updateFieldValue('jenis_lvdb', 'DIN')"
                        {{ ($siteSurvey->jenis_lvdb ?? old('jenis_lvdb', 'BS')) === 'DIN' ? 'active' : '' }}
                    >
                        DIN
                        <input type="radio" id="din-jenis-lvdb" name="jenis_lvdb" value="DIN" style="display:none;" 
                        {{ ($siteSurvey->jenis_lvdb ?? old('jenis_lvdb', 'BS')) === 'DIN' ? 'checked' : '' }}>
                    </md-secondary-tab>
        
                    <!-- BS Tab -->
                    <md-secondary-tab 
                        value="BS" 
                        id="val-tab-jenis-lvdb-bs" 
                        onclick="updateFieldValue('jenis_lvdb', 'BS')"
                        {{ ($siteSurvey->jenis_lvdb ?? old('jenis_lvdb', 'BS')) === 'BS' ? 'active' : '' }}
                    >
                        BS
                        <input type="radio" id="bs-jenis-lvdb" name="jenis_lvdb" value="BS" style="display:none;" 
                        {{ ($siteSurvey->jenis_lvdb ?? old('jenis_lvdb', 'BS')) === 'BS' ? 'checked' : '' }}>
                    </md-secondary-tab>
                </md-tabs>
            </div>
        </div>
        

        
        <div class="col-md-4">
            <div class="form-group">
                <!-- Bekalan LV Label -->
                <md-label style="display: block; ">Bekalan LV:</md-label>
        
                <!-- Tabs for Bekalan LV -->
                <md-tabs id="tab-bekalan_lv" class="disabled-tabs">
                    <!-- Yes Tab -->
                    <md-secondary-tab 
                        value="yes" 
                        id="val-tab-bekalan_lv-yes" 
                        onclick="updateFieldValue('bekalan_lv', 'yes')"
                        {{ ($siteSurvey->bekalan_lv ?? old('bekalan_lv', 'no')) === 'yes' ? 'active' : '' }}
                    >
                        Yes
                        <input type="radio" id="yes-bekalan_lv" name="bekalan_lv" value="yes" style="display:none;" 
                        {{ ($siteSurvey->bekalan_lv ?? old('bekalan_lv', 'no')) === 'yes' ? 'checked' : '' }}>
                    </md-secondary-tab>
        
                    <!-- No Tab -->
                    <md-secondary-tab 
                        value="no" 
                        id="val-tab-bekalan_lv-no" 
                        onclick="updateFieldValue('bekalan_lv', 'no')"
                        {{ ($siteSurvey->bekalan_lv ?? old('bekalan_lv', 'no')) === 'no' ? 'active' : '' }}
                    >
                        No
                        <input type="radio" id="no-bekalan_lv" name="bekalan_lv" value="no" style="display:none;" 
                        {{ ($siteSurvey->bekalan_lv ?? old('bekalan_lv', 'no')) === 'no' ? 'checked' : '' }}>
                    </md-secondary-tab>
                </md-tabs>
            </div>
        </div>
        

            <div class="col-md-4">
                <div class="form-group">
                    <!-- Jenis LVDB Label -->
                    <md-label style="display: block; ">Jenis Fius</md-label>
            
                    <!-- Tabs for Jenis LVDB -->
                    <md-tabs id="tab-jenis-fius" class="disabled-tabs">
                        <!-- DIN Tab -->
                        <md-secondary-tab 
                            value="DIN" 
                            id="val-tab-jenis-fius-din" 
                            onclick="updateFieldValue('jenis_fius', 'DIN')"
                            {{ ($siteSurvey->jenis_fius ?? old('jenis_fius', 'Time Laps')) === 'DIN' ? 'active' : '' }}
                        >
                            DIN
                            <input type="radio" id="din-jenis-fius" name="jenis_fius" value="DIN" style="display:none;" 
                            {{ ($siteSurvey->jenis_fius ?? old('jenis_fius', 'Time Laps')) === 'DIN' ? 'checked' : '' }}>
                        </md-secondary-tab>
            
                        <!-- BS Tab -->
                        <md-secondary-tab 
                            value="Time Laps" 
                            id="val-tab-jenis-fius-timelaps" 
                            onclick="updateFieldValue('jenis_fius', 'Time Laps')"
                            {{ ($siteSurvey->jenis_fius ?? old('jenis_fius', 'Time Laps')) === 'Time Laps' ? 'active' : '' }}
                        >
                        Time Laps
                            <input type="radio" id="timelaps-jenis-fius" name="jenis_fius" value="Time Laps" style="display:none;" 
                            {{ ($siteSurvey->jenis_lvdb ?? old('jenis_fius', 'Time Laps')) === 'Time Laps' ? 'checked' : '' }}>
                        </md-secondary-tab>
                    </md-tabs>
                </div>
            </div>
    

    



            <div class="col-md-4">
                <div class="form-group">
                    <!-- SCADA Status Label -->
                    <md-label style="display: block; ">SCADA Status:</md-label>
            
                    <!-- Tabs for SCADA Status -->
                    <md-tabs id="tab-scada_status" class="disabled-tabs">
                        <!-- Yes Tab -->
                        <md-secondary-tab 
                            value="yes" 
                            id="val-tab-scada_status-yes" 
                            onclick="updateFieldValue('scada_status', 'yes')"
                            {{ ($siteSurvey->scada_status ?? old('scada_status', 'no')) === 'yes' ? 'active' : '' }}
                        >
                            Yes
                            <input type="radio" id="yes-scada_status" name="scada_status" value="yes" style="display:none;" 
                            {{ ($siteSurvey->scada_status ?? old('scada_status', 'no')) === 'yes' ? 'checked' : '' }}>
                        </md-secondary-tab>
            
                        <!-- No Tab -->
                        <md-secondary-tab 
                            value="no" 
                            id="val-tab-scada_status-no" 
                            onclick="updateFieldValue('scada_status', 'no')"
                            {{ ($siteSurvey->scada_status ?? old('scada_status', 'no')) === 'no' ? 'active' : '' }}
                        >
                            No
                            <input type="radio" id="no-scada_status" name="scada_status" value="no" style="display:none;" 
                            {{ ($siteSurvey->scada_status ?? old('scada_status', 'no')) === 'no' ? 'checked' : '' }}>
                        </md-secondary-tab>
                    </md-tabs>
                </div>
            </div>
    
        </div>



        <div class="row">
            <div class="col-md-5">
                <input type="text" hidden  class="form-control" placeholder="lat" value="{{ $location->y ?? old('') }}" name="lat" id="lat" readonly>
            </div>
            <div class="col-md-5">
                <input type="text" hidden  class="form-control" placeholder="lng" value="{{ $location->x ?? old('') }}" name="lng" id="lng" readonly>
            </div>
        </div>
        <div id="map" style="height: 400px; width: 100%;" class="my-3"></div>

        
        
    </div>
    @php
            $pictureFields = [
                'substation_fl', 'existing_switchgear', 'switchgear_nameplate', 'distribution_board',
                'battery_charger', 'battery_charger_nameplate', 'ceiling_tray', 'civil_location',
                'substation_entrance', 'cable_route', 'genset_location', 'feeder_tx',
                'trench_view', 'rtu', 'rcb', 'efi', 'other'
            ];
        @endphp

<div id="tab2-content">
    <div class="row">
        @foreach ($pictureFields as $field)
            <div class="col-md-4">
                <div class="form-group">
                    <md-label style="display: block; margin-bottom: 5px;">
                        {{ ucwords(str_replace('_', ' ', $field)) }}:
                    </md-label>
                    <md-tabs id="tab-{{$field}}" class="disabled-tabs">
                        <!-- Yes Radio Button -->
                        <md-secondary-tab   value="yes" id="val-tab-{{$field}}" onclick="toggleFileUpload('{{ $field }}', true, 'yes')" {{ isset($siteSurvey1) && $siteSurvey1->$field == 'yes' ? 'active' : '' }}>
                            Yes
                            <input type="radio" id="yes-{{$field}}" name="{{ $field }}" value="yes" style="display:none;" {{ isset($siteSurvey1) && $siteSurvey1->$field == 'yes' ? 'checked' : '' }}>
                        </md-secondary-tab>

                        <!-- No Radio Button -->
                        <md-secondary-tab  value="no" id="val-tab-{{$field}}"  onclick="toggleFileUpload('{{ $field }}', false, 'no')" {{ !isset($siteSurvey1) || $siteSurvey1->$field == 'no' ? 'active' : '' }}>
                            No
                            <input type="radio" id="no-{{$field}}"  name="{{ $field }}" value="no" style="display:none;" {{ !isset($siteSurvey1) || $siteSurvey1->$field == 'no' ? 'checked' : '' }}>
                        </md-secondary-tab>
                    </md-tabs>

                    <!-- Image Uploads Section -->
                    <div id="{{ $field }}_images" style="{{ (isset($siteSurvey1) && $siteSurvey1->$field == 'yes') ? '' : 'display: none;' }}">
                        @for ($i = 1; $i <= ($field == 'other' ? 4 : 2); $i++)
                            <div class="form-group">
                                <md-label for="{{ $field }}_image{{ $i }}">
                                    {{ ucwords(str_replace('_', ' ', $field)) }} Image {{ $i }}
                                </md-label>
                                <input type="file" onselect="console.log(document.getElementById('{{ $field }}_image{{ $i }}'))" hidden class="form-control-file" id="{{ $field }}_image{{ $i }}" name="{{ $field }}_image{{ $i }}">
                                @if (isset($siteSurvey1) && $siteSurvey1->{"{$field}_image{$i}"})
                                    <img onclick="document.getElementById('{{ $field }}_image{{ $i }}').click();" src="{{ asset($siteSurvey1->{"{$field}_image{$i}"}) }}" id="img_{{ $field }}{{ $i }}" alt="{{ ucwords(str_replace('_', ' ', $field)) }} Image {{ $i }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                                @else
                                    <img onclick="document.getElementById('{{ $field }}_image{{ $i }}').click();" src="{{ URL::asset('assets/web-images/download.png') }}" id="img_{{ $field }}{{ $i }}" alt="{{ ucwords(str_replace('_', ' ', $field)) }} Image {{ $i }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
        
        <div id="tab3-content">
        <h3 class="mt-3">ToolBoxTalk</h3> 
    
        <div class="row">
            <div class="col-md-6">
                <div class="input-container" style="margin-top:5px">
                    <input class="label"  disabled type="date"  id="tarikh" name="tarikh" value="{{ $toolboxTalk->tarikh ?? old('tarikh') }}" required>
                    <label>Tarikh</label>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <md-outlined-text-field class="label" type="text" label="Skop Kerja" id="skop_kerja" name="skop_kerja" class="label" value="SITE-SURVEY" readonly>
                </div>
            </div>
        </div>

<h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">PPD</span></h4>


 <!-- PPD Safety fields -->
 <div class="row">
    @foreach(['ppd_safety_helment', 'ppd_safety_vest', 'ppd_safety_shoes', 'ppd_safety'] as $field)
    <div class="col-md-4">
        <div class="form-group">
            <md-label style="display: block; margin-bottom: 5px;">
                {{ ucwords(str_replace(['ppd_', '_'], ['PPD ', ' '], $field)) }}:
            </md-label>
            <md-tabs id="tab-{{ $field }}" class="disabled-tabs">
                <!-- Yes Tab -->
                <md-secondary-tab 
                    value="yes" 
                    id="val-tab-{{ $field }}-yes" 
                    onclick="updateFieldValue('{{ $field }}', 'yes')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                >
                    Yes
                    <input type="radio" id="yes-{{ $field }}" name="{{ $field }}" value="yes" style="display:none;" {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'checked' : '' }}>
                </md-secondary-tab>

                <!-- No Tab -->
                <md-secondary-tab 
                    value="no" 
                    id="val-tab-{{ $field }}-no" 
                    onclick="updateFieldValue('{{ $field }}', 'no')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                >
                    No
                    <input type="radio" id="no-{{ $field }}" name="{{ $field }}" value="no" style="display:none;" {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'checked' : '' }}>
                </md-secondary-tab>
            </md-tabs>
        </div>
    </div>
    @endforeach
</div>
<br>

<h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">EQUIPMENT & INSTRUMENT</span></h4>


 <!-- Equipment fields -->
 <div class="row">
    @foreach(['equipment_condition', 'instrument_condition', 'instrument_kit_condition'] as $field)
    <div class="col-md-4">
        <div class="form-group">
            <md-label style="display: block; margin-bottom: 5px;">
                {{ ucwords(str_replace('_', ' ', $field)) }}:
            </md-label>
            <md-tabs id="tab-{{ $field }}" class="disabled-tabs">
                <!-- Yes Tab -->
                <md-secondary-tab 
                    value="yes" 
                    id="val-tab-{{ $field }}-yes" 
                    onclick="updateFieldValue('{{ $field }}', 'yes')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                >
                    Yes
                    <input type="radio" id="yes-{{ $field }}" name="{{ $field }}" value="yes" style="display:none;" {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'checked' : '' }}>
                </md-secondary-tab>

                <!-- No Tab -->
                <md-secondary-tab 
                    value="no" 
                    id="val-tab-{{ $field }}-no" 
                    onclick="updateFieldValue('{{ $field }}', 'no')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                >
                    No
                    <input type="radio" id="no-{{ $field }}" name="{{ $field }}" value="no" style="display:none;" {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'checked' : '' }}>
                </md-secondary-tab>
            </md-tabs>
        </div>
    </div>
    @endforeach
</div>
<br>

<h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">VEHICLE</span></h4>

 <!-- Vehicle fields -->
 <div class="row">
    @foreach(['vehicle_fire_extinguisher', 'vehicle_condition'] as $field)
    <div class="col-md-4">
        <div class="form-group">
            <md-label style="display: block; margin-bottom: 5px;">
                {{ ucwords(str_replace('_', ' ', $field)) }}:
            </md-label>
            <md-tabs id="tab-{{ $field }}" class="disabled-tabs">
                <!-- Yes Tab -->
                <md-secondary-tab 
                    value="yes" 
                    id="val-tab-{{ $field }}-yes" 
                    onclick="updateFieldValue('{{ $field }}', 'yes')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                >
                    Yes
                    <input type="radio" id="yes-{{ $field }}" name="{{ $field }}" value="yes" style="display:none;" {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'checked' : '' }}>
                </md-secondary-tab>

                <!-- No Tab -->
                <md-secondary-tab 
                    value="no" 
                    id="val-tab-{{ $field }}-no" 
                    onclick="updateFieldValue('{{ $field }}', 'no')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                >
                    No
                    <input type="radio" id="no-{{ $field }}" name="{{ $field }}" value="no" style="display:none;" {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'checked' : '' }}>
                </md-secondary-tab>
            </md-tabs>
        </div>
    </div>
    @endforeach
</div>
<br>


<h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">TRAFFIC</span></h4>
 <!-- Traffic fields -->
 <div class="row">
    @foreach(['traffic_safety_kon', 'traffic_sign_board', 'traffic_chargeman'] as $field)
    <div class="col-md-4">
        <div class="form-group">
            <md-label style="display: block; margin-bottom: 5px;">
                {{ ucwords(str_replace('_', ' ', $field)) }}:
            </md-label>
            <md-tabs id="tab-{{ $field }}" class="disabled-tabs">
                <!-- Yes Tab -->
                <md-secondary-tab 
                    value="yes" 
                    id="val-tab-{{ $field }}-yes" 
                    onclick="updateFieldValue('{{ $field }}', 'yes')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                >
                    Yes
                    <input type="radio" id="yes-{{ $field }}" name="{{ $field }}" value="yes" style="display:none;" {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'checked' : '' }}>
                </md-secondary-tab>

                <!-- No Tab -->
                <md-secondary-tab 
                    value="no" 
                    id="val-tab-{{ $field }}-no" 
                    onclick="updateFieldValue('{{ $field }}', 'no')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                >
                    No
                    <input type="radio" id="no-{{ $field }}" name="{{ $field }}" value="no" style="display:none;" {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'checked' : '' }}>
                </md-secondary-tab>
            </md-tabs>
        </div>
    </div>
    @endforeach
</div>

<br>



<h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">TEAM</span></h4>

 <!-- Team fields -->
 <div class="row">
    @foreach(['team_ap_tnp', 'team_cp_tnb'] as $field)
    <div class="col-md-4">
        <div class="form-group">
            <md-label style="display: block; margin-bottom: 5px;">
                {{ ucwords(str_replace('_', ' ', $field)) }}:
            </md-label>
            <md-tabs id="tab-{{ $field }}" class="disabled-tabs">
                <!-- Yes Tab -->
                <md-secondary-tab 
                    value="yes" 
                    id="val-tab-{{ $field }}-yes" 
                    onclick="updateFieldValue('{{ $field }}', 'yes')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                >
                    Yes
                    <input type="radio" id="yes-{{ $field }}" name="{{ $field }}" value="yes" style="display:none;" {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'checked' : '' }}>
                </md-secondary-tab>

                <!-- No Tab -->
                <md-secondary-tab 
                    value="no" 
                    id="val-tab-{{ $field }}-no" 
                    onclick="updateFieldValue('{{ $field }}', 'no')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                >
                    No
                    <input type="radio" id="no-{{ $field }}" name="{{ $field }}" value="no" style="display:none;" {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'checked' : '' }}>
                </md-secondary-tab>
            </md-tabs>
        </div>
    </div>
    @endforeach
</div>
<br>



<h4><span style="background-color: #fef7ff; color: #8e44ad; padding: 0 5px;">NIOS & PERMIT</span></h4>
 <!-- NIOSH fields -->
 <div class="row">
    @foreach(['niosh_staff_ntsp', 'permit_special', 'permit_work'] as $field)
    <div class="col-md-4">
        <div class="form-group">
            <md-label style="display: block; margin-bottom: 5px;">
                {{ ucwords(str_replace('_', ' ', $field)) }}:
            </md-label>
            <md-tabs id="tab-{{ $field }}" class="disabled-tabs">
                <!-- Yes Tab -->
                <md-secondary-tab 
                    value="yes" 
                    id="yes-tab-{{ $field }}" 
                    onclick="updateFieldValue('{{ $field }}', 'yes')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'active' : '' }}
                >
                    Yes
                    <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="display:none;" {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'yes' ? 'checked' : '' }}>
                </md-secondary-tab>

                <!-- No Tab -->
                <md-secondary-tab 
                    value="no" 
                    id="no-tab-{{ $field }}" 
                    onclick="updateFieldValue('{{ $field }}', 'no')"
                    {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'active' : '' }}
                >
                    No
                    <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="display:none;" {{ ($toolboxTalk->$field ?? old($field, 'no')) === 'no' ? 'checked' : '' }}>
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
            <md-tabs id="tab-picture_during_toolbox" class="disabled-tabs">
                <!-- Yes Radio Button -->
                <md-secondary-tab value="yes" id="val-tab-picture_during_toolbox" onclick="toggleToolboxImageUpload('picture_during_toolbox', true, 'yes')" {{ isset($toolboxTalk) && $toolboxTalk->picture_during_toolbox == 'yes' ? 'active' : '' }}>
                    Yes
                    <input type="radio" id="yes-picture_during_toolbox" name="picture_during_toolbox" value="yes" style="display:none;" {{ isset($toolboxTalk) && $toolboxTalk->picture_during_toolbox == 'yes' ? 'checked' : '' }}>
                </md-secondary-tab>

                <!-- No Radio Button -->
                <md-secondary-tab value="no" id="val-tab-picture_during_toolbox" onclick="toggleToolboxImageUpload('picture_during_toolbox', false, 'no')" {{ !isset($toolboxTalk) || $toolboxTalk->picture_during_toolbox == 'no' ? 'active' : '' }}>
                    No
                    <input type="radio" id="no-picture_during_toolbox" name="picture_during_toolbox" value="no" style="display:none;" {{ !isset($toolboxTalk) || $toolboxTalk->picture_during_toolbox == 'no' ? 'checked' : '' }}>
                </md-secondary-tab>
            </md-tabs>

            <!-- Image Uploads Section -->
            <div id="picture_during_toolbox_images" style="{{ (isset($toolboxTalk) && $toolboxTalk->picture_during_toolbox == 'yes') ? '' : 'display: none;' }}">
                @for ($i = 1; $i <= 2; $i++)
                    <div class="form-group">
                        <md-label for="toolbox_image{{ $i }}">
                            Toolbox Image {{ $i }}
                        </md-label>
                        <input type="file" onchange="previewImage(this, 'img_toolbox{{ $i }}')" hidden class="form-control-file" id="toolbox_image{{ $i }}" name="toolbox_image{{ $i }}">
                        @if (isset($toolboxTalk) && $toolboxTalk->{"toolbox_image{$i}"})
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

{{-- <md-filled-tonal-button type="submit"  id="submitBtn">{{ isset($siteSurvey) ? 'Update' : 'Create' }}</md-filled-tonal-button> --}}

        </div>
    </div>


        
    </form>

    <div class="mt-3">
        <md-filled-tonal-button type="button" style='visibility:hidden;'  id="prevBtn" onclick="handleNavigation('previous')">Previous</md-filled-tonal-button>
         <md-filled-tonal-button type="button"  style='visibility:visible;' id="nextBtn" onclick="handleNavigation('next')">Next</md-filled-tonal-button>
      
    
      </div>

   
    </div>
	</div>
    </section>
@endsection

<script>

const tabOrder = ['tab1-tab', 'tab2-tab', 'tab3-tab']; // Update this array with your actual tab IDs in order


function handleNavigation1(targetTabId) {

    if(targetTabId=='tab1-tab'){
        document.getElementById('prevBtn').style.visibility = 'hidden'
         document.getElementById('nextBtn').style.visibility = 'visible'
    }else if(targetTabId=='tab3-tab'){
         document.getElementById('nextBtn').style.visibility = 'hidden'
    }else{
        document.getElementById('prevBtn').style.visibility = 'visible'
         document.getElementById('nextBtn').style.visibility = 'visible'
    }
    window.scrollTo(0, 0);
}

function handleNavigation(direction) {
    const currentTabId = getCurrentTabId();
    const currentIndex = tabOrder.indexOf(currentTabId);

   
    let targetIndex;
    if (direction === 'next') {
        targetIndex = (currentIndex + 1) % tabOrder.length;
    } else { // previous
        targetIndex = (currentIndex - 1 + tabOrder.length) % tabOrder.length;
    }
    
    const targetTabId = tabOrder[targetIndex];
    const targetTab = document.getElementById(targetTabId);

    if(targetTabId=='tab1-tab'){
        document.getElementById('prevBtn').style.visibility = 'hidden'
         document.getElementById('nextBtn').style.visibility = 'visible'
    }else if(targetTabId=='tab3-tab'){
         document.getElementById('nextBtn').style.visibility = 'hidden'
    }else{
        document.getElementById('prevBtn').style.visibility = 'visible'
         document.getElementById('nextBtn').style.visibility = 'visible'
    }
    
    
    if (targetTab) {
        targetTab.click();
        window.scrollTo(0, 0);
        console.log(`Navigated to ${direction} tab: ${targetTabId}`);
    } else {
        console.error(`Target tab not found: ${targetTabId}`);
    }
}

function getCurrentTabId() {
    for (let tabId of tabOrder) {
        const tab = document.getElementById(tabId);
        if (tab && tab.getAttribute('active') !== null) {
            return tabId;
        }
    }
    return tabOrder[0]; // Default to first tab if no active tab found
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

function updateFieldValue(field, value) {
    // Find the corresponding radio button and set it as checked
    var radioInput = document.querySelector(`input[name="${field}"][value="${value}"]`);
    if (radioInput) {
        radioInput.checked = true;
    }

    // Optionally, you can submit the form here if needed
    // document.querySelector('form').submit();
}

function toggleFileUpload(field, show, val) {

    var fileUploadDiv = document.getElementById(field + '_images');
    fileUploadDiv.style.display = show ? 'block' : 'none';
    if(val==="yes")
{
    document.getElementById(`yes-${field}`).checked=true;
}
else{

    document.getElementById(`no-${field}`).checked=true;
}
   
        // obj.checked=true;
       
    
        // tab.classList.remove('active');
    

    // Add 'active' class to the clicked tab
    // event.currentTarget.classList.add('active');

    // // Update the hidden radio input
    // const radioInput = event.currentTarget.querySelector('input[type="radio"]');
    // radioInput.checked = true;
}

function toggleImageInputs(show) {
    document.getElementById('image_inputs').style.display = show ? 'block' : 'none';
}

// Initialize based on existing data if any
document.addEventListener('DOMContentLoaded', function() {
    var isYes = document.querySelector('input[name="picture_during_toolbox"]:checked')?.value === 'yes';
    toggleImageInputs(isYes);
});


var currentTabIndex = 0;
const tabs = ['#tab1', '#tab2', '#tab3'];

function updateButtonsfromTabs(i) {

    currentTabIndex = i;
    updateButtons();
}


function updateButtons() {
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');

        // Handle button display
        if (prevBtn) prevBtn.style.display = currentTabIndex === 0 ? 'none' : 'inline-block';
        if (nextBtn) nextBtn.style.display = currentTabIndex === tabs.length - 1 ? 'none' : 'inline-block';
        if (submitBtn) submitBtn.style.display = currentTabIndex === tabs.length - 1 ? 'inline-block' : 'none';
    }


    function konfiDisable(selectedValue) {
    let konfigurasiDropdown = document.getElementById('konfigurasi');
    konfigurasiDropdown.innerHTML = ''; // Clear existing options
    
    if (selectedValue === 'VCB') {
        // Add specific options for VCB
        konfigurasiDropdown.innerHTML += `
            <md-select-option disabled value="SSU">SSU</md-select-option>
            <md-select-option disabled value="SS">SS</md-select-option>
            <md-select-option disabled value="PE">PE</md-select-option>
            <md-select-option disabled value="OTHER">Other</md-select-option>
        `;
        $("#konfigurasi").prop('disabled', false);
    } else if (selectedValue === 'CSU') {
        // Only show 2+1 for CSU
        konfigurasiDropdown.innerHTML += `<md-select-option value="2+1">2+1</md-select-option>`;
        $("#konfigurasi").prop('disabled', false);
    } else if (selectedValue === 'RMU') {
        // Add options for RMU
        konfigurasiDropdown.innerHTML += `
            <md-select-option disabled  value="2S+1F">2S+1F</md-select-option>
            <md-select-option disabled value="2S+2F">2S+2F</md-select-option>
            <md-select-option disabled value="3S">3S</md-select-option>
            <md-select-option disabled value="3S+1F">3S+1F</md-select-option>
            <md-select-option disabled value="3S+2F">3S+2F</md-select-option>
        `;
        $("#konfigurasi").prop('disabled', false);
    } else {
        $("#konfigurasi").prop('disabled', true);
    }

    // Hide the 'Other' field by default when changing 'jenis_perkakasuis'
    document.getElementById('konfigurasi_other_field').style.display = 'none';
}

function showOtherField(selectedKonfigurasi) {
    if (selectedKonfigurasi === 'OTHER') {
        document.getElementById('konfigurasi_other_field').style.display = 'block';
    } else {
        document.getElementById('konfigurasi_other_field').style.display = 'none';
    }
}

// On page load, handle the case where the user might have previously selected 'VCB' and 'Other'
document.addEventListener('DOMContentLoaded', function () {
    const currentJenisPerkakasuis = "{{ $siteSurvey->jenis_perkakasuis ?? old('jenis_perkakasuis') }}";
    const currentKonfigurasi = "{{ $siteSurvey->konfigurasi ?? old('konfigurasi') }}";
    const otherKonfigurasiValue = "{{ $siteSurvey->konfigurasi_other ?? old('konfigurasi_other') }}";

    // Trigger the initial population of konfigurasi options
    konfiDisable(currentJenisPerkakasuis);

    // Set the konfigurasi dropdown to its previous value
    if (currentKonfigurasi) {
        document.getElementById('konfigurasi').value = currentKonfigurasi;
    }

    // If 'Other' was previously selected and has a value, show the 'Other' input box with pre-filled value
    if (currentJenisPerkakasuis === 'VCB' && currentKonfigurasi === 'OTHER' && otherKonfigurasiValue !== '') {
        document.getElementById('konfigurasi_other_field').style.display = 'block';
        document.getElementById('konfigurasi_other').value = otherKonfigurasiValue;
    }
});

// Function to check if all required images are uploaded
document.addEventListener('DOMContentLoaded', function() {
  
   

    // $('.nav-tabs li').click(function() {
    //     checkactiveTabId();
    // })

    

    validateImageUploads();

    function validateImageUploads() {
        let isValid = true;
        const pictureFields = [
            'substation_fl', 'existing_switchgear', 'switchgear_nameplate', 'distribution_board',
            'battery_charger', 'battery_charger_nameplate', 'ceiling_tray', 'civil_location',
            'substation_entrance', 'cable_route', 'genset_location', 'feeder_tx',
            'trench_view', 'rtu', 'rcb', 'efi', 'other'
        ];

        var status= '{{isset($siteSurvey['id'])}}';


        var j=1;
       for(var i=0;i<pictureFields.length;i++){
         for(var j=1;j<3;j++){
        $('#'+pictureFields[i]+'_image'+j).change(function() {
          //  var input = $('#'+pictureFields[i]+'_image'+j)[0];
              var input=this;
                   var inputid=input.id;
                  var img_name=inputid.split('_');
                      imgsrc='';
                   if(img_name.length==3){
                    imgsrc=img_name[0]+'_'+img_name[1]+img_name[2].charAt(img_name[2].length-1);
                   }else if(img_name.length==4){
                    imgsrc=img_name[0]+'_'+img_name[1]+'_'+img_name[2]+img_name[3].charAt(img_name[3].length-1);
                   }else if(img_name.length==2){
                    imgsrc=img_name[0]+img_name[1].charAt(img_name[1].length-1);
                   }

            if (input.files && input.files.length > 0) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img_'+imgsrc).attr('src',e.target.result).show()
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        });


    }
    }


   
   

        
    

        if(status==''){
        pictureFields.forEach(field => {
            const isYesChecked = document.querySelector(`input[name="${field}"][value="yes"]`).checked;
            if (isYesChecked) {
                const files = document.querySelector('input[type="file"]');
                let allFilesUploaded = Array.from(files).every(input => input.files.length > 0);
                
                if (!allFilesUploaded) {
                    isValid = false;
                }
                
            }

        });
     }else{
        pictureFields.forEach(field => {
        const isYesChecked = document.querySelector(`input[name="${field}"][value="yes"]`).checked;
        if(isYesChecked){
       if(field=='other'){
        for(var i=1;i<=4;i++){
           var srcVal= $('#img_'+field+i).attr('src');
           if(!srcVal){
            isValid = false;
           }
        }
              
       }else{
        for(var i=1;i<=2;i++){
           var srcVal= $('#img_'+field+i).attr('src');
           if(!srcVal){
            isValid = false;
           }
        }
       }
    }

       });
     }

        return isValid;
    }



    

    function validateFields() {
        const namaPe = document.getElementById('nama_pe').value.trim();
        const kawasan = document.getElementById('kawasan').value.trim();
        let isValid = true;

        // Reset error messages
        document.getElementById('nama_pe_error').style.display = 'none';
        document.getElementById('kawasan_error').style.display = 'none';

        if (namaPe === '') {
            document.getElementById('nama_pe_error').style.display = 'block';
            isValid = false;
        }

        if (kawasan === '') {
            document.getElementById('kawasan_error').style.display = 'block';
            isValid = false;
        }

        return isValid && validateImageUploads();
    }

    function navigate(direction) {

        if (direction === 1 && !validateFields()) {
            alert('Please complete all required fields.');
            return; // Prevent navigation if validation fails
        }
        currentTabIndex += direction;

        const tabs = document.querySelector('md-tabs');
        const tabContents = document.querySelectorAll('.tab-content > div');

        function showTabContent(index) {
                tabContents.forEach((content, i) => {
                    if (i === index) {
                        content.classList.add('active');
                    } else {
                        content.classList.remove('active');
                    }
                });
            }

           // tabs.addEventListener('change', (event) => {
                showTabContent(currentTabIndex);
              //  updateButtons();

           // });
       
        // if (currentTabIndex >= 0 && currentTabIndex < tabs.length) {
            
        //     const tabElement = document.querySelector(`a[href="${tabs[currentTabIndex]}"]`);
        //     if (tabElement && typeof bootstrap !== 'undefined') {
        //         const tab = new bootstrap.Tab(tabElement);
        //         tab.show();
        //     } else {
        //         console.error('Tab element not found or Bootstrap is not available');
        //     }
         
        //     updateButtons();
        // }
      
    }

    // Initialize button states
   // updateButtons();

    // Add event listener for tab changes
    document.querySelectorAll('a[data-toggle="tab"]').forEach(function(tabElement) {
        tabElement.addEventListener('shown.bs.tab', function (e) {
            currentTabIndex = tabs.indexOf(e.target.getAttribute('href'));
            updateButtons();
        });
    });

    // Navigation button click handlers
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    if (prevBtn) prevBtn.addEventListener('click', function() { navigate(-1); });
    if (nextBtn) nextBtn.addEventListener('click', function() { navigate(1); });
});





document.addEventListener('DOMContentLoaded', function () {
                    let map = L.map('map').setView([3.2888784335929744,102.06586684019376], 8);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                    var mark1='';

                    if($("#lat").val()!='' && $("#lng").val()!=''){
                        mark1= L.marker([$("#lat").val(),$("#lng").val()]).addTo(map)

                        map.setView([$("#lat").val(),$("#lng").val()]);
                    }
                    
                    
                   

                    // map.on('click', function (e) {
                    //     if(mark1!=''){
                    //         map.removeLayer(mark1);
                    //     }
                      
                    // mark1= L.marker([e.latlng.lat,e.latlng.lng]).addTo(map)

                    //     document.getElementById('lat').value = e.latlng.lat;
                    //     document.getElementById('lng').value = e.latlng.lng;
                    // });

                    setTimeout(() => {
            map.invalidateSize();
        }, 500);
                });


        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelector('md-tabs');
            const tabContents = document.querySelectorAll('.tab-content > div');

            
            function showTabContent(index) {
                tabContents.forEach((content, i) => {
                    if (i === index) {
                        content.classList.add('active');
                    } else {
                        content.classList.remove('active');
                    }
                });
            }
            

            tabs.addEventListener('change', (event) => {
                showTabContent(event.target.activeTabIndex);
            });

            // Show the first tab content by default
            showTabContent(0);
        });

</script>





