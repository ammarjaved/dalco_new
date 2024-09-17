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
                    <h3 style="color: #8e44ad;">Pre Cabling</h3>
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
    <section class="content">
        <div class="container-fluid">
            <div class="container bg-white  shadow my-4 " style="border-radius: 10px">

                <h3 class="text-center mb-4"> Pre-ShutDown Form</h3>

                <form
                    action="{{ isset($piw['id']) ? route('pre-cabling-shut-down.update', $piw['id']) : route('pre-cabling-shut-down.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($piw))
                        @method('PUT')
                    @endif
                    @csrf

                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- <label for="nama_pe">Nama PE </label> --}}
                            <md-outlined-text-field label="Nama PE"  class="label" type="text" class="form-control" id="substation_name" readonly name="substation_name" value="{{!isset($site_survey_id) ? $piw->substation_name : $nama_pe }}" required>
                           
                        </div>
                    </div>

                    <input type="hidden" name="site_survey_id" value="{{isset($site_survey_id) ? $site_survey_id : $piw->site_survey_id}}">

                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="my-4" style="font-weight: 600">Remote Control Box</h2>
                            @foreach ([
                                'rcb_telah' => 'RCB Telah Dipasang & Semua Kabel Telah Dibuat Tamatann', 
                                'rcb_setiap' => 'Setiap Set Kabel Telah Dilabelkan Degan Betul', 
                                'rcb_modifikasi' => 'Modifikasi dalam RCB Telah Dibuat', 
                                'rcb_ujian' => 'Ujian Keterusan Litar Untuk Setiap Kabel Telah Dibuat', 
                                'rcb_pemasangan' => 'Pemasangan Kemas dan Teratur'
                            ] as $key => $field)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <md-label for="{{ $key }}">{{ $field }}</md-label><br>
                        
                                            <!-- Hidden input to ensure 'no' is submitted by default if nothing is selected -->
                                            <input type="hidden" name="{{ $key }}" value="no">
                        
                                            <!-- Tabs for Yes/No -->
                                            <md-tabs id="tab-{{ $key }}" class="toggle-btn">
                                                <!-- Yes Tab -->
                                                <md-secondary-tab 
                                                    value="yes" 
                                                    id="tab-{{ $key }}-yes"
                                                    onclick="document.getElementById('{{ $key }}_yes').checked = true"
                                                    {{ ($piw->$key ?? old($key, 'no')) === 'yes' ? 'active' : '' }}
                                                >
                                                    Yes
                                                </md-secondary-tab>
                        
                                                <!-- No Tab -->
                                                <md-secondary-tab 
                                                    value="no" 
                                                    id="tab-{{ $key }}-no"
                                                    onclick="document.getElementById('{{ $key }}_no').checked = true"
                                                    {{ ($piw->$key ?? old($key, 'no')) === 'no' ? 'active' : '' }}
                                                >
                                                    No
                                                </md-secondary-tab>
                                            </md-tabs>
                        
                                            <!-- Hidden radio buttons to maintain functionality -->
                                            <input type="radio" id="{{ $key }}_yes" name="{{ $key }}" value="yes" style="display:none;" 
                                                {{ ($piw->$key ?? old($key)) === 'yes' ? 'checked' : '' }}>
                                            <input type="radio" id="{{ $key }}_no" name="{{ $key }}" value="no" style="display:none;" 
                                                {{ ($piw->$key ?? old($key)) === 'no' ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="col-md-6">
                            <h2 class="my-4" style="font-weight: 600">Remote Terminal Unit</h2>
                            @foreach ([
                                'rtu_rcb' => 'RCB Telah Dipasang & Semua Kabel Telah Dibuat Tamatann', 
                                'rtu_setiap' => 'Setiap Set Kabel Telah Dilabelkan Degan Betul', 
                                'rtu_ujian' => 'Ujian Keterusan Litar Untuk Setiap Kabel Telah Dibuat', 
                                'rtu_pemasangan' => 'Pemasangan Kemas dan Teratur'
                            ] as $key => $field)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <md-label for="{{ $key }}">{{ $field }}</md-label><br>
                        
                                            <!-- Hidden input to ensure 'no' is submitted by default if nothing is selected -->
                                            <input type="hidden" name="{{ $key }}" value="no">
                        
                                            <!-- Tabs for Yes/No -->
                                            <md-tabs id="tab-{{ $key }}" class="toggle-btn">
                                                <!-- Yes Tab -->
                                                <md-secondary-tab 
                                                    value="yes" 
                                                    id="tab-{{ $key }}-yes"
                                                    onclick="document.getElementById('{{ $key }}_yes').checked = true"
                                                    {{ ($piw->$key ?? old($key, 'no')) === 'yes' ? 'active' : '' }}
                                                >
                                                    Yes
                                                </md-secondary-tab>
                        
                                                <!-- No Tab -->
                                                <md-secondary-tab 
                                                    value="no" 
                                                    id="tab-{{ $key }}-no"
                                                    onclick="document.getElementById('{{ $key }}_no').checked = true"
                                                    {{ ($piw->$key ?? old($key, 'no')) === 'no' ? 'active' : '' }}
                                                >
                                                    No
                                                </md-secondary-tab>
                                            </md-tabs>
                        
                                            <!-- Hidden radio buttons to maintain functionality -->
                                            <input type="radio" id="{{ $key }}_yes" name="{{ $key }}" value="yes" style="display:none;" 
                                                {{ ($piw->$key ?? old($key)) === 'yes' ? 'checked' : '' }}>
                                            <input type="radio" id="{{ $key }}_no" name="{{ $key }}" value="no" style="display:none;" 
                                                {{ ($piw->$key ?? old($key)) === 'no' ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
            </div>

            <h2 class="my-4" style="font-weight: 600">Cable</h2>
            @foreach ([
                'cable_laluan' => 'Laluan Kabel Dan Tray Yang Tersusun', 
                'cable_kabel' => 'Kabel Yang Dipasang Mengikut Spesifikasi TNB', 
                'cable_pemasangan' => 'Pemasangan Kemas Dan Teratur', 
                'cable_kawasan' => 'Kawasan Kerja Telah Dibersihkan'
            ] as $key => $field)
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <md-label for="{{ $key }}">{{ $field }}</md-label><br>
            
                            <!-- Hidden input to ensure 'no' is submitted by default if nothing is selected -->
                            <input type="hidden" name="{{ $key }}" value="no">
            
                            <!-- Tabs for Yes/No -->
                            <md-tabs id="tab-{{ $key }}" class="toggle-btn">
                                <!-- Yes Tab -->
                                <md-secondary-tab 
                                    value="yes" 
                                    id="tab-{{ $key }}-yes"
                                    onclick="document.getElementById('{{ $key }}_yes').checked = true"
                                    {{ ($piw->$key ?? old($key, 'no')) === 'yes' ? 'active' : '' }}
                                >
                                    Yes
                                </md-secondary-tab>
            
                                <!-- No Tab -->
                                <md-secondary-tab 
                                    value="no" 
                                    id="tab-{{ $key }}-no"
                                    onclick="document.getElementById('{{ $key }}_no').checked = true"
                                    {{ ($piw->$key ?? old($key, 'no')) === 'no' ? 'active' : '' }}
                                >
                                    No
                                </md-secondary-tab>
                            </md-tabs>
            
                            <!-- Hidden radio buttons to maintain functionality -->
                            <input type="radio" id="{{ $key }}_yes" name="{{ $key }}" value="yes" style="display:none;" 
                                {{ ($piw->$key ?? old($key)) === 'yes' ? 'checked' : '' }}>
                            <input type="radio" id="{{ $key }}_no" name="{{ $key }}" value="no" style="display:none;" 
                                {{ ($piw->$key ?? old($key)) === 'no' ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>
            @endforeach
            






                    <div class="text-center">
                        @if (isset($piw))
                        <a href="{{route('pre-cabling-shut-down.delete', $piw->id)}}">
                            <md-filled-tonal-button  type="button" 
                                type="submit">Remove</md-filled-tonal-button >
                            </a>
                        @endif
                        <md-filled-tonal-button 
                            type="submit">{{ isset($piw) ? 'Update' : 'Create' }}</md-filled-tonal-button >
                    </div>

                </form>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
   
@endsection
