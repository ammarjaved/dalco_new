<style>
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
        .stamp {
            width: 100px;
            height: 100px;
            border: 1px solid #000;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        .image-container {
            max-width: 100%;
            max-height: 100vh;
        }
        img {
            max-width: 100%;
            max-height: 100vh;
            object-fit: contain;
            
        }
</style>    
<h2 style="text-align: center;">TOOLBOX TALK FORM</h2>

<table>
    <tr>
        <th>Lokasi</th>
        <td>{{$toolboxtalk->lokasi}}</td>
        <th>Tarikh</th>
        <td>{{$toolboxtalk->tarikh}}</td>
    </tr>
    <tr>
        <th>Nama Pencawang</th>
        <td>{{$survey->nama_pe}}</td>
        <th>CFS</th>
        <td>{{$toolboxtalk->cfs}}</td>
    </tr>
    <tr>
        <th>Skop Kerja</th>
        <td colspan="3">SITE SURVEY</td>
    </tr>
</table>

<div>
    <h2>Checklist</h2>
    <table>
        <tr>
            <th></th>
            <th>Site Survey</th>
            <th>Cabling</th>
            <th>Outage</th>
            <th>SAT</th>
        </tr>
        <tr>
            <td colspan="5"><strong>PPD</strong></td>
        </tr>
        <tr>
            <td>Safety Helmet</td>
            <td>{{$toolboxtalk->ppd_safety_helment}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Safety Vest</td>
            <td>{{$toolboxtalk->ppd_safety_vest}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Safety Shoes</td>
            <td>{{$toolboxtalk->ppd_safety_shoes}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Safety</td>
            <td>{{$toolboxtalk->ppd_safety}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5"><strong>TOOL & EQUIPMENT INSTRUMENT</strong></td>
        </tr>
        <tr>
            <td>All In Good Condition</td>
            <td>{{$toolboxtalk->equipment_condition}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>


        <tr>
            <td colspan="5"><strong> INSTRUMENT</strong></td>
        </tr>
        <tr>
            <td>All In Good Condition</td>
            <td>{{$toolboxtalk->instrument_condition}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>First Aid Kit</td>
            <td>{{$toolboxtalk->instrument_kit_condition}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>


        <tr>
            <td colspan="5"><strong>VEHICLE</strong></td>
        </tr>
        <tr>
            <td>Fire Extinguisher</td>
            <td>{{$toolboxtalk->vehicle_fire_extinguisher}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Vehicle In Good Condition</td>
            <td>{{$toolboxtalk->vehicle_condition}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5"><strong>TRAFFIC</strong></td>
        </tr>
        <tr>
            <td>Safety Kon</td>
            <td>{{$toolboxtalk->traffic_safety_kon}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Sign Board</td>
            <td>{{$toolboxtalk->traffic_sign_board}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Chargeman Bo</td>
            <td>{{$toolboxtalk->traffic_chargeman}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5"><strong>TEAM</strong></td>
        </tr>
        <tr>
            <td>AP TNP</td>
            <td>{{$toolboxtalk->team_ap_tnp}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>CP TNB</td>
            <td>{{$toolboxtalk->team_cp_tnb}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5"><strong>NIOSH</strong></td>
        </tr>
        <tr>
            <td>All Staff Have NTSP</td>
            <td>{{$toolboxtalk->niosh_staff_ntsp}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5"><strong>PERMIT</strong></td>
        </tr>
        <tr>
            <td>Special Permit</td>
            <td>{{$toolboxtalk->permit_special}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Permit To Work (PTW)</td>
            <td>{{$toolboxtalk->permit_work}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5"><strong>PICTURE</strong></td>
        </tr>
        <tr>
            <td>Picture During Tool Box Talk</td>
            <td>{{$toolboxtalk->picture_during_toolbox}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td><img src='/{{$toolboxtalk->toolbox_image1}}'  width="200px" height="200px"  /></td>
            <td><img src='/{{$toolboxtalk->toolbox_image2}}'  width="200px" height="200px"  /></td>
        </tr>
    </table>
</div>
<div class="signature">
    <p>Supervisor:</p>
    <p>Nama : </p>
</div>