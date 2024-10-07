@extends('layouts.admin')

<style>
    .user-container {
        border-radius: 15px;
        background: #f8f9fa;
        padding: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        margin-bottom: 20px;
    }

    h1 {
        color: #007bff;
        margin-bottom: 30px;
        text-align: center;
        font-weight: bold;
    }

    md-outlined-text-field,
    md-outlined-select {
        width: 100%;
        max-width: 500px;
        margin: 10px auto;
        
    }

    md-filled-tonal-button {
        width: 100%;
        max-width: 500px;
        margin: 20px auto 0;
       
    }

    .form-row {
        display: flex;
        justify-content: center;
        margin-bottom: 15px;
    }

    @media (max-width: 767px) {
        .user-container {
            padding: 20px;
        }

        md-outlined-text-field,
        md-outlined-select,
        md-filled-tonal-button {
            max-width: 100%;
        }
    }
</style>

@section('content')
<div class="container user-container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-12 col-md-2 mb-2">
                <md-filled-tonal-button href="{{ route('users.index') }}" style="width: 100%;"> 🡸 Dashboard</md-filled-tonal-button>
            </div>
        </div>
        <div class="col-md-8">
            <h1>Edit User</h1>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <md-outlined-text-field label="Name" type="text" id="name" name="name" value="{{ $user->name }}" required></md-outlined-text-field>
                </div>

                <div class="form-row">
                    <md-outlined-text-field label="Email" type="email" id="email" name="email" value="{{ $user->email }}" required></md-outlined-text-field>
                </div>

                <div class="form-row">
                    <md-outlined-text-field label="Password (leave blank to keep current)" type="password" id="password" name="password"></md-outlined-text-field>
                </div>

                

                <div class="form-row">
                    <md-outlined-select label="Area" id="area" name="area" required onchange="updateProjectAndCompany()">
                        <md-select-option value="KL" {{ $user->area === 'KL' ? 'selected' : '' }}>KL</md-select-option>
                        <md-select-option value="JOHOR" {{ $user->area === 'JOHOR' ? 'selected' : '' }}>Johor</md-select-option>
                    </md-outlined-select>
                </div>

                <div class="form-row">
                    <md-outlined-select label="Project" id="project" name="project" required onchange="updateCompany()">
                        <md-select-option value="{{ $user->project }}" selected>{{ $user->project }}</md-select-option>
                    </md-outlined-select>
                </div>

                <div class="form-row">
                    <md-outlined-select label="Vendor" id="vendor" name="vendor" required>
                        <md-select-option value="{{ $user->vendor }}" selected>{{ $user->vendor }}</md-select-option>
                    </md-outlined-select>
                </div>

                <div class="form-row">
                    <md-filled-tonal-button type="submit">Update</md-filled-tonal-button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function updateProjectAndCompany() {
        const area = document.getElementById('area').value;
        const project = document.getElementById('project');
        const vendor = document.getElementById('vendor');

        // Clear existing options
        project.innerHTML = '';
        vendor.innerHTML = '';

        // Update project options based on area
        if (area === 'KL') {
            project.innerHTML += '<md-select-option value="AERO-KL">AERO-KL</md-select-option>';
            project.innerHTML += '<md-select-option value="AERO-JOHOR">AERO-JOHOR</md-select-option>';
            vendor.innerHTML += '<md-select-option value="Aerosynergy Solutions Sdn. Bhd">Aerosynergy Solutions Sdn. Bhd</md-select-option>';
        } else if (area === 'JOHOR') {
            project.innerHTML += '<md-select-option value="ARAS-JOHOR">ARAS-JOHOR</md-select-option>';
            project.innerHTML += '<md-select-option value="AERO-JOHOR">AERO-JOHOR</md-select-option>';
        }

        // Reset selected values based on the user's current project and vendor
        project.value = "{{ $user->project }}";  // Set project to current value
        updateCompany(); // Call updateCompany to reset vendor based on the new project
    }

    function updateCompany() {
        const project = document.getElementById('project').value;
        const vendor = document.getElementById('vendor');

        // Clear existing vendor options
        vendor.innerHTML = '';

        // Update vendor options based on project
        if (project === 'AERO-KL') {
            vendor.innerHTML += '<md-select-option value="Aerosynergy Solutions Sdn. Bhd">Aerosynergy Solutions Sdn. Bhd</md-select-option>';
        } else if (project === 'AERO-JOHOR') {
            vendor.innerHTML += '<md-select-option value="Aerosynergy Solutions Sdn. Bhd">Aerosynergy Solutions Sdn. Bhd</md-select-option>';
        } else if (project === 'ARAS-JOHOR') {
            vendor.innerHTML += '<md-select-option value="ARAS KEJURUTERAAN SDN. Bhd">ARAS KEJURUTERAAN SDN. Bhd</md-select-option>';
        }
        
        // Reset selected value
        vendor.value = vendor.options[0]?.value || ''; // Default to first vendor if available
    }
</script>
@endsection