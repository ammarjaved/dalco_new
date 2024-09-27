@extends('layouts.admin')


<style>


.user-container{
    border-radius: 25px;
  background: #ffffff;
  padding: 20px;
  width:auto ;
  height: auto;
  
}
md-outlined-text-field{
    max-width: 500px;
    min-width: 500px;
    margin-top: 10px;
    margin-bottom: 10px;
}
md-outlined-select{

    max-width: 500px;
    min-width: 500px;
    margin-top: 10px;
    margin-bottom: 10px;

}


</style>

@section('content')
<div class="container user-container" style="height: auto; width: auto;" >
    <div class="row">
        <div class="col-md-4" style="float:none;margin:auto;">
    <h1>Create New User</h1>

        </div>
    </div>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row">
          

               
        </div>

        <div class="row">
        <div class="col-md-4" style="float:none;margin:auto;">
            <md-outlined-text-field label="Name" type="text"  id="name" name="name" required/>

       </div>

        </div>



        <div class="row">
            <div class="col-md-4" style="float:none;margin:auto;">

                <md-outlined-text-field label="Email" type="email"  id="email" name="email" required/>
    
           </div>
    
            </div>





            <div class="row">
                <div class="col-md-4" style="float:none;margin:auto;">

                    <md-outlined-text-field  label="Password" type="password"  id="password" name="password" required>
        
               </div>
        
                </div>




                <div class="row">
                    <div class="col-md-4" style="float:none;margin:auto;">

                        <md-outlined-select  label="Type" type="text"  id="type" name="type" required>

                            <md-select-option value="true">True</md-select-option>
                            <md-select-option value="false">False</md-select-option>

                        </md-outlined-select>

            
                   </div>
            
                    </div>




                    <div class="row">
                        <div class="col-md-4" style="float:none;margin:auto;">

                            <md-outlined-select label="Area"  id="area" name="area" required  onchange="updateProjectAndCompany()">

                                <md-select-option value="KL">KL</md-select-option>
                                <md-select-option value="JOHOR">Johor</md-select-option>

                            </md-outlined-select>

                
                       </div>
                
                        </div>





                        <div class="row">
                            <div class="col-md-4" style="float:none;margin:auto;">

                                <md-outlined-select label="Project"  id="project" name="project" required  onchange="updateCompany()">


                                </md-outlined-select>
                    
                           </div>
                    
                            </div>


                            <div class="row">
                                <div class="col-md-4" style="float:none;margin:auto;">
    
                                    <md-outlined-select label="vendor"  id="vendor" name="vendor" required>


                                    </md-outlined-select>
                        
                               </div>
                        
                                </div>

        
        <div class="row">
            <div class="col-md-4" style="float:none;margin:auto;">

        <md-filled-tonal-button type="submit">Create</md-filled-tonal-button>
            </div>
        </div>
    </form>
</div>


<script>
    function updateProjectAndCompany() {
       
        const area = document.getElementById('area').value;
        const project = document.getElementById('project');
        const company = document.getElementById('vendor');

        

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
        const company = document.getElementById('vendor');

        

        if (project === 'AERO-JOHOR') {
            company.innerHTML = '<md-select-option selected  value="Aerosynergy Solutions Sdn. Bhd">Aerosynergy Solutions Sdn. Bhd</md-select-option>';
            company.value = 'Aerosynergy Solutions Sdn. Bhd';
        } else if (project === 'ARAS-JOHOR') {
            company.innerHTML = '<md-select-option selected value="ARAS KEJURUTERAAN SDN. Bhd">ARAS KEJURUTERAAN SDN. Bhd</md-select-option>';
            company.value = 'ARAS KEJURUTERAAN SDN. Bhd';
        }
    }
</script>
@endsection
