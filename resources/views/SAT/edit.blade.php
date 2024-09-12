@extends('layouts.app')

<style>
    .label {
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

    .form-text.text-muted {
        margin-top: 0.5rem;
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
<div class="container">
    <h3>Edit SAT Record</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('sat.update', $satRecord->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Image Name -->
                    <div class="col-md-4 form-group">
                        <md-outlined-text-field class="label" label="Image Name" type="text" class="form-control" id="image_name" name="image_name" value="{{ old('image_name', $satRecord->image_name) }}" required>
                        </md-outlined-text-field>
                    </div>

                    <!-- Image Type -->
                    <div class="col-md-4 form-group">
                        <md-outlined-select class="label" label="Image Type" id="image_type" name="image_type" required>
                            <md-select-option value="BEFORE" {{ old('image_type', $satRecord->image_type) == 'BEFORE' ? 'selected' : '' }}>BEFORE</md-select-option>
                            <md-select-option value="DURING" {{ old('image_type', $satRecord->image_type) == 'DURING' ? 'selected' : '' }}>DURING</md-select-option>
                            <md-select-option value="AFTER" {{ old('image_type', $satRecord->image_type) == 'AFTER' ? 'selected' : '' }}>AFTER</md-select-option>
                        </md-outlined-select>
                    </div>

                    <!-- Upload New Image -->
                    <div class="col-md-4 mb-3" style="margin-top: -20px">
                        <label for="image_url" class="form-label">Upload New Image</label>
                        <div class="file-upload-wrapper">
                            <input type="file" class="file-upload-input" id="image_url" name="image_url" accept="image/*">
                            <span class="file-upload-text">Choose an image or drag it here</span>
                        </div>
                        <small class="form-text text-muted">Leave empty if you do not want to change the image.</small>
                    </div>
                    
                </div>

                <!-- Existing Image Display -->
                <div class="form-group">
                    <label for="existing_image">Existing Image</label>
                    <br>
                    @if($satRecord->image_url && file_exists(public_path($satRecord->image_url)))
                        <img src="{{ asset($satRecord->image_url) }}" alt="Existing Image" class="img-fluid" style="max-width: 300px;">
                    @else
                        <p>No image available</p>
                    @endif
                </div>
                
                <!-- Submit Button -->
                <md-filled-tonal-button type="submit">Update</md-filled-tonal-button>
                {{-- <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a> --}}
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
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
