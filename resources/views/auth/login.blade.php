<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"  />



   <form method="POST" action="{{ route('login') }}">
        @csrf
         <div class="card center">
           
            <div class="text-center">
                <img src="{{URL::asset('assets/web-images/main-logo.png')}}" alt="" height="60" srcset="" class="" style="height: 60px !important ; margin:5% auto">
            </div>
           <!-- Email Address -->
           <div class="form-group">
            <md-outlined-text-field label="Username" type="text" class="block mt-1 w-full" name="name" value="" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        
        <!-- Password -->
        <div class="form-group">
            <md-outlined-text-field label="Password" type="password" id="password" class="block mt-1 w-full"
                                 name="password"
                                 required autocomplete="current-password" 
                                 value=""
                                 />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
 
         <!-- Remember Me -->
         <div class="block mt-4">
            <label for="remember_me" class="checkbox-label">
                <md-checkbox touch-target="wrapper" id="remember_me" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember"></md-checkbox>
                <span class="text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
    
            <div class="flex items-center justify-end mt-4"> 
                @if (Route::has('password.request'))
                   <md-text-button class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password') }}
                    </md-text-button>
                @endif 
                
                <a>
                    <md-text-button class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="">
                        Admin Dashboard
                    </md-text-button>

                </a>    
               
    
                <md-filled-tonal-button>

                {{ __('Log in') }}
                
                </md-filled-tonal-button>
                </div>

         </div>
        
    </form> 

</x-guest-layout>


    <style>
       body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color:#bb8fce;

    }


    .form-group {
        margin-bottom: 20px; /* Adjust the value as needed */
    }
    
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        max-width: 500px;
        width: 100%;
        margin: auto;
        color: #f8f9f9;
        /* optional */
        padding: 20px;
        border-radius: 15px;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .text-center {
        text-align: center;
    }

    .checkbox-label {
        display: flex;
        align-items: center;

    }

    .checkbox-label span {
        margin-left: -9px;
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
      
    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf
       
        <p class="md-typescale-body-medium">Enter Credentials to Login</p>
        <md-outlined-text-field label="Username" type="text" value="" required></md-outlined-text-field>
        <md-outlined-text-field label="Password" type="password" value="" required></md-outlined-text-field>
  
        <md-filled-tonal-button>
          Login
          <svg slot="icon" viewBox="0 0 48 48"><path d="M6 40V8l38 16Zm3-4.65L36.2 24 9 12.5v8.4L21.1 24 9 27Zm0 0V12.5 27Z"/></svg>
        </md-filled-tonal-button>
  
        <md-text-button trailing-icon>
          Register
          <svg slot="icon" viewBox="0 0 48 48"><path d="M9 42q-1.2 0-2.1-.9Q6 40.2 6 39V9q0-1.2.9-2.1Q7.8 6 9 6h13.95v3H9v30h30V25.05h3V39q0 1.2-.9 2.1-.9.9-2.1.9Zm10.1-10.95L17 28.9 36.9 9H25.95V6H42v16.05h-3v-10.9Z"/></svg>
        </md-text-button trailing-icon>
      </form> --}}

