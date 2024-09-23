@extends('layouts.app')

<style>
  
    .gallery-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .gallery-item {
        flex: 0 0 30%;
        margin-bottom: 20px;
        text-align: center;
    }

    .gallery-item img {
        max-width: 70%;
        height: auto;
        border-radius: 3px;
    }

    .button-group {
        margin-top: 15px;
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .button-group a,
    .button-group button {
        padding: 10px 20px;
        border-radius: 4px;
        background-color: #8e44ad;
        color: white;
        text-decoration: none;
        border: none;
        font-family: inherit;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.1s ease;
    }

    .button-group a:hover,
    .button-group button:hover {
        background-color: #9b59b6;
        color: white;
    }

    .button-group a:active,
    .button-group button:active,
    .button-group a:focus,
    .button-group button:focus {
        background-color: #8e44ad;
        outline: none;
        transform: scale(0.98);
    }

    .no-images {
        text-align: center;
        margin: 20px 0;
        color: #888;
        font-size: 18px;
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
                                            <a href="{{ asset($satRecord->image_url) }}" target="_blank" class="btn">View</a>
                                            <form action="{{ route('sat.download', $satRecord->id) }}" method="GET" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn">Download</button>
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
