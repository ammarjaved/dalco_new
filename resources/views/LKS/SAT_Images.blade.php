<style>
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




<div class="pictures-grids" style="margin-top: -200px;">
    <h2>SAT Images</h2>
    <p class="survey-titles">Nama Pe: {{ $survey->nama_pe }}</p> <!-- You can replace this variable accordingly -->
    
    <div class="gallery-container">
        @foreach($SATImages as $SATData)
            <div class="image-containers">
                <!-- Image Thumbnail -->
                <img class="gallery-images" src="{{ asset($SATData->image_url) }}" alt="{{ $imageShutdown->image_name }}">

                <!-- Image Information -->
                <div class="image-info">
                    <h6>Image Name: {{ $SATData->image_name }}</h6>
                    <p class="image-descriptions">Image Type: {{ $SATData->image_type }}</p>
                </div>
            </div>
        @endforeach
        
    </div>
</div>

<button onclick="printPage()">Print </button>

<script>
    // JavaScript function to trigger the print dialog
    function printPage() {
      window.print();
    }
  </script>
