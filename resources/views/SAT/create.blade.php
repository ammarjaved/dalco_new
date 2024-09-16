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

.form-text.text-muted {
    margin-top: 8px;
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
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 style="color: #8e44ad;">Add SAT Image</h1>
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
                        <!-- Form to Add SAT Image -->
                        <form action="{{ route('sat.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="site_survey_id" value="{{ $survey->id }}">
                            
                            <div class="form-group row">
                                <!-- Image Name -->
                                <div class="col-md-4">
                                    {{-- <label for="image_name">Image Name</label> --}}
                                    <md-outlined-text-field class="label" label="Image Name" type="text"  id="image_name" name="image_name" required>
                                </div>

                                <!-- Upload Image -->
                                <div class="col-md-4 mb-3" style="margin-top: -20px">
                                    <md-label for="image_url" class="form-label">Upload New Image</md-label>
                                    <div class="file-upload-wrapper">
                                        <input type="file" class="file-upload-input" id="image_url" name="image_url" accept="image/*">
                                        <span class="file-upload-text">Choose an image or drag it here</span>
                                    </div>
                                    <small class="form-text text-muted">Leave empty if you do not want to change the image.</small>
                                </div>
                                
                                <!-- Image Type -->
                                <div class="col-md-4">
                                    {{-- <label for="image_type">Image Type</label> --}}
                                    <md-outlined-select label="Image Type"  class="label" onchange="setType(this.value)" id="image_type" name="image_type" required>
                                       
                                        <md-select-option value="BEFORE">BEFORE</md-select-option>
                                        <md-select-option value="DURING">DURING</md-select-option>
                                        <md-select-option value="AFTER">AFTER</md-select-option>
                                    </md-outlined-select>
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <md-filled-tonal-button type="submit" class=" mt-3">Save</md-filled-tonal-button>
                            {{-- <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Cancel</a> --}}
                        </form>

                        <!-- Table of Saved SAT Images -->
                        <h3 class="mt-4">Saved SAT Images</h3>
                        @if($satRecords->isEmpty())
                            <p>No SAT images found for this survey.</p>
                        @else
                           
                        <table id="myTable" class="table table-bordered table-hover data-table">
                                    <thead class=" thead-purple">
                                        <tr>
                                            <th>ID</th>
                                            <th>Image Name</th>
                                            <th>Image Type</th>
                                            <th>Image Preview</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($satRecords as $satRecord)
                                            <tr>
                                                <td>{{ $satRecord->id }}</td>
                                                <td>{{ $satRecord->image_name }}</td>
                                                <td>{{ $satRecord->image_type }}</td>
                                                <td>
                                                    @if($satRecord->image_url)
                                                    <md-filled-tonal-button href="{{ asset($satRecord->image_url) }}" target="_blank">
                                                        View
                                                    </md-filled-tonal-button>
@else
                                                        No image
                                                    @endif
                                                </td>
                                                <td>
                                                    <md-filled-tonal-button href="{{ route('sat.edit', $satRecord->id) }}">Edit</md-filled-tonal-button> 
                                                    <form action="{{ route('sat.destroy', $satRecord->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <md-filled-tonal-button type="submit" >Delete</md-filled-tonal-button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                           
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



<style>

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

function setType(val){
    localStorage.setItem("img_sat_type",val);
}

function getType(){
    var img_type=localStorage.getItem("img_sat_type")
    if(img_type){
        var dropdown = document.getElementById('image_type');
        dropdown.value=img_type;

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






