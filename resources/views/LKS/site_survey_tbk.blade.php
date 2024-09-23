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
                        <img class="logo" src='/assets/web-images/main-logo.png' alt="Aerosynergy Solutions Logo">
                        <p class="center-text">AEROSYNERGY SOLUTIONS SDN BHD<br>
                            NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor</p>
                    </div>
                </div>
            </div>

            <h4 class="title center-text">TOOLBOX TALK FORM</h4>

            <div class="container-fluid">
                <table>
                    <tr>
                        <th>Lokasi</th>
                        <td>{{$toolboxtalk->lokasi}}</td>
                        <th>Tarikh</th>
                        <td>{{$toolboxtalk->tarikh}}</td>
                    </tr>
                    <tr>
                        <th>Nama Pencawang</th>
                        <td>{{$survey->nama_pe}}</td>
                        <th>CFS</th>
                        <td>{{$toolboxtalk->cfs}}</td>
                    </tr>
                    <tr>
                        <th>Skop Kerja</th>
                        <td colspan="3">SITE SURVEY</td>
                    </tr>
                </table>
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

            <h4 class="title center-text">CHECKLIST</h4>

            <div class="container-fluid">
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
                        <td>{{$toolboxtalk->ppd_safety_helment}}</td>
                    </tr>
                    <tr>
                        <td>Safety Vest</td>
                        <td>{{$toolboxtalk->ppd_safety_vest}}</td>
                    </tr>
                    <tr>
                        <td>Safety Shoes</td>
                        <td>{{$toolboxtalk->ppd_safety_shoes}}</td>
                    </tr>
                    <tr>
                        <td>Safety</td>
                        <td>{{$toolboxtalk->ppd_safety}}</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>TOOL & EQUIPMENT INSTRUMENT</strong></td>
                    </tr>
                    <tr>
                        <td>All In Good Condition</td>
                        <td>{{$toolboxtalk->equipment_condition}}</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>INSTRUMENT</strong></td>
                    </tr>
                    <tr>
                        <td>All In Good Condition</td>
                        <td>{{$toolboxtalk->instrument_condition}}</td>
                    </tr>
                    <tr>
                        <td>First Aid Kit</td>
                        <td>{{$toolboxtalk->instrument_kit_condition}}</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>VEHICLE</strong></td>
                    </tr>
                    <tr>
                        <td>Fire Extinguisher</td>
                        <td>{{$toolboxtalk->vehicle_fire_extinguisher}}</td>
                    </tr>
                    <tr>
                        <td>Vehicle In Good Condition</td>
                        <td>{{$toolboxtalk->vehicle_condition}}</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>TRAFFIC</strong></td>
                    </tr>
                    <tr>
                        <td>Safety Kon</td>
                        <td>{{$toolboxtalk->traffic_safety_kon}}</td>
                    </tr>
                    <tr>
                        <td>Sign Board</td>
                        <td>{{$toolboxtalk->traffic_sign_board}}</td>
                    </tr>
                    <tr>
                        <td>Chargeman Bo</td>
                        <td>{{$toolboxtalk->traffic_chargeman}}</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>TEAM</strong></td>
                    </tr>
                    <tr>
                        <td>AP TNP</td>
                        <td>{{$toolboxtalk->team_ap_tnp}}</td>
                    </tr>
                    <tr>
                        <td>CP TNB</td>
                        <td>{{$toolboxtalk->team_cp_tnb}}</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>NIOSH</strong></td>
                    </tr>
                    <tr>
                        <td>All Staff Have NTSP</td>
                        <td>{{$toolboxtalk->niosh_staff_ntsp}}</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>PERMIT</strong></td>
                    </tr>
                    <tr>
                        <td>Special Permit</td>
                        <td>{{$toolboxtalk->permit_special}}</td>
                    </tr>
                    <tr>
                        <td>Permit To Work (PTW)</td>
                        <td>{{$toolboxtalk->permit_work}}</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>PICTURE</strong></td>
                    </tr>
                    <tr>
                        <td>Picture During ToolBox Talk</td>
                        <td>{{$toolboxtalk->picture_during_toolbox}}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="container-fluid" style="break-after:page">
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
                <img src='/{{$toolboxtalk->toolbox_image1}}' alt="Toolbox Talk Image 1">
                <img src='/{{$toolboxtalk->toolbox_image2}}' alt="Toolbox Talk Image 2">
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