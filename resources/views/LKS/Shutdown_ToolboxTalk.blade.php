<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Toolbox Talk Form</title>
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
            font-size: 14px;
            line-height: 1.4;
        }

        h2 {
            text-align: center;
            color: #8e44ad;
            text-transform: uppercase;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #8e44ad;
            color: white;
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
    </style>
</head>

<body>
    <div id="content" class="container">
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

            <h4 class="title center-text">TOOLBOX TALK FORM</h4>

            <div class="container-fluid">
                <table>
                    <tr>
                        <th>Lokasi</th>
                        <td>{{$ImageShutdownlks->lokasi}}</td>
                        <th>Tarikh</th>
                        <td>{{$ImageShutdownlks->tarikh}}</td>
                    </tr>
                    <tr>
                        <th>Nama Pencawang</th>
                        <td>{{$survey->nama_pe}}</td>
                        <th>CFS</th>
                        <td>{{$ImageShutdownlks->cfs}}</td>
                    </tr>
                    <tr>
                        <th>Skop Kerja</th>
                        <td colspan="3">OUTAGE</td>
                    </tr>
                </table>
            </div>

            <h4 class="title center-text">CHECKLIST</h4>

            <h4 class="title center-text">Shutdown</h4>

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <strong class="center">PPD</strong>
                    </div>
                    <div class="col">
                        <div class="row">
                            Safety Helmet
                        </div>
                        <div class="row">
                            Safety Vest
                        </div>
                        <div class="row">
                            Safety Shoes
                        </div>
                        <div class="row">
                            Safety
                        </div>
                    </div>
                    <div class="col">
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->ppd_safety_helment)}}
                        </div>
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->ppd_safety_vest)}}
                        </div>
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->ppd_safety_shoes)}}
                        </div>
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->ppd_safety)}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <strong class="center">TOOL & EQUIPMENT</strong>
                    </div>
                    <div class="col">
                        <div class="row">
                            All In Good Condition
                        </div>
                    </div>
                    <div class="col">
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->equipment_condition)}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <strong class="center">INSTRUMENT</strong>
                    </div>
                    <div class="col">
                        <div class="row">
                            All In Good Condition
                        </div>
                        <div class="row">
                            First Aid Kit
                        </div>
                    </div>
                    <div class="col">
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->instrument_condition)}}
                        </div>
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->instrument_kit_condition)}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <strong class="center">VEHICLE</strong>
                    </div>
                    <div class="col">
                        <div class="row">
                            Fire Extinguisher
                        </div>
                        <div class="row">
                            Vehicle In Good Condition
                        </div>
                    </div>
                    <div class="col">
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->vehicle_fire_extinguisher)}}
                        </div>
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->vehicle_condition)}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <strong class="center">TRAFFIC</strong>
                    </div>
                    <div class="col">
                        <div class="row">
                            Safety Kon
                        </div>
                        <div class="row">
                            Sign Board
                        </div>
                        <div class="row">
                            Chargeman Bo
                        </div>
                    </div>
                    <div class="col">
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->traffic_safety_kon)}}
                        </div>
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->traffic_sign_board)}}
                        </div>
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->traffic_chargeman)}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <strong class="center">TEAM</strong>
                    </div>
                    <div class="col">
                        <div class="row">
                            AP TNP
                        </div>
                        <div class="row">
                            CP TNB
                        </div>
                    </div>
                    <div class="col">
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->team_ap_tnp)}}
                        </div>
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->team_cp_tnb)}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <strong class="center">NIOSH</strong>
                    </div>
                    <div class="col">
                        <div class="row">
                            All Staff Have NTSP
                        </div>
                    </div>
                    <div class="col">
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->niosh_staff_ntsp)}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <strong class="center">PERMIT</strong>
                    </div>
                    <div class="col">
                        <div class="row">
                            Special Permit
                        </div>
                        <div class="row">
                            Permit To Work (PTW)
                        </div>
                    </div>
                    <div class="col">
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->permit_special)}}
                        </div>
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->permit_work)}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <strong class="center">PICTURE</strong>
                    </div>
                    <div class="col">
                        <div class="row">
                            Picture During ToolBox Talk
                        </div>
                    </div>
                    <div class="col">
                        <div class="row border">
                            {{strtoupper($ImageShutdownlks->picture_during_toolbox)}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <img class="logo" src='/assets/web-images/main-logo.png' alt="Aerosynergy Solutions Logo">
                        <p class="center-text">AEROSYNERGY SOLUTIONS SDN BHD<br>
                            NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor</p>
                    </div>
                </div>
            </div>

            <h4 class="title center-text">ToolBox Talk Images</h4>

            <div class="img-container">
                <img src='/{{$ImageShutdownlks->toolbox_image1}}' alt="Toolbox Talk Image 1">
                <img src='/{{$ImageShutdownlks->toolbox_image2}}' alt="Toolbox Talk Image 2">
            </div>

            <div class="signature">
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
            </div>
        </div>
    </div>

    <script>
        window.onload = function () {
            //window.print();
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