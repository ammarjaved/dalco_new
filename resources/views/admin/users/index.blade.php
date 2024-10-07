@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="font-size: 2.5rem; font-weight: 600; color: #343a40;">Manage Users</h1>

        <!-- Create New User Button -->
        <div class="justify-content-end mb-4">
            <md-filled-tonal-button 
                href="{{ route('users.create') }}" 
                
               >
                + Create New User
            </md-filled-tonal-button>
        </div>

        <!-- Success or Error Message -->
        @if(session('success'))
            <div class="alert 
                {{ session('success') === 'User created successfully' || session('success') === 'User updated successfully' ? 'alert-success' : 'alert-danger' }} 
                alert-dismissible fade show text-center" role="alert">
                <strong>&#10004; {{ session('success') === 'User created successfully' ? 'Success:' : (session('success') === 'User updated successfully' ? 'Updated:' : 'Deleted:') }}</strong> 
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <script>
                setTimeout(function() {
                    $('.alert').alert('close');
                }, 2000);
            </script>
        @endif

        <!-- Responsive Table -->
        <div class="table-responsive shadow-lg p-3 mb-5 bg-white rounded">
            <table id="myTable" class="table table-hover table-striped table-bordered" style="font-size: 1rem;">
                <thead class="thead-dark" style="background-color: #343a40; color: #fff;">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        
                        <th>Area</th>
                        <th>Project</th>
                        <th>Vendor</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                          
                            <td>{{ $user->area }}</td>
                            <td>{{ $user->project }}</td>
                            <td>{{ $user->vendor }}</td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <!-- Latest DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
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
                    { orderable: false, targets: [6] }
                ]
            });
        });
    </script>

    <!-- Additional styling for better appearance -->
    <style>
        /* Styling for buttons, tables, and responsiveness */
        .btn {
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 500;
        }
        .table {
            border-collapse: separate;
            border-spacing: 0 15px;
        }
        .table thead th {
            background-color: #343a40;
            color: white;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table td, .table th {
            padding: 15px;
        }
        .table-bordered th, .table-bordered td {
            border: none;
            border-bottom: 1px solid #dee2e6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
            .table-responsive {
                overflow-x: auto;
            }
        }

        @media (max-width: 576px) {
            .table {
                font-size: 0.9rem;
            }
            td {
                word-wrap: break-word;
            }
            .btn-sm {
                font-size: 0.8rem;
            }
        }
    </style>
@endsection
