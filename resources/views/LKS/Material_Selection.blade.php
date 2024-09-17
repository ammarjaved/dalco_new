
<style>

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
        .logo img {
            width: 100px;
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
        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .signature {
            text-align: center;
        }


</style>




<div class="header" style="padding-top: 200px">
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

<div style="padding-top: 100px">
    <h1>JADUAL ANGGARAN DAN PENGGUNAAN BAHAN</h1>
    <table>
        <tr>
            <th>PROJEK PEMBINAAN:</th>
            <td colspan="3">PROJEK TAMAN DESA COPIAWALA - PKT MUTIARA IMAN NO.5</td>
        </tr>
        <tr>
            <th>TAJUK KERJA:</th>
            <td colspan="3">TAMAN DESA COPIAWALA</td>
        </tr>
        <tr>
            <th>NO. PESANAN:</th>
            <td colspan="3">PO REF: LKT0052/2022</td>
        </tr>
        <tr>
            <th>KONTRAKTOR:</th>
            <td colspan="3">JAYA KEJURUTERAAN SDN BHD</td>
        </tr>
    </table>
    <table>
        <tr>
            <th>Bil.</th>
            <th>No. Rujukan</th>
            <th>Keterangan Barang</th>
            <th>Kuantiti</th>
            <th>Unit</th>
        </tr>
    
        @foreach ($projectMaterials as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->material->mat_code }}</td> 
                <td>{{ $item->material->mat_desc }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->material->bun }}</td>
            </tr>
        @endforeach
    </table>
    
    
    <div class="footer">
        <div class="signature">
           
    <p>Nama : </p>
        </div>
        <div class="signature">
            
            <p>Jurutera</p>
            <p>NAMA:</p>
        </div>
    </div>
</div>

<button onclick="printPage()">Print </button>

<script>
    // JavaScript function to trigger the print dialog
    function printPage() {
      window.print();
    }
  </script>