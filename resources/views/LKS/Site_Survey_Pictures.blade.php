<head>
      <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
     
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

<div style="break-after:page">
    <div class="container-fluid">
        <div class="row">
            <div class="col border overall-margin" style="margin-left: 10px;"><img class="logo"
                    src='http://121.121.232.54:9191/assets/web-images/tnblogo.png' alt="TNB Logo">
                <p class="center-text">TNB ENERGY SERVICES SDN BHD (234667-M)<br>
                    Level 2, Jalan Air Hitam, Kawasan 16,<br>
                    40000 Shah Alam, Selangor</p>
            </div>
            <div class="col border overall-margin" style="margin-right: 10px;">
                <div class="col-md-6">
                    <img class="logo" src='http://121.121.232.54:9191/assets/web-images/main-logo.png'
                        alt="Aerosynergy Solutions Logo">
                    <p class="center-text">AEROSYNERGY SOLUTIONS SDN BHD<br>
                        NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor</p>
                </div>
            </div>
        </div>
    </div>
    <h4 class="title center-text">PICTURE LIST FORM<br>(SITE VISIT)</h4>
    <div class="container-fluid">
        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">1 Substation (FL)</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="substation_fl" value="yes" checked disabled>
                    Yes
                    <input class="checkbox-margins" type="checkbox" name="substation_fl" value="no" disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">2 Existing Switchgear</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="existing_switchgear" value="yes" checked
                        disabled>
                    Yes
                    <input class="checkbox-margins" type="checkbox" name="existing_switchgear" value="no" disabled> No
                </div>
            </div>
        </div>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">3 Switchgear Nameplate</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="switchgear_nameplate" value="yes" checked
                        disabled>
                    Yes
                    <input class="checkbox-margins" type="checkbox" name="switchgear_nameplate" value="no" disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">4 Distribution Board</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="distribution_board" value="yes" checked
                        disabled>
                    Yes
                    <input class="checkbox-margins" type="checkbox" name="distribution_board" value="no" disabled> No
                </div>
            </div>
        </div>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">5 Battery Charger</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="battery_charger" value="yes" checked disabled>
                    Yes
                    <input class="checkbox-margins" type="checkbox" name="battery_charger" value="no" disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">6 Battery Charger Nameplate</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="battery_charger_nameplate" value="yes" checked
                        disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="battery_charger_nameplate" value="no"
                        disabled> No
                </div>
            </div>
        </div>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">7 Wall / Ceiling Cable Tray Route (P/W)</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="ceiling_tray" value="yes" checked disabled>
                    Yes
                    <input class="checkbox-margins" type="checkbox" name="ceiling_tray" value="no" disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">8 Civil Work Location</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="civil_location" value="yes" disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="civil_location" value="no" checked disabled>
                    No
                </div>
            </div>
        </div>
        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">9 Substation Entrance</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="substation_entrance" checked disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="substation_entrance" disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">10 Cable Route</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="cable_route" disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="cable_route" checked disabled> No
                </div>
            </div>
        </div>
        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">11 Portable Genset Location</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="genset_location" disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="genset_location" checked disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">12 Feeder and TX Cable</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="feeder_tx" disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="feeder_tx" checked disabled> No
                </div>
            </div>
        </div>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">13 Trench Inside View</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="trench_view" disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="trench_view" checked disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">14 RTU Remote Terminal Unit</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="rtu" disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="rtu" checked disabled> No
                </div>
            </div>
        </div>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col border">
                <p class="left-margin">15 RCB Remote Control Box</p>
                <div class="right-element">
                    <input class="checkbox-margins" type="checkbox" name="rcb" disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="rcb" checked disabled> No
                </div>
            </div>
            <div class="col border">
                <p class="left-margin">16 EFI Earth Fault Indicator</p>
                <div class="right-element">

                    <input class="checkbox-margins" type="checkbox" name="efi" disabled> Yes
                    <input class="checkbox-margins" type="checkbox" name="efi" checked disabled> No
                </div>
            </div>
        </div>
    </div>
</div>

<div style="break-after:page">
    <div class="container-fluid">
        <div class="row">
            <div class="col border overall-margin" style="margin-left: 10px;"><img class="logo"
                    src='http://121.121.232.54:9191/assets/web-images/tnblogo.png' alt="TNB Logo">
                <p class="center-text">TNB ENERGY SERVICES SDN BHD (234667-M)<br>
                    Level 2, Jalan Air Hitam, Kawasan 16,<br>
                    40000 Shah Alam, Selangor</p>
            </div>
            <div class="col border overall-margin" style="margin-right: 10px;">
                <div class="col-md-6">
                    <img class="logo" src='http://121.121.232.54:9191/assets/web-images/main-logo.png'
                        alt="Aerosynergy Solutions Logo">
                    <p class="center-text">AEROSYNERGY SOLUTIONS SDN BHD<br>
                        NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <p class="left-margin right-margin overall-margin">SUBSTATION NAME:&emsp;&emsp;&emsp;&emsp;&emsp;value required
            from php</p>
        <p class="left-margin right-margin overall-margin">NO FUNCTIONAL LOCATION:&emsp;value required from php</p>
    </div>
    <div>
        <h4 class="title center-text"><u>PICTURE OF SITE SURVEY</u></h4>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col">
                <div class="row border">
                    <img class="survey-images"
                        src='http://121.121.232.54:9191/assets/images/substation_fl_image1-1726148861.PNG'
                        alt="Substation fl image1">
                </div>
                <div class="row border center">
                    <p>Substation fl image1</p>
                </div>
            </div>
            <div class="col">
                <div class="row border">
                    <img class="survey-images"
                        src='http://121.121.232.54:9191/assets/images/substation_fl_image2-1726148861.PNG'
                        alt="Substation fl image2">
                </div>
                <div class="row border center">
                    <p>Substation fl image2</p>
                </div>
            </div>
        </div>
        
        <div class="row row-cols-2 right-margin left-margin">
            <div class="col">
                <div class="row border">
                    <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/existing_switchgear_image1-1726148861.PNG'
                    alt="Existing switchgear image1">
                </div>
                <div class="row border center">
                    <p>Existing switchgear image1</p>
                </div>
            </div>
            <div class="col">
                <div class="row border">
                    <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/existing_switchgear_image2-1726148861.PNG'
                    alt="Existing switchgear image2">
                </div>
                <div class="row border center">
                    <p>Existing switchgear image2</p>
                </div>
            </div>
        </div>

        <div class="row row-cols-2 right-margin left-margin">
            <div class="col">
                <div class="row border">
                    <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/switchgear_nameplate_image1-1726148861.PNG'
                    alt="Switchgear nameplate image1">
                </div>
                <div class="row border center">
                    <p>Switchgear nameplate image1</p>
                </div>
            </div>
            <div class="col">
                <div class="row border">
                    <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/switchgear_nameplate_image2-1726148861.PNG'
                    alt="Switchgear nameplate image2">
                </div>
                <div class="row border center">
                    <p>Switchgear nameplate image2</p>
                </div>
            </div>
        </div>

        <div class="pictures-grid">
            <div class="picture-item">

                <p></p>
            </div>
            <div class="picture-item">

                
            </div>
            <div class="picture-item">
                
            </div>
            <div class="picture-item">
                
            </div>
            <div class="picture-item">
                
            </div>
            <div class="picture-item">
                
            </div>
            <div class="picture-item">
                
            </div>
            <div class="picture-item">
                
            </div>
            <div class="picture-item">
                
            </div>
            <div class="picture-item">
                
            </div>
            <div class="picture-item">
                
            </div>
            <div class="picture-item">
                
            </div>
            <div class="picture-item">
                
            </div>
            <div class="picture-item">
                
            </div>
            <div class="picture-item">
                
            </div>
            <div class="picture-item">
                
            </div>

        </div>


    </div>
</div>

<div style="break-after:page">
    <div class="container-fluid">
        <div class="row">
            <div class="col border overall-margin" style="margin-left: 10px;"><img class="logo"
                    src='http://121.121.232.54:9191/assets/web-images/tnblogo.png' alt="TNB Logo">
                <p class="center-text">TNB ENERGY SERVICES SDN BHD (234667-M)<br>
                    Level 2, Jalan Air Hitam, Kawasan 16,<br>
                    40000 Shah Alam, Selangor</p>
            </div>
            <div class="col border overall-margin" style="margin-right: 10px;">
                <div class="col-md-6">
                    <img class="logo" src='http://121.121.232.54:9191/assets/web-images/main-logo.png'
                        alt="Aerosynergy Solutions Logo">
                    <p class="center-text">AEROSYNERGY SOLUTIONS SDN BHD<br>
                        NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-2 right-margin left-margin">
        <div class="col">
            <div class="row border">
                <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/distribution_board_image1-1726148861.PNG'
                    alt="Distribution board image1">
            </div>
            <div class="row border center">
                <p>Distribution board image1</p>
            </div>
        </div>
        <div class="col">
            <div class="row border">
                <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/distribution_board_image2-1726148861.PNG'
                    alt="Distribution board image2">
            </div>
            <div class="row border center">
                <p>Distribution board image2</p>
            </div>
        </div>
    </div>

    <div class="row row-cols-2 right-margin left-margin">
        <div class="col">
            <div class="row border">
                <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/battery_charger_image1-1726148861.PNG'
                    alt="Battery charger image1">
            </div>
            <div class="row border center">
                <p>Battery charger image1</p>
            </div>
        </div>
        <div class="col">
            <div class="row border">
                <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/battery_charger_image2-1726148861.PNG'
                    alt="Battery charger image2">
            </div>
            <div class="row border center">
                <p>Battery charger image2</p>
            </div>
        </div>
    </div>

    <div class="row row-cols-2 right-margin left-margin">
        <div class="col">
            <div class="row border">
                <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/battery_charger_nameplate_image1-1726148861.PNG'
                    alt="Battery charger nameplate image1">
            </div>
            <div class="row border center">
                <p>Battery charger nameplate image1</p>
            </div>
        </div>
        <div class="col">
            <div class="row border">
                <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/battery_charger_nameplate_image2-1726148861.PNG'
                    alt="Battery charger nameplate image2">
            </div>
            <div class="row border center">
                <p>Battery charger nameplate image2</p>
            </div>
        </div>
    </div>
</div>

<div style="break-after:page">
    <div class="container-fluid">
        <div class="row">
            <div class="col border overall-margin" style="margin-left: 10px;"><img class="logo"
                    src='http://121.121.232.54:9191/assets/web-images/tnblogo.png' alt="TNB Logo">
                <p class="center-text">TNB ENERGY SERVICES SDN BHD (234667-M)<br>
                    Level 2, Jalan Air Hitam, Kawasan 16,<br>
                    40000 Shah Alam, Selangor</p>
            </div>
            <div class="col border overall-margin" style="margin-right: 10px;">
                <div class="col-md-6">
                    <img class="logo" src='http://121.121.232.54:9191/assets/web-images/main-logo.png'
                        alt="Aerosynergy Solutions Logo">
                    <p class="center-text">AEROSYNERGY SOLUTIONS SDN BHD<br>
                        NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-2 right-margin left-margin">
        <div class="col">
            <div class="row border">
                <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/ceiling_tray_image1-1726148861.PNG'
                    alt="Ceiling tray image1">
            </div>
            <div class="row border center">
                <p>Ceiling tray image1</p>
            </div>
        </div>
        <div class="col">
            <div class="row border">
                <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/ceiling_tray_image2-1726148861.PNG'
                    alt="Ceiling tray image2">
            </div>
            <div class="row border center">
                <p>Ceiling tray image2</p>
            </div>
        </div>
    </div>

    <div class="row row-cols-2 right-margin left-margin">
        <div class="col">
            <div class="row border">
                <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/substation_entrance_image1-1726148861.PNG'
                    alt="Substation entrance image1">
            </div>
            <div class="row border center">
                <p>Substation entrance image1</p>
            </div>
        </div>
        <div class="col">
            <div class="row border">
                <img class="survey-images"
                    src='http://121.121.232.54:9191/assets/images/substation_entrance_image2-1726148861.PNG'
                    alt="Substation entrance image2">
            </div>
            <div class="row border center">
                <p>Substation entrance image2</p>
            </div>
        </div>
    </div>
</div>
