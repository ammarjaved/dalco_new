@extends('layouts.app')



<style>

    
    .thead-purple {
  background-color: #8e44ad; /* Purple background */
  color: white; /* White text for better contrast */
}

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
    background-color: #ece0f0;
    transition: background-color 0.3s ease;
}

.file-upload-wrapper:hover {
    background-color: #f8f8ff;
  
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


.form-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: stretch;
        }
        .form-field {
            flex: 1 1 300px;
            display: flex;
            flex-direction: column;
        }
        .file-upload-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .file-upload-input {
            width: 100%;
            height: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }
        .file-upload-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            color: #6c757d;
        }
        md-outlined-text-field,
        md-outlined-select,
        .file-upload-wrapper {
            height: 56px; /* Adjust this value to match your material design components */
        }
        md-label {
            margin-bottom: 8px;
        }
        @media (max-width: 768px) {
            .form-field {
                flex-basis: 100%;
            }
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
                <h3 style="color: #8e44ad;">Image Shutdown</h3>
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
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 style="color: #8e44ad;">Add Image Shutdown</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Form to Add Image Shutdown -->
                        <form action="{{ route('image-shutdown.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="site_survey_id" value="{{ $survey->id }}">
                            
                            <div class="form-group">
                                <!-- Image Name -->
                                <div class="form-field">
                                    <md-outlined-text-field label="Image Name" class="label" type="text" id="image_name" name="image_name" required></md-outlined-text-field>
                                </div>
                        
                                <!-- Upload Image -->
                                <div class="col-md-4 col-12 mb-3" style="margin-top: -16px">
                                    <md-label for="image_url">Upload Image</md-label>
                                    <div class="file-upload-wrapper">
                                        <input type="file" class="file-upload-input" id="image_url" name="image_url" accept="image/*" required>
                                        <span class="file-upload-text">Choose an image or drag it here</span>
                                    </div>
                                </div>
                        
                                <!-- Image Type -->
                                <div class="form-field">
                                    <md-outlined-select label="Image Type" class="label" onchange="setType(this.value)" id="image_type" name="image_type" required>
                                        <md-select-option value="BEFORE">BEFORE</md-select-option>
                                        <md-select-option value="DURING">DURING</md-select-option>
                                        <md-select-option value="AFTER">AFTER</md-select-option>
                                        <md-select-option value="ANY">ANY</md-select-option>

                                    </md-outlined-select>
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <md-filled-tonal-button type="submit" class=" mt-3">Save</md-filled-tonal-button>
                            {{-- <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Cancel</a> --}}
                        </form>

                        <!-- Table of Saved Image Shutdowns -->
                        <h3 class="mt-4">Saved Image Shutdowns</h3>
                        @if($imageShutdowns->isEmpty())
                            <p>No image shutdowns found for this survey.</p>
                        @else


                        <div class="table-responsive">
                           
                        <table id="myTable" class="table table-bordered table-hover data-table">
                                    <thead class="thead-purple">
                                        <tr>
                                            <th>ID</th>
                                            <th>Image Name</th>
                                            <th>Image Type</th>
                                            <th>Image Preview</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($imageShutdowns as $imageShutdown)
                                            <tr>
                                                <td>{{ $imageShutdown->id }}</td>
                                                <td>{{ $imageShutdown->image_name }}</td>
                                                <td>{{ $imageShutdown->image_type }}</td>
                                                <td>
                                                    @if($imageShutdown->image_url)
                                                    <md-filled-tonal-button href="{{ asset($imageShutdown->image_url) }}" target="_blank" >
                                                        View
                                                    </md-filled-tonal-button>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>
                                                <td class="button-container">
                                                    <div class="button-group">
                                                        <!-- Edit Button -->
                                                        <md-filled-tonal-button href="{{ route('image-shutdown.edit', $imageShutdown->id) }}">
                                                            Edit
                                                        </md-filled-tonal-button>
                                                
                                                        <!-- Delete Form -->
                                                        <form action="{{ route('image-shutdown.destroy', $imageShutdown->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <md-filled-tonal-button type="submit">
                                                                Delete
                                                            </md-filled-tonal-button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                        </div>
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection




<style>

@media (max-width: 768px) {
    .button-container md-filled-tonal-button,
    .button-container form {
     
        margin-bottom: 10px; /* Add space between buttons */
    }
}

    .dataTables_filter {
        float: right !important;
    }
    .dataTables_paginate {
        float: right !important;
    }
    .dataTables_length {
        float: left !important;
    }
    .dataTables_info {
        float: left !important;
    }
    
    table.dataTable thead .sorting,
    table.dataTable thead .sorting_asc,
    table.dataTable thead .sorting_desc {
        cursor: pointer;
        position: relative;
    }
    
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_desc:after {
        position: absolute;
        bottom: 8px;
        right: 8px;
        display: block;
        font-family: 'Font Awesome 5 Free';
        opacity: 0.5;
    }
    
    table.dataTable thead .sorting:after {
        content: "\f0dc";
        opacity: 0.2;
    }
    
    table.dataTable thead .sorting_asc:after {
        content: "\f0de";
    }
    
    table.dataTable thead .sorting_desc:after {
        content: "\f0dd";
    }
    
    </style>

@section('script')

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/generate-qr.js') }}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>

<script>

function setType(val) {
        localStorage.setItem("img_shutdown_type", val);  // Save the selected value under the key "img_sat_type"
    }

    // Function to retrieve the value from localStorage and set the dropdown's value
    function getType() {
        var img_type = localStorage.getItem("img_shutdown_type");  // Retrieve the saved value from localStorage
        if (img_type) {  // If a value exists
            var dropdown = document.getElementById('image_type');  // Get the dropdown element by its ID
            dropdown.value = img_type;  // Set the dropdown's value to the saved value
        }
    }




document.addEventListener('DOMContentLoaded', function() {
    getType();


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
