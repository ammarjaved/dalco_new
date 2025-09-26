<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <title>ShutDown Images_{{$survey->nama_pe}} </title>
  </head>

<style>
  .logo {
      height: 100px;
      width: 200px;
      display: block;
      margin-left: auto;
      margin-right: auto;
      object-fit: contain;
  }

  .center-text {
      text-align: center;
      align-self: center;
      float: center;
  }

  .overall-margin {
      margin-top: 10px;
  }

  .left-margin {
      margin-left: 10px;
  }

  .right-margin {
      margin-right: 10px;
  }

  .even-margin {
      margin: 10px;
  }

  .right-element {
      display: flex;
      justify-content: flex-end;
  }

  .checkbox-margins {
      margin-right: 5px;
      margin-left: 5px;
  }

  .survey-images {
      height: 300px;
      width: 300px;
      display: block;
      margin-left: auto;
      margin-right: auto;
      object-fit: contain;
  }

  .center {
      text-align: center;
  }

  .image-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* Three columns */
    gap: 10px; /* Space between columns */
    width: 100%;
    text-align: center;
    margin: 20px 0;
}

.column {
    border: 1px solid black; /* Borders for each column */
    padding: 10px;
}

h3 {
    margin-bottom: 10px;
    font-weight: bold;
    text-align: center;
}

.image-container {
    border: 1px solid black; /* Border around each image */
    padding: 5px;
    margin-bottom: 10px;
    height: 320px; /* Fix height for images to maintain uniform grid */
    display: flex;
    align-items: center;
    justify-content: center;
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensure that image covers the container without distorting */
}

@media screen and (max-width: 768px) {
    .image-grid {
        grid-template-columns: 1fr; /* Stack columns on smaller screens */
    }
}


</style>

@php
    $beforeImages = $ImageShutImages->where('image_type', 'BEFORE');
    $duringImages = $ImageShutImages->where('image_type', 'DURING');
    $afterImages = $ImageShutImages->where('image_type', 'AFTER');
    $anyImages = $ImageShutImages->where('image_type', 'ANY');
    
    // Take max 3 images per column for page 1
    $beforePage1 = $beforeImages->take(3);
    $duringPage1 = $duringImages->take(3);
    $afterPage1 = $afterImages->take(3);
@endphp

<!-- Page 1: 9 images (3x3 grid) -->
<div style="break-after:page">
    <!-- Header content remains the same -->
    <div class="container-fluid">
    <div class="row">
        <div class="col border overall-margin" style="margin-left: 10px; display: flex; align-items: center;">
            <img class="logo" src='/assets/web-images/tnblogo.png' alt="TNB Logo" style="height: 80px; width: 120px; margin-right: 15px;">
            <div style="text-align: left;">
                <strong>TNB ENERGY SERVICES SDN BHD (234667-M)</strong><br>
                Level 2, Jalan Air Hitam, Kawasan 16,<br>
                40000 Shah Alam, Selangor
            </div>
        </div>
        <div class="col border overall-margin" style="margin-right: 10px; display: flex; align-items: center;">
            @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
            <img class="logo" src='/assets/web-images/main-logo.png' alt="Aerosynergy Solutions Logo" style="height: 80px; width: 120px; margin-right: 15px;">
            <div style="text-align: left;">
                <strong>AEROSYNERGY SOLUTIONS SDN BHD</strong><br>
                NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor
            </div>
            @elseif($projectName === 'ARAS-JOHOR')
            <img class="logo" src='/assets/web-images/araslogo.png' alt="ARAS Kejuruteraan Logo" style="height: 80px; width: 120px; margin-right: 15px;">
            <div style="text-align: left;">
                <strong>ARAS KEJURUTERAAN SDN BHD</strong><br>
                1st Floor No 72, Jalan SS 21/1, Damansara Utama, 47400 Petaling Jaya, Selangor
            </div>
            @else
            <img class="logo" src='/assets/web-images/defaultlogo.png' alt="Default Logo" style="height: 80px; width: 120px; margin-right: 15px;">
            <div style="text-align: left;">
                <strong>Default Company Name</strong><br>
                Default Address
            </div>
            @endif
        </div>
    </div>
</div>
    <!-- <div class="container-fluid">
        <p><strong>SUBSTATION NAME:&emsp;&emsp;&emsp;&emsp;&emsp;</strong> {{$survey->nama_pe}}</p>
        <p><strong>NO FUNCTIONAL LOCATION:&emsp;</strong> JJBUPJCOEH00621</p>
    </div> -->
  
    <h4 class="title center-text" style="padding-top:20px;"><u>GAMBAR KERJA-KERJA HENTITUGAS DI PE (PEJABAT POLIS MUAR)</u></h4>

    <div class="image-grid" style="padding-top:20px;">
        <!-- Sebelum Column -->
        <div class="column">
            <h3><u>SEBELUM</u></h3>
            @forelse($beforePage1 as $image)
                <div class="image-container">
                    <img src="{{ asset($image->image_url) }}" alt="{{ $image->image_name }}">
                </div>
            @empty
                <p>No images available for Sebelum.</p>
            @endforelse
        </div>
    
        <!-- Semasa Column -->
        <div class="column">
            <h3><u>SEMASA</u></h3>
            @forelse($duringPage1 as $image)
                <div class="image-container">
                    <img src="{{ asset($image->image_url) }}" alt="{{ $image->image_name }}">
                </div>
            @empty
                <p>No images available for Semasa.</p>
            @endforelse
        </div>
    
        <!-- Selepas Column -->
        <div class="column">
            <h3><u>SELEPAS</u></h3>
            @forelse($afterPage1 as $image)
                <div class="image-container">
                    <img src="{{ asset($image->image_url) }}" alt="{{ $image->image_name }}">
                </div>
            @empty
                <p>No images available for Selepas.</p>
            @endforelse
        </div>
    </div>

    <!-- Footer for Page 1 -->
    <div style="position: fixed; bottom: 20px; left: 0; right: 0; border: 2px solid black; display: flex; background: white;">
        <div style="border-right: 1px solid black; padding: 8px; flex: 1; text-align: center; font-size: 12px;">
            SHUTDOWN FORM TNB 114/2023
        </div>
        <div style="border-right: 1px solid black; padding: 8px; flex: 1; text-align: center; font-size: 12px;">
            Part No.: AERO-CFSSEL/FORM/001
        </div>
        <div style="border-right: 1px solid black; padding: 8px; flex: 1; text-align: center; font-size: 12px;">
            Rev No.: 001
        </div>
        <div style="padding: 8px; flex: 1; text-align: center; font-size: 12px;">
            Rel Date:
        </div>
    </div>
</div>

@if($anyImages->isNotEmpty())
<!-- Page 2: ANY images (2x3 grid, centered) -->
<div style="break-after:page">
    <!-- Header content -->
    <div class="container-fluid">
    <div class="row">
        <div class="col border overall-margin" style="margin-left: 10px; display: flex; align-items: center;">
            <img class="logo" src='/assets/web-images/tnblogo.png' alt="TNB Logo" style="height: 80px; width: 120px; margin-right: 15px;">
            <div style="text-align: left;">
                <strong>TNB ENERGY SERVICES SDN BHD (234667-M)</strong><br>
                Level 2, Jalan Air Hitam, Kawasan 16,<br>
                40000 Shah Alam, Selangor
            </div>
        </div>
        <div class="col border overall-margin" style="margin-right: 10px; display: flex; align-items: center;">
            @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
            <img class="logo" src='/assets/web-images/main-logo.png' alt="Aerosynergy Solutions Logo" style="height: 80px; width: 120px; margin-right: 15px;">
            <div style="text-align: left;">
                <strong>AEROSYNERGY SOLUTIONS SDN BHD</strong><br>
                NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor
            </div>
            @elseif($projectName === 'ARAS-JOHOR')
            <img class="logo" src='/assets/web-images/araslogo.png' alt="ARAS Kejuruteraan Logo" style="height: 80px; width: 120px; margin-right: 15px;">
            <div style="text-align: left;">
                <strong>ARAS KEJURUTERAAN SDN BHD</strong><br>
                1st Floor No 72, Jalan SS 21/1, Damansara Utama, 47400 Petaling Jaya, Selangor
            </div>
            @else
            <img class="logo" src='/assets/web-images/defaultlogo.png' alt="Default Logo" style="height: 80px; width: 120px; margin-right: 15px;">
            <div style="text-align: left;">
                <strong>Default Company Name</strong><br>
                Default Address
            </div>
            @endif
        </div>
    </div>
</div>
  
    

    <!-- Centered 2x3 grid for ANY images -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: repeat(3, 300px); max-width: 800px; margin: 20px auto; border: 1px solid black;">
    @foreach($anyImages->take(6) as $image)
        <div style="padding: 20px; display: flex; flex-direction: column; 
                    border-right: {{ $loop->iteration % 2 == 1 ? '1px solid black' : 'none' }}; 
                    border-bottom: {{ $loop->iteration <= 4 ? '1px solid black' : 'none' }};">
            <div style="flex: 1; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                <img src="{{ asset($image->image_url) }}" alt="{{ $image->image_name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
            </div>
        </div>
    @endforeach
</div>
</div>
@endif

<script>
    window.onload = function () {
        window.print();
        // const element = document.getElementById('content');
        // const opt = {
        //     margin: 1,
        //     filename: 'site_survey_toolboxtalk.pdf',
        //     image: { type: 'jpeg', quality: 0.98 },
        //     html2canvas: { scale: 2 },
        //     jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        // };

        // html2pdf().set(opt).from(element).save().then(function () {
        //     console.log('PDF downloaded');
        // });
    };
</script>


