<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Site Survey Toolbox Talk_{{$survey->nama_pe}} </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
            padding: 20px;
            margin: 0;
        }

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
            align-items: center;
        }

        .logo img {
            max-width: 80%;
            height: auto;
            margin-bottom: 10px;
        }

        .logo p {
            margin: 0;
            font-size: 12px;
            line-height: 1.4;
        }

        h2 {
            text-align: center;
            color: #8e44ad;
            text-transform: uppercase;
            font-weight: bold;
        }

       

      

        .highlight {
            background-color: #f2f2f2;
        }

        .img-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .img-container img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
          
        }
        .signature {
            text-align: center;
        }

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
            justify-content: center;
            align-items: center;
            display: flex;
            align-self: center;
            padding-top: auto;
            padding-top: auto;
        }

        table.toolbox {
        width: 100%;
        border-collapse: collapse;
    }
    table.toolbox th {
        text-align: center;
        padding: 6px;
    }
    table.toolbox td {
        padding: 6px;
        vertical-align: top;
    }
    /* Borders only for YES/NO cells + header of those columns */
    table.toolbox th.border,
    table.toolbox td.border {
        border: 1px solid #000;
        text-align: center;
    }

    .survey-header {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin:105px 0;
        }
        
        .survey-header td {
            border: 1px solid black;
            padding: 5px 8px;
            text-align: left;
            vertical-align: middle;
        }
        
        .survey-header .title-cell {
            background-color: #f0f0f0;
            font-weight: bold;
            width: 25%;
        }
        
        .survey-header .content-cell {
            width: 25%;
        }
        
        .survey-header .date-cell {
            width: 15%;
        }
        
        .survey-header .date-content {
            width: 10%;
        }
    </style>
</head>

<body>
    <div id="content" class="container">
        <div style="break-after:page">
           
                <div class="row">
                <div class="col border" style=" display: flex; align-items: center; ">
                    <img class="logo" src='/assets/web-images/tnblogo.png' alt="TNB Logo" style="height: 60px; width: auto; flex-shrink: 0;">
                    <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                        TNB ENERGY SERVICES SDN BHD (234667-M)<br>
                        Level 2, Jalan Air Hitam, Kawasan 16,<br>
                        40000 Shah Alam, Selangor
                    </p>
                </div>
                                    <div class="col border" style=" display: flex; align-items: center;">
                        @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
                        <img class="logo" src='/assets/web-images/main-logo.png' alt="Aerosynergy Solutions Logo" style="height: 45px; width: auto; flex-shrink: 0;">
                        <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                            AEROSYNERGY SOLUTIONS SDN BHD
                            NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor
                        </p>
                        @elseif($projectName === 'ARAS-JOHOR')
                        <img class="logo" src='/assets/web-images/araslogo.png' alt="ARAS Kejuruteraan Logo" style="height: 45px; width: auto; flex-shrink: 0;">
                        <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                            ARAS KEJURUTERAAN SDN BHD<br>
                            1st Floor No 72, Jalan SS 21/1, Damansara Utama, 47400 Petaling Jaya, Selangor
                        </p>
                        @else
                        <img class="logo" src='/assets/web-images/defaultlogo.png' alt="Default Logo" style="height: 45px; width: auto; flex-shrink: 0;">
                        <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                            Default Company Name<br>
                            Default Address
                        </p>
                        @endif
                    </div>
                </div>
            <h4 class="title center-text" style="padding-top:20px;font-weight:bold;font-size:18px;">TOOLBOX TALK FORM</h4>

            <div class="container-fluid">
                <table style="width: 100%; margin-bottom: 20px; font-size: 14px;">
                    <tr>
                        <th style="padding: 8px; text-align: left; width: 15%; font-weight: bold;">Lokasi</th>
                        <td style="padding: 8px; text-align: left; width: 35%;">: KL SELANTAN</td>
                        <th style="padding: 8px; text-align: left; width: 15%; font-weight: bold;">Tarikh</th>
                        <td style="padding: 8px; text-align: left; width: 35%;">: 15/08/2024</td>
                    </tr>
                    <tr>
                        <th style="padding: 8px; text-align: left; font-weight: bold;">Nama Pencawang</th>
                        <td style="padding: 8px; text-align: left;">: TE BEDFORD IND PARK NO 1</td>
                        <th style="padding: 8px; text-align: left; font-weight: bold;">CFS</th>
                        <td style="padding: 8px; text-align: left;">: KUALA LUMPUR</td>
                    </tr>
                    <tr>
                        <th style="padding: 8px; text-align: left; font-weight: bold;">Skop Kerja</th>
                        <td colspan="3" style="padding: 8px; text-align: left;">: SITE SURVEY</td>
                    </tr>
                </table>
            </div>
            
            <h4 style="text-align: left; padding-left: 20px; font-weight: bold;font-size:14px;">Checklist :</h4>


            <table class="toolbox">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th class="border">SITE SURVEY</th>
            <th class="border">CABLING</th>
            <th class="border">OUTAGE</th>
            <th class="border">SAT</th>
        </tr>
    </thead>
    <tbody>
        <!-- PPD -->
        <tr>
            <td rowspan="4"><strong>PPD</strong></td>
            <td>Safety Helmet</td>
            <td class="border">{{ strtoupper($toolboxtalk->ppd_safety_helment) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>
        <tr>
            <td>Safety Vest</td>
            <td class="border">{{ strtoupper($toolboxtalk->ppd_safety_vest) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>
        <tr>
            <td>Safety Shoes</td>
            <td class="border">{{ strtoupper($toolboxtalk->ppd_safety_shoes) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>
        <tr>
            <td>Safety</td>
            <td class="border">{{ strtoupper($toolboxtalk->ppd_safety) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>

        <!-- TOOL & EQUIPMENT -->
        <tr>
            <td><strong>TOOL & EQUIPMENT</strong></td>
            <td>All In Good Condition</td>
            <td class="border">{{ strtoupper($toolboxtalk->equipment_condition) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>

        <!-- INSTRUMENT -->
        <tr>
            <td rowspan="2"><strong>INSTRUMENT</strong></td>
            <td>All In Good Condition</td>
            <td class="border">{{ strtoupper($toolboxtalk->instrument_condition) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>
        <tr>
            <td>First Aid Kit</td>
            <td class="border">{{ strtoupper($toolboxtalk->instrument_kit_condition) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>

        <!-- VEHICLE -->
        <tr>
            <td rowspan="2"><strong>VEHICLE</strong></td>
            <td>Fire Extinguisher</td>
            <td class="border">{{ strtoupper($toolboxtalk->vehicle_fire_extinguisher) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>
        <tr>
            <td>Vehicle In Good Condition</td>
            <td class="border">{{ strtoupper($toolboxtalk->vehicle_condition) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>

        <!-- TRAFFIC -->
        <tr>
            <td rowspan="3"><strong>TRAFFIC</strong></td>
            <td>Safety Kon</td>
            <td class="border">{{ strtoupper($toolboxtalk->traffic_safety_kon) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>
        <tr>
            <td>Sign Board</td>
            <td class="border">{{ strtoupper($toolboxtalk->traffic_sign_board) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>
        <tr>
            <td>Chargeman Bo</td>
            <td class="border">{{ strtoupper($toolboxtalk->traffic_chargeman) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>

        <!-- TEAM -->
        <tr>
            <td rowspan="2"><strong>TEAM</strong></td>
            <td>AP TNP</td>
            <td class="border">{{ strtoupper($toolboxtalk->team_ap_tnp) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>
        <tr>
            <td>CP TNB</td>
            <td class="border">{{ strtoupper($toolboxtalk->team_cp_tnb) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>

        <!-- NIOSH -->
        <tr>
            <td><strong>NIOSH</strong></td>
            <td>All Staff Have NTSP</td>
            <td class="border">{{ strtoupper($toolboxtalk->niosh_staff_ntsp) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>

        <!-- PERMIT -->
        <tr>
            <td rowspan="2"><strong>PERMIT</strong></td>
            <td>Special Permit</td>
            <td class="border">{{ strtoupper($toolboxtalk->permit_special) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>
        <tr>
            <td>Permit To Work (PTW)</td>
            <td class="border">{{ strtoupper($toolboxtalk->permit_work) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>

        <!-- PICTURE -->
        <tr>
            <td><strong>PICTURE</strong></td>
            <td>Picture During ToolBox Talk</td>
            <td class="border">{{ strtoupper($toolboxtalk->picture_during_toolbox) }}</td>
            <td class="border"></td>
            <td class="border"></td>
            <td class="border"></td>
        </tr>
    </tbody>
</table>

<div style="width: 300px; margin: 20px 0;">
        <div style="margin-bottom: 15px;">
            <strong>Supervisor</strong>
        </div>
        
        <div style="height: 60px; margin-bottom: 10px;">
            <!-- Space for signature -->
        </div>
        
        <div style="border-bottom: 1px dotted black; margin-bottom: 5px; height: 1px;"></div>
        
        <div style="font-size: 12px;">
            <strong>Nama : </strong>
        </div>
    </div>
    <table class="survey-header" style="position: fixed; bottom: 0; left: 0; right: 0; width: 100%; border-collapse: collapse; margin: 0;">
        <tr>
            <td class="title-cell" style="border: 1px solid #000; padding: 5px;">SITE SURVEY FORM TNB 11/01/2023</td>
            <td class="content-cell" style="border: 1px solid #000; padding: 5px;">Part No.: </td>
            <td class="date-cell" style="border: 1px solid #000; padding: 5px;">Rev No.: </td>
            <td class="date-content" style="border: 1px solid #000; padding: 5px;">Rel Date:</td>
        </tr>
    </table>
        </div>

        <!-- <div style="break-after:page">
        <div class="row">
                <div class="col border" style=" display: flex; align-items: center; ">
                    <img class="logo" src='/assets/web-images/tnblogo.png' alt="TNB Logo" style="height: 60px; width: auto; flex-shrink: 0;">
                    <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                        TNB ENERGY SERVICES SDN BHD (234667-M)<br>
                        Level 2, Jalan Air Hitam, Kawasan 16,<br>
                        40000 Shah Alam, Selangor
                    </p>
                </div>
                                    <div class="col border" style=" display: flex; align-items: center;">
                        @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
                        <img class="logo" src='/assets/web-images/main-logo.png' alt="Aerosynergy Solutions Logo" style="height: 45px; width: auto; flex-shrink: 0;">
                        <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                            AEROSYNERGY SOLUTIONS SDN BHD
                            NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor
                        </p>
                        @elseif($projectName === 'ARAS-JOHOR')
                        <img class="logo" src='/assets/web-images/araslogo.png' alt="ARAS Kejuruteraan Logo" style="height: 45px; width: auto; flex-shrink: 0;">
                        <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                            ARAS KEJURUTERAAN SDN BHD<br>
                            1st Floor No 72, Jalan SS 21/1, Damansara Utama, 47400 Petaling Jaya, Selangor
                        </p>
                        @else
                        <img class="logo" src='/assets/web-images/defaultlogo.png' alt="Default Logo" style="height: 45px; width: auto; flex-shrink: 0;">
                        <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                            Default Company Name<br>
                            Default Address
                        </p>
                        @endif
                    </div>
                </div>

            <h4 class="title center-text" style="padding-top: 20px;">ToolBox Talk Images</h4>

            <div class="img-container" style="padding-top: 30px;">
                <img src='/{{$toolboxtalk->toolbox_image1}}' alt="Toolbox Talk Image 1">
                <img src='/{{$toolboxtalk->toolbox_image2}}' alt="Toolbox Talk Image 2">
            </div>

          


     <div class="signature-section">
        <div class="signature">
           <strong> <p>Supervisor:</p></strong>
           <br><br><br>
           <div style="border-bottom: 1px solid #000; width: 200px; margin: 0 auto;"></div>
           <br>
            <p><strong>Nama : NAJMI PENYELIA TAPAK</strong></p>
        </div>
        <div class="signature">
            <strong><p>Approved By:</p></strong>
            <br><br><br>
            <div style="border-bottom: 1px solid #000; width: 200px; margin: 0 auto;"></div>
            <br>
            <p><strong>Name</strong></p>
        </div>
    </div> 
        </div> -->
        
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
</body>

</html>
