<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRE-SHUTDOWN FORM (PIW)_ {{$survey->nama_pe}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 2;
            margin: 0;
            padding: 15px;
            font-size: 16px;
            position: relative;
            min-height: 100vh;
        }
        .content-wrapper {
            flex: 1;
        }
        .header-table {
            width: 100%;
            border: 2px solid black;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .header-table td {
            border: 1px solid black;
            padding: 8px;
            vertical-align: top;
        }
        .logo {
            height: 50px;
            width: auto;
            float: left;
            margin-right: 8px;
        }
        .company-text {
            font-size: 9px;
            line-height: 1.2;
            font-weight: bold;
        }
        h1 {
            text-align: center;
            font-size: 18px;
            margin: 15px 0;
            font-weight: bold;
        }
        .form-info {
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
        }
        .form-info div {
            font-size: 14px;
        }
        .main-container {
            width: 100%;
        }
        .left-section {
            flex: 1;
        }
        .right-section {
            flex: 1;
        }
        .section-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 18px;
        }
        .section-table th {
            background-color: #f0f0f0;
            border: none;
            padding: 12px;
            text-align: left;
            font-weight: bold;
            font-size: 18px;
        }
        .section-table td {
            border: none;
            padding: 10px 12px;
            vertical-align: middle;
            font-size: 16px;
        }
        .checkbox-container {
            text-align: right;
            white-space: nowrap;
            width: 120px;
        }
        .checkbox-item {
            display: inline-block;
            margin: 0 8px;
            font-size: 16px;
        }
        .checkbox {
            width: 16px;
            height: 16px;
            border: 1px solid black;
            display: inline-block;
            margin-right: 5px;
            vertical-align: middle;
            text-align: center;
            line-height: 14px;
            font-size: 12px;
        }
        .checked {
            background-color: white;
        }
        .checked::after {
            content: "✗";
            color: black;
            font-weight: bold;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin: 40px 0 20px 0;
            gap: 40px;
        }
        .signature-box {
            flex: 1;
            text-align: center;
        }
        .signature-box p {
            margin: 5px 0;
            font-size: 14px;
        }
        .signature-line {
            border-bottom: 1px solid black;
            height: 60px;
            margin: 20px 0 10px 0;
            width: 100%;
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
    <div class="content-wrapper">
        <!-- Header with logos -->
        <table class="header-table">
            <tr>
                <td style="width: 50%;">
                    <img class="logo" src='/assets/web-images/tnblogo.png' alt="TNB Logo">
                    <div class="company-text">
                        TNB Energy Services Sdn Bhd<br>
                        Tingkat 15, TNB Dua Sentral,<br>
                        Jalan Tun Sambanthan, Brickfields,<br>
                        50470 Kuala Lumpur
                    </div>
                </td>
                <td style="width: 50%;">
                    @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
                    <img class="logo" src='/assets/web-images/main-logo.png' alt="Aerosynergy Solutions Logo">
                    <div class="company-text">
                        AEROSYNERGY SOLUTIONS SDN BHD<br>
                        No. 2, Jalan Tun Razak, Presint 2,<br>
                        62100 Putrajaya Wilayah Persekutuan<br>
                        Putrajaya
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
                </td>
            </tr>
        </table>

        <h1>LKS PRE – SHUTDOWN FORM<br>(PIW)</h1>
        
        <div class="form-info">
            <div>
                <strong>Substation Name :</strong> {{$survey->nama_pe}}<br>
                <strong>State :</strong> JOHOR
            </div>
            <div>
                <strong>Date :</strong> {{ date('d/m/Y') }}
            </div>
        </div>
        <div class="main-container">
            <!-- Left Section -->
            <div class="left-section">
                <!-- Remote Control Box -->
                <table class="section-table">
                    <tr>
                        <th colspan="2">Remote Control Box</th>
                    </tr>
                    <tr>
                        <td>RCB Telah Dipasang & Semua Kabel Telah Dibuat Tamatkan :</td>
                        <td class="checkbox-container">
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rcb_telah == 'yes' ? 'checked' : '' }}"></span>Yes
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rcb_telah == 'no' ? 'checked' : '' }}"></span>No
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Setiap Set Kabel Telah Dilabelkan dengan Betul :</td>
                        <td class="checkbox-container">
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rcb_setiap == 'yes' ? 'checked' : '' }}"></span>Yes
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rcb_setiap == 'no' ? 'checked' : '' }}"></span>No
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Modifikasi di dalam RCB Telah Dibuat :</td>
                        <td class="checkbox-container">
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rcb_modifikasi == 'yes' ? 'checked' : '' }}"></span>Yes
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rcb_modifikasi == 'no' ? 'checked' : '' }}"></span>No
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ujian Keterusan Litar untuk Setiap Kabel Telah Dibuat :</td>
                        <td class="checkbox-container">
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rcb_ujian == 'yes' ? 'checked' : '' }}"></span>Yes
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rcb_ujian == 'no' ? 'checked' : '' }}"></span>No
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Pemasangan Kemas dan Teratur :</td>
                        <td class="checkbox-container">
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rcb_pemasangan == 'yes' ? 'checked' : '' }}"></span>Yes
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rcb_pemasangan == 'no' ? 'checked' : '' }}"></span>No
                            </div>
                        </td>
                    </tr>
                </table>

                <!-- Remote Terminal Unit -->
                <table class="section-table">
                    <tr>
                        <th colspan="2">Remote Terminal Unit</th>
                    </tr>
                    <tr>
                        <td>RCB Telah Dipasang & Semua Kabel Telah Dibuat Tamatkan :</td>
                        <td class="checkbox-container">
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rtu_rcb == 'yes' ? 'checked' : '' }}"></span>Yes
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rtu_rcb == 'no' ? 'checked' : '' }}"></span>No
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Setiap Set Kabel Telah Dilabelkan dengan Betul :</td>
                        <td class="checkbox-container">
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rtu_setiap == 'yes' ? 'checked' : '' }}"></span>Yes
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rtu_setiap == 'no' ? 'checked' : '' }}"></span>No
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ujian Keterusan Litar untuk Setiap Kabel Telah Dibuat :</td>
                        <td class="checkbox-container">
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rtu_ujian == 'yes' ? 'checked' : '' }}"></span>Yes
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rtu_ujian == 'no' ? 'checked' : '' }}"></span>No
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Pemasangan Kemas dan Teratur :</td>
                        <td class="checkbox-container">
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rtu_pemasangan == 'yes' ? 'checked' : '' }}"></span>Yes
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->rtu_pemasangan == 'no' ? 'checked' : '' }}"></span>No
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Right Section -->
            <div class="right-section">
                <!-- Cable -->
                <table class="section-table">
                    <tr>
                        <th colspan="2">Cable</th>
                    </tr>
                    <tr>
                        <td>Laluan Kabel dan Tray yang Tersusun :</td>
                        <td class="checkbox-container">
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->cable_laluan == 'yes' ? 'checked' : '' }}"></span>Yes
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->cable_laluan == 'no' ? 'checked' : '' }}"></span>No
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Kabel yang Dipasang Mengikut Spesifikasi TNB :</td>
                        <td class="checkbox-container">
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->cable_kabel == 'yes' ? 'checked' : '' }}"></span>Yes
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->cable_kabel == 'no' ? 'checked' : '' }}"></span>No
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Pemasangan Kemas dan Teratur :</td>
                        <td class="checkbox-container">
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->cable_pemasangan == 'yes' ? 'checked' : '' }}"></span>Yes
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->cable_pemasangan == 'no' ? 'checked' : '' }}"></span>No
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Kawasan Kerja Telah Dibersihkan :</td>
                        <td class="checkbox-container">
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->cable_kawasan == 'yes' ? 'checked' : '' }}"></span>Yes
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox {{ $PreShutdown->cable_kawasan == 'no' ? 'checked' : '' }}"></span>No
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Signature Section -->
        <div style="margin-top: 50px;">
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
    </div>

    <!-- Footer -->
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
