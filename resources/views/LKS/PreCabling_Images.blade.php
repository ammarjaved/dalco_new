
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
            font-size: 22px;
            color: #333;
        }

        .header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 50px;
    align-items: center; /* Add this line to vertically center the logos */
}

.logo {
    width: 45%;
    display: inline-block; /* Add this line to make the logos display inline */
    vertical-align: middle; /* Add this line to vertically center the logos */
}

.logo img {
    max-width: 80%; /* Reduce the image size to 80% of the parent container */
    height: auto;
    margin-bottom: 10px;
}
    .header .logo p {
        margin: 0;
        font-size: 14px;
        line-height: 1.4;
    }



</style>


<div class="header">
    <div class="logo">
        <img src='/assets/web-images/tnblogo.png' alt="TNB Logo">
        <p>TNB ENERGY SERVICES SDN BHD (234667-M)<br>
            Level 2, Jalan Air Hitam, Kawasan 16,<br>
            40000 Shah Alam, Selangor</p>
    </div>
    <div class="logo">
        @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
            <img src='/assets/web-images/main-logo.png' alt="Aerosynergy Solutions Logo">
            <p>AEROSYNERGY SOLUTIONS SDN BHD<br>
            NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor</p>
        @elseif($projectName === 'ARAS-JOHOR')
            <img src='/assets/web-images/araslogo.png' alt="ARAS Kejuruteraan Logo">
            <p>ARAS KEJURUTERAAN SDN BHD<br>
            1st Floor No 72, Jalan SS 21/1, Damansara Utama, 47400 Petaling Jaya, Selangor</p>
        @else
            <img src='/assets/web-images/defaultlogo.png' alt="Default Logo">
            <p>Default Company Name<br>
            Default Address</p>
        @endif
    </div>
</div>


<div class="pictures-grids" >
   <h2>Pre-Cabling Images</h2>
    <h3 class="survey-titles">Nama Pe:{{ $survey->nama_pe }}</h3>
    <div class="gallery-container">
        @foreach($PreCablmages as $image)
        <div class="image-containers">
                <!-- Construct the full path to the image -->   
                <img class="gallery-images" src='/{{$image->image_url }}' alt="{{ $image->image_name }}">
                <div class="image-info">
                    <h3 class="">Images Name: {{ $image->image_name }}</h3>
                    <p class="image-descriptions">Image Description: {{ $image->image_desc }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

