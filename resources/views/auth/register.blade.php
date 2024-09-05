<x-guest-layout>
    <div class="card center">
        <div class="text-center">
            <img src="{{URL::asset('assets/web-images/main-logo.png')}}" alt="" height="60" srcset="" class="" style="height: 60px !important ; margin:5% auto">
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
              
                <md-outlined-text-field  label="Name" id="name" class="form-items block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                
                <md-outlined-text-field label="Email" id="email" class="form-items block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group">
                
                <md-outlined-text-field label="Password" id="password" class="form-items block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
               
                <md-outlined-text-field label="Confirm Password" id="password_confirmation" class="form-items block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Area -->
            <div class="form-group">
                
                <md-outlined-select label="Select Area" id="area" name="area" class="form-items block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required onchange="updateProjectAndCompany()">
                    
                    <md-select-option value="KL">KL</md-select-option>
                    <md-select-option value="JOHOR">Johor</md-select-option>
                </md-outlined-select>
                <x-input-error :messages="$errors->get('area')" class="mt-2" />
            </div>

        

            <!-- Project -->
            <div class="form-group">
              
                <md-outlined-select label="Select Project"  id="project" name="project" class="form-items block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required onchange="updateCompany()">
                   
                
                <x-input-error :messages="$errors->get('project')" class="mt-2" />
            </div>

            <!-- Company -->
            <div class="form-group">
                
                <md-outlined-select label="Select Company" id="company" name="company" class="form-items block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    
                
                <x-input-error :messages="$errors->get('company')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">

               <a>
                <md-text-button class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">

                    {{ __('Already registered') }}
                </md-text-button>

               </a>
               

                <md-filled-tonal-button class="ml-4">
                    {{ __('Register') }}
                </md-filled-tonal-button>
            </div>
        </form>
    </div>

</x-guest-layout>

    <script>
        function updateProjectAndCompany() {
           
            const area = document.getElementById('area').value;
            const project = document.getElementById('project');
            const company = document.getElementById('company');

            

            if (area === 'KL') {
                project.innerHTML = '<md-select-option value="AERO-KL">AERO-KL</md-select-option>';
                company.innerHTML = '<md-select-option value="Aerosynergy Solutions Sdn. Bhd">Aerosynergy Solutions Sdn. Bhd</md-select-option>';

                project.value = 'AERO-KL';
                company.value = 'Aerosynergy Solutions Sdn. Bhd';
            } else if (area === 'JOHOR') {
                project.innerHTML = '<md-select-option value="ARAS-JOHOR">ARAS-JOHOR</md-select-option>';
                project.innerHTML += '<md-select-option value="AERO-JOHOR">AERO-JOHOR</md-select-option>';
            }
        }

        function updateCompany() {
            const project = document.getElementById('project').value;
            const company = document.getElementById('company');

            

            if (project === 'AERO-JOHOR') {
                company.innerHTML = '<md-select-option selected  value="Aerosynergy Solutions Sdn. Bhd">Aerosynergy Solutions Sdn. Bhd</md-select-option>';
                company.value = 'Aerosynergy Solutions Sdn. Bhd';
            } else if (project === 'ARAS-JOHOR') {
                company.innerHTML = '<md-select-option selected value="ARAS KEJURUTERAAN SDN. Bhd">ARAS KEJURUTERAAN SDN. Bhd</md-select-option>';
                company.value = 'ARAS KEJURUTERAAN SDN. Bhd';
            }
        }
    </script>


<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #bb8fce;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        max-width: 500px;
        width: 100%;
        margin: auto;
        color: #f8f9f9;
        padding: 20px;
        border-radius: 15px;
    }

    .form-items{
        max-width:300px;
        min-width: 300px;


    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .text-center {
        text-align: center;
    }

    .center {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: auto;
        padding: 10px;
    }
</style>
