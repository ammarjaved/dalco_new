<style>
  .form-container {
        background-color: #f9f9f9;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }
    
    .form-group label {
        font-weight: bold;
        color: #333;
    }
    
    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
        padding: 10px;
    }
    
    .form-check-input {
        margin-left: 0;
    }

    .form-check-label {
        margin-left: 25px;
        font-size: 14px;
        font-weight: 500;
        color: #555;
    }
    
    .radio-container {
        display: flex;
        justify-content: space-around;
        padding: 10px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
    }

    .radio-label {
        font-size: 16px;
        color: #444;
    }

    /* Styling for rows and spacing */
    .row {
        margin-bottom: 20px;
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


<div class="container form-container">
    <h4 class="text-center mb-4">Pre-Cabling PIW</h4>
    <form class="form-horizontal">
        <div class="row">
            <!-- Kontraktor PIW -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="kontraktor_piw">Kontraktor PIW</label>
                    <input type="text" class="form-control" id="kontraktor_piw" value="{{ $Piw->kontraktor_piw }}" readonly>
                </div>
            </div>

            <!-- Kontraktor RTU -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="kontraktor_rtu">Kontraktor RTU</label>
                    <input type="text" class="form-control" id="kontraktor_rtu" value="{{ $Piw->kontraktor_rtu }}" readonly>
                </div>
            </div>

            <!-- Nama PE -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="pe_name">Nama PE</label>
                    <input type="text" class="form-control" id="pe_name" value="{{ $Piw->pe_name }}" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Tarikh -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tarikh">Tarikh</label>
                    <input type="date" class="form-control" id="tarikh" value="{{ date('Y-m-d', strtotime($Piw->tarikh)) }}" readonly>
                </div>
            </div>
        </div>

        <!-- Loop through fields with Yes/No options -->
        <div class="row">
            @foreach([
                'lokasi_efi' => 'Lokasi EFI Seteah Dipasang',
                'lokasi_rcb' => 'Lokasi RCB Seteah Dipasang',
                'connection_rcb' => 'Connection RCB',
                'lokasi_battary' => 'Lokasi Battery Charger Setelah Dipasang',
                'plate_battary' => 'Plate Battery Charger / Serial No',
                'lokasi_rtu' => 'Lokasi RTU Setelah Dipasang',
                'connection_rtu' => 'Connection RTU',
                'plate_rtu' => 'Plate RTU / Serial No',
                'laluan_cable_piw' => 'Laluan Cable (PIW)',
                'laluan_cable' => 'Laulan Cable'
            ] as $key => $label)
            <div class="col-md-4">
                <div class="form-group">
                    <label class="radio-label">{{ $label }}</label>
                    <div class="radio-container">
                        <!-- Yes option -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $key }}" id="{{ $key }}_yes" value="yes"
                            {{ ($Piw->$key ?? '') == 'yes' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="{{ $key }}_yes">Yes</label>
                        </div>
                        <!-- No option -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $key }}" id="{{ $key }}_no" value="no"
                            {{ ($Piw->$key ?? '') == 'no' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="{{ $key }}_no">No</label>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      

        <!-- Hidden input to store site survey ID -->
        <input type="hidden" name="site_survey_id" value="{{ $Piw->site_survey_id }}">
    </form>

    