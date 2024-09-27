@extends('layouts.admin')

<style>
.user-container {
    border-radius: 25px;
    background: #ffffff;
    padding: 20px;
    width: auto;
    height: auto;
}

md-outlined-text-field,
md-outlined-select {
    max-width: 500px;
    min-width: 500px;
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>

@section('content')
<div class="container user-container" style="height: auto; width: auto;">
    <div class="row">
        <div class="col-md-4" style="float:none;margin:auto;">
            <h1>Edit User</h1>
        </div>
    </div>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-4" style="float:none;margin:auto;">
                <md-outlined-text-field label="Name" type="text" id="name" name="name" value="{{ $user->name }}" required/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4" style="float:none;margin:auto;">
                <md-outlined-text-field label="Email" type="email" id="email" name="email" value="{{ $user->email }}" required/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4" style="float:none;margin:auto;">
                <md-outlined-text-field label="Password (leave blank to keep current password)" type="password" id="password" name="password"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4" style="float:none; margin:auto;">
                <md-outlined-select label="Type" id="type" name="type" required>
                    <md-select-option value="true" {{ $user->type === 'true' ? 'selected' : '' }}>True</md-select-option>
                    <md-select-option value="false" {{ $user->type === 'false' ? 'selected' : '' }}>False</md-select-option>
                </md-outlined-select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4" style="float:none;margin:auto;">
                <md-outlined-select label="Area" id="area" name="area" required onchange="updateProjectAndCompany()">
                    <md-select-option value="KL" {{ $user->area === 'KL' ? 'selected' : '' }}>KL</md-select-option>
                    <md-select-option value="JOHOR" {{ $user->area === 'JOHOR' ? 'selected' : '' }}>Johor</md-select-option>
                </md-outlined-select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4" style="float:none;margin:auto;">
                <md-outlined-select label="Project" id="project" name="project" required onchange="updateCompany()">
                    <!-- Set the current project as selected -->
                    <md-select-option value="{{ $user->project }}" selected>{{ $user->project }}</md-select-option>
                </md-outlined-select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4" style="float:none;margin:auto;">
                <md-outlined-select label="Vendor" id="vendor" name="vendor" required>
                    <!-- Set the current vendor as selected -->
                    <md-select-option value="{{ $user->vendor }}" selected>{{ $user->vendor }}</md-select-option>
                </md-outlined-select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4" style="float:none;margin:auto;">
                <md-filled-tonal-button type="submit">Update</md-filled-tonal-button>
            </div>
        </div>
    </form>
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
