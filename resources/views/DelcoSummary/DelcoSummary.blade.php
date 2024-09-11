@extends('layouts.app')

@section('content')

<nav class="main-header navbar navbar-expand navbar-light d-flex justify-content-between"
    style="background-color: #558772;margin-left:1px;">
    
    <!-- Left navbar links -->


    <ul class="navbar-nav">
        <!-- <li class="nav-item">
            <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li> -->
        <li class="nav-item   d-sm-inline-block">
            <img src="{{ asset('assets/web-images/main-logo.png') }}" height="35" alt="">
            {{-- <a href="index3.html" class="nav-link">Home</a> --}}
        </li>
        {{--    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> --}}
    </ul>

    <div class="ms-auto ">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button
                    class="inline-flex items-center  border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#558772] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div>{{ Auth::user()->name }}</div>

                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>



</nav>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dalco Summary</h1>
            </div>
        </div>
    </div>
</section>


<section class="content">

   
    <div class="row">
     <div class="col-md-6">
    <table id="myTable" class="table table-bordered table-hover data-table">


    <thead style="background-color: #E4E3E3 !important">
        <tr>
            <th>NAMA PE</th>
           
            <th>SiteSurvey</th>
            <th>PreCabling</th>
            <th>Shutdown</th>
            <th>SAT</th>
            {{-- <th>TYPE FEEDER</th> --}}
            
        </tr>
    </thead>
    <tbody>

        @foreach ($delcoSummary as $data)
            <tr>
                <td class="align-middle"><a href="{{ route('material-selection.index',$data->id) }}">{{$data->nama_pe ? $data->nama_pe : '-' }}</a></td>

                   


                <td class="align-middle text-center">
                    @if ($data->nama_pe)
                        <span class="check "
                            style="font-weight: 600; color: green;">&#x2713;</span>
                    @else
                        <span class="check"
                            style="font-weight: 600; color: red;">&#x2715;</span>
                    @endif
                </td>
                <td class="align-middle text-center">
                    @if ($data->PreCabling)
                        <span class="check "
                            style="font-weight: 600; color: green;">&#x2713;</span>
                    @else
                        <span class="check"
                            style="font-weight: 600; color: red;">&#x2715;</span>
                    @endif
                </td>
                <td class="align-middle text-center">
                    @if ($data->ImageShutdown)
                        <span class="check "
                            style="font-weight: 600; color: green;">&#x2713;</span>
                    @else
                        <span class="check"
                            style="font-weight: 600; color: red;">&#x2715;</span>
                    @endif
                </td>


                <td class="align-middle text-center">
                    @if ($data->SAT)
                        <span class="check "
                            style="font-weight: 600; color: green;">&#x2713;</span>
                    @else
                        <span class="check"
                            style="font-weight: 600; color: red;">&#x2715;</span>
                    @endif
                </td>
               
               
            </tr>
        @endforeach
    </tbody>
</table>

    </div>

    <div  id="map" style="width: 90%; height:620px" class="col-md-6">
        

    </div>


</div>




{{-- <div class="d-flex justify-content-center">
    {{ $delcoSummary->links() }}
</div> --}}



</section>

@endsection

<style>

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

.dataTables_length {
    margin-bottom: 15px;
}
.dataTables_length label {
    display: flex;
    align-items: center;
}
.dataTables_length select {
    margin: 0 10px;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

</style>



@section('script')

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
<script src="{{ asset('assets/js/generate-qr.js') }}"></script>

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

    ordering: true,
    order: [[0, 'asc']], // Sort by the first column (index 0) in ascending order by default
    // columnDefs: [
    //     { orderable: false, targets: [4] } // Disable sorting on the SAT column (index 4)
    // ]

    lengthChange: true,
    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
    initComplete: function(settings, json) {
      // Replace the default select with a Material select
      $('.dataTables_length select').each(function() {
        const select = $(this);
        const mdSelect = document.createElement('md-select');
        mdSelect.setAttribute('label', 'Show entries');
        select.find('option').each(function() {
          const mdOption = document.createElement('md-option');
          mdOption.value = $(this).val();
          mdOption.textContent = $(this).text();
          mdSelect.appendChild(mdOption);
        });
        select.replaceWith(mdSelect);
      });
    }

               
               
})
})


document.addEventListener('DOMContentLoaded', function () {
                    let map = L.map('map').setView([3.2888784335929744,102.06586684019376], 8);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                });             
</script>

@endsection



