<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <title>Site Survey Picture List Form and Pictures_{{$survey->nama_pe}} </title>
</head>

<style>
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

        .checklist-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .checklist-row {
            border: 2px solid #000 !important;
            margin-bottom: 1px;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
        
        .checklist-col {
            border-right: 2px solid #000 !important;
            padding: 8px 12px;
            background-color: white;
            min-height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
        
        .checklist-col:last-child {
            border-right: none !important;
        }
        
        .item-label {
            font-weight: normal;
            font-size: 14px;
            margin: 0;
            flex-grow: 1;
        }
        
        .checklist-container {
            margin: 20px 0;
        }
        
        .checklist-row {
            margin-bottom: 15px;
        }
        
        .checklist-col {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
        }
        
        .item-label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }
        
        .checkbox-container {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .checkbox-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .custom-checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid #333;
            cursor: pointer;
            position: relative;
        }
        
        .custom-checkbox.checked {
            background-color: #333;
        }
        
        .custom-checkbox.checked::after {
            content: '✓';
            position: absolute;
            top: -2px;
            left: 2px;
            color: white;
            font-size: 14px;
            font-weight: bold;
        }
        
        .hidden-input {
            display: none;
        }
        
        .checkbox-label {
            font-size: 14px;
            cursor: pointer;
        }
        /* Print-specific styles */
        @media print {
            .checklist-row {
                border: 2px solid #000 !important;
                page-break-inside: avoid;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            .checklist-col {
                border-right: 2px solid #000 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            .checklist-col:last-child {
                border-right: none !important;
            }
            
            .custom-checkbox {
                width: 18px !important;
                height: 18px !important;
                border: 2px solid #000 !important;
                background-color: white !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                box-shadow: inset 0 0 0 1px #000 !important;
            }
            
            .custom-checkbox.checked::after {
                content: "✗" !important;
                color: #000 !important;
                font-size: 16px !important;
                font-weight: bold !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            /* Force borders to show */
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }

        .survey-header {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin:105px 0;
        }
        
        .survey-header td {
            border: 1px solid black;
            padding: 5px 8px;
            text-align: left;
            vertical-align: middle;
        }
        
        .survey-header .title-cell {
            background-color: #f0f0f0;
            font-weight: bold;
            width: 25%;
        }
        
        .survey-header .content-cell {
            width: 25%;
        }
        
        .survey-header .date-cell {
            width: 15%;
        }
        
        .survey-header .date-content {
            width: 10%;
        }
        
</style>

@php
$imageFields = [
'substation_fl_image1', 'substation_fl_image2',
'existing_switchgear_image1', 'existing_switchgear_image2',
'switchgear_nameplate_image1', 'switchgear_nameplate_image2',
'distribution_board_image1', 'distribution_board_image2',
'battery_charger_image1', 'battery_charger_image2',
'battery_charger_nameplate_image1', 'battery_charger_nameplate_image2',
'ceiling_tray_image1', 'ceiling_tray_image2',
'civil_location_image1', 'civil_location_image2',
'substation_entrance_image1', 'substation_entrance_image2',
'cable_route_image1', 'cable_route_image2',
'genset_location_image1', 'genset_location_image2',
'feeder_tx_image1', 'feeder_tx_image2',
'trench_view_image1', 'trench_view_image2',
'rtu_image1', 'rtu_image2',
'rcb_image1', 'rcb_image2',
'efi_image1', 'efi_image2',
'other_image1', 'other_image2', 'other_image3', 'other_image4'
];
$toolboxImageFields = ['toolbox_image1', 'toolbox_image2'];
@endphp



<div style="break-after:page">
<div class="row">
                <div class="col border" style=" display: flex; align-items: center; ">
                    <img class="logo" src='/assets/web-images/tnblogo.png' alt="TNB Logo" style="height: 60px; width: auto; flex-shrink: 0;">
                    <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                        TNB ENERGY SERVICES SDN BHD (234667-M)<br>
                        Level 2, Jalan Air Hitam, Kawasan 16,<br>
                        40000 Shah Alam, Selangor
                    </p>
                </div>
                                    <div class="col border" style=" display: flex; align-items: center;">
                        @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
                        <img class="logo" src='/assets/web-images/main-logo.png' alt="Aerosynergy Solutions Logo" style="height: 45px; width: auto; flex-shrink: 0;">
                        <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                            AEROSYNERGY SOLUTIONS SDN BHD
                            NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor
                        </p>
                        @elseif($projectName === 'ARAS-JOHOR')
                        <img class="logo" src='/assets/web-images/araslogo.png' alt="ARAS Kejuruteraan Logo" style="height: 45px; width: auto; flex-shrink: 0;">
                        <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                            ARAS KEJURUTERAAN SDN BHD<br>
                            1st Floor No 72, Jalan SS 21/1, Damansara Utama, 47400 Petaling Jaya, Selangor
                        </p>
                        @else
                        <img class="logo" src='/assets/web-images/defaultlogo.png' alt="Default Logo" style="height: 45px; width: auto; flex-shrink: 0;">
                        <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                            Default Company Name<br>
                            Default Address
                        </p>
                        @endif
                    </div>
                </div>
    <!-- <div class="container-fluid">
        <p><strong>PE NAME:&emsp;</strong> {{$survey->nama_pe}}</p>
       
    </div> -->

    <h4 class="title center-text">PICTURE LIST FORM<br>(SITE VISIT)</h4>

    <div class="container-fluid">
   
    <div class="checklist-container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered checklist-table">
                        <tbody>
                            <tr>
                                <!-- Left Side Items -->
                                <td class="item-number-cell">1</td>
                                <td class="checklist-cell">Substation (FL)</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="substation_fl" value="yes" class="hidden-input" {{ ($pictureData['substation_fl'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['substation_fl'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="substation_fl" value="no" class="hidden-input" {{ ($pictureData['substation_fl'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['substation_fl'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                                <!-- Right Side Items -->
                                <td class="item-number-cell">10</td>
                                <td class="checklist-cell">Cable Route</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="cable_route" value="yes" class="hidden-input" {{ ($pictureData['cable_route'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['cable_route'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="cable_route" value="no" class="hidden-input" {{ ($pictureData['cable_route'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['cable_route'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="item-number-cell">2</td>
                                <td class="checklist-cell">Existing Switchgear</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="existing_switchgear" value="yes" class="hidden-input" {{ ($pictureData['existing_switchgear'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['existing_switchgear'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="existing_switchgear" value="no" class="hidden-input" {{ ($pictureData['existing_switchgear'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['existing_switchgear'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                                <td class="item-number-cell">11</td>
                                <td class="checklist-cell">Portable Genset Location</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="genset_location" value="yes" class="hidden-input" {{ ($pictureData['genset_location'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['genset_location'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="genset_location" value="no" class="hidden-input" {{ ($pictureData['genset_location'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['genset_location'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="item-number-cell">3</td>
                                <td class="checklist-cell">Switchgear Nameplate</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="switchgear_nameplate" value="yes" class="hidden-input" {{ ($pictureData['switchgear_nameplate'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['switchgear_nameplate'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="switchgear_nameplate" value="no" class="hidden-input" {{ ($pictureData['switchgear_nameplate'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['switchgear_nameplate'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                                <td class="item-number-cell">12</td>
                                <td class="checklist-cell">Feeder and TX Cable</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="feeder_tx" value="yes" class="hidden-input" {{ ($pictureData['feeder_tx'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['feeder_tx'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="feeder_tx" value="no" class="hidden-input" {{ ($pictureData['feeder_tx'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['feeder_tx'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="item-number-cell">4</td>
                                <td class="checklist-cell">Distribution Board</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="distribution_board" value="yes" class="hidden-input" {{ ($pictureData['distribution_board'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['distribution_board'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="distribution_board" value="no" class="hidden-input" {{ ($pictureData['distribution_board'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['distribution_board'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                                <td class="item-number-cell">13</td>
                                <td class="checklist-cell">Trench Inside View</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="trench_view" value="yes" class="hidden-input" {{ ($pictureData['trench_view'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['trench_view'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="trench_view" value="no" class="hidden-input" {{ ($pictureData['trench_view'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['trench_view'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="item-number-cell">5</td>
                                <td class="checklist-cell">Battery Charger</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="battery_charger" value="yes" class="hidden-input" {{ ($pictureData['battery_charger'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['battery_charger'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="battery_charger" value="no" class="hidden-input" {{ ($pictureData['battery_charger'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['battery_charger'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                                <td class="item-number-cell">14</td>
                                <td class="checklist-cell">RTU Remote Terminal Unit</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="rtu" value="yes" class="hidden-input" {{ ($pictureData['rtu'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['rtu'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="rtu" value="no" class="hidden-input" {{ ($pictureData['rtu'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['rtu'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="item-number-cell">6</td>
                                <td class="checklist-cell">Battery Charger Nameplate</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="battery_charger_nameplate" value="yes" class="hidden-input" {{ ($pictureData['battery_charger_nameplate'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['battery_charger_nameplate'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="battery_charger_nameplate" value="no" class="hidden-input" {{ ($pictureData['battery_charger_nameplate'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['battery_charger_nameplate'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                                <td class="item-number-cell">15</td>
                                <td class="checklist-cell">RCB Remote Control Box</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="rcb" value="yes" class="hidden-input" {{ ($pictureData['rcb'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['rcb'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="rcb" value="no" class="hidden-input" {{ ($pictureData['rcb'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['rcb'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="item-number-cell">7</td>
                                <td class="checklist-cell">Wall / Ceiling Cable Tray Route (P/W)</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="ceiling_tray" value="yes" class="hidden-input" {{ ($pictureData['ceiling_tray'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['ceiling_tray'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="ceiling_tray" value="no" class="hidden-input" {{ ($pictureData['ceiling_tray'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['ceiling_tray'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                                <td class="item-number-cell">16</td>
                                <td class="checklist-cell">EFI Earth Fault Indicator</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="efi" value="yes" class="hidden-input" {{ ($pictureData['efi'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['efi'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="efi" value="no" class="hidden-input" {{ ($pictureData['efi'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['efi'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="item-number-cell">8</td>
                                <td class="checklist-cell">Civil Work Location</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="civil_location" value="yes" class="hidden-input" {{ ($pictureData['civil_location'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['civil_location'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="civil_location" value="no" class="hidden-input" {{ ($pictureData['civil_location'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['civil_location'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                                <td class="empty-cell" colspan="4"></td>
                            </tr>

                            <tr>
                                <td class="item-number-cell">9</td>
                                <td class="checklist-cell">Substation Entrance</td>
                                <td class="colon-cell">:</td>
                                <td class="checkbox-cell">
                                    <div class="checkbox-container">
                                        <label class="checkbox-option">
                                            <input type="radio" name="substation_entrance" value="yes" class="hidden-input" {{ ($pictureData['substation_entrance'] == 'yes') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['substation_entrance'] == 'yes') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">Yes</span>
                                        </label>
                                        <label class="checkbox-option">
                                            <input type="radio" name="substation_entrance" value="no" class="hidden-input" {{ ($pictureData['substation_entrance'] == 'no') ? 'checked' : '' }}>
                                            <span class="custom-checkbox {{ ($pictureData['substation_entrance'] == 'no') ? 'checked' : '' }}"></span>
                                            <span class="checkbox-label">No</span>
                                        </label>
                                    </div>
                                </td>
                                <td class="empty-cell" colspan="4"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>
    <div class="container mt-5" style="margin-left:100px;">
    <div class="row">
      <!-- Left Section -->
      <div class="col-6">
        <p><strong>Disediakan Oleh:</strong></p>
        <div style="border-bottom:1px dotted #000; width:200px; margin:30px 0 10px 0;"></div>
        <p style="margin:5px 0;">Nama : NAJMI</p>
        <p style="margin:5px 0;">Jawatan : PENYELIA TAPAK</p>
      </div>

      <!-- Right Section -->
      <div class="col-6">
        <p><strong>Disemak Oleh:</strong></p>
        <div style="border-bottom:1px dotted #000; width:200px; margin:30px 0 10px 0;"></div>
        <p style="margin:5px 0;">Nama :</p>
        <p style="margin:5px 0;">Jawatan :</p>
      </div>
    </div>
  </div>
  <!-- <table class="survey-header">
        <tr>
            <td class="title-cell">SITE SURVEY FORM TNB 11/01/2023</td>
            <td class="content-cell">Part No.: </td>
            <td class="date-cell">Rev No.: </td>
            <td class="date-content">Rel Date:</td>
        </tr>
    </table> -->
</div>


<style>
    @media print {
        .page-break {
            page-break-before: always;
        }
        .row-break {
            break-inside: avoid;
        }
    }
    
    .survey-images {
        width: 100%;
        height: 500px;
        object-fit: cover;
    }
    
    .image-placeholder {
        width: 100%;
        height: 500px;
        background-color: #f8f9fa;
        color: #6c757d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: bold;
    }
    
    .image-container {
        margin-bottom: 15px;
    }
    
    .image-label {
        padding: 8px;
        font-weight: bold;
        font-size: 14px;
        text-align: center;
        background-color: #f8f9fa;
        border-top: 1px solid #dee2e6;
    }
    
    .survey-header {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        font-size: 12px;
    }
    
    .survey-header td {
        border: 1px solid #000;
        padding: 5px;
        height: 25px;
        vertical-align: middle;
    }
    
    .title-cell {
        background-color: #f0f0f0;
        font-weight: bold;
        text-align: center;
        width: 40%;
    }
    
    .content-cell, .date-cell, .date-content {
        text-align: left;
        width: 20%;
    }
</style>

@php
// Create a mapping of SSImages by image_name for easy lookup
$ssImagesByName = [];
if(isset($SSImages)) {
    foreach($SSImages as $ssImage) {
        $ssImagesByName[$ssImage->image_name] = $ssImage;
    }
}

// Define the image names we want to display
$imageNames = [
    'Di Hadapan Pencawang Elektrik',
    'Dari Sisi Kiri Pencawang Elektrik', 
    'Bahagian Hadapan Gear RMU',
    'Plat Besi RMU',
    'LVDB',
    'TX',
    'Plat Besi TX',
    'Laluan Peparit',
    'Lokasi Straight Through',
    'Lokasi Joint Pit Straight Through',
    'Diluar Kompaun Pencawang Elektrik',
    'Lokasi Genset'
];

$totalImages = count($imageNames);
$imagesPerPage = 4;
$totalPages = ceil($totalImages / $imagesPerPage);
@endphp

<div class="right-margin left-margin">
    @if($totalImages > 0)
        @for($page = 0; $page < $totalPages; $page++)
            @php
                $startIndex = $page * $imagesPerPage;
                $endIndex = min($startIndex + $imagesPerPage, $totalImages);
                $pageImageNames = array_slice($imageNames, $startIndex, $imagesPerPage);
            @endphp
            
            @if($page >= 0)
                <div class="page-break"></div>
                
                {{-- Header for each page --}}
                <div class="row">
                <div class="col border" style=" display: flex; align-items: center; ">
                    <img class="logo" src='/assets/web-images/tnblogo.png' alt="TNB Logo" style="height: 60px; width: auto; flex-shrink: 0;">
                    <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                        TNB ENERGY SERVICES SDN BHD (234667-M)<br>
                        Level 2, Jalan Air Hitam, Kawasan 16,<br>
                        40000 Shah Alam, Selangor
                    </p>
                </div>
                                    <div class="col border" style=" display: flex; align-items: center;">
                        @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
                        <img class="logo" src='/assets/web-images/main-logo.png' alt="Aerosynergy Solutions Logo" style="height: 45px; width: auto; flex-shrink: 0;">
                        <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                            AEROSYNERGY SOLUTIONS SDN BHD
                            NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor
                        </p>
                        @elseif($projectName === 'ARAS-JOHOR')
                        <img class="logo" src='/assets/web-images/araslogo.png' alt="ARAS Kejuruteraan Logo" style="height: 45px; width: auto; flex-shrink: 0;">
                        <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                            ARAS KEJURUTERAAN SDN BHD<br>
                            1st Floor No 72, Jalan SS 21/1, Damansara Utama, 47400 Petaling Jaya, Selangor
                        </p>
                        @else
                        <img class="logo" src='/assets/web-images/defaultlogo.png' alt="Default Logo" style="height: 45px; width: auto; flex-shrink: 0;">
                        <p style="font-weight: bold; line-height: 1.4; margin: 0;">
                            Default Company Name<br>
                            Default Address
                        </p>
                        @endif
                    </div>
                </div>
                
                @if($page == 0)
                <div class="container-fluid">
                    <p><strong>SUBSTATION NAME:&emsp;&emsp;&emsp;&emsp;&emsp;</strong> {{$survey->nama_pe}}</p>
                    <p><strong>NO FUNCTIONAL LOCATION:&emsp;</strong> JJBUPJCOEH00621</p>
                </div>
                <h4 class="title center-text"><u>PICTURE OF SITE SURVEY</u></h4>
                @endif
            @endif
            
            {{-- Display images in 2x2 grid --}}
            @for($row = 0; $row < 2; $row++)
                @if(isset($pageImageNames[$row * 2]) || isset($pageImageNames[$row * 2 + 1]))
                    <div class="row" style="margin-bottom: 10px;">
                        @for($col = 0; $col < 2; $col++)
                            @php
                                $imageIndex = $row * 2 + $col;
                                $imageName = isset($pageImageNames[$imageIndex]) ? $pageImageNames[$imageIndex] : null;
                                $ssImage = $imageName && isset($ssImagesByName[$imageName]) ? $ssImagesByName[$imageName] : null;
                            @endphp
                            
                            <div class="col-6" style="padding: 5px;">
                                <div class="image-container" style="border: 2px solid #000; margin-bottom: 15px; height: 600px;">
                                    <div style="border-bottom: 1px solid #000; height: 550px;">
                                        @if($ssImage && !empty($ssImage->image_url))
                                            <img class="survey-images" src='/{{ $ssImage->image_url }}'
                                                 alt="{{ $imageName }}"
                                                 style="width: 100%; height: 100%; object-fit: cover; display: block;">
                                        @else
                                            <div class="image-placeholder" style="width: 100%; height: 100%; background-color: #f8f9fa; color: #6c757d; display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: bold;">
                                                <span>N/A</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="image-label" style="height: 50px; display: flex; align-items: center; justify-content: center;">
                                        {{ $imageName ?? 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                @endif
            @endfor
            
            {{-- Footer for each page --}}
            <div style="position: fixed; bottom: 20px; left: 0; right: 0; border: 2px solid black; display: flex; background: white;">
                <div style="border-right: 1px solid black; padding: 8px; flex: 1; text-align: center; font-size: 12px;">
                    <strong>SITE SURVEY FORM TNB 11/01/2023</strong>
                </div>
                <div style="border-right: 1px solid black; padding: 8px; flex: 1; text-align: center; font-size: 12px;">
                    <strong>Part No.:</strong> AERO-CFSSEL/FORM/001
                </div>
                <div style="border-right: 1px solid black; padding: 8px; flex: 1; text-align: center; font-size: 12px;">
                    <strong>Rev No.:</strong> 001
                </div>
                <div style="padding: 8px; flex: 1; text-align: center; font-size: 12px;">
                    <strong>Rel Date:</strong>
                </div>
            </div>
        @endfor
    @endif
</div>
<script>
        window.onload = function () {
            window.print();
          
        };
    </script>
