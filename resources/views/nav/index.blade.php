<style>


    .mnb {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 10px;
                margin: 20px 0;
            }
    
    
            .mnb div {
                height: auto;
                width: auto;
                display: flex;
                align-items: center;
                justify-content: center;
              
               
            }
    
    .mnb md-filled-button{
        width: 120px;
    }
    
    
    .topnav {
      background-color: #333;
      height: auto;
      
    
    }
    
    /* Style the links inside the navigation bar */
    
      
        md-filled-tonal-button, md-filled-button {
            --md-sys-color-primary: #D7b4f3;
            --md-sys-color-on-primary: white;
        }
    
        .main-header {
        padding: 10px 15px; /* Adjust padding for spacing */
        display: flex; /* Use flexbox for layout */
        justify-content: space-between; /* Space out logo and buttons */
        align-items: center; /* Center items vertically */
        background-color: #8e44ad; /* Background color */
    }
    
    .nav-logo {
        display: flex;
        align-items: center; /* Center logo and text */
    }
    
    
    .navbar .nav-item {
        margin-right: 40px; /* Reduced space between buttons */
    }
    
    .md-filled-button {
        padding: 6px 10px; /* Adjust button padding */
        font-size: 14px; /* Font size */
    }
    
    .d-flex {
        display: flex; /* Ensure flex display */
        align-items: center; /* Center items vertically */
    }
    
    </style>
    
    

<nav class="main-header topnav navbar navbar-expand navbar-light d-flex justify-content-between" style="background-color: #8e44ad;margin-left:1px;">
    <ul class="navbar-nav">
        <li class="nav-item d-sm-inline-block">
            <img src="{{ asset('assets/web-images/main-logo.png') }}" height="35" alt="">  <span style="color: black">PE: {{ $survey->nama_pe }}</span>
        </li>
    </ul>  

    <div class="mnb" >
        
        
       
        <div>
            <a href="{{ route('delco-summary') }}" style="text-decoration: none;">
            <md-filled-button>
                
                Summary
           
            </md-filled-button>
        </a>
       
        </div>


     

        <div>
            <md-filled-button id="usage-document-anchor6">Site Survey</md-filled-button>
          </div>
              <md-menu positioning="document" id="usage-document6" anchor="usage-document-anchor6">
                 
                 <md-menu-item href="{{ route('site_survey.edit', $survey->id) }}">
                      Edit Site Survey
                  </md-menu-item>
        
                  <md-menu-item href="{{ route('site_survey.show', $survey->id) }}">
                     Show Site Survey
                  </md-menu-item>


                  <md-menu-item href="{{ route('siteFileUploadView.index', ['id' => $survey->id]) }}">
                    Attach Site Suvey Files 
                 </md-menu-item>
                 
              </md-menu>
          <!-- </md-menu-button> -->
        
          <script type="module">
        const anchorEl = document.body.querySelector('#usage-document-anchor6');
        const menuEl = document.body.querySelector('#usage-document6');
        anchorEl.addEventListener('click', () => { menuEl.open = !menuEl.open; });
        </script>
        
        

    <div >
    <md-filled-button id="usage-document-anchor">Material</md-filled-button>
    </div>

    <md-menu positioning="document" id="usage-document" anchor="usage-document-anchor">
        <md-menu-item href="{{ route('material-selection.index', ['id' => $id]) }}">
            Add Material
        </md-menu-item>
    </md-menu>
     
<script type="module">
    const anchorEl = document.body.querySelector('#usage-document-anchor');
    const menuEl = document.body.querySelector('#usage-document');
    anchorEl.addEventListener('click', () => { menuEl.open = !menuEl.open; });
</script>
        <!-- <md-menu-button id="pre-cabling-menu"> -->
        <div>
          <md-filled-button id="usage-document-anchor1">Pre Cabling </md-filled-button>
        </div>
            <md-menu positioning="document" id="usage-document1" anchor="usage-document-anchor1">

                @if ($survey->ToolBoxTalk)
                <md-menu-item href="{{ route('PreCabling.toolboxtalkedit', $survey->ToolBoxTalk->id) }}">
                    Edit Toolbox Talk
                </md-menu-item>
            @else
                <md-menu-item href="{{ route('PreCabling.toolboxtalk', ['id' => $id]) }}">
                    Toolbox Talk
                </md-menu-item>
            @endif

                @if ($survey->PreCabling)
                    <md-menu-item href="{{ route('pre-cabling.edit', $survey->PreCabling->id) }}">
                        Edit PIW
                    </md-menu-item>
                @else
                    <md-menu-item href="{{ route('pre-cabling-piw.create', ['id' => $id]) }}">
                        Add PIW
                    </md-menu-item>
                @endif

                @if ($survey->PreCablingShutDown)
                    <md-menu-item href="{{ route('pre-cabling-shut-down.edit', $survey->PreCablingShutDown->id) }}">
                        Edit Pre-ShutDown
                    </md-menu-item>
                @else
                    <md-menu-item href="{{ route('pre-cabling-shut-down.create', ['id' => $id]) }}">
                        Pre-ShutDown
                    </md-menu-item>
                @endif

                <md-menu-item href="{{ route('pre-cabling-attachment.index', ['id' => $id]) }}">
                    PreCabling Attachments
                </md-menu-item>
                <md-menu-item href="{{ route('pre-cabling-image.index', ['id' => $id]) }}">
                    PreCabling Images
                </md-menu-item>

               
            </md-menu>
        <!-- </md-menu-button> -->

        <script type="module">
    const anchorEl = document.body.querySelector('#usage-document-anchor1');
    const menuEl = document.body.querySelector('#usage-document1');
    anchorEl.addEventListener('click', () => { menuEl.open = !menuEl.open; });
</script>

<div >
    <md-filled-button id="usage-document-anchor2">Shutdown</md-filled-button>
  </div>
      <md-menu positioning="document" id="usage-document2" anchor="usage-document-anchor2">
         
        @if ($survey->toolBoxTalkOutage)
        <md-menu-item href="{{ route('image_shutdown.toolboxtalkedit', $survey->toolBoxTalkOutage->id) }}">
            Edit Toolbox Talk
        </md-menu-item>
    @else
        <md-menu-item href="{{ route('image_shutdown.toolboxtalk', ['id' => $id]) }}">
            Toolbox Talk
        </md-menu-item>
    @endif
         

          <md-menu-item href="{{ route('image-shutdown.create', ['id' => $id]) }}">
              Add Shutdown Images
          </md-menu-item>
           <md-menu-item href="{{ route('image-shutdown-attachment.index', ['id' => $id]) }}">
              Add Shutdown Attachments
          </md-menu-item>

        
      </md-menu>
  <!-- </md-menu-button> -->

  <script type="module">
const anchorEl = document.body.querySelector('#usage-document-anchor2');
const menuEl = document.body.querySelector('#usage-document2');
anchorEl.addEventListener('click', () => { menuEl.open = !menuEl.open; });
</script>


       
<div >
    <md-filled-button id="usage-document-anchor3">SAT</md-filled-button>
  </div>
      <md-menu positioning="document" id="usage-document3" anchor="usage-document-anchor3">

        @if ($survey->ToolBoxTalkSAT)
        <md-menu-item href="{{ route('SAT.toolboxtalkedit', $survey->ToolBoxTalkSAT->id) }}">
            Edit Toolbox Talk
        </md-menu-item>
    @else
        <md-menu-item href="{{ route('SAT.toolboxtalk', ['id' => $id]) }}">
            Toolbox Talk
        </md-menu-item>
    @endif
         
         <md-menu-item href="{{ route('sat.create', ['id' => $id]) }}">
              Add SAT Images
          </md-menu-item>

          <md-menu-item href="{{ route('sat-attachment.index', ['id' => $id]) }}">
              Add SAT Attachments
          </md-menu-item>

    
         
      </md-menu>
  <!-- </md-menu-button> -->

  <script type="module">
const anchorEl = document.body.querySelector('#usage-document-anchor3');
const menuEl = document.body.querySelector('#usage-document3');
anchorEl.addEventListener('click', () => { menuEl.open = !menuEl.open; });
</script>

<div >
    <md-filled-button id="usage-document-anchor4">LKS</md-filled-button>
  </div>
      <md-menu positioning="document" id="usage-document4" anchor="usage-document-anchor4">
         
         <md-menu-item href="{{ route('LKS.index', ['id' => $id]) }}" >
              Show LKS
          </md-menu-item>
         
      </md-menu>
  <!-- </md-menu-button> -->

  <script type="module">
const anchorEl = document.body.querySelector('#usage-document-anchor4');
const menuEl = document.body.querySelector('#usage-document4');
anchorEl.addEventListener('click', () => { menuEl.open = !menuEl.open; });
</script>


<div >
    <md-filled-button id="usage-document-anchor9">Gallery</md-filled-button>
</div>
<md-menu positioning="document" id="usage-document9" anchor="usage-document-anchor9">
    <md-menu-item href="{{ route('sat.gallery', ['id' => $id]) }}">
        Gallery
    </md-menu-item>
</md-menu>

<script type="module">
    const anchorEl = document.body.querySelector('#usage-document-anchor9');
    const menuEl = document.body.querySelector('#usage-document9');
    anchorEl.addEventListener('click', () => { menuEl.open = !menuEl.open; });
</script>



<div >
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

