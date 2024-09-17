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


<div class="gallery-container">
    @foreach($ImageShutImages as $imageShutdown)
        <div class="image-containers">
            <!-- Image Thumbnail -->
            <img class="gallery-images" src="{{ asset($imageShutdown->image_url) }}" alt="{{ $imageShutdown->image_name }}">

            <!-- Image Information -->
            <div class="image-info">
                <h6>Image Name: {{ $imageShutdown->image_name }}</h6>
                <p class="image-descriptions">Image Type: {{ $imageShutdown->image_type }}</p>
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