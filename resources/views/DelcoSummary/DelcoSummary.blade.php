@extends('layouts.app')



@section('content')

<style>

    /* Three dots icon styling */
/* Dropdown menu styling */
.dropdown {
    position: relative;
}

.dropdown-menu {
    position: absolute;
    right: 100%; /* This positions the menu to the left of the icon */
    top: 0;
    display: none;
    
    
    border-radius: 4px;
    padding: 5px 0;
    z-index: 1000; /* Ensures the menu appears above other elements */
}

.dropdown-item {
    display: block;
    width: 100%;
    padding: 5px 15px;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
   
    border: 0;
}


.three-dots-icon{
    cursor: pointer;
}

/* Adjust the positioning of the dropdown to the right */
.dropdown-menu {
    right: -20px; /* Moves the dropdown more to the right */
    position: absolute;
}

.dropdown-item:hover {
    background-color: #e2e6ea;
    border-radius: 5px;
}

.dropdown-menu {
    min-width: 150px;
    background-color: #fff;
    padding: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}



</style>

<nav class="main-header navbar navbar-expand navbar-light d-flex justify-content-between" style="background-color: #8e44ad;margin-left:1px;">
    <ul class="navbar-nav">
        <li class="nav-item d-sm-inline-block">
            <img src="{{ asset('assets/web-images/main-logo.png') }}" height="35" alt="">
        </li>
    </ul>

    <div class="d-flex">

       


<div style="margin: 16px;">
    <md-filled-button id="usage-document-anchor5">
      {{ Auth::user()->name }}
      <md-icon slot="trailing-icon">expand_more</md-icon>
    </md-filled-button>
  </div>
  
  <md-menu positioning="document" id="usage-document5" anchor="usage-document-anchor5">
    <form method="POST" action="{{ route('logout') }}">
      @csrf

      <md-menu-item href="{{ route('profile.edit') }}">
        {{ __('Profile') }}
      </md-menu-item>

      <md-menu-item href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
        {{ __('Log Out') }}
      </md-menu-item>
  
     
    </form>
  </md-menu>
  
  <script type="module">
    const anchorEl5 = document.body.querySelector('#usage-document-anchor5');
    const menuEl5 = document.body.querySelector('#usage-document5');
    anchorEl5.addEventListener('click', () => { menuEl5.open = !menuEl5.open; });
  </script>
  
  
    </div>
</nav>

<style>
    md-menu-button {
        margin-left: 20px;
    }
    md-filled-tonal-button, md-filled-button {
        --md-sys-color-primary: #D7b4f3;
        --md-sys-color-on-primary: white;
    }
</style>


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dalco Summary</h1>
            </div>
        </div>
    </div>
</section>





<md-filled-tonal-button href="{{ route('site_survey.create') }}" 
style="background-color: #8e44ad;margin-left:20px; color:white">Add Site Survey</md-filled-tonal-button><br><br>

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
            <th>Actions</th>

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


                <td class="align-middle text-center">
                    <div class="dropdown">
                        <img src="{{ URL::asset('assets/web-images/three-dots-vertical.svg') }}" class="three-dots-icon" alt="Options" onclick="toggleDropdown(this)" style="cursor: pointer;">
                
                        <div class="dropdown-menu dropdown-menu-right p-2 shadow" style="border-radius: 8px; background-color: #f8f9fa; min-width: 150px; right: -20px;">
                            <!-- Edit Site Survey -->
                            <div class="mb-2">
                                @if ($data->nama_pe)
                                    <a href="{{ route('site_survey.edit', $data->id) }}" class="dropdown-item text-dark d-flex align-items-center">
                                        <i class="fa fa-edit mr-2"></i> Edit Site Survey
                                    </a>
                                @else
                                    <a href="{{ route('site_survey.create') }}" class="dropdown-item text-dark d-flex align-items-center">
                                        <i class="fa fa-plus-circle mr-2"></i> Create Site Survey
                                    </a>
                                @endif
                            </div>
                
                            <!-- Show Site Survey -->
                            <div class="mb-2">
                                @if ($data->nama_pe)
                                    <a href="{{ route('site_survey.show', $data->id) }}" class="dropdown-item text-dark d-flex align-items-center">
                                        <i class="fa fa-eye mr-2"></i> Show Site Survey
                                    </a>
                                @else
                                    <a href="{{ route('site_survey.create') }}" class="dropdown-item text-dark d-flex align-items-center">
                                        <i class="fa fa-plus-circle mr-2"></i> Create Site Survey
                                    </a>
                                @endif
                            </div>
                
                            <!-- Delete Site Survey -->
                            <form action="{{ route('delco-summary.delete', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item text-danger d-flex align-items-center" style="border: none; background-color: transparent;">
                                    <i class="fas fa-trash-alt mr-2"></i> Delete Site Survey
                                </button>
                            </form>
                        </div>
                    </div>
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
                
                
                // Toggle the display of the context menu
                function toggleDropdown(icon) {
    const dropdownMenu = icon.nextElementSibling;
    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
}

document.addEventListener('click', function(event) {
    const isClickInsideDropdown = event.target.closest('.dropdown');
    if (!isClickInsideDropdown) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.style.display = 'none');
    }
});
</script>

@endsection



