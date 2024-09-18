

<style>
 .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 50px;
        }
        .logo {
            border: 1px solid black;
            padding: 10px;
            font-size: 12px;
            width: 45%;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        header img {
            max-height: 100px;
        }
        .logo {
            border: 1px solid black;
            padding: 10px;
            font-size: 12px;
            width: 45%;
        }
        .logo img {
            width: 100px;
        }
        .title {
            font-size: 24px;
            text-align: center;
        }
        .section-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5em;
        }
        .checklist-container {
            display: flex;
            
        }

        .checklist-left, .checklist-right {
            flex: 1;
            margin: 0 30px; 
        }

        .checklist-left {
            margin-right: 40px; 
        }

        .checklist-right {
            margin-left: 40px; 
        }

        .checklist {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap; 
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }
        .prepared, .reviewed {
            width: 45%;
            text-align: left;
        }
        .signature-box {
            border: 1px solid #000;
            width: 150px;
            height: 50px;
            margin-bottom: 10px;
        }

        .substation-info {
            margin-bottom: 20px;
        }

        .pictures-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 items per row */
            gap: 20px; /* Space between items */
        }

        .picture-item {
            padding: 10px;
            border: 1px solid black; /* Simple black border */
            text-align: center; /* Center align text */
        }

        .picture-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px; /* Space between image and description */
            border: 1px solid black; /* Black border around image */
        }

        .picture-item p {
            font-size: 14px;
            color: #000; /* Black text color */
            font-weight: normal; /* Normal weight for description text */
            border-top: 1px solid black; /* Black line above description */
            padding-top: 10px; /* Space between line and description */
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 50px;
        }
        .logo {
            border: 1px solid black;
            padding: 10px;
            font-size: 12px;
            width: 45%;
        }
        .content {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-top: 200px;
        }

        .container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        h2 {
            text-align: left;
            margin-bottom: 20px;
        }

       

        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td[colspan="5"] {
            font-weight: bold;
            background-color: #f9f9f9;
        }

        .logo img {
            width: 100px;
        }

        .title {
            font-size: 24px;
            text-align: center;
        }

        .checklist-container {
            display: flex;
            
        }

        .checklist-left, .checklist-right {
            flex: 1;
            margin: 0 30px; 
        }

        .checklist-left {
            margin-right: 40px; 
        }

        .checklist-right {
            margin-left: 40px; 
        }

        .checklist {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap; 
        }

        ol {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            display: flex;
            align-items: center;
            margin-bottom: 15px; 
            font-size: 14px; 
        }

        li label {
            margin-right: 20px; 
            margin-left: 10px; 
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .prepared, .reviewed {
            width: 45%;
            text-align: left;
        }

        .signature-box {
            border: 1px solid #000;
            width: 150px;
            height: 50px;
            margin-bottom: 10px;
        }

        input[type="checkbox"] {
            margin-right: 5px; 
            accent-color: black;
            cursor: not-allowed;
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid #000;
            background-color: #fff;
            position: relative;
            vertical-align: middle; 
        }

        input[type="checkbox"]:checked::before {
            content: "✓";
            color: #000;
            font-weight: bold;
            font-size: 14px; 
            position: absolute;
            left: 2px;
            top: -2px;
        }

        input[type="checkbox"].yes {
            margin-right: 20px; 
        }

        input[type="checkbox"].no {
            margin-right: 0; 
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            
        }

       

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        header img {
            max-height: 100px;
        }

        .substation-info {
            margin-bottom: 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5em;
        }

        .pictures-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 items per row */
            gap: 20px; /* Space between items */
        }

        .picture-item {
            padding: 10px;
            border: 1px solid black; /* Simple black border */
            text-align: center; /* Center align text */
        }

        .picture-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px; /* Space between image and description */
            border: 1px solid black; /* Black border around image */
        }

        .picture-item p {
            font-size: 14px;
            color: #000; /* Black text color */
            font-weight: normal; /* Normal weight for description text */
            border-top: 1px solid black; /* Black line above description */
            padding-top: 10px; /* Space between line and description */
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
        }
        h1 {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .signature {
            text-align: center;
        }
        .stamp {
            width: 100px;
            height: 100px;
            border: 1px solid #000;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        .image-container {
            max-width: 100%;
            max-height: 100vh;
        }
        img {
            max-width: 100%;
            max-height: 100vh;
            object-fit: contain;
            
        }

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

        .checkboxs {
    display: inline-block;
    width: 12px;
    height: 12px;
    margin-right: 5px;
    border: 1px solid #000;
}

.checkeds {
    background-color: #000;
}

.headers img {
    max-width: 50%; /* Scale down the image to 80% of its container's width */
    /* Maintain aspect ratio */
    margin-bottom: 20px; /* Space between image and heading */
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

<div class="header" style="padding-top: 150px">
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
    </div>


<h1 class="title">PICTURE LIST FORM<br>(SITE VISIT)</h1>

<div class="checklist-container">
    <div class="checklist">
        <div class="checklist-left">
            <ol>
                <li>1. Substation (FL)
                    <input type="checkbox" name="substation_fl" value="yes" <?php echo ($pictureData['substation_fl'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="substation_fl" value="no" <?php echo ($pictureData['substation_fl'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li>2. Existing Switchgear
                    <input type="checkbox" name="existing_switchgear" value="yes" <?php echo ($pictureData['existing_switchgear'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="existing_switchgear" value="no" <?php echo ($pictureData['existing_switchgear'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                
                <li>3. Switchgear Nameplate
                    <input type="checkbox" name="switchgear_nameplate" value="yes" <?php echo ($pictureData['switchgear_nameplate'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="switchgear_nameplate" value="no" <?php echo ($pictureData['switchgear_nameplate'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li>4. Distribution Board
                    <input type="checkbox" name="distribution_board" value="yes" <?php echo ($pictureData['distribution_board'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="distribution_board" value="no" <?php echo ($pictureData['distribution_board'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li>5. Battery Charger
                    <input type="checkbox" name="battery_charger" value="yes" <?php echo ($pictureData['battery_charger'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="battery_charger" value="no" <?php echo ($pictureData['battery_charger'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li>6. Battery Charger Nameplate
                    <input type="checkbox" name="battery_charger_nameplate" value="yes" <?php echo ($pictureData['battery_charger_nameplate'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="battery_charger_nameplate" value="no" <?php echo ($pictureData['battery_charger_nameplate'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li>7. Wall / Ceiling Cable Tray Route (P/W)
                    <input type="checkbox" name="ceiling_tray" value="yes" <?php echo ($pictureData['ceiling_tray'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="ceiling_tray" value="no" <?php echo ($pictureData['ceiling_tray'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li>8. Civil Work Location
                    <input type="checkbox" name="civil_location" value="yes" <?php echo ($pictureData['civil_location'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="civil_location" value="no" <?php echo ($pictureData['civil_location'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
            </ol>
        </div>
        <div class="checklist-right">
            <ol start="9">
                <li>9. Substation Entrance
                    <input type="checkbox" name="substation_entrance" <?php echo ($pictureData['substation_entrance'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="substation_entrance" <?php echo ($pictureData['substation_entrance'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li>10. Cable Route
                    <input type="checkbox" name="cable_route" <?php echo ($pictureData['cable_route'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="cable_route" <?php echo ($pictureData['cable_route'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li>11. Portable Genset Location
                    <input type="checkbox" name="genset_location" <?php echo ($pictureData['genset_location'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="genset_location" <?php echo ($pictureData['genset_location'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li>12. Feeder and TX Cable
                    <input type="checkbox" name="feeder_tx" <?php echo ($pictureData['feeder_tx'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="feeder_tx" <?php echo ($pictureData['feeder_tx'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li>13. Trench Inside View
                    <input type="checkbox" name="trench_view" <?php echo ($pictureData['trench_view'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="trench_view" <?php echo ($pictureData['trench_view'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li>14. RTU Remote Terminal Unit
                    <input type="checkbox" name="rtu" <?php echo ($pictureData['rtu'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="rtu" <?php echo ($pictureData['rtu'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li>15. RCB Remote Control Box
                    <input type="checkbox" name="rcb" <?php echo ($pictureData['rcb'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="rcb" <?php echo ($pictureData['rcb'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
                
                <li>16. EFI Earth Fault Indicator
                    <input type="checkbox" name="efi" <?php echo ($pictureData['efi'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                    <input type="checkbox" name="efi" <?php echo ($pictureData['efi'] == 'no') ? 'checked' : ''; ?> disabled> No
                </li>
            </ol>
        </div>
    </div>
</div>


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
</div>


<div>
       
    <div class="header" style="padding-top: 150px">
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
    </div>

        <div class="substation-info">           
            <p><strong>SUBSTATION NAME:</strong> {{$survey->nama_pe}}</p>
            <p><strong>NO FUNCTIONAL LOCATION:</strong> JJBUPJCOEH00621</p>
        </div>

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

