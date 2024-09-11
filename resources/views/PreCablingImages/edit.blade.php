@extends('layouts.app')

<style>

.label{
    min-width: 300px;
    max-width: 300px;
}
.file-upload-wrapper {
    position: relative;
    width: 100%;
    height: 50px;
    border: 2px dashed #8e44ad;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f8ff;
    transition: background-color 0.3s ease;
}

.file-upload-wrapper:hover {
    background-color: #ece0f0;
}

.file-upload-input {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    cursor: pointer;
    opacity: 0;
}

.file-upload-text {
    color: #333;
    font-weight: 600;
    width: 100%;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding: 0 10px;
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
                    <li class="breadcrumb-item active"> Edit images</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <h3>Edit Image PreCabling</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pre-cabling-images.update', $imageShutdown->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Image Name -->
                    <div class="col-md-4 form-group">
                        {{-- <label for="image_name">Image Name</label> --}}
                        <md-outlined-select class="label" label="Image Name" id="image_name" name="image_name" required>
                            <md-select-option value="RCB" {{ $imageShutdown->image_name == 'RCB' ? 'selected' : '' }}>RCB</md-select-option>
                            <md-select-option value="RCB-2" {{ $imageShutdown->image_name == 'RCB-2' ? 'selected' : '' }}>RCB-2</md-select-option>
                            <md-select-option value="RCB-SERIAL-NUMBER" {{ $imageShutdown->image_name == 'RCB-SERIAL-NUMBER' ? 'selected' : '' }}>RCB-SERIAL-NUMBER</md-select-option>
                            <md-select-option value="RCB-SERIAL-NUMBER-2" {{ $imageShutdown->image_name == 'RCB-SERIAL-NUMBER-2' ? 'selected' : '' }}>RCB-SERIAL-NUMBER-2</md-select-option>
                            <md-select-option value="TERMINATION-OF-RCB" {{ $imageShutdown->image_name == 'TERMINATION-OF-RCB' ? 'selected' : '' }}>TERMINATION-OF-RCB</md-select-option>
                            <md-select-option value="TERMINATION-OF-RCB-2" {{ $imageShutdown->image_name == 'TERMINATION-OF-RCB-2' ? 'selected' : '' }}>TERMINATION-OF-RCB-2</md-select-option>
                            <md-select-option value="SCADA-CABLE-ROUTE" {{ $imageShutdown->image_name == 'SCADA-CABLE-ROUTE' ? 'selected' : '' }}>SCADA-CABLE-ROUTE</md-select-option>
                            <md-select-option value="SCADA-CABLE-ROUTE-2" {{ $imageShutdown->image_name == 'SCADA-CABLE-ROUTE-2' ? 'selected' : '' }}>SCADA-CABLE-ROUTE-2</md-select-option>
                            <md-select-option value="BATTERY-CHARGER" {{ $imageShutdown->image_name == 'BATTERY-CHARGER' ? 'selected' : '' }}>BATTERY-CHARGER</md-select-option>
                            <md-select-option value="BATTERY-CHARGER-2" {{ $imageShutdown->image_name == 'BATTERY-CHARGER-2' ? 'selected' : '' }}>BATTERY-CHARGER-2</md-select-option>
                            <md-select-option value="PLATE-BATTERY-CHARGER" {{ $imageShutdown->image_name == 'PLATE-BATTERY-CHARGER' ? 'selected' : '' }}>PLATE-BATTERY-CHARGER</md-select-option>
                            <md-select-option value="PLATE-BATTERY-CHARGER-2" {{ $imageShutdown->image_name == 'PLATE-BATTERY-CHARGER-2' ? 'selected' : '' }}>PLATE-BATTERY-CHARGER-2</md-select-option>
                            <md-select-option value="EFI" {{ $imageShutdown->image_name == 'EFI' ? 'selected' : '' }}>EFI</md-select-option>
                            <md-select-option value="EFI-2" {{ $imageShutdown->image_name == 'EFI-2' ? 'selected' : '' }}>EFI-2</md-select-option>
                            <md-select-option value="EFI-SERIAL-NUMBER" {{ $imageShutdown->image_name == 'EFI-SERIAL-NUMBER' ? 'selected' : '' }}>EFI-SERIAL-NUMBER</md-select-option>
                            <md-select-option value="EFI-SERIAL-NUMBER-2" {{ $imageShutdown->image_name == 'EFI-SERIAL-NUMBER-2' ? 'selected' : '' }}>EFI-SERIAL-NUMBER-2</md-select-option>
                            <md-select-option value="RTU" {{ $imageShutdown->image_name == 'RTU' ? 'selected' : '' }}>RTU</md-select-option>
                            <md-select-option value="RTU-2" {{ $imageShutdown->image_name == 'RTU-2' ? 'selected' : '' }}>RTU-2</md-select-option>
                            <md-select-option value="RTU-BRAND" {{ $imageShutdown->image_name == 'RTU-BRAND' ? 'selected' : '' }}>RTU-BRAND</md-select-option>
                            <md-select-option value="RTU-BRAND-2" {{ $imageShutdown->image_name == 'RTU-BRAND-2' ? 'selected' : '' }}>RTU-BRAND-2</md-select-option>
                        </md-outlined-select>
                    </div>
                    
                    

                    <div class="col-md-4 form-group">
                        {{-- <label for="image_desc">Image Description</label> --}}
                        <md-outlined-text-field class="label" type="text" label="Image Description" id="image_desc" name="image_desc" value="{{ $imageShutdown->image_desc }}" required>
                    </div>
                    

                    <!-- Image Type -->
                    {{-- <div class="col-md-4 form-group">
                        <label for="image_type">Image Type</label>
                        <select class="form-control" id="image_type" name="image_type" required>
                            <option value="" disabled>Select Type</option>
                            <option value="before" {{ $imageShutdown->image_type == 'before' ? 'selected' : '' }}>Before</option>
                            <option value="during" {{ $imageShutdown->image_type == 'during' ? 'selected' : '' }}>During</option>
                            <option value="after" {{ $imageShutdown->image_type == 'after' ? 'selected' : '' }}>After</option>
                        </select>
                    </div> --}}

                    <!-- Upload New Image -->
                    <div class="col-md-4 mb-3" style="margin-top: -16px">
                        <md-label for="image_url" class="form-label">Upload Image</md-label>
                        <div class="file-upload-wrapper">
                            <input type="file" class="file-upload-input" id="image_url" name="image_url" accept="image/*" required>
                            <span class="file-upload-text">Choose an image or drag it here</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <md-label for="existing_image">Existing Image</md-label>
                        <br><br>
                        <img src="{{ asset($imageShutdown->image_url) }}" alt="Existing Image" class="img-fluid" style="max-width: 300px;">
                    </div>
        
                    <!-- Submit and Cancel Buttons -->
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                    

                <!-- Existing Image Display -->
                
            </form>

           
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/generate-qr.js') }}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>

<script>



document.addEventListener('DOMContentLoaded', function() {
table = $('.data-table').DataTable({

    dom: '<"row"<"col-sm-6"l><"col-sm-6 text-right"f>>' +
         '<"row"<"col-sm-12"tr>>' +
         '<"row"<"col-sm-5"i><"col-sm-7 text-right"p>>',
    language: {
        search: "",
        searchPlaceholder: "Search..."

    },

    // ordering: true,
    // order: [[0, 'asc']], // Sort by the first column (index 0) in ascending order by default
    // columnDefs: [
    //     { orderable: false, targets: [4] } // Disable sorting on the SAT column (index 4)
    // ]

               
               
});


var fileInput = document.getElementById('image_url');
var fileText = document.querySelector('.file-upload-text');

if (fileInput) {
    fileInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            var fileName = e.target.files[0].name;
            fileText.textContent = fileName;
            fileText.title = fileName; // Show full filename on hover
        } else {
            fileText.textContent = 'Choose an image or drag it here';
            fileText.title = ''; // Clear title when no file is selected
        }
    });
}

});

</script>


@endsection