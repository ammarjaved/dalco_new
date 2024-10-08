<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <title> PreCabling Pictures_{{$survey->nama_pe}}</title>
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
</style>



<div style="break-after:page">
  <div class="container-fluid">
      <div class="row">
          <div class="col border overall-margin" style="margin-left: 10px;">
              <img class="logo" src='/assets/web-images/tnblogo.png' alt="TNB Logo">
              <p class="center-text">TNB ENERGY SERVICES SDN BHD (234667-M)<br>
                  Level 2, Jalan Air Hitam, Kawasan 16,<br>
                  40000 Shah Alam, Selangor</p>
          </div>
          <div class="col border overall-margin" style="margin-right: 10px;">
              @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
              <img class="logo" src='/assets/web-images/main-logo.png' alt="Aerosynergy Solutions Logo">
              <p class="center-text">AEROSYNERGY SOLUTIONS SDN BHD<br>
                  NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor</p>
              @elseif($projectName === 'ARAS-JOHOR')
              <img class="logo" src='/assets/web-images/araslogo.png' alt="ARAS Kejuruteraan Logo">
              <p class="center-text">ARAS KEJURUTERAAN SDN BHD<br>
                  1st Floor No 72, Jalan SS 21/1, Damansara Utama, 47400 Petaling Jaya, Selangor</p>
              @else
              <img class="logo" src='/assets/web-images/defaultlogo.png' alt="Default Logo">
              <p class="center-text">Default Company Name<br>
                  Default Address</p>
              @endif
          </div>
      </div>
  </div>

  <div class="container-fluid">
      <p><strong>SUBSTATION NAME:&emsp;&emsp;&emsp;&emsp;&emsp;</strong> {{$survey->nama_pe}}</p>
      <p><strong>NO FUNCTIONAL LOCATION:&emsp;</strong> JJBUPJCOEH00621</p>
  </div>

  <h4 class="title center-text"><u>PICTURE OF PRECABLING</u></h4>
  
  <div class="row row-cols-2 right-margin left-margin">
    @if(isset($PreCablmages) && $PreCablmages->isNotEmpty())
        @foreach($PreCablmages as $image)
        <div class="col">
            <div class="row border">
                <!-- Display the image -->
                <img class="survey-images" src='{{ asset($image->image_url) }}' 
                     alt="{{ $image->image_name }}">
            </div>
            <div class="row border justify-content-center">
                <!-- Display the image name -->
                <p class="text-center">Name: {{ ucfirst(str_replace('_', ' ', $image->image_name)) }}</p>
            </div>
            
            <div class="row border justify-content-center">
                <!-- Display the image description -->
                <p class="text-center">Description: {{ $image->image_desc ?? 'No description available' }}</p>
            </div>
            
        </div>
        @endforeach
    @else
        <p>No images available for display.</p>
    @endif
</div>


 

</div>


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