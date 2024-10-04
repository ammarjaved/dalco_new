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
    }

    md-outlined-text-field,
    md-outlined-select {
        width: 100%;
        margin-top: 15px;
        margin-bottom: 15px;
    }

    md-filled-tonal-button {
        width: 100%;
        margin-top: 20px;
    }

    @media (min-width: 768px) {
        md-outlined-text-field,
        md-outlined-select {
            max-width: 500px;
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
        
        <div class="col-md-8 col-lg-6">
          
            <h1>Create New User</h1>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <md-outlined-text-field label="Name" type="text" id="name" name="name" required></md-outlined-text-field>
                <md-outlined-text-field label="Email" type="email" id="email" name="email" required></md-outlined-text-field>
                <md-outlined-text-field label="Password" type="password" id="password" name="password" required></md-outlined-text-field>
                
                <md-outlined-select label="Type" id="type" name="type" required>
                    <md-select-option value="true">True</md-select-option>
                    <md-select-option value="false">False</md-select-option>
                </md-outlined-select>
                
                <md-outlined-select label="Area" id="area" name="area" required onchange="updateProjectAndCompany()">
                    <md-select-option value="KL">KL</md-select-option>
                    <md-select-option value="JOHOR">Johor</md-select-option>
                </md-outlined-select>
                
                <md-outlined-select label="Project" id="project" name="project" required onchange="updateCompany()">
                </md-outlined-select>
                
                <md-outlined-select label="Vendor" id="vendor" name="vendor" required>
                </md-outlined-select>
                
                <md-filled-tonal-button type="submit">Create</md-filled-tonal-button>
            </form>
        </div>
    </div>
</div>

<script>
    function updateProjectAndCompany() {
        const area = document.getElementById('area').value;
        const project = document.getElementById('project');
        const company = document.getElementById('vendor');

        project.innerHTML = '';
        company.innerHTML = '';

        if (area === 'KL') {
            project.innerHTML = '<md-select-option value="AERO-KL">AERO-KL</md-select-option>';
            company.innerHTML = '<md-select-option value="Aerosynergy Solutions Sdn. Bhd">Aerosynergy Solutions Sdn. Bhd</md-select-option>';
        } else if (area === 'JOHOR') {
            project.innerHTML = `
                <md-select-option value="ARAS-JOHOR">ARAS-JOHOR</md-select-option>
                <md-select-option value="AERO-JOHOR">AERO-JOHOR</md-select-option>
            `;
        }

        updateCompany();
    }

    function updateCompany() {
        const project = document.getElementById('project').value;
        const company = document.getElementById('vendor');

        company.innerHTML = '';

        if (project === 'AERO-JOHOR' || project === 'AERO-KL') {
            company.innerHTML = '<md-select-option value="Aerosynergy Solutions Sdn. Bhd">Aerosynergy Solutions Sdn. Bhd</md-select-option>';
        } else if (project === 'ARAS-JOHOR') {
            company.innerHTML = '<md-select-option value="ARAS KEJURUTERAAN SDN. Bhd">ARAS KEJURUTERAAN SDN. Bhd</md-select-option>';
        }
    }

    // Initialize the form
    document.addEventListener('DOMContentLoaded', function() {
        updateProjectAndCompany();
    });
</script>
@endsection