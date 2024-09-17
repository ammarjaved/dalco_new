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


</style>


<div class="container my-5" style="margin-left: -27px">
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

<button onclick="printPage()">Print </button>

<script>
    // JavaScript function to trigger the print dialog
    function printPage() {
      window.print();
    }
  </script>
