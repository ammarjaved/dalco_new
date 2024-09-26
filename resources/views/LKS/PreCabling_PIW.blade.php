<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>PIW CHECKLIST_{{$survey->nama_pe}}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .checklist-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        .checkbox {
            margin-right: 10px;
            font-size: 18px;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
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
        }
    </style>
</head>
<body>
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

    <h1>PIW CHECKLIST</h1> 
    <div class="container-fluid" style="padding-top:40px;">
        <p><strong>NAMA PE:&emsp;&emsp;</strong> {{$survey->nama_pe}}</p>
       
    </div>
    
    
    <table>
        <tr>
            <th>Kontraktor PIW</th>
            <td>{{ strtoupper($Piw->kontraktor_piw) }}</td>
            <th>Lokasi</th>
            <td>{{ $Piw->lokasi_efi }}</td>
        </tr>
        <tr>
            <th>Kontraktor RTU</th>
            <td>{{ $Piw->kontraktor_rtu }}</td>
            <th>Tarikh</th>
            <td>{{ $Piw->tarikh }}</td>
        </tr>
    </table>

    <table>
        <tr>
            <th>No.</th>
            <th>Item</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Lokasi EFI Setelah Dipasang</td>
            <td>
                <div class="checklist-item">
                    <span class="checkbox">{{ $Piw->lokasi_efi == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="checkbox">{{ $Piw->lokasi_efi == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Lokasi RCB Setelah Dipasang</td>
            <td>
                <div class="checklist-item">
                    <span class="checkbox">{{ $Piw->lokasi_rcb == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="checkbox">{{ $Piw->lokasi_rcb == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Connection RCB</td>
            <td>
                <div class="checklist-item">
                    <span class="checkbox">{{ $Piw->connection_rcb == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="checkbox">{{ $Piw->connection_rcb == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Lokasi Battery Charger Setelah Dipasang</td>
            <td>
                <div class="checklist-item">
                    <span class="checkbox">{{ $Piw->lokasi_battary == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="checkbox">{{ $Piw->lokasi_battary == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Plate Battery Charger / Serial No</td>
            <td>
                <div class="checklist-item">
                    <span class="checkbox">{{ $Piw->plate_battary == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="checkbox">{{ $Piw->plate_battary == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Lokasi RTU Setelah Dipasang</td>
            <td>
                <div class="checklist-item">
                    <span class="checkbox">{{ $Piw->lokasi_rtu == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="checkbox">{{ $Piw->lokasi_rtu == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>7</td>
            <td>Connection RTU</td>
            <td>
                <div class="checklist-item">
                    <span class="checkbox">{{ $Piw->connection_rtu == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="checkbox">{{ $Piw->connection_rtu == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>8</td>
            <td>Plate RTU / Serial No</td>
            <td>
                <div class="checklist-item">
                    <span class="checkbox">{{ $Piw->plate_rtu == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="checkbox">{{ $Piw->plate_rtu == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>9</td>
            <td>Laluan Cable (PIW)</td>
            <td>
                <div class="checklist-item">
                    <span class="checkbox">{{ $Piw->laluan_cable_piw == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="checkbox">{{ $Piw->laluan_cable_piw == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>10</td>
            <td>Laluan Cable</td>
            <td>
                <div class="checklist-item">
                    <span class="checkbox">{{ $Piw->laluan_cable == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="checkbox">{{ $Piw->laluan_cable == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
    </table>
    
    <div class="signature-section">
        <div class="signature">
            <p>PEGAWAI DI TEMPAT</p>
           
            <p>Tandatangan</p>
        </div>
        <div class="signature">
            <p>PEGAWAI TNB</p>
            
            <p>Tandatangan</p>
        </div>
    </div>
</body>
</html>


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
