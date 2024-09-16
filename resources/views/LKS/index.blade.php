@extends('layouts.app')

@php
    $navContent = Blade::render(
        '@include("nav.index", ["survey" => $survey, "id" => $id])', 
        [
            'survey' => app(\App\Http\Controllers\TopnavbarController::class)->index($id)->getData()['survey'],
            'id' => $id
        ]
    );
@endphp
{!! $navContent !!}

@section('content')
    <div class="container">
        <h3>LKS</h3>

        <div class="card" style="background-color:#fef7ff;">
          

            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-hover data-table">
                        
                        <tbody>
                            <tr>
                              <th>Site Survey ToolboxTalk</th><td><a href="/ss_tbk/{{$id}}" target="_blank">download Site survey Toolbox Talk</a></td>  
                            </tr>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/generate-qr.js') }}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>

<script>



document.addEventListener('DOMContentLoaded', function() {
table = $('.data-table').DataTable({

    dom: '<"row"<"col-sm-6"l><"col-sm-6 text-right"f>>' +
         '<"row"<"col-sm-12"tr>>' +
         '<"row"<"col-sm-5"i><"col-sm-7 text-right"p>>',
    language: {
        search: "",
        searchPlaceholder: "Search..."

    },

    // ordering: true,
    // order: [[0, 'asc']], // Sort by the first column (index 0) in ascending order by default
    // columnDefs: [
    //     { orderable: false, targets: [4] } // Disable sorting on the SAT column (index 4)
    // ]

               
               
})
})

</script>


@endsection


