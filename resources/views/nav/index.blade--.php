<nav class="main-header navbar navbar-expand navbar-light d-flex justify-content-between"
    style="background-color: #558772;margin-left:1px;">
    
    <!-- Left navbar links -->


    <ul class="navbar-nav">
        
        <li class="nav-item   d-sm-inline-block">
            <img src="{{ asset('assets/web-images/main-logo.png') }}" height="35" alt="">
</li>
    </ul>

    <div style="margin-left:20px; !important">
    <x-dropdown  width="48">
            <x-slot name="trigger">
                <button
                    class="inline-flex items-center  border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#558772] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div>Material Selection</div>

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
                <x-dropdown-link :href="route('material-selection.index',['id' => $id])">
                    Add  Material
                </x-dropdown-link>                

                <x-dropdown-link :href="route('material-selection.show',['id' => $id])">
                    view Material
                </x-dropdown-link>                
            </x-slot>

        </x-dropdown>   
</div>

<div style="margin-left:20px; !important">
    <x-dropdown  width="48">
            <x-slot name="trigger">
                <button
                    class="inline-flex items-center  border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#558772] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div>Pre-Cabling</div>

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
            @if ($survey->PreCabling)
                <x-dropdown-link :href="route('pre-cabling.edit',$survey->PreCabling->site_survey_id)">
                    Edit piw
                </x-dropdown-link>  
            @else    
                 <x-dropdown-link :href="route('pre-cabling-piw.create',['id' => $id])">
                    Add piw
                </x-dropdown-link> 
            @endif    
         

                <x-dropdown-link :href="route('pre-cabling-shut-down.create',['id' => $id])">
                   Pre-ShutDown
                </x-dropdown-link>   
                
                <x-dropdown-link :href="route('pre-cabling-attachment.index',['id' => $id])">
                   PreCabling Attachments
                </x-dropdown-link>  
                
                <x-dropdown-link :href="route('pre-cabling-image.index',['id' => $id])">
                PreCabling Images
                </x-dropdown-link>  

                <x-dropdown-link :href="route('PreCabling.toolboxtalk',['id' => $id])">
                Toolbox Talk
                </x-dropdown-link>   
            </x-slot>

        </x-dropdown>   
</div>

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
                {{-- <x-dropdown-link :href="route('profile.edit',{{$id}})">
                    {{ __('Profile') }}
                </x-dropdown-link> --}}

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
