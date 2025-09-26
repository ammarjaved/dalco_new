<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SENARAI SEMAK_{{ $survey->nama_pe }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            margin: 20px;
            line-height: 1.3;
        }
        .logo {
            width: 160px;
        }
        .title {
            text-align: left;
            font-weight: bold;
            margin: -20px 0 20px 2px;
            text-transform: uppercase;
        }
        .form-row {
        display: flex;
        margin-bottom: 6px;
        align-items: flex-start;
    }
    .form-label {
        width: 140px;
    }
    .form-colon {
        width: 5px;   /* narrower colon, fixed width */
        text-align: right;
        padding-right: 5px;
    }
    .form-value {
        flex: 1;
        padding-left: 5px;  /* creates the gap */
    }

    .form-value1 {
        flex: 1;
        padding-left: 105px;  /* creates the gap */
    }
    .option-label {
        font-size: 10px;
        font-style: italic;
        margin-right: 10px;
    }
    .underlined {
        border-bottom: 1px solid #000;
        display: inline-block;
        min-width: 100px;
        font-weight: bold;
    }
        .checkbox-group {
            display: inline-flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        .checkbox-item {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            white-space: nowrap;
        }
        .checkbox-item span {
            font-size: 11px;
        }
        .bold {
            font-weight: bold;
        }
        .data-table {
            border-collapse: collapse;
            margin-top: 3px;
        }
        .data-table td {
            border: 1px solid #000;
            padding: 2px 5px;
            font-size: 10px;
            text-align: center;
            min-width: 65px;
        }
        .wide {
            min-width: 100px;
        }
        table.inner {
            border: 1px solid #000;
            border-collapse: collapse;
        }
        table.inner td {
            border: 1px solid #000;
            padding: 3px 6px;
            font-size: 11px;
            text-align: center;
        }
    </style>
</head>
<body>

    {{-- Logo & Title --}}
    @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
        <img src="/assets/web-images/tenegalogofull.jfif" class="logo">
    @elseif($projectName === 'ARAS-JOHOR')
        <img src="/assets/web-images/araslogo.png" class="logo">
    @else
        <img src="/assets/web-images/tnblogo.png" class="logo">
    @endif

    <div class="title">SENARAI SEMAK LAWATAN TAPAK PROJEK SCADA DA</div>

    {{-- Nama Pencawang --}}
    <div class="form-row">
        <div class="form-label">Nama Pencawang</div>
        <div class="form-colon">:</div>
        <div class="form-value"><span class="underlined">{{ $survey->nama_pe }}</span></div>
    </div>

    {{-- Kawasan --}}
    <div class="form-row">
        <div class="form-label">Kawasan / Negeri</div>
        <div class="form-colon">:</div>
        <div class="form-value"><span class="underlined">{{ $survey->kawasan }}</span></div>
    </div>

    {{-- FL --}}
    <div class="form-row">
        <div class="form-label">Functional Location (FL)</div>
        <div class="form-colon">:</div>
        <div class="form-value"><span class="underlined">{{ $survey->fl }}</span></div>
    </div>

    {{-- Jenis Pencawang --}}
    <div class="form-row">
        <div class="form-label">Jenis Pencawang</div>
        <div class="form-colon">:</div>
        <div class="form-value1">
            <table class="inner">
                <tr>
                    @foreach(['Stand-alone','Attached','Outdoor','Compact'] as $opt)
                        <td class="{{ strtoupper($survey->jenis)==strtoupper($opt) ? 'bold' : '' }}">
                            {{ $opt }}
                        </td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>

    {{-- Peparit --}}
    <div class="form-row">
        <div class="form-label">Peparit (Trench) Berpasir ?</div>
        <div class="form-colon">:</div>
        <div class="form-value1">
            <table class="inner">
                <tr>
                    @foreach(['Ya'=>'yes','Tidak'=>'no'] as $label=>$val)
                        <td class="{{ strtolower($survey->peparit)==$val ? 'bold' : '' }}">
                            {{ $label }}
                        </td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>

    {{-- Jenis Kompaun --}}
    <div class="form-row">
        <div class="form-label">Jenis Kompaun <br />Pencawang</div>
        <div class="form-colon">:</div>
        <div class="form-value1">
            <table class="inner">
                <tr>
                    @foreach(['Simen','Rumput','Inter-locking','Crusher Run','Tiada'] as $opt)
                        <td class="{{ strtolower($survey->jenis_kompaun)==strtolower($opt) ? 'bold' : '' }}">
                            {{ $opt }}
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <td class="{{ strtolower($survey->jenis_kompaun)=='others' ? 'bold' : '' }}">
                        Others
                    </td>
                    <td colspan="4"></td>
                </tr>
            </table>
        </div>
    </div>

    {{-- Jenis Perkakasuis --}}
    <div class="form-row">
        <div class="form-label">Jenis Perkakasuis</div>
        <div class="form-colon">:</div>
        <div class="form-value1">
            <table class="inner">
                <tr>
                    @foreach(['VCB','RMU','CSU'] as $opt)
                        <td class="{{ strtoupper($survey->jenis_perkakasuis)==$opt ? 'bold' : '' }}">
                            {{ $opt }}
                        </td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>

    {{-- Konfigurasi --}}
    <div class="form-row">
        <div class="form-label">Konfigurasi</div>
        <div class="form-colon">:</div>
        <div class="form-value1">
            <table class="inner">
                <tr>
                    @foreach(['2S+1F','2S+2F','3S','3S+1F','3S+2F'] as $opt)
                        <td class="{{ strtoupper($survey->konfigurasi)==$opt ? 'bold' : '' }}">
                            {{ $opt }}
                        </td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>

    {{-- Jenama Alatsuis --}}
    <div class="form-row">
        <div class="form-label">Jenama Alatsuis</div>
        <div class="form-colon">:</div>
        <div class="form-value1"><span class="underlined">{{ $survey->jenama_alatsuis }}</span></div>
    </div>

    {{-- Jenis Model --}}
    <div class="form-row">
        <div class="form-label">Jenis Model</div>
        <div class="form-colon">:</div>
        <div class="form-value1"><span class="underlined">{{ $survey->jenis_model }}</span></div>
    </div>

    {{-- Tahun Pembinaan --}}
    <div class="form-row">
        <div class="form-label">Tahun Pembinaan  </div>
        <div class="form-colon" style=" width: auto;">:<span>(DD/MM/YY)</span></div>
        <div  style="padding-left: 45px;"> <span class="underlined">{{ $survey->tahun_pembinaan }}</span></div>
    </div>

    {{-- No Siri --}}
    <div class="form-row">
        <div class="form-label">No Siri Alatsuis</div>
        <div class="form-colon">:</div>
        <div class="form-value1"><span class="underlined">{{ $survey->siri_alatsuis }}</span></div>
    </div>

    {{-- No Suis --}}
    <div class="form-row">
        <div class="form-label">No Suis</div>
        <div class="form-colon">:</div>
        <div class="form-value1">
            <table class="data-table">
                <tr>
                    <td>{{ $survey->suis_no1 }}</td>
                    <td>{{ $survey->suis_no2 }}</td>
                    <td>{{ $survey->suis_no3 }}</td>
                    <td>{{ $survey->suis_no4 }}</td>
                    <td>{{ $survey->suis_no5 }}</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- Label Suis --}}
    <div class="form-row">
        <div class="form-label">Label Suis</div>
        <div class="form-colon">:</div>
        <div class="form-value1">
            <table class="data-table">
                <tr>
                    <td class="wide">{{ $survey->suis_label1 }}</td>
                    <td class="wide">{{ $survey->suis_label2 }}</td>
                    <td class="wide">{{ $survey->suis_label3 }}</td>
                    <td class="wide">{{ $survey->suis_label4 }}</td>
                    <td class="wide">{{ $survey->suis_label5 }}</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- Kabel Jenis --}}
    <div class="form-row">
        <div class="form-label">Kabel Jenis</div>
        <div class="form-colon" style="width:auto">:(xlpe/pilc)</div>
        <div style="padding-left: 60px;">
            <table class="data-table">
                <tr>
                    <td>{{ $survey->kabel_jenis1 }}</td>
                    <td>{{ $survey->kabel_jenis2 }}</td>
                    <td>{{ $survey->kabel_jenis3 }}</td>
                    <td>{{ $survey->kabel_jenis4 }}</td>
                    <td>{{ $survey->kabel_jenis5 }}</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- Kabel Saiz --}}
    <div class="form-row">
        <div class="form-label">Kabel Saiz</div>
        <div class="form-colon">:</div>
        <div class="form-value1">
            <table class="data-table">
                <tr>
                    <td>{{ $survey->kabel_saiz1 }}</td>
                    <td>{{ $survey->kabel_saiz2 }}</td>
                    <td>{{ $survey->kabel_saiz3 }}</td>
                    <td>{{ $survey->kabel_saiz4 }}</td>
                    <td>{{ $survey->kabel_saiz5 }}</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- Saiz Fius --}}
    <div class="form-row">
        <div class="form-label">Saiz Fius</div>
        <div class="form-colon">:</div>
        <div class="form-value1"><span class="underlined">{{ $survey->fius_saiz }}</span></div>
    </div>

    {{-- EFI SCADA --}}
    <div class="form-row">
        <div class="form-label">EFI SCADA Ready Status</div>
        <div class="form-colon" style=" width: auto;">:(yes/no)</div>
        <div style="padding-left: 60px;">
            <table class="inner">
                <tr>
                    @foreach(['YES','NO'] as $opt)
                        <td class="{{ strtolower($survey->scada_status)==strtolower($opt) ? 'bold' : '' }}">
                            {{ $opt }}
                        </td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>

    {{-- Punca Bekalan LV --}}
    <div class="form-row">
        <div class="form-label">Punca Bekalan LV</div>
        <div class="form-colon" style=" width: auto;">:(yes/no)</div>
        <div style="padding-left: 60px;">
            <table class="inner">
                <tr>
                    @foreach(['YES','NO'] as $opt)
                        <td class="{{ strtolower($survey->bekalan_lv)==strtolower($opt) ? 'bold' : '' }}">
                            {{ $opt }}
                        </td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>

    {{-- Bacaan Beban --}}
    <div class="form-row">
        <div class="form-label">Jumlah bacaan beban</div>
        <div class="form-colon">:</div>
        <div class="form-value1"><span class="underlined">{{ $survey->bacaan_beban }}</span></div>
    </div>

    {{-- Jenis LVDB --}}
    <div class="form-row">
        <div class="form-label">Jenis F/Pillar/LVDB</div>
        <div class="form-colon" style=" width: auto;">:(LVDB/DIN/BS)</div>
        <div style="padding-left: 50px;"><span class="underlined">{{ $survey->jenis_lvdb }}</span></div>
    </div>

    {{-- Kerja Civil --}}
    <div class="form-row">
        <div class="form-label">Keperluan Khas Kerja-<br />kerja civil</div>
        <div class="form-colon">:</div>
        <div class="form-value1"><span class="underlined">{{ $survey->keperluan_khas_kerja }}</span></div>
    </div>

    {{-- Survey Footer Table --}}
    <table class="survey-header" style="position: fixed; bottom: 0; left: 0; right: 0; width: 100%; border-collapse: collapse; margin: 0;">
        <tr>
            <td class="title-cell" style="border: 1px solid #000; padding: 5px;">SITE SURVEY FORM TNB 11/01/2023</td>
            <td class="content-cell" style="border: 1px solid #000; padding: 5px;">Part No.: </td>
            <td class="date-cell" style="border: 1px solid #000; padding: 5px;">Rev No.: </td>
            <td class="date-content" style="border: 1px solid #000; padding: 5px;">Rel Date:</td>
        </tr>
    </table>

</body>
<script>
    window.onload = function () {
        window.print();
    };
</script>
</html>
