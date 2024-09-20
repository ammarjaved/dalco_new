


<style>
   .pictures-grids {
           
            margin: 0;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .image-containers {
            text-align: center;
            margin-bottom: 50px; /* Adjust spacing between images */
        }
        .gallery-images {
            max-width: 90%;
            max-height: 80vh;
            margin: 0 auto;
            display: block;
        }

        .image-descriptions {
            margin-top: 10px;
            font-size: 16px;
            color: #333;
        }


</style>


<div class="pictures-grids">
    <p class="survey-titles">{{$survey->nama_pe}}</p>
    @foreach($files as $file)
        <div class="image-containers">
            <img class="gallery-images" src="{{ asset($file->file_path) }}" alt="{{ $file->description }}">
            <p class="image-descriptions">{{ $file->description }}</p>
        </div>
        <div class="page-break"></div>
    @endforeach
</div>










