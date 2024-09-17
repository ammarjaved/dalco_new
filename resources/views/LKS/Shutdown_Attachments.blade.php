





<style>
.image-containers {
            text-align: center;
            margin-bottom: 50px; /* Adjust spacing between images */
        }
        .pictures-grids {
            padding-top: 300px;
            margin: 0;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
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






<div class="pictures-grids" style="margin-top:-200px ">
    <h2>Pre-Cabling Attachments</h2>
    <p class="survey-titles">Nama Pe: {{ $survey->nama_pe }}</p>
    @foreach($ImageShutFiles as $file)
        <div class="image-containers">
            <img class="gallery-images" src="{{ asset($file->file_path) }}" alt="{{ $file->description }}">
            <p class="image-descriptions">File Description: {{ $file->description }}</p>
        </div>
    @endforeach
</div>

<button onclick="printPage()">Print </button>

<script>
    // JavaScript function to trigger the print dialog
    function printPage() {
      window.print();
    }
  </script>
