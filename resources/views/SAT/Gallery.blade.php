@extends('layouts.app')


<style>
   .gallery-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Consistent gap between items */
}

.gallery-item {
    flex: 1 0 calc(25% - 15px); /* Grow and shrink as needed, initial basis of 25% minus gap */
    min-width: 200px; /* Minimum width to prevent too narrow items */
    max-width: calc(25% - 15px); /* Maximum width to maintain 4 columns when possible */
    margin-bottom: 20px;
    text-align: center;
    box-sizing: border-box;
    border: 1px solid #e0e0e0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.gallery-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 3px;
}


   

    .no-images {
        text-align: center;
        margin: 20px 0;
        color: #888;
        font-size: 18px;
    }

    /* Ensure that gallery-item's height is consistent */
    .gallery-item {
        min-height: 300px; /* Adjust to fit content */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .button-group {
        position: relative;
        top: -20px; /* Adjust this value to move buttons higher or lower */
    }
    md-filled-tonal-button {
        margin-right: 10px;
    }
</style>


@section('content')

@php
    $navContent = view('nav.index', [
        'survey' => $survey,
        'id' => $site_survey,
    ])->render();
@endphp
{!! $navContent !!}

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 style="color: #8e44ad;">Gallery Images</h1>
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
                        @if($satRecords->isEmpty())
                            <p class="no-images">No gallery images found for this survey.</p>
                        @else
                            <div class="gallery-container">
                                @foreach($satRecords as $satRecord)
                                    <div class="gallery-item">
                                        @if($satRecord->image_url)
                                            <img src="{{ asset($satRecord->image_url) }}" alt="{{ $satRecord->image_name }}">
                                        @else
                                            <img src="{{ asset('default-image.jpg') }}" alt="No image">
                                        @endif

                                        <div class="button-group">
                                            <md-filled-tonal-button href="{{ asset($satRecord->image_url) }}" target="_blank"> View</md-filled-tonal-button>
                                            <form action="{{ route('sat.download', $satRecord->id) }}" method="GET" style="display: inline;">
                                                @csrf
                                                <md-filled-tonal-button type="submit" >Download</md-filled-tonal-button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
