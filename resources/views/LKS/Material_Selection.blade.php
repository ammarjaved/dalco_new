
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>JADUAL ANGGARAN_{{$survey->nama_pe}}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>



</head>
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


<body>


    <div class="container-fluid">

        <div style="float: right;width:400;height:400px;">
        <img src="/assets/web-images/tenegalogofull.jfif" class="logo">

            <!-- <div class="col border overall-margin" style="margin-left: 10px;">
                <img class="logo" src='/assets/web-images/tnblogo.png' alt="TNB Logo">
                <p class="center-text">TNB ENERGY SERVICES SDN BHD (234667-M)<br>
                    Level 2, Jalan Air Hitam, Kawasan 16,<br>
                    40000 Shah Alam, Selangor</p>
            </div> -->
            <!-- <div class="col border overall-margin" style="margin-right: 10px;">
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
            </div> -->

        </div>
    </div>
    
    <div class="container-fluid" style="padding-top:150px">
        <!-- <p><strong>NAMA PE:&emsp;&emsp;</strong> {{$survey->nama_pe}}</p> -->
        <p><strong>REKOD PENGGUNAAN BARANG - BARANG</strong></p>
        <p><strong>TAJUK PROJEK:</strong>  {{$survey->nama_pe}}</p>
        <p><strong>TARIKH MULA:</strong> _______________</p>
        <p><strong>NO PESANAN:</strong> _______________</p>
        <p><strong>KONTRAKTOR:</strong> AEROSYNERGY SOLUTION SDN BHD</p>
    </div>
    
    <div style="padding-top: 50px">
        <h1>JADUAL ANGGARAN DAN PENGGUNAAN BAHAN</h1>
        {{-- <table>
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
        </table> --}}
        <div class="container-fluid">
        <table>
            <tr>
                <th>Bil.</th>
                <th>No Katalog</th>
                <th>Keterangan Barang</th>
                <th>Kod unit</th>
                <th>Kuantiti</th>
                <th>BRAMOS MRMU</th>
            </tr>
        
            @php
                $groupedMaterials = $projectMaterials->groupBy('material.mat_type');
                $counter = 1;
            @endphp
            
            @foreach ($groupedMaterials as $matType => $materials)
                <tr>
                    <td colspan="6" style="background-color: #f0f0f0; font-weight: bold; text-align: center;">
                        {{ strtoupper($matType) }}
                    </td>
                </tr>
                @foreach ($materials as $item)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $item->material->mat_code }}</td> 
                        <td>{{ $item->material->mat_desc }}</td>
                        <td>{{ $item->material->bun }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->remarks }}</td>
                    </tr>
                @endforeach
            @endforeach
        </table>
        </div>
        
        
        <!-- Signature Section -->
        <div style="margin-top: 50px; display: flex; justify-content: space-between;">
            <div style="text-align: center;">
                <p><strong>Penyelia/Juruteknik: </strong></p>
                <p>Tarikh: </p>
               
            </div>
            <div style="text-align: center;">
               
                <p><strong>Jurutera:</strong></p>
                <p>Tarikh: </p>
            </div>
        </div>
    </div>
    
    
    <script>
        window.onload = function () {
            window.print();
            // const element = document.getElementById('content');
            // const opt = {
            //     margin: 1,
            //     filename: 'site_survey_toolboxtalk.pdf',
            //     image: { type: 'jpeg', quality: 0.98 },
            //     html2canvas: { scale: 2 },
            //     jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            // };
    
            // html2pdf().set(opt).from(element).save().then(function () {
            //     console.log('PDF downloaded');
            // });
        };
    </script>








</body>
