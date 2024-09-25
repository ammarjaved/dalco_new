<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LKS PRE-SHUTDOWN FORM (PIW)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
        .no-border {
            border: none;
        }
        .checkbox {
            width: 15px;
            height: 15px;
            border: 1px solid black;
            display: inline-block;
            margin-right: 5px;
        }
        .checked {
            background-color: black;
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
    


    <h1>LKS PRE-SHUTDOWN FORM (PIW)</h1>
    <div class="container-fluid" style="padding-top:40px;">
        <p><strong>NAMA PE:&emsp;&emsp;</strong> {{$survey->nama_pe}}</p>
       
    </div>
    <table>
        <tr>
            <th colspan="3">Remote Control Box</th>
        </tr>
        <tr>
            <td>RCB Telah Dipasang & Semua Kabel Telah Dibuat</td>
            <td>
                <div class="checklist-item">
                    <span class="">{{ $PreShutdown->rcb_telah == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="">{{ $PreShutdown->rcb_telah == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>Setiap Set Kabel Telah Dilabelkan dengan Betul</td>
            <td>
                <div class="checklist-item">
                    <span class="">{{ $PreShutdown->rcb_setiap == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="">{{ $PreShutdown->rcb_setiap == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>Modifikasi di dalam RCB Telah Dibuat</td>
            <td>
                <div class="checklist-item">
                    <span class="">{{ $PreShutdown->rcb_modifikasi == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="">{{ $PreShutdown->rcb_modifikasi == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>Ujian Keterusan Litar untuk Setiap Kabel Telah Dibuat</td>
            <td>
                <div class="checklist-item">
                    <span class="">{{ $PreShutdown->rcb_ujian == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="">{{ $PreShutdown->rcb_ujian == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>Pemasangan Kemas dan Teratur</td>
            <td>
                <div class="checklist-item">
                    <span class="">{{ $PreShutdown->rcb_pemasangan == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="">{{ $PreShutdown->rcb_pemasangan == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
    </table>
    
    <table>
        <tr>
            <th colspan="3">Remote Terminal Unit</th>
        </tr>
        <tr>
            <td>RCB Telah Dipasang & Semua Kabel Telah Dibuat</td>
            <td>
                <div class="checklist-item">
                    <span class="">{{ $PreShutdown->rtu_rcb == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="">{{ $PreShutdown->rtu_rcb == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>Setiap Set Kabel Telah Dilabelkan dengan Betul</td>
            <td>
                <div class="checklist-item">
                    <span class="">{{ $PreShutdown->rtu_setiap == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="">{{ $PreShutdown->rtu_setiap == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>Ujian Keterusan Litar untuk Setiap Kabel Telah Dibuat</td>
            <td>
                <div class="checklist-item">
                    <span class="">{{ $PreShutdown->rtu_ujian == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="">{{ $PreShutdown->rtu_ujian == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>Pemasangan Kemas dan Teratur</td>
            <td>
                <div class="checklist-item">
                    <span class="">{{ $PreShutdown->rtu_pemasangan == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="">{{ $PreShutdown->rtu_pemasangan == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
    </table>
    
    <table>
        <tr>
            <th colspan="3">Cable</th>
        </tr>
        <tr>
            <td>Laluan Kabel dan Tray yang Tersusun</td>
            <td>
                <div class="checklist-item">
                    <span class="">{{ $PreShutdown->cable_laluan == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="">{{ $PreShutdown->cable_laluan == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>Kabel yang Dipasang Mengikut Spesifikasi TNB</td>
            <td>
                <div class="checklist-item">
                    <span class="">{{ $PreShutdown->cable_kabel == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="">{{ $PreShutdown->cable_kabel == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>Pemasangan Kemas dan Teratur</td>
            <td>
                <div class="checklist-item">
                    <span class="">{{ $PreShutdown->cable_pemasangan == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="">{{ $PreShutdown->cable_pemasangan == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
        <tr>
            <td>Kawasan Kerja Telah Dibersihkan</td>
            <td>
                <div class="checklist-item">
                    <span class="">{{ $PreShutdown->cable_kawasan == 'yes' ? '☑' : '☐' }}</span> Yes
                    <span class="">{{ $PreShutdown->cable_kawasan == 'no' ? '☑' : '☐' }}</span> No
                </div>
            </td>
        </tr>
    </table>
    
    

    <div class="signature-section">
        <div class="signature">
            <p>Disediakan Oleh:</p>
            
            <p>Nama : AHMAD KHALIL QUSYAIRI</p>
            <p>Jawatan : PENYELIA TAPAK</p>
        </div>
        <div class="signature">
            <p>Disemak Oleh :</p>
            
            <p>Nama : ...........................</p>
            <p>Jawatan : </p>
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