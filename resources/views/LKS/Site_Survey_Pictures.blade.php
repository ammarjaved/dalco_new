<style>




 .container {
        max-width: 1000px;
        margin: 0 auto;
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
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
/* General Styling */

/* General Styling */
body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #fff; /* No background color */
}

h1.title {
    font-size: 4em; /* Larger font size */
    color: #1a1a1a;
    text-align: center;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 40px;
    letter-spacing: 2px;
    line-height: 1.2;
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2); /* Text shadow for emphasis */
}

.checklist-container {
    width: 90%;
    max-width: 1400px; /* Larger max width */
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 80px; /* Increased gap */
    margin: 0 auto;
}

.checklist {
    width: 100%;
    padding: 30px;
}

.checklist-left, .checklist-right {
    flex: 1;
}


li {
    margin-bottom: 30px;
    padding-bottom: 10px;
    font-size: 6em; /* Larger font size for the list items */
    color: #2c3e50;
    font-weight: bold;
    position: relative;
    padding-left: 60px; /* Increase padding for better spacing */
}

li:before {
   
    position: absolute;
    left: 0;
    font-size: 1.8em;
    color: #3498db; /* Blue color for the numbering */
    top: 0;
}

input[type="checkbox"] {
    margin-left: 20px;
    transform: scale(1.5); /* Enlarge checkbox for better visibility */
    accent-color: #3498db; /* Matching color */
}

input[type="checkbox"]:disabled {
    opacity: 0.8;
    cursor: not-allowed;
}

/* Mobile-friendly */
@media (max-width: 768px) {
    .checklist-container {
        flex-direction: column;
        gap: 40px;
    }

    h1.title {
        font-size: 3em; /* Slightly smaller on mobile */
    }

    li {
        font-size: 1.4em;
    }
}
/* Base styles for the pictures grid */
.pictures-grid {
    display: flex;                      /* Enable Flexbox layout */
    flex-wrap: wrap;                    /* Allow items to wrap onto the next line */
    justify-content: space-between;     /* Space out items evenly */
    margin: 20px;                       /* Margin around the grid */
}

.pictures-grid .picture-item {
    flex: 0 0 48%;                      /* Each item takes up 48% of the row width */
    margin-bottom: 20px;                /* Space below each item */
    position: relative;                 /* Position for the overlay effect */
    transition: transform 0.3s ease;    /* Smooth scaling effect on hover */
}

.pictures-grid .picture-item img {
    width: 100%;                        /* Make images responsive */
    height: auto;                       /* Maintain aspect ratio */
    border-radius: 8px;                 /* Rounded corners for images */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow effect */
}

.pictures-grid .picture-item p {
    text-align: center;                 /* Center the text */
    font-weight: bold;                  /* Make the text bold */
    margin-top: 8px;                    /* Margin above the text */
    color: #333;                        /* Dark gray text color */
    font-size: 16px;                    /* Font size for text */
}

.pictures-grid .picture-item:hover {
    transform: scale(1.05);             /* Slightly increase the size on hover */
}




</style>



@php
 $imageFields = [
                'substation_fl_image1', 'substation_fl_image2',
                'existing_switchgear_image1', 'existing_switchgear_image2',
                'switchgear_nameplate_image1', 'switchgear_nameplate_image2',
                'distribution_board_image1', 'distribution_board_image2',
                'battery_charger_image1', 'battery_charger_image2',
                'battery_charger_nameplate_image1', 'battery_charger_nameplate_image2',
                'ceiling_tray_image1', 'ceiling_tray_image2',
                'civil_location_image1', 'civil_location_image2',
                'substation_entrance_image1', 'substation_entrance_image2',
                'cable_route_image1', 'cable_route_image2',
                'genset_location_image1', 'genset_location_image2',
                'feeder_tx_image1', 'feeder_tx_image2',
                'trench_view_image1', 'trench_view_image2',
                'rtu_image1', 'rtu_image2',
                'rcb_image1', 'rcb_image2',
                'efi_image1', 'efi_image2',
                'other_image1', 'other_image2', 'other_image3', 'other_image4'
            ];
$toolboxImageFields = ['toolbox_image1', 'toolbox_image2'];
@endphp

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


<h1 class="title">PICTURE LIST FORM<br>(SITE VISIT)</h1>

<div class="checklist-container">
    <div class="checklist">
        <div class="checklist-left">
            <ol>
                <li> Substation (FL)
                    <input type="checkbox" name="substation_fl" value="yes" <?php echo ($pictureData['substation_fl'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="substation_fl" value="no" <?php echo ($pictureData['substation_fl'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li> Existing Switchgear
                    <input type="checkbox" name="existing_switchgear" value="yes" <?php echo ($pictureData['existing_switchgear'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="existing_switchgear" value="no" <?php echo ($pictureData['existing_switchgear'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                
                <li> Switchgear Nameplate
                    <input type="checkbox" name="switchgear_nameplate" value="yes" <?php echo ($pictureData['switchgear_nameplate'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="switchgear_nameplate" value="no" <?php echo ($pictureData['switchgear_nameplate'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li> Distribution Board
                    <input type="checkbox" name="distribution_board" value="yes" <?php echo ($pictureData['distribution_board'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="distribution_board" value="no" <?php echo ($pictureData['distribution_board'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li> Battery Charger
                    <input type="checkbox" name="battery_charger" value="yes" <?php echo ($pictureData['battery_charger'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="battery_charger" value="no" <?php echo ($pictureData['battery_charger'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li> Battery Charger Nameplate
                    <input type="checkbox" name="battery_charger_nameplate" value="yes" <?php echo ($pictureData['battery_charger_nameplate'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="battery_charger_nameplate" value="no" <?php echo ($pictureData['battery_charger_nameplate'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li> Wall / Ceiling Cable Tray Route (P/W)
                    <input type="checkbox" name="ceiling_tray" value="yes" <?php echo ($pictureData['ceiling_tray'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="ceiling_tray" value="no" <?php echo ($pictureData['ceiling_tray'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li> Civil Work Location
                    <input type="checkbox" name="civil_location" value="yes" <?php echo ($pictureData['civil_location'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="civil_location" value="no" <?php echo ($pictureData['civil_location'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
            </ol>
        </div>
        <div class="checklist-right">
            <ol start="9">
                <li> Substation Entrance
                    <input type="checkbox" name="substation_entrance" <?php echo ($pictureData['substation_entrance'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="substation_entrance" <?php echo ($pictureData['substation_entrance'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li> Cable Route
                    <input type="checkbox" name="cable_route" <?php echo ($pictureData['cable_route'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="cable_route" <?php echo ($pictureData['cable_route'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li> Portable Genset Location
                    <input type="checkbox" name="genset_location" <?php echo ($pictureData['genset_location'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="genset_location" <?php echo ($pictureData['genset_location'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li> Feeder and TX Cable
                    <input type="checkbox" name="feeder_tx" <?php echo ($pictureData['feeder_tx'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="feeder_tx" <?php echo ($pictureData['feeder_tx'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li> Trench Inside View
                    <input type="checkbox" name="trench_view" <?php echo ($pictureData['trench_view'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="trench_view" <?php echo ($pictureData['trench_view'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li> RTU Remote Terminal Unit
                    <input type="checkbox" name="rtu" <?php echo ($pictureData['rtu'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="rtu" <?php echo ($pictureData['rtu'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li> RCB Remote Control Box
                    <input type="checkbox" name="rcb" <?php echo ($pictureData['rcb'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="rcb" <?php echo ($pictureData['rcb'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li> EFI Earth Fault Indicator
                    <input type="checkbox" name="efi" <?php echo ($pictureData['efi'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="efi" <?php echo ($pictureData['efi'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
            </ol>
        </div>
    </div>
</div>

{{-- 
<div class="signature-section">
    <div class="prepared">
        <p>Disediakan Oleh:</p>
        
        <p>Nama: <br>Jawatan: </p>
    </div>
    <div class="reviewed">
        <p>Disemak Oleh:</p>
        <div class="signature-box">Signature 2</div>
        <p>Nama:<br>Jawatan:</p>
    </div>
</div> --}}


<div>
       
    {{-- <div class="header" style="padding-top: 260px">
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
                1st Floor No 72, Jalan SS 21/1, Damansara<br>
                Utama, 47400 Petaling Jaya, Selangor</p>
            @else
                <!-- Default logo or empty state -->
                <img src='/assets/web-images/defaultlogo.png' alt="Default Logo">
                <p>Default Company Name<br>
                Default Address</p>
            @endif
        </div>
    </div> --}}

        {{-- <div class="substation-info">           
            <p><strong>SUBSTATION NAME:</strong> {{$survey->nama_pe}}</p>
            <p><strong>NO FUNCTIONAL LOCATION:</strong> JJBUPJCOEH00621</p>
        </div> --}}

        <h2 class="section-title"><u>PICTURE OF SITE SURVEY</u></h2>

        <div class="pictures-grid">
            @if(isset($pictureData))
                @foreach($imageFields as $field)
                    @if(!empty($pictureData->$field))
                        <div class="picture-item">
                            <img src='/{{ $pictureData->$field }}' alt="{{ ucfirst(str_replace('_', ' ', $field)) }}">
                            <p>{{ ucfirst(str_replace('_', ' ', $field)) }}</p>
                        </div>
                    @endif
                @endforeach
            @endif
        
            @if(isset($toolbox))
                @foreach($toolboxImageFields as $field)
                    @if(!empty($toolbox->$field))
                        <div class="picture-item">
                            <img src='/{{$toolbox->$field }}' alt="{{ ucfirst(str_replace('_', ' ', $field)) }}">
                            <p>{{ ucfirst(str_replace('_', ' ', $field)) }}</p>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
        
        
    </div>

