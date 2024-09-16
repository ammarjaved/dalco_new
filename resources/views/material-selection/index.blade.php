

  @extends('layouts.app')

@section('content')

@php
    $navContent = Blade::render(
        '@include("nav.index", ["survey" => $survey, "id" => $id])', 
        [
            'survey' => app(\App\Http\Controllers\TopnavbarController::class)->index($siteSurvey->id)->getData()['survey'],
            'id' => $siteSurvey->id
        ]
    );
@endphp
{!! $navContent !!}

<style>
    md-filled-text-field {
      resize: horizontal;
    }

    #search-results {
        border: 1px solid #ddd;
        max-height: 200px;
        overflow-y: auto;
    }
    .search-item {
        padding: 5px;
        cursor: pointer;
    }
    .search-item:hover {
        background-color: #f0f0f0;
    }
    .dataTables_filter {
    float: right !important;
}
.dataTables_paginate {
    float: right !important;
}
.dataTables_length {
    float: left !important;
}
.dataTables_info {
    float: left !important;
}

table.dataTable thead .sorting,
table.dataTable thead .sorting_asc,
table.dataTable thead .sorting_desc {
    cursor: pointer;
    position: relative;
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_desc:after {
    position: absolute;
    bottom: 8px;
    right: 8px;
    display: block;
    font-family: 'Font Awesome 5 Free';
    opacity: 0.5;
}

table.dataTable thead .sorting:after {
    content: "\f0dc";
    opacity: 0.2;
}

table.dataTable thead .sorting_asc:after {
    content: "\f0de";
}

table.dataTable thead .sorting_desc:after {
    content: "\f0dd";
}

    
</style>

<section class="content-header">
    <div class="container-">
        <div class="row mb-2" style="flex-wrap:nowrap">
            <div class="col-sm-6">
                <h3 style="color: #8e44ad;">Material Selection</h3>
            </div>
            {{--<div class="col-sm-6 text-right">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ route('material-selection.index') }}" style="color: #8e44ad;">index</a></li>
                    <li class="breadcrumb-item active" style="color: #8e44ad;">create</li>
                </ol>
            </div>--}}
        </div>
    </div>
</section>

<div class="container">
    <h2>Material Selection</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div style="background-color: white">
            <md-outlined-text-field type="text" label="Search" style="min-width: 500px;margin:2px" name="search" id="search_input1" placeholder="Search by material"></md-outlined-text-field>
        </div>
        {{-- <div class="col-sm-1">
            <md-filled-tonal-button style="horizontal-align: center; margin:5px" type="button" onclick="addData()">Add</md-filled-tonal-button>
        </div> --}}
    </div>
   
    <div class="row">
        <div id="search-results"></div>
    </div>

    <form action="{{ route('material-selection.save', ['id' => $siteSurvey->id]) }}" method="POST">
        @csrf
        
        <table class="table" style="background-color:#fef7ff;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Material Code</th>
                    <th>Description</th>
                    <th>Bun</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody id='mat_sel'>
            </tbody>
        </table>

        <md-filled-tonal-button type="submit">Save Selections</md-filled-tonal-button>
    </form>
</div>

<div class="container">
    <h2>Data Table</h2>
    
   
        <table id="myTable"  style="background-color:#fef7ff;" class="table table-bordered table-hover data-table">

        <thead>
            <tr>
                <th>PE Name</th>
                <th>Material Code</th> 
                <th>Description</th>
                <th>Bun</th>
                <th>Quantity</th>
                <th>Action</th> <!-- New column for delete button -->
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama_pe }}</td>
                    <td>{{ $item->mat_code }}</td>
                    <td>{{ $item->mat_desc }}</td>
                    <td>{{ $item->bun }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <form action="{{ route('material-selection.delete', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <md-filled-tonal-button type="submit" >Delete</md-filled-tonal-button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
var i = 0;

function addData() {
    var myval = $('#search_input1').val();
    if (myval != '') {
        var searchMaterialUrl = '/data_material';

        $.ajax({
            url: searchMaterialUrl + '?desc=' + myval,
            dataType: 'JSON',
            method: 'GET',
            success: function(data) {
                if (data.length > 0) {
                    // Check if material is already added to the table
                    // var existingMaterial = $('#myTable').find('td:contains(' + data[0].mat_code + ')');
                    // if (existingMaterial.length > 0) {
                    //     if (confirm('This material is already added. Do you want to delete it?')) {
                    //         // Delete the existing material
                    //         var row = existingMaterial.closest('tr');
                    //         row.remove();
                    //     }
                    // } else {
                        // Add the new material to the table
                        var i = $('#myTable tr').length; // Define i as the number of table rows
                        var str = '<tr><td><input type="text" name="data[' + i + '][id]" value="' + data[0].id + '" /></td>' +
                                  '<td><input type="text" name="data[' + i + '][mat_code]" value="' + data[0].mat_code + '" /></td>' +
                                  '<td><input type="text" name="data[' + i + '][mat_desc]" value="' + data[0].mat_desc + '" /></td>' +
                                  '<td><input type="text" name="data[' + i + '][bun]" value="' + data[0].bun + '" /></td>' +
                                  '<td><input type="number" name="data[' + i + '][quantity]" value="0" /></td></tr>';
                        $("#mat_sel").append(str);
                        $('#search_input1').val(''); // Clear the search input
                   // }
                } else {
                    alert('No material found');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX error:", textStatus, errorThrown);
                alert("Error fetching material data. Please try again.");
            }
        });
    } else {
        alert("Please select a material first.");
    }
}

$(document).ready(function() {
    const $search = $('#search_input1');
    const $searchResults = $('#search-results');

    // Autocomplete based on mat_desc and mat_code
    $('#search_input1').on('keyup', function() {
        var query = $(this).val();

        if (query.length >= 2) {
            $.ajax({
                url: "{{ route('search.material') }}",
                method: 'GET',
                data: { query: query },
                success: function(data) {
                    $('#search-results').empty();
                    $.each(data, function(index, item) {
                        // Display both mat_code and mat_desc in the search results
                        $searchResults.append('<div class="search-item" data-code="' + item.mat_code + '" data-desc="' + item.mat_desc + '">' + item.mat_desc + ' (' + item.mat_code + ')</div>');
                    });
                }
            });
        } else {
            $('#search-results').empty();
        }
    });

    // Handle the selection of material from the autocomplete results
    $searchResults.on('click', '.search-item', function() {
        const selectedCode = $(this).data('code');
        const selectedDesc = $(this).data('desc');

        // Set the selected description in the input field
        $search.val(selectedDesc);

        // Add the selected material to the table (you can call addData here or integrate this logic)
        addData();

        // Clear the autocomplete results
        $searchResults.empty();
    });

    // Close search results when clicking outside
    $(document).on('click', function(event) {
        if (!$(event.target).closest('#search_input1, #search-results').length) {
            $searchResults.empty();
        }
    });
});
</script>


@section('script')

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/generate-qr.js') }}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>

<script>



document.addEventListener('DOMContentLoaded', function() {
    table = $('.data-table').DataTable({
        dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        language: {
            search: "",
            searchPlaceholder: "Search...",
            lengthMenu: "Show _MENU_ entries"
        },
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        pageLength: 10,
        ordering: true,
        order: [[0, 'asc']],
        columnDefs: [
            { orderable: false, targets: [4] }
        ]
    });
});

</script>


@endsection


