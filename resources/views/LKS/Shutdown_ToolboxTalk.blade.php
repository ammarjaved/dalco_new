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
        .logo img {
            width: 100px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
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


</style>





<div class="header" style="padding-top: 300px">
    <div class="logo">
        <img src="{{ URL::asset('assets/web-images/tnblogo.png') }}" alt="TNB Logo">

        <p>TNB ENERGY SERVICES SDN BHD (234667-M)<br>
        Level 2, Jalan Air Hitam, Kawasan 16,<br>
        40000 Shah Alam, Selangor</p>
    </div>
    <div class="logo">
        @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
            <img src="{{ URL::asset('assets/web-images/main-logo.png') }}" alt="Aerosynergy Solutions Logo">
            <p>AEROSYNERGY SOLUTIONS SDN BHD<br>
            Address details for Aerosynergy Solutions</p>
        @elseif($projectName === 'ARAS-JOHOR')
            <img src="{{ URL::asset('assets/web-images/araslogo.png') }}" alt="ARAS Kejuruteraan Logo">
            <p>ARAS KEJURUTERAAN SDN BHD<br>
            1st Floor No 72, Jalan SS 21/1, Damansara<br>
            Utama, 47400 Petaling Jaya, Selangor</p>
        @else
            <!-- Default logo or empty state -->
            <img src="{{ URL::asset('assets/web-images/defaultlogo.png') }}" alt="Default Logo">
            <p>Default Company Name<br>
            Default Address</p>
        @endif
    </div>
   
</div>
<h2 style="text-align: center;">Shutdown TOOLBOXTALK</h2>

<table >
<tr>
    <th>Lokasi</th>
    <td>{{$toolboxtalk->lokasi}}</td>
    <th>Tarikh</th>
    <td>{{$ImageShutdownlks->first()->tarikh}}</td>
</tr>
<tr>
    <th>Nama Pencawang</th>
    <td>{{$survey->nama_pe}}</td>
    <th>CFS</th>
    <td>{{$toolboxtalk->cfs}}</td>
</tr>
<tr>
    <th>Skop Kerja</th>
    <td colspan="3">OUTAGE</td> <!-- Changed the scope to OUTAGE -->
</tr>
</table>

<div class="container">
<h2>Checklist</h2>
<table style="margin-left:-23px">
    <tr>
        <th></th>
        <th>Site Survey</th>
        <th>Cabling</th>
        <th>Outage</th>
        <th>SAT</th>
    </tr>
    <tr>
        <td colspan="5"><strong>PPD</strong></td>
    </tr>
    @foreach($ImageShutdownlks as $item)
        <tr>
            <td>Safety Helmet</td>
            <td></td>
            <td></td>
            <td>{{$item->ppd_safety_helment}}</td>
            <td></td>
        </tr>
        <tr>
            <td>Safety Vest</td>
            <td></td>
            <td></td>
            <td>{{$item->ppd_safety_vest}}</td>
            <td></td>
        </tr>
        <tr>
            <td>Safety Shoes</td>
            <td></td>
            <td></td>
            <td>{{$item->ppd_safety_shoes}}</td>
            <td></td>
        </tr>
        <tr>
            <td>Safety</td>
            <td></td>
            <td></td>
            <td>{{$item->ppd_safety}}</td>
            <td></td>
        </tr>
    @endforeach

    <tr>
        <td colspan="5"><strong>TOOL & EQUIPMENT INSTRUMENT</strong></td>
    </tr>
    @foreach($ImageShutdownlks as $item)
        <tr>
            <td>All In Good Condition</td>
            <td></td>
            <td></td>
            <td>{{$item->equipment_condition}}</td>
            <td></td>
        </tr>
    @endforeach

    <tr>
        <td colspan="5"><strong>INSTRUMENT</strong></td>
    </tr>
    @foreach($ImageShutdownlks as $item)
        <tr>
            <td>All In Good Condition</td>
            <td></td>
            <td></td>
            <td>{{$item->instrument_condition}}</td>
            <td></td>
        </tr>
        <tr>
            <td>First Aid Kit</td>
            <td></td>
            <td></td>
            <td>{{$item->instrument_kit_condition}}</td>
            <td></td>
        </tr>
    @endforeach

    <tr>
        <td colspan="5"><strong>VEHICLE</strong></td>
    </tr>
    @foreach($ImageShutdownlks as $item)
        <tr>
            <td>Fire Extinguisher</td>
            <td></td>
            <td></td>
            <td>{{$item->vehicle_fire_extinguisher}}</td>
            <td></td>
        </tr>
        <tr>
            <td>Vehicle In Good Condition</td>
            <td></td>
            <td></td>
            <td>{{$item->vehicle_condition}}</td>
            <td></td>
        </tr>
    @endforeach

    <tr>
        <td colspan="5"><strong>TRAFFIC</strong></td>
    </tr>
    @foreach($ImageShutdownlks as $item)
        <tr>
            <td>Safety Kon</td>
            <td></td>
            <td></td>
            <td>{{$item->traffic_safety_kon}}</td>
            <td></td>
        </tr>
        <tr>
            <td>Sign Board</td>
            <td></td>
            <td></td>
            <td>{{$item->traffic_sign_board}}</td>
            <td></td>
        </tr>
        <tr>
            <td>Chargeman Bo</td>
            <td></td>
            <td></td>
            <td>{{$item->traffic_chargeman}}</td>
            <td></td>
        </tr>
    @endforeach

    <tr>
        <td colspan="5"><strong>TEAM</strong></td>
    </tr>
    @foreach($ImageShutdownlks as $item)
        <tr>
            <td>AP TNP</td>
            <td></td>
            <td></td>
            <td>{{$item->team_ap_tnp}}</td>
            <td></td>
        </tr>
        <tr>
            <td>CP TNB</td>
            <td></td>
            <td></td>
            <td>{{$item->team_cp_tnb}}</td>
            <td></td>
        </tr>
    @endforeach

    <tr>
        <td colspan="5"><strong>NIOSH</strong></td>
    </tr>
    @foreach($ImageShutdownlks as $item)
        <tr>
            <td>All Staff Have NTSP</td>
            <td></td>
            <td></td>
            <td>{{$item->niosh_staff_ntsp}}</td>
            <td></td>
        </tr>
    @endforeach

    <tr>
        <td colspan="5"><strong>PERMIT</strong></td>
    </tr>
    @foreach($ImageShutdownlks as $item)
        <tr>
            <td>Special Permit</td>
            <td></td>
            <td></td>
            <td>{{$item->permit_special}}</td>
            <td></td>
        </tr>
        <tr>
            <td>Permit To Work (PTW)</td>
            <td></td>
            <td></td>
            <td>{{$item->permit_work}}</td>
            <td></td>
        </tr>
    @endforeach

    <tr>
        <td colspan="5"><strong>PICTURE</strong></td>
    </tr>
    @foreach($ImageShutdownlks as $item)
        <tr>
            <td>Picture During Tool Box Talk</td>
            <td></td>
            <td></td>
            <td>{{$item->picture_during_toolbox}}</td>
            <td></td>
        </tr>
        <tr>
            <td><img src='/{{$item->toolbox_image1}}' width="200px" height="200px" /></td>
            <td><img src='/{{$item->toolbox_image2}}' width="200px" height="200px" /></td>
        </tr>
    @endforeach
</table>
</div>

<div class="signature">
<p>Supervisor:</p>
<p>Nama : </p>
</div>


<button onclick="printPage()">Print </button>

<script>
    // JavaScript function to trigger the print dialog
    function printPage() {
      window.print();
    }
  </script>