<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
    </div>

    <h4 class="title center-text">PICTURE LIST FORM<br>(SITE VISIT)</h4>

    <div class="container-fluid">
       

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">1 Substation (FL)</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="substation_fl" value="yes" <?php echo
                        ($pictureData['substation_fl']=='yes' ) ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="substation_fl" value="no" <?php echo
                        ($pictureData['substation_fl']=='no' ) ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">2 Existing Switchgear</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="existing_switchgear" value="yes" <?php echo
                        ($pictureData['existing_switchgear']=='yes' ) ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="existing_switchgear" value="no" <?php echo
                        ($pictureData['existing_switchgear']=='no' ) ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
        </div>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">3 Switchgear Nameplate</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="switchgear_nameplate" value="yes" <?php echo
                        ($pictureData['switchgear_nameplate']=='yes' ) ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="switchgear_nameplate" value="no" <?php echo
                        ($pictureData['switchgear_nameplate']=='no' ) ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">4 Distribution Board</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="distribution_board" value="yes" <?php echo
                        ($pictureData['distribution_board']=='yes' ) ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="distribution_board" value="no" <?php echo
                        ($pictureData['distribution_board']=='no' ) ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
        </div>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">5 Battery Charger</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="battery_charger" value="yes" <?php echo
                        ($pictureData['battery_charger']=='yes' ) ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="battery_charger" value="no" <?php echo
                        ($pictureData['battery_charger']=='no' ) ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">6 Battery Charger Nameplate</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="battery_charger_nameplate" value="yes" <?php
                        echo ($pictureData['battery_charger_nameplate']=='yes' ) ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="battery_charger_nameplate" value="no" <?php
                        echo ($pictureData['battery_charger_nameplate']=='no' ) ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
        </div>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">7 Wall / Ceiling Cable Tray Route (P/W)</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="ceiling_tray" value="yes" <?php echo
                        ($pictureData['ceiling_tray']=='yes' ) ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="ceiling_tray" value="no" <?php echo
                        ($pictureData['ceiling_tray']=='no' ) ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">8 Civil Work Location</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="civil_location" value="yes" <?php echo
                        ($pictureData['civil_location']=='yes' ) ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="civil_location" value="no" <?php echo
                        ($pictureData['civil_location']=='no' ) ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
        </div>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">9 Substation Entrance</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="substation_entrance" <?php echo
                        ($pictureData['substation_entrance']=='yes' ) ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="substation_entrance" <?php echo
                        ($pictureData['substation_entrance']=='no' ) ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">10 Cable Route</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="cable_route" <?php echo
                        ($pictureData['cable_route']=='yes' ) ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="cable_route" <?php echo
                        ($pictureData['cable_route']=='no' ) ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
        </div>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">11 Portable Genset Location</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="genset_location" <?php echo
                        ($pictureData['genset_location']=='yes' ) ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="genset_location" <?php echo
                        ($pictureData['genset_location']=='no' ) ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">12 Feeder and TX Cable</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="feeder_tx" <?php echo
                        ($pictureData['feeder_tx']=='yes' ) ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="feeder_tx" <?php echo
                        ($pictureData['feeder_tx']=='no' ) ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
        </div>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">13 Trench Inside View</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="trench_view" <?php echo
                        ($pictureData['trench_view']=='yes' ) ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="trench_view" <?php echo
                        ($pictureData['trench_view']=='no' ) ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">14 RTU Remote Terminal Unit</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="rtu" <?php echo ($pictureData['rtu']=='yes' )
                        ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="rtu" <?php echo ($pictureData['rtu']=='no' )
                        ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
        </div>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">15 RCB Remote Control Box</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="rcb" <?php echo ($pictureData['rcb']=='yes' )
                        ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="rcb" <?php echo ($pictureData['rcb']=='no' )
                        ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">16 EFI Earth Fault Indicator</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="efi" <?php echo ($pictureData['efi']=='yes' )
                        ? 'checked' : '' ; ?> disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="efi" <?php echo ($pictureData['efi']=='no' )
                        ? 'checked' : '' ; ?> disabled> No
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row row-cols-2 right-margin left-margin overall-margin">
            <div class="col border">
                <p class="left-margin">Disediakan Oleh:</p>
                <p class="left-margin">Nama: <br>Jawatan: </p>
            </div>
            <div class="col border">
                <p class="left-margin">Disemak Oleh:</p>
                <p class="left-margin">Nama:<br>Jawatan:</p>
            </div>
        </div>
    </div>
</div>

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
    </div>

    <div class="container-fluid">
        <p><strong>SUBSTATION NAME:&emsp;&emsp;&emsp;&emsp;&emsp;</strong> {{$survey->nama_pe}}</p>
        <p><strong>NO FUNCTIONAL LOCATION:&emsp;</strong> JJBUPJCOEH00621</p>
    </div>

    <h4 class="title center-text"><u>PICTURE OF SITE SURVEY</u></h4>

    <div class="row row-cols-2 right-margin left-margin">
        @if(isset($pictureData))
        @foreach($imageFields as $field)
        @if(!empty($pictureData->$field))
        <div class="col">
            <div class="row border">
                <img class="survey-images" src='/{{ $pictureData->$field }}'
                    alt="{{ ucfirst(str_replace('_', ' ', $field)) }}" alt="Switchgear nameplate image2">
            </div>
            <div class="row border center">
                <p>{{ ucfirst(str_replace('_', ' ', $field)) }}</p>
            </div>
        </div>
        @endif
        @endforeach
        @endif
    
        @if(isset($toolbox))
        @foreach($toolboxImageFields as $field)
        @if(!empty($toolbox->$field))
        <div class="picture-item">
            <img src='/{{$toolbox->$field }}' alt="{{ ucfirst(str_replace('_', ' ', $field)) }}">
            <p>{{ ucfirst(str_replace('_', ' ', $field)) }}</p>
        </div>
        @endif
        @endforeach
        @endif
    </div>
</div>