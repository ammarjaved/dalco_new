<style>

.container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }
  .checklist-container {
            display: flex;
            
        }
  .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
        }

 table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
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



</style>


<div class="header">
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
            1st Floor No 72, Jalan SS 21/1, Damansara Utama, 47400 Petaling Jaya, Selangor</p>
        @else
            <img src='/assets/web-images/defaultlogo.png' alt="Default Logo">
            <p>Default Company Name<br>
            Default Address</p>
        @endif
    </div>
</div>



<div class="container my-5" >
    <h2>Pre-Shutdown</h2>
    <table class="table table-bordered" style="margin-left:-15px">
        <thead>
            <tr>
                <th>Item</th>
                <th>Yes</th>
                <th>No</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Remote Control Box</strong></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>RCB Telah Dipasang & Semua Kabel Telah Dibuat Tamatann</td>
                <td><input type="checkbox" {{ $PreShutdown->rcb_telah == 'yes' ? 'checked' : '' }} disabled></td>
                <td><input type="checkbox" {{ $PreShutdown->rcb_telah == 'no' ? 'checked' : '' }} disabled></td>
            </tr>
            <tr>
                <td>Setiap Set Kabel Telah Dilabelkan Degan Betul</td>
                <td><input type="checkbox" {{ $PreShutdown->rcb_setiap == 'yes' ? 'checked' : '' }} disabled></td>
                <td><input type="checkbox" {{ $PreShutdown->rcb_setiap == 'no' ? 'checked' : '' }} disabled></td>
            </tr>
            <tr>
                <td>Modifikasi dalam RCB Telah Dibuat</td>
                <td><input type="checkbox" {{ $PreShutdown->rcb_modifikasi == 'yes' ? 'checked' : '' }} disabled></td>
                <td><input type="checkbox" {{ $PreShutdown->rcb_modifikasi == 'no' ? 'checked' : '' }} disabled></td>
            </tr>
            <tr>
                <td>Ujian Keterusan Litar Untuk Setiap Kabel Telah Dibuat</td>
                <td><input type="checkbox" {{ $PreShutdown->rcb_ujian == 'yes' ? 'checked' : '' }} disabled></td>
                <td><input type="checkbox" {{ $PreShutdown->rcb_ujian == 'no' ? 'checked' : '' }} disabled></td>
            </tr>
            <tr>
                <td>Pemasangan Kemas dan Teratur</td>
                <td><input type="checkbox" {{ $PreShutdown->rcb_pemasangan == 'yes' ? 'checked' : '' }} disabled></td>
                <td><input type="checkbox" {{ $PreShutdown->rcb_pemasangan == 'no' ? 'checked' : '' }} disabled></td>
            </tr>
            
            <tr>
                <td><strong>Remote Terminal Unit</strong></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>RCB Telah Dipasang & Semua Kabel Telah Dibuat Tamatann</td>
                <td><input type="checkbox" {{ $PreShutdown->rtu_rcb == 'yes' ? 'checked' : '' }} disabled></td>
                <td><input type="checkbox" {{ $PreShutdown->rtu_rcb == 'no' ? 'checked' : '' }} disabled></td>
            </tr>
            <tr>
                <td>Setiap Set Kabel Telah Dilabelkan Degan Betul</td>
                <td><input type="checkbox" {{ $PreShutdown->rtu_setiap == 'yes' ? 'checked' : '' }} disabled></td>
                <td><input type="checkbox" {{ $PreShutdown->rtu_setiap == 'no' ? 'checked' : '' }} disabled></td>
            </tr>
            <tr>
                <td>Ujian Keterusan Litar Untuk Setiap Kabel Telah Dibuat</td>
                <td><input type="checkbox" {{ $PreShutdown->rtu_ujian == 'yes' ? 'checked' : '' }} disabled></td>
                <td><input type="checkbox" {{ $PreShutdown->rtu_ujian == 'no' ? 'checked' : '' }} disabled></td>
            </tr>
            <tr>
                <td>Pemasangan Kemas dan Teratur</td>
                <td><input type="checkbox" {{ $PreShutdown->rtu_pemasangan == 'yes' ? 'checked' : '' }} disabled></td>
                <td><input type="checkbox" {{ $PreShutdown->rtu_pemasangan == 'no' ? 'checked' : '' }} disabled></td>
            </tr>
            
            <tr>
                <td><strong>Cable Section</strong></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Laluan Kabel Dan Tray Yang Tersusun</td>
                <td><input type="checkbox" {{ $PreShutdown->cable_laluan == 'yes' ? 'checked' : '' }} disabled></td>
                <td><input type="checkbox" {{ $PreShutdown->cable_laluan == 'no' ? 'checked' : '' }} disabled></td>
            </tr>
            <tr>
                <td>Kabel Yang Dipasang Mengikut Spesifikasi TNB</td>
                <td><input type="checkbox" {{ $PreShutdown->cable_kabel == 'yes' ? 'checked' : '' }} disabled></td>
                <td><input type="checkbox" {{ $PreShutdown->cable_kabel == 'no' ? 'checked' : '' }} disabled></td>
            </tr>
            <tr>
                <td>Pemasangan Kemas Dan Teratur</td>
                <td><input type="checkbox" {{ $PreShutdown->cable_pemasangan == 'yes' ? 'checked' : '' }} disabled></td>
                <td><input type="checkbox" {{ $PreShutdown->cable_pemasangan == 'no' ? 'checked' : '' }} disabled></td>
            </tr>
            <tr>
                <td>Kawasan Kerja Telah Dibersihkan</td>
                <td><input type="checkbox" {{ $PreShutdown->cable_kawasan == 'yes' ? 'checked' : '' }} disabled></td>
                <td><input type="checkbox" {{ $PreShutdown->cable_kawasan == 'no' ? 'checked' : '' }} disabled></td>
            </tr>
        </tbody>
    </table>
</div>

