
<style>

.pictures-grids {
            padding-top: 300px;
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



<div class="pictures-grids"  style="margin-top:120px ">
    <h2>Pre-Cabling Images</h2>
    <p class="survey-titles">Nama Pe:{{ $survey->nama_pe }}</p>
    <div class="gallery-container">
        @foreach($PreCablmages as $image)
        <div class="image-containers">
                <!-- Construct the full path to the image -->
                <img class="gallery-images" src="{{ asset($image->image_url) }}" alt="{{ $image->image_name }}">
                <div class="image-info">
                    <h6 class="">Images Name: {{ $image->image_name }}</h6>
                    <p class="image-descriptions">Image Description: {{ $image->image_desc }}</p>
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