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
            line-height: 2;
            margin: 0;
            padding: 10px;
            font-size: 14px;
        }
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .header-table td {
            border: 2px solid black;
            padding: 8px;
            vertical-align: middle;
        }
        .header-content {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .logo {
            height: 50px;
            width: auto;
            flex-shrink: 0;
        }
        .company-text {
            font-size: 12px;
            line-height: 2;
            font-weight: bold;
        }
        h1 {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin: 15px 0;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .info-table td, .info-table th {
            border: 1px solid black;
            padding: 4px 8px;
            font-size: 14px;
        }
        .info-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .checklist-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .checklist-table th, .checklist-table td {
            border: 1px solid black;
            padding: 4px 8px;
            font-size: 14px;
            text-align: left;
        }
        .checklist-table th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        .status-cell {
            text-align: left;
            width: 80px;
            padding: 4px;
        }
        .checkbox-row {
            display: block;
            line-height: 2;
        }
        .checkbox-item {
            display: block;
            margin-bottom: 2px;
            font-size: 14px;
        }
        .checkbox {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 1px solid black;
            margin-right: 4px;
            text-align: center;
            line-height: 10px;
            font-size: 14px;
            vertical-align: middle;
        }
        .checkbox.checked {
            background-color: white;
        }
        .checkbox.checked::before {
            content: '✗';
            color: black;
            font-weight: bold;
        }
        .signature-section {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
        }
        .signature-box {
            width: 45%;
            text-align: left;
        }
        .signature-label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .signature-line {
            border-bottom: 1px solid black;
            height: 40px;
            margin-bottom: 5px;
        }
        .signature-text {
            font-size: 14px;
        }
        .footer-table {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 8px;
        }
        .footer-table td {
            border: 1px solid black;
            padding: 2px 4px;
            text-align: center;
        }
        @media print {
            body {
                margin: 0;
                padding: 15px;
                padding-bottom: 50px;
            }
            .footer-table {
                position: absolute;
                bottom: 15px;
                left: 15px;
                right: 15px;
                width: calc(100% - 30px);
                page-break-inside: avoid;
            }
            @page {
                margin: 0.5in;
            }
        }
    </style>
</head>
<body>
    <!-- Header with logos -->
    <table class="header-table">
        <tr>
            <td style="width: 50%;">
                <div class="header-content">
                    <img class="logo" src='/assets/web-images/tnblogo.png' alt="TNB Logo">
                    <div class="company-text">
                        TNB ENERGY SERVICES SDN BHD (234667-M)<br>
                        Level 2, Jalan Air Hitam, Kawasan 16,<br>
                        40000 Shah Alam, Selangor
                    </div>
                </div>
            </td>
            <td style="width: 50%;">
                <div class="header-content">
                    @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
                    <img class="logo" src='/assets/web-images/main-logo.png' alt="Aerosynergy Solutions Logo">
                    <div class="company-text">
                        AEROSYNERGY SOLUTIONS SDN BHD<br>
                        NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor
                    </div>
                    @elseif($projectName === 'ARAS-JOHOR')
                    <img class="logo" src='/assets/web-images/araslogo.png' alt="ARAS Kejuruteraan Logo">
                    <div class="company-text">
                        ARAS KEJURUTERAAN SDN BHD<br>
                        1st Floor No 72, Jalan SS 21/1, Damansara Utama, 47400 Petaling Jaya, Selangor
                    </div>
                    @else
                    <img class="logo" src='/assets/web-images/defaultlogo.png' alt="Default Logo">
                    <div class="company-text">
                        Default Company Name<br>
                        Default Address
                    </div>
                    @endif
                </div>
            </td>
        </tr>
    </table>

    <h1>PIW CHECKLIST</h1>

    <!-- Info table -->
    <table class="info-table">
        <tr>
            <th>Kontraktor PIW</th>
            <td>{{ strtoupper($Piw->kontraktor_piw) }}</td>
            <th>Lokasi</th>
            <td>{{ strtoupper($survey->nama_pe) }}</td>
        </tr>
        <tr>
            <th>Kontraktor RTU</th>
            <td>{{ strtoupper($Piw->kontraktor_rtu) }}</td>
            <th>Tarikh</th>
            <td>{{ $Piw->tarikh }}</td>
        </tr>
    </table>

    <!-- Checklist table -->
    <table class="checklist-table">
        <tr>
            <th style="width: 30px;">No.</th>
            <th>Item</th>
            <th style="width: 80px;">Status</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Lokasi EFI Setelah Dipasang</td>
            <td class="status-cell">
                <div class="checkbox-row">
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->lokasi_efi == 'yes' ? 'checked' : '' }}"></span>Yes
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->lokasi_efi == 'no' ? 'checked' : '' }}"></span>No
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Lokasi RCB Setelah Dipasang</td>
            <td class="status-cell">
                <div class="checkbox-row">
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->lokasi_rcb == 'yes' ? 'checked' : '' }}"></span>Yes
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->lokasi_rcb == 'no' ? 'checked' : '' }}"></span>No
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Connection RCB</td>
            <td class="status-cell">
                <div class="checkbox-row">
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->connection_rcb == 'yes' ? 'checked' : '' }}"></span>Yes
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->connection_rcb == 'no' ? 'checked' : '' }}"></span>No
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Lokasi Battery Charger Setelah Dipasang</td>
            <td class="status-cell">
                <div class="checkbox-row">
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->lokasi_battary == 'yes' ? 'checked' : '' }}"></span>Yes
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->lokasi_battary == 'no' ? 'checked' : '' }}"></span>No
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Plate Battery Charger / Serial No</td>
            <td class="status-cell">
                <div class="checkbox-row">
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->plate_battary == 'yes' ? 'checked' : '' }}"></span>Yes
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->plate_battary == 'no' ? 'checked' : '' }}"></span>No
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Lokasi RTU Setelah Dipasang</td>
            <td class="status-cell">
                <div class="checkbox-row">
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->lokasi_rtu == 'yes' ? 'checked' : '' }}"></span>Yes
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->lokasi_rtu == 'no' ? 'checked' : '' }}"></span>No
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>7</td>
            <td>Connection RTU</td>
            <td class="status-cell">
                <div class="checkbox-row">
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->connection_rtu == 'yes' ? 'checked' : '' }}"></span>Yes
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->connection_rtu == 'no' ? 'checked' : '' }}"></span>No
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>8</td>
            <td>Plate RTU / Serial No</td>
            <td class="status-cell">
                <div class="checkbox-row">
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->plate_rtu == 'yes' ? 'checked' : '' }}"></span>Yes
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->plate_rtu == 'no' ? 'checked' : '' }}"></span>No
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>9</td>
            <td>Laluan Cable (PIW)</td>
            <td class="status-cell">
                <div class="checkbox-row">
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->laluan_cable_piw == 'yes' ? 'checked' : '' }}"></span>Yes
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->laluan_cable_piw == 'no' ? 'checked' : '' }}"></span>No
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>10</td>
            <td>Laluan Cable</td>
            <td class="status-cell">
                <div class="checkbox-row">
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->laluan_cable == 'yes' ? 'checked' : '' }}"></span>Yes
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox {{ $Piw->laluan_cable == 'no' ? 'checked' : '' }}"></span>No
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <!-- Signature section -->
    <div style="margin-top: 30px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 50%; vertical-align: top; padding-right: 20px;">
                    <div style="font-size: 16px; font-weight: bold; margin-bottom: 20px;">Disediakan Oleh:</div>
                    <div style=" height: 20px;width:200px;">.....................................................</div>
                    <div style="font-size: 14px;">
                        Nama : ..............................<br>
                        Jawatan : PENYELIA TAPAK
                    </div>
                </td>
                <td style="width: 50%; vertical-align: top; padding-left: 20px;">
                    <div style="font-size: 16px; font-weight: bold; margin-bottom: 20px;">Disemak Oleh :</div>
                    <div style=" height: 20px;width:200px;">.......................................................</div>
                    <div style="font-size: 14px;">
                        Nama : ................................<br>
                        Jawatan : ................................
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <table class="footer-table">
        <tr>
            <td style="width: 25%;">PRE-CABLING FORM TNB 110/2023</td>
            <td style="width: 25%;">Part No.: AERO-CFSSOUTPUT/GEN/001</td>
            <td style="width: 25%;">Rev. No.: 001</td>
            <td style="width: 25%;">Rel Date:</td>
        </tr>
    </table>
</body>
</html>

<script>
    window.onload = function () {
        window.print();
    };
</script>
