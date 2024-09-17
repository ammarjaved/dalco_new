
@extends('layouts.app')
@section('content')


<style>

.form-container {
        background-color: #f9f9f9;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }
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
        header img {
            max-height: 100px;
        }
        .logo {
            border: 1px solid black;
            padding: 10px;
            font-size: 12px;
            width: 45%;
        }
        .logo img {
            width: 100px;
        }
        ol {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            display: flex;
            align-items: center;
            margin-bottom: 15px; 
            font-size: 14px; 
        }

        li label {
            margin-right: 20px; 
            margin-left: 10px; 
        }
        .checkboxs {
    display: inline-block;
    width: 12px;
    height: 12px;
    margin-right: 5px;
    border: 1px solid #000;
}

.checkeds {
    background-color: #000;
}

.footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

    

</style>

















<div class="form-container">
    <div class="header" style="padding-top: 150px">
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
               NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor</p>
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

    
    <h1 style="margin-left: -150px">SENARAI SEMAK LAWATAN TAPAK PROJEK SCADA DA</h1>

    <table class="form-table">
        <tr>
            <td class="label">Nama Pencawang</td>
            <td class="input">{{ $survey->nama_pe }}</td>
        </tr>
        <tr>
            <td class="label">Kawasan / Negeri</td>
            <td class="input">{{ $survey->kawasan }}</td>
        </tr>
        <tr>
            <td class="label">No. Functional Location (FL)</td>
            <td class="input">{{ $survey->fl }}</td>
        </tr>
        <tr>
            <td class="label">PE Jenis</td>
            
                <td class="input">{{ $survey->jenis }}</td>
            </td>
        </tr>
        <tr>
            <td class="label">Pepatit (Trench) Berpagar?</td>
            <td class="input">{{  $survey->peparit }}</td>
            </td>
        </tr>
        <tr>
            <td class="label">Jenis Kompaun</td>
<td class="input">
<span class="checkboxs {{ strtolower($survey->jenis_kompaun) == 'simen' ? 'checkeds' : '' }}"></span> Simen
<span class="checkboxs {{ strtolower($survey->jenis_kompaun) == 'rumput' ? 'checkeds' : '' }}"></span> Rumput
<span class="checkboxs {{ strtolower($survey->jenis_kompaun) == 'inter-locking' ? 'checkeds' : '' }}"></span> Inter-locking
<span class="checkboxs {{ strtolower($survey->jenis_kompaun) == 'crusher run' ? 'checkeds' : '' }}"></span> Crusher Run
<span class="checkboxs {{ strtolower($survey->jenis_kompaun) == 'tidak' ? 'checkeds' : '' }}"></span> Tidak
</td>

        </tr>
        <tr>
            <td class="label">Jenis Perkakasuis</td>
            <td class="input">
                <span class="checkboxs {{ $survey->jenis_perkakasuis == 'VCB' ? 'checkeds' : '' }}"></span> VCB
                <span class="checkboxs {{ $survey->jenis_perkakasuis == 'RMU' ? 'checkeds' : '' }}"></span> RMU
            </td>
        </tr>
        <tr>
            <td class="label">Konfigurasi</td>
            <td class="input">{{ $survey->konfigurasi}}</td>
        </tr>
        
        <tr>
            <td class="label">Jenama Alatsuis</td>
            <td class="input">{{ $survey->jenama_alatsuis }}</td>
        </tr>
        <tr>
            <td class="label">Jenis Model</td>
            <td class="input">{{ $survey->jenis_model }}</td>
        </tr>
        <tr>
            <td class="label">Tahun Pembinaan</td>
            <td class="input">{{ $survey->tahun_pembinaan }}</td>
        </tr>
        <tr>
            <td class="label">Siri Alatsuis</td>
                
            <td class="input">{{ $survey->siri_alatsuis }}</td>
              
            </td>
        </tr>
        @for ($i = 1; $i <= 5; $i++)
        <tr>
            <td class="label">Suis No {{ $i }}</td>
            <td class="input">{{ $survey->{'suis_no' . $i} }}</td>
        </tr>
        <tr>
            <td class="label">Suis Label {{ $i }}</td>
            <td class="input">{{ $survey->{'suis_label' . $i} }}</td>
        </tr>
        <tr>
            <td class="label">Kabel Jenis {{ $i }}</td>
            <td class="input">{{ $survey->{'kabel_jenis' . $i} }}</td>
            
        </tr>
        <tr>
            <td class="label">Kabel Saiz {{ $i }}</td>
            <td class="input">{{ $survey->{'kabel_saiz' . $i} }}</td>
        </tr>
    @endfor
        <!-- Repeat similar structure for Suis No 2 to 5 -->
        <tr>
            <td class="label">Fius Saiz</td>
            <td class="input">{{ $survey->fius_saiz }}</td>
        </tr>
        <tr>
            <td class="label">CT Saiz Protection</td>
            <td class="input">{{ $survey->ct_saiz_protection }}</td>
        </tr>
        <tr>
            <td class="label">CT Saiz Metering</td>
            <td class="input">{{ $survey->ct_saiz_metering }}</td>
        </tr>
        <tr>
            <td class="label">SCADA Status</td>
            <td class="input">{{ $survey->scada_status }}</td>
        </tr>
        <tr>
            <td class="label">Bekalan LV</td>
            <td class="input">{{ $survey->bekalan_lv }}</td>
        </tr>
        <tr>
            <td class="label">Bacaan Beban</td>
            <td class="input">{{ $survey->bacaan_beban }}</td>
        </tr>
        <tr>
            <td class="label">Genset</td>
            <td class="input">{{ $survey->genset }}</td>
        </tr>
        <tr>
            <td class="label">Jenis LVDB</td>
            <td class="input">{{ $survey->jenis_lvdb }}</td>
        </tr>
        <tr>
            <td class="label">Keperluan Khas Kerja</td>
            <td class="input">{{ $survey->keperluan_khas_kerja }}</td>
        </tr>
       
        
        
    </table>
    <div class="footer">
        <p>Susun atur Didalam Pencawang. Sila tandakan kedudukan Alatuis / Battery Charger / TX / RCB / RTU / EFI</p>
    </div>
</div>

@endsection