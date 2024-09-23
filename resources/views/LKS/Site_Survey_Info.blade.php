<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenaga Nasional Berhad - Electrical Installation Form</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        th, td { border: 1px solid black; padding: 5px; }
        .logo { max-width: 200px; }
        .checkbox-group { display: flex; justify-content: space-between; }
        .multi-column { display: grid; grid-template-columns: repeat(4, 1fr); gap: 5px; }
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body> 

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
   

    <h2>SENARAI SEMAK LAWATAN TAPAK PROJEK SCADA DA</h2>
    <table>
        <tr>
            <td>Nama Pencawang:</td>
            <td>{{ $survey->nama_pe }}</td>
        </tr>
        <tr>
            <td>Kawasan / Negeri:</td>
            <td>{{ $survey->kawasan }}</td>
        </tr>
        <tr>
            <td>No. Functional Location (FL):</td>
            <td>{{ $survey->fl }}</td>
        </tr>
        <tr>
            <td>Jenis Pencawang:</td>
            <td class="input">{{ $survey->jenis }}</td>
        
        </tr>
        <tr>
            <td>Peparit (Trench) Berpasir ?:</td>
            <td class="checkbox-group">
            @if($survey->peparit=='yes')    
                <label><input type="checkbox" checked> Ya</label>
                <label><input type="checkbox"> Tidak</label>
            
            @else
                <label><input type="checkbox" > Ya</label>
                <label><input type="checkbox" checked> Tidak</label> 
            
            @endif    
            </td>
        </tr>
        <tr>
            <td>Jenis Kompoun Pencawang:</td>
            <td class="checkbox-group">
                <label><input type="checkbox"  {{ strtolower($survey->jenis_kompaun) == 'simen' ? 'checked' : '' }}> Simen</label>
                <label><input type="checkbox" {{ strtolower($survey->jenis_kompaun) == 'rumput' ? 'checked' : '' }}> Rumput</label>
                <label><input type="checkbox" {{ strtolower($survey->jenis_kompaun) == 'inter-locking' ? 'checked' : '' }}"> Inter-locking</label>
                <label><input type="checkbox" {{ strtolower($survey->jenis_kompaun) == 'crusher run' ? 'checked' : '' }}> Crusher Run</label>
                <label><input type="checkbox" {{ strtolower($survey->jenis_kompaun) == 'tidak' ? 'checked' : '' }}> Tiada</label>
            </td>
        </tr>
        <tr>
            <td>Jenis Perkakasus:</td>
            <td class="checkbox-group">
                <label><input type="checkbox" {{ $survey->jenis_perkakasuis == 'VCB' ? 'checked' : '' }}> VCB</label>
                <label><input type="checkbox" {{ $survey->jenis_perkakasuis == 'RMU' ? 'checked' : '' }}> RMU</label>
                <label><input type="checkbox" {{ $survey->jenis_perkakasuis == 'CSU' ? 'checked' : '' }}> CSU</label>
            </td>
        </tr>
        <tr>

        <td>Konfigurasi:</td>
        <td>{{ $survey->konfigurasi}}</td>
        </tr>

        <tr>
            <td>Jenama Alatsuis:</td>
            <td>{{ $survey->jenama_alatsuis }}</td>
        </tr>
        <tr>
            <td>Jenis Model:</td>
            <td>{{ $survey->jenis_model }}</td>
        </tr>
        <tr>
            <td>Tahun Pembuatan:</td>
            <td>{{ $survey->tahun_pembinaan }}</td>
        </tr>
        <tr>
            <td>No Siri Alatsuis:</td>
            <td>{{ $survey->siri_alatsuis }}</td>
        </tr>
        <tr>
            <td>No Suis:</td>
            <td>
                <table>
                    <tr>
                    <td >{{ $survey->suis_no1 }}</td>
                    <td >{{ $survey->suis_no2 }}</td>
                    <td >{{ $survey->suis_no3 }}</td>
                    <td >{{ $survey->suis_no4 }}</td>
                    </tr>
                    <tr>
                        <td>{{$survey->suis_label1}}</td>
                        <td>{{$survey->suis_label2}}</td>
                        <td>{{$survey->suis_label3}}</td>
                        <td>{{$survey->suis_label4}}</td>
                    </tr>
                    <tr>
                        <td>{{$survey->kabel_jenis1}}</td>
                        <td>{{$survey->kabel_jenis2}}</td>
                        <td>{{$survey->kabel_jenis3}}</td>
                        <td>{{$survey->kabel_jenis4}}</td>
                    </tr>
                    <tr>
                        <td>{{$survey->kabel_saiz1}}</td>
                        <td>{{$survey->kabel_saiz2}}</td>
                        <td>{{$survey->kabel_saiz3}}</td>
                        <td>{{$survey->kabel_saiz4}}</td>
                    </tr>
                </table>
            </td>
        </tr>
       
        <tr>
            <td>Saiz Fius:</td>
            <td>{{ $survey->fius_saiz }}</td>
        </tr>
        <tr>
            <td>EFI SCADA Ready Status:</td>
            <td>{{ $survey->scada_status }}</td>
        </tr>
        <tr>
            <td>Punca Bekalan LV:</td>
            <td>{{ $survey->bekalan_lv }}</td>
        </tr>
        <tr>
            <td>Jumlah bacaan beban:</td>
            <td>{{ $survey->bacaan_beban }}</td>
        </tr>
        <tr>
            <td>Jenis F/Pillar/VDB:</td>
            <td>{{ $survey->jenis_lvdb }}</td>
        </tr>
        <tr>
            <td>Keperluan Khas Kerja-:</td>
            <td>{{ $survey->keperluan_khas_kerja }}</td>
        </tr>
    </table>
    </div>
    </div>

</body>
</html>