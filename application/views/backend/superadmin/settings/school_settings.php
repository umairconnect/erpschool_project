<?php $school_data = $this->settings_model->get_current_school_data(); 
$district = $this->db->get('districts')->result_array(); 

$query = $this->db->select('UF')->distinct('UF')->from('districts')->get(); 
$UF = $query->result_array();

$query1 = $this->db->select('DDD')->distinct('DDD')->from('ddd')->order_by('DDD','asc')->get();
$ddd = $query1->result_array();
?>
<div class="row justify-content-md-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="col-12 schoolForm" action="<?php echo route('school_settings/update') ;?>" id = "schoolForm">
                        <div class="col-12">
                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-4 mb-1">                                
                                    <label  for="school_code"><b>2- School Code</b></label>
                                    <input type="number" id="school_code" name="school_code" class="form-control"  value="" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-group col-lg-4 mb-1">
                                    <label  for="op_status"><b>3- Operating Status<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <select type="text" id="op_status" name="op_status" class="form-control"  value="" >
                                        <option value="">None</option>
                                        <option value="1">In activity</option>
                                        <option value="2">Paralyzed</option>
                                        <option value="3">Extinct</option>
                                    </select>
                                </div>                            
                                <div class="form-group col-lg-4 mb-1">
                                    <label  for="date_start"><b>4- Acedamic year-Start:</b></label>
                                    <input type="date" id="date_start" name="date_start" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-4 mb-1">
                                    <label  for="date_end"><b>5- School year-End(forecast):</b></label>
                                    <input type="date" id="date_end" name="date_end" class="form-control"  value="" >
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="school_name"><b>6- Name of the School<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <input type="text" id="school_name" name="school_name" class="form-control"  value="" >
                                </div>
                            </div>                          

                            <div class="form-group row">
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="cep"><b>7- CEP<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <input type="text" id="cep" name="cep" class="form-control"  value="" >
                                </div>                                 
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="uf"><b>UF</b></label>
                                    <select type="text" id="uf" name="uf" class="form-control">
                                        <option value="">Select</option>
                                        <?php foreach($UF as $uf){?>
                                            <option value="<?php echo $uf['UF']; ?>"><?php echo $uf['UF']; ?></option>
                                        <?php } ?>
                                    </select>                                    
                                </div>                            
                                <div class="form-group col-lg-4 mb-1">
                                    <label  for="municipality"><b>8- Municipality</b></label>
                                    <select type="text" id="municipality" name="municipality" class="form-control chosen">
                                        <option value="">Select</option>
                                        <?php foreach($district as $dist){?>
                                            <option value="<?php echo $dist['district_name']; ?>"><?php echo $dist['district_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4 mb-1">
                                    <label  for="district"><b>9- District<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <input type="text" id="district" name="district" class="form-control"  value="" >
                                </div>
                            </div>

                            <div class="form-group row">                      
                                <div class="form-group col-lg-9 mb-1">
                                    <label  for="address"><b>10- Address<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <input type="text" id="address" name="address" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-3 mb-1">
                                    <label  for="number"><b>11- Number</b></label>
                                    <input type="text" id="number" name="number" class="form-control"  value="" >
                                </div>
                            </div>

                            <div class="form-group row">                      
                                <div class="form-group col-lg-6 mb-1">
                                    <label  for="complement"><b>12- Complement</b></label>
                                    <input type="text" id="complement" name="complement" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-6 mb-1">
                                    <label  for="neighbour"><b>13- Neighbourhood<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <input type="text" id="neighbour" name="neighbour" class="form-control"  value="" >
                                </div>
                            </div>

                            <h5 class="mb-1">Geographical Location</h5>
                            <div class="form-group row">                      
                                <div class="form-group col-lg-3 mb-1">
                                    <label  for="lat"><b>Latitude:</b></label>
                                    <input type="text" id="lat" name="lat" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-3 mb-1">
                                    <label  for="long"><b>Longitude:</b></label>
                                    <input type="text" id="long" name="long" class="form-control"  value="" >
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="form-group col-lg-3 mb-1">
                                    <label  for="ddd"><b>14- DDD</b></label>
                                    <select type="text" id="ddd" name="ddd" class="form-control" >
                                            <option value="">Select</option>
                                        <?php foreach($ddd as $dd){?>
                                            <option value="<?php echo $dd['DDD']; ?>"><?php echo $dd['DDD']; ?></option>
                                        <?php } ?> 
                                    </select>                                           
                                </div>                                 
                                <div class="form-group col-lg-4 mb-1">
                                    <label  for="phone"><b>15- Telephone<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <input type="text" id="phone" name="phone" class="form-control"  value="" >
                                </div>                            
                                <div class="form-group col-lg-5 mb-1">
                                    <label  for="phone1"><b>16- Another Contact Phone</b></label>
                                    <input type="text" id="phone1" name="phone1" class="form-control"  value="" >
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-7 mb-1">                                
                                    <label  for="email"><b>17- School email address</b></label>
                                    <input type="email" id="email" name="email" class="form-control"  value="" >
                                </div>
                            </div>


                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="teaching_body"><b>18- Regional teaching body</b></label>
                                    <input type="text" id="teaching_body" name="teaching_body" class="form-control"  value="" >
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="location"><b>19- Location / School area<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <select type="text" id="location" name="location" class="form-control"  value="" >
                                        <option value="1">Urban</option>
                                        <option value="2">Rural</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="location1"><b>20- Differentiated location of the school<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <select type="text" id="location1" name="location1" class="form-control" >
                                        <option value="">None</option>
                                        <option value="1">Settlement area</option>
                                        <option value="2">Indigenous land</option>
                                        <option value="3">Area where remnant quilombos community is located</option>
                                        <option value="7">Not in a different location area</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="admin"><b>21- Administrative dependency<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <select type="text" id="admin" name="admin" class="form-control">
                                        <option value="">None</option>
                                        <option value="1">Federal</option>
                                        <option value="2">State</option>
                                        <option value="3">Municipal</option>
                                        <option value="4">Private</option>
                                    </select>                                    
                                </div>
                            </div>                 

                            <div class="form-group row">
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="entity"><b>Superior entity<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <input type="text" id="entity" name="entity" class="form-control"  value="" >
                                </div>
                            </div>
                        
                            <h5>agency to which the public school is linked (tick more than one option if applicable)</h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="agency[]" type="checkbox" value="22">
                                        22 - Secretariat of Education / Ministry of Education
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="agency[]" type="checkbox" value="23">
                                        23 - Secretariat of Public Security / Armed Forces / Military
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="agency[]" type="checkbox" value="24">
                                        24 - Secretariat of Health / Ministry of Health
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="agency[]" type="checkbox" value="25">
                                        25 - Another public administration body
                                    </label>
                                </div>
                            </div>                  

                            <div class="form-group row">
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="school_cat"><b>32 - Private school category</b></label>
                                    <input type="text" id="school_cat" name="school_cat" class="form-control"  value="" >
                                </div>
                            </div>
                            
                            <h5><b>33 - Agreed with the public authorities<b></h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input agreed_pub" name="agreed_pub" type="checkbox" value="33">
                                        Municipal 
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input agreed_pub" name="agreed_pub" type="checkbox" value="34">
                                        State
                                    </label>
                                </div>
                            </div>  

                            <h5>Maintainer of the private school (check more than one option, if applicable)</h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input private_school" name="private_school[]" type="checkbox" value="26">
                                        26 - Private sector company or business group or individual.
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input private_school" name="private_school[]" type="checkbox" value="27">
                                        27 - Unions of workers or employers, associations, cooperatives.
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input private_school" name="private_school[]" type="checkbox" value="28">
                                        28 - Non-governmental organization (NGO) - international or national.
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input private_school" name="private_school[]" type="checkbox" value="29">
                                        29 - Non-profit institution.
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input private_school" name="private_school[]" type="checkbox" value="30">
                                        30 - S System (Sesi, Senai, Sesc, others)
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input private_school" name="private_school[]" type="checkbox" value="31">
                                        31 - Public interest civil society organization (Oscip)
                                    </label>
                                </div>                                
                            </div>   


                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="CNPJ_sponsor"><b>34 - CNPJ of the main sponsor of the private school</b></label>
                                    <input type="text" id="CNPJ_sponsor" name="CNPJ_sponsor" class="form-control"  value="" >
                                </div>
                            </div>
                            
                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="CNPJ_number"><b>35 - CNPJ number of the private school</b></label>
                                    <input type="text" id="CNPJ_number" name="CNPJ_number" class="form-control" >
                                </div>
                            </div>                 

                            <div class="form-group row">
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="auth_body"><b>36 - Regulation / Authorization in the municipal, state or federal education council or body</b></label>
                                    <select type="text" id="auth_body" name="auth_body" class="form-control" >
                                        <option value="">None</option>
                                        <option value="1">No</option>
                                        <option value="2">Yes</option>
                                        <option value="3">Inprogress</option>
                                    </select>
                                </div>
                            </div>

                            <h5>Administrative sphere of the board or body responsible for Regulation / Authorization  <span style="color:red; font-weight:900; font-size:15px;">*</span></h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="admin_auth[]" type="checkbox" value="37">
                                        37 - Federal 
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="admin_auth[]" type="checkbox" value="38">
                                        38 - State 
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="admin_auth[]" type="checkbox" value="39">
                                        39 - Municipal
                                    </label>
                                </div>
                            </div>

                            <h5>40 -  Unit linked to the Basic Education School or Offering Unit for Higher Education.<span style="color:red; font-weight:900; font-size:15px;">*</span></h5>
                            <div class="form-check form-check-radio">
                                <div class="form-group col-lg-12 mb-1">                             
                                    <label class="form-check-label">
                                        <input class="form-check-input linked_unit" type="radio" name="linked_unit" id="exampleRadios1" value="0">
                                        Not linked to another institution
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1">
                                    <label class="form-check-label">
                                        <input class="form-check-input linked_unit" type="radio" name="linked_unit" id="exampleRadios2" value="1">
                                        Unit linked to a basic education school
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>   
                                <div class="form-group col-lg-12 mb-1">
                                    <label class="form-check-label">
                                        <input class="form-check-input linked_unit" type="radio" name="linked_unit" id="exampleRadios3" value="2">
                                        Unit offering higher education
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>                                                                
                            </div>

                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="hq_code"><b>41 - Headquarters school code</b></label>
                                    <input type="number" id="hq_code" name="hq_code" class="form-control" >
                                </div>
                            </div>                 

                            <div class="form-group row">
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="ies_code"><b>42 - IES Code</b></label>
                                    <input type="number" id="ies_code" name="ies_code" class="form-control">
                                </div>
                            </div>
                                                        
                        </div>
                    

                </div> <!-- end card body-->
            </div> <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="">
                                <input type="reset" class="btn btn-warning float-left col-xl-3 col-lg-3 col-md-12 col-sm-12" value="Cancel">
                            </div>
                            <div class="">
                                <input type="submit" class="btn btn-success float-right col-xl-3 col-lg-3 col-md-12 col-sm-12" value="Submit"  onclick="updateSchoolInfo()">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
