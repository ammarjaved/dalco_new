@extends('layouts.app', ['page_title' => 'Upload Files'])

<script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
<style>

    

    .thead-purple {
    background-color: #8e44ad; /* Purple background */
    color: white; /* White text for better contrast */
}

.thead-purple th {
    border-bottom: 2px solid #8e44ad; /* Slightly darker purple border */
}

.file-upload-wrapper {
            position: relative;
            width: 100%;
            height: 40px;
            border: 2px dashed #8e44ad;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: #e8def8;
            transition: all 0.3s ease;
            margin-top: 2px;
        }
        .file-upload-wrapper:hover {
            background-color: #DBEAFE;
            
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
            color:black;
            font-weight: bold;
            width: 100%;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 0 10px;
        }
</style>

@section('content')
<section class="content-header" >
    <div class="container-  ">
        <div class="row mb-2" style="flex-wrap:nowrap">
            <div class="col-sm-6">
                <h3 style="color: #8e44ad;">Site Data</h3>
            </div>
            <div class="col-sm-6 text-right">
                <ol class="breadcrumb float-right" >
                    <li class="breadcrumb-item"><a href="{{ route('site_survey.index') }}" style="color: #8e44ad;">index</a></li>
                    <li class="breadcrumb-item active" style="color: #8e44ad;">Files</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<div class="container " > <!-- Adjusted margin-top to reduce space at the top -->
    <h3 class="mb-3">Upload Files for Site Survey #{{ $siteSurvey->id }} (Nama PE: {{ $siteSurvey->nama_pe }})</h3> <!-- Reduced bottom margin -->

    <div class="mb-4">
        <form action="{{ route('siteFileUpload.storeViewFiles', ['id' => $siteSurvey->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="w-full max-w-md p-8">
                    <md-label for="site_file" class="block text-sm font-medium text-gray-700 mb-2">Upload Your File</md-label>
                    <div class="file-upload-wrapper">
                        <input type="file" id="site_file" name="site_file" class="file-upload-input" required>
                        <span class="file-upload-text">Choose a file or drag it here</span>
                    </div>
                </div>
                <div class="col-md-6 mb-2" >
                    <md-label for="description" class="form-label">Description</md-label>
                    <textarea style="height: 41px;" id="description" name="description" class="form-control" rows="3" required></textarea>
                </div>
                <md-filled-tonal-button style="    height: 40px;margin-top: 20px;" type="submit" >Upload</md-filled-tonal-button>
            </div>
           
        </form>
    </div>

    <h4 class="mt-4">Uploaded Files</h4> <!-- Adjusted top margin -->
    @if ($files->isEmpty())
        <div class="alert alert-warning" role="alert">
            No files uploaded yet.
        </div>
    @else
        
            <table id="myTable" class="table table-bordered  data-table">
                <thead class="thead-purple">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama PE</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $index => $file)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $siteSurvey->nama_pe }}</td>
                            <td><a href="{{ asset($file->file_path) }}" target="_blank">{{ $file->file_name }}</a></td>
                            <td>{{ $file->description }}</td>
                            <td>
                                <md-filled-tonal-button href="{{ asset($file->file_path) }}" target="_blank" style="margin-top:-4px; ">
                                    <i class="fas fa-eye"></i> view
                                </md-filled-tonal-button>
                                <form action="{{ route('siteFileUpload.destroy', $file->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this file?');">
                                    @csrf
                                    @method('DELETE')
                                    <md-filled-tonal-button type="submit" style="margin-top:-20px ">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </md-filled-tonal-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
       
    @endif
</div>
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
var fileInput = document.getElementById('site_file');
        var fileText = document.querySelector('.file-upload-text');
        
        if (fileInput) {
            fileInput.addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    var fileName = e.target.files[0].name;
                    fileText.textContent = fileName;
                    fileText.title = fileName; // Add this line to show full filename on hover
                } else {
                    fileText.textContent = 'Choose a file or drag it here';
                    fileText.title = ''; // Clear the title when no file is selected
                }
            });
        }


});




</script>


@endsection





