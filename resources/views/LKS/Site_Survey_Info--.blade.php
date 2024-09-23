



<style>

.header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 50px;
    align-items: center; /* Add this line to vertically center the logos */
}

.logo {
    width: 45%;
    display: inline-block; /* Add this line to make the logos display inline */
    vertical-align: middle; /* Add this line to vertically center the logos */
}

.logo img {
    max-width: 80%; /* Reduce the image size to 80% of the parent container */
    height: auto;
    margin-bottom: 10px;
}
    .header .logo p {
        margin: 0;
        font-size: 14px;
        line-height: 1.4;
    }
    .form-table {
  border-collapse: collapse;
  width: 100%;
}

.form-table tr {
  border-bottom: 1px solid #ddd;
}

.form-table tr:nth-child(even) {
  background-color: #f9f9f9;
}

.form-table td {
  padding: 10px;
  text-align: left;
}

.form-table td.label {
  font-weight: bold;
  width: 30%;
}

.form-table td.input {
  width: 70%;
}



.checkboxs {
  display: inline-block;
  width: 30px; /* Increase width to fit the larger tick mark */
  height: 30px; /* Increase height to fit the larger tick mark */
  margin-right: 5px;
  border: 2px solid #dcdcdc;
  border-radius: 4px;
  position: relative;
  vertical-align: middle;
  text-align: center;
  line-height: 30px; /* Center the tick mark vertically */
}

.checkboxs::after {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 29px; /* Increase font size of the tick mark */
  color: transparent; /* Hide the tick mark initially */
}

.checkeds::after {
  content: '\2713'; /* Unicode for checkmark */
  color: green;
}

.input {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}



</style>



 <div class="form-container">
    
 <div class="header" >
        <div class="logo">
            <img src='/assets/web-images/tnblogo.png' alt="TNB Logo">

            <p>TNB ENERGY SERVICES SDN BHD (234667-M)<br>
            Level 2, Jalan Air Hitam, Kawasan 16,<br>
            40000 Shah Alam, Selangor</p>
        </div>
          <div class="logo">
            @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
                <img src='/assets/web-images/main-logo.png' alt="Aerosynergy Solutions Logo">
                <p>AEROSYNERGY SOLUTIONS SDN BHD<br>
               NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor</p>
            @elseif($projectName === 'ARAS-JOHOR')
                <img src='/assets/web-images/araslogo.png' alt="ARAS Kejuruteraan Logo">
                <p>ARAS KEJURUTERAAN SDN BHD<br>
                1st Floor No 72, Jalan SS 21/1, Damansara<br>
                Utama, 47400 Petaling Jaya, Selangor</p>
            @else
                <!-- Default logo or empty state -->
                <img src='/assets/web-images/defaultlogo.png' alt="Default Logo">
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
                <span class="checkboxs {{ $survey->jenis_perkakasuis == 'CSU' ? 'checkeds' : '' }}"></span> CSU
            </td>
        </tr>
        
        
        
        <tr>
            <td class="label">Konfigurasi</td>
            <td class="input">{{ $survey->konfigurasi}}</td>
        </tr>

        <tr>
            <td class="label">Konfigurasi Other</td>
            <td class="input">{{ $survey->konfigurasi_other}}</td>
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
            <td class="label">Jenis fius</td>
            <td class="input">{{ $survey->jenis_fius }}</td>
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

