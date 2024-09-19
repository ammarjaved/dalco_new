
<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        background-color: #f8f9fa;
        padding: 20px;
    }

    .container {
        max-width: 1000px;
        margin: 0 auto;
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #8e44ad;
        color: white;
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

    h2 {
        text-align: center;
        color: #8e44ad;
        text-transform: uppercase;
        font-weight: bold;
    }

    .signature {
        text-align: right;
        margin-top: 50px;
    }

    .signature p {
        margin: 0;
        font-size: 16px;
    }

    .footer {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
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

    .footer div {
        text-align: center;
        margin-top: 20px;
    }

    .footer div p {
        margin: 5px 0;
    }

    .img-container img {
        width: 200px;
        height: 200px;
        margin: 10px;
    }

    .highlight {
        background-color: #f2f2f2;
    }
</style>

<div class="container">
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
    <h2>TOOLBOX TALK FORM</h2>

    <table>
        <tr>
            <th>Lokasi</th>
            <td>{{$SATlks->lokasi}}</td>
            <th>Tarikh</th>
            <td>{{$SATlks->first()->tarikh}}</td>
        </tr>
        <tr>
            <th>Nama Pencawang</th>
            <td>{{$survey->nama_pe}}</td>
            <th>CFS</th>
            <td>{{$SATlks->cfs}}</td>
        </tr>
        <tr>
            <th>Skop Kerja</th>
            <td colspan="3">SAT</td>
        </tr>
    </table>

    <h2>Checklist</h2>
    <table>
        <tr>
            <th></th>
            <th>Site Survey</th>
           
        </tr>
        <tr>
            <td colspan="5"><strong>PPD</strong></td>
        </tr>
        <tr>
            <td>Safety Helmet</td>
            <td>{{$SATlks->ppd_safety_helment}}</td>
          
        </tr>
        <tr>
            <td>Safety Vest</td>
            <td>{{$SATlks->ppd_safety_vest}}</td>
          
        </tr>
        <tr>
            <td>Safety Shoes</td>
            <td>{{$SATlks->ppd_safety_shoes}}</td>
          
        </tr>
        <tr>
            <td>Safety</td>
            <td>{{$SATlks->ppd_safety}}</td>
        
        </tr>
        <tr>
            <td colspan="5"><strong>TOOL & EQUIPMENT INSTRUMENT</strong></td>
        </tr>
        <tr>
            <td>All In Good Condition</td>
            <td>{{$SATlks->equipment_condition}}</td>
           
        </tr>


        <tr>
            <td colspan="5"><strong> INSTRUMENT</strong></td>
        </tr>
        <tr>
            <td>All In Good Condition</td>
            <td>{{$SATlks->instrument_condition}}</td>
          
        </tr>
        <tr>
            <td>First Aid Kit</td>
            <td>{{$SATlks->instrument_kit_condition}}</td>
           
        </tr>


        <tr>
            <td colspan="5"><strong>VEHICLE</strong></td>
        </tr>
        <tr>
            <td>Fire Extinguisher</td>
            <td>{{$SATlks->vehicle_fire_extinguisher}}</td>
          
        </tr>
        <tr>
            <td>Vehicle In Good Condition</td>
            <td>{{$SATlks->vehicle_condition}}</td>
           
        </tr>
        <tr>
            <td colspan="5"><strong>TRAFFIC</strong></td>
        </tr>
        <tr>
            <td>Safety Kon</td>
            <td>{{$SATlks->traffic_safety_kon}}</td>
           
        </tr>
        <tr>
            <td>Sign Board</td>
            <td>{{$SATlks->traffic_sign_board}}</td>
           
        </tr>
        <tr>
            <td>Chargeman Bo</td>
            <td>{{$SATlks->traffic_chargeman}}</td>
        
        </tr>
        <tr>
            <td colspan="5"><strong>TEAM</strong></td>
        </tr>
        <tr>
            <td>AP TNP</td>
            <td>{{$SATlks->team_ap_tnp}}</td>
          
        </tr>
        <tr>
            <td>CP TNB</td>
            <td>{{$SATlks->team_cp_tnb}}</td>
           
        </tr>
        <tr>
            <td colspan="5"><strong>NIOSH</strong></td>
        </tr>
        <tr>
            <td>All Staff Have NTSP</td>
            <td>{{$SATlks->niosh_staff_ntsp}}</td>
          
        </tr>
        <tr>
            <td colspan="5"><strong>PERMIT</strong></td>
        </tr>
        <tr>
            <td>Special Permit</td>
            <td>{{$SATlks->permit_special}}</td>
          
        </tr>
        <tr>
            <td>Permit To Work (PTW)</td>
            <td>{{$SATlks->permit_work}}</td>
           
        </tr>
        <tr>
            <td colspan="5"><strong>PICTURE</strong></td>
        </tr>
        <tr>
            <td>Picture During ToolBox Talk</td>
            <td>{{$SATlks->picture_during_toolbox}}</td>
           
        </tr>

        
    </table>

    <h2>ToolBox Talk Images</h2>
    <div class="img-container">
        <img src='/{{$SATlks->toolbox_image1}}' alt="Toolbox Talk Image 1">
        <img src='/{{$SATlks->toolbox_image2}}' alt="Toolbox Talk Image 2">
    </div>

    {{-- <div class="signature">
        <p><strong>Supervisor:</strong></p>
        <p>Nama:</p>
    </div>

    <div class="footer">
        <div>
            <p><strong>Approved By:</strong></p>
            <p>Name</p>
        </div>
        <div class="stamp">
            <p>STAMP</p>
        </div>
    </div> --}}
</div>





