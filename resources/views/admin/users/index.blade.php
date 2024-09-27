@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Users</h1>

        <md-filled-tonal-button style="margin-bottom: 10px" href="{{ route('users.create') }}">Create New User</md-filled-tonal-button>

        @if(session('success'))
            <div class="alert 
                {{ session('success') === 'User created successfully' || session('success') === 'User updated successfully' ? 'alert-success' : 'alert-danger' }} 
                alert-dismissible fade show" role="alert">
                <strong>&#10004; {{ session('success') === 'User created successfully' ? 'Success:' : (session('success') === 'User updated successfully' ? 'Updated:' : 'Deleted:') }}</strong> 
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <script>
                // Automatically close the alert after 2 seconds
                setTimeout(function() {
                    $('.alert').alert('close');
                }, 2000);
            </script>
        @endif

        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Area</th>
                    <th>Project</th>
                    <th>Vendor</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->type }}</td>
                        <td>{{ $user->area }}</td>
                        <td>{{ $user->project }}</td>
                        <td>{{ $user->vendor }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    
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
                    { orderable: false, targets: [6] } // Disable ordering on the Actions column
                ]
            });
        });
    </script>
@endsection
