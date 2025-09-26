<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pre-Cabling Images - {{$survey->nama_pe}}</title>
    <style>
        body { 
            margin: 0; 
            padding: 15px; 
            font-family: Arial, sans-serif; 
            font-size: 11px;
        }
        .page {
            page-break-after: always;
            height: calc(100vh - 30px);
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
        }
        .page:last-child {
            page-break-after: avoid;
        }
        .header { 
            border: 2px solid #000; 
            padding: 0; 
            margin-bottom: 10px;
            flex-shrink: 0;
        }
        .company-info { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        }
        .company-left, .company-right {
            display: flex;
            align-items: center;
            flex: 1;
            font-size: 10px;
            padding: 8px;
        }
        .company-left {
            justify-content: flex-start;
            border-right: 2px solid #000;
        }
        .company-right {
            justify-content: flex-start;
        }
        .logo { 
            width: 50px; 
            height: 35px; 
            margin-right: 10px;
            flex-shrink: 0;
        }
        .company-text {
            text-align: left;
        }
        .substation-info {
            margin-bottom: 8px;
            font-weight: bold;
            flex-shrink: 0;
            font-size: 11px;
        }
        .page-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            text-decoration: underline;
            flex-shrink: 0;
            font-size: 12px;
        }
        .images-grid { 
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            grid-template-rows: 1fr 1fr;
            gap: 0; 
            flex: 1;
            margin-bottom: 10px;
            min-height: 0;
            max-height: calc(100vh - 250px);
            border: 2px solid #000;
        }
        .image-container { 
    border-right: 2px solid #000;
    border-bottom: 2px solid #000;
    display: flex;
    flex-direction: column;
    height: 100%;
}
.image-container:nth-child(2n) {
    border-right: none;
}
.image-container:nth-child(3), .image-container:nth-child(4) {
    border-bottom: none;
}
.image-wrapper {
    flex: 1;
    padding: 3px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    min-height: 0;
    height: 180px;
}
.image-wrapper img { 
    max-width: 100%; 
    max-height: 100%;
    width: auto;
    height: auto;
    object-fit: contain;
}
.image-title { 
    font-weight: bold; 
    text-align: center;
    padding: 4px;
    background: #f0f0f0;
    border-top: 1px solid #000;
    font-size: 9px;
    flex-shrink: 0;
    height: 20px;
    line-height: 12px;
}
        .footer { 
            border: 2px solid #000; 
            display: flex;
            flex-shrink: 0;
            margin-top: auto;
            height: 30px;
        }
        .footer-item { 
            border-right: 1px solid #000; 
            padding: 4px; 
            flex: 1;
            text-align: center;
            font-size: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .footer-item:last-child { 
            border-right: none; 
        }
    </style>
</head>
<body>
    @php
        $imagesPerPage = 4;
        $totalPages = ceil($PreCablmages->count() / $imagesPerPage);
    @endphp

    @for($page = 0; $page < $totalPages; $page++)
        @php
            $startIndex = $page * $imagesPerPage;
            $pageImages = $PreCablmages->slice($startIndex, $imagesPerPage);
        @endphp
        
        <div class="page">
            <!-- Header -->
            <div class="header">
                <div class="company-info">
                    <div class="company-left">
                        <img src="{{ asset('assets/web-images/tnblogo.png') }}" alt="TNB Logo" class="logo">
                        <div class="company-text">
                            <div><strong>TNB ENERGY SERVICES SDN BHD (234667-M)</strong></div>
                            <div>Level 2, Jalan Air Hitam, Kawasan 16,</div>
                            <div>40000 Shah Alam, Selangor</div>
                        </div>
                    </div>
                    <div class="company-right">
                        @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
                            <img src="{{ asset('assets/web-images/main-logo.png') }}" alt="Aerosynergy Logo" class="logo">
                            <div class="company-text">
                                <div><strong>AEROSYNERGY SOLUTIONS SDN BHD</strong></div>
                                <div>NO. 12B, 2, Jalan PJS 8/12a</div>
                                <div>46150 Petaling Jaya Selangor</div>
                            </div>
                        @elseif($projectName === 'ARAS-JOHOR')
                            <img src="{{ asset('assets/web-images/araslogo.png') }}" alt="ARAS Logo" class="logo">
                            <div class="company-text">
                                <div><strong>ARAS KEJURUTERAAN SDN BHD</strong></div>
                                <div>1st Floor No 72, Jalan SS 21/1, Damansara Utama,</div>
                                <div>47400 Petaling Jaya, Selangor</div>
                            </div>
                        @else
                            <img src="{{ asset('assets/web-images/defaultlogo.png') }}" alt="Default Logo" class="logo">
                            <div class="company-text">
                                <div><strong>Default Company Name</strong></div>
                                <div>Default Address</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @if($page === 0)
                <!-- <div class="substation-info">
                    <div><strong>SUBSTATION NAME: &emsp;&emsp;&emsp;&emsp;&emsp;</strong> {{$survey->nama_pe}}</div>
                    <div><strong>NO FUNCTIONAL LOCATION: &emsp;</strong> JJBUPJCOEH00621</div>
                </div> -->
                <div class="page-title">PICTURE OF PRECABLING</div>
            @endif

            <!-- Images Grid (4 images max per page) -->
            <div class="images-grid">
                @foreach($pageImages as $image)
                    <div class="image-container">
                        <div class="image-wrapper">
                            <img src="{{ asset($image->image_url) }}" alt="{{ $image->image_name }}">
                        </div>
                        <div class="image-title">
                            {{ strtoupper(str_replace('_', ' ', $image->image_name)) }}
                        </div>
                    </div>
                @endforeach
                
                @if($pageImages->count() < 4)
                    @for($i = $pageImages->count(); $i < 4; $i++)
                        <div class="image-container">
                            <div class="image-wrapper">
                                <div style="color: #ccc; font-size: 14px;">No Image</div>
                            </div>
                            <div class="image-title">-</div>
                        </div>
                    @endfor
                @endif
            </div>

            <!-- Footer -->
            <div class="footer">
                <div class="footer-item">
                    <strong>PRE-CABLING FORM TNB 119/2023</strong>
                </div>
                <div class="footer-item">
                    <strong>Part No.:</strong> AERO-CFSSOUTHPORM001
                </div>
                <div class="footer-item">
                    <strong>Rev No.:</strong> 001
                </div>
                <div class="footer-item">
                    <strong>Rev Date:</strong>
                </div>
            </div>
        </div>
    @endfor

    <script>
        window.onload = function () {
            window.print();
        };
    </script>
</body>
</html>
