<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/chosen_style.css">
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/select2.min.css"> -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/choosen.js"></script>
<style>
.error {
  color: #F00;
  background-color: #FFF;
}
</style>
<?php $school_data = $this->settings_model->get_current_school_data(); 
$municipility = $this->db->get('municipalities')->result_array(); 

$query = $this->db->select('UF')
->distinct('UF')
->from('municipalities')
->get(); 
$UF = $query->result_array();
$countries = $this->db->get('countries')->result_array();
?>

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
            <i class="mdi mdi-book-open-page-variant title_icon"></i> School Director
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body class_content">
            <form method="POST" class="d-block directorSignup" action="<?php echo route('director_signup/insert'); ?>">
            <div class="col-12">
                    <input type="hidden" name="record_type" value="30">
                    <!-- <input type="hidden" name="school_id" value="<?php echo school_id(); ?>"> -->
                    <div class="form-group row">
                        <div class="form-group col-lg-4 mb-1">
                            <label  for="school_id"><b>2 - School code - Inep<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                            <input type="text" id="school_id" name="school_id" class="form-control"  value="<?php echo $school_data['2_schools'];?>" readonly>
                                <!-- <option value="00000000">No</option>
                                <option value="11111111">Yes</option>
                            </select> -->
                        </div>    
                        <div class="form-group col-lg-4 mb-1">
                            <label  for="teacher_3"><b>3 - Individuals' code in their own system</b></label>
                            <input type="numeric" id="teacher_3" name="teacher_3" class="form-control school_code"  value="Director" readonly>
                        </div>
                        <div class="form-group col-lg-4 mb-1">
                            <label  for="teacher_4"><b>4 - Unique identification (Inep)</b></label>
                            <input type="numeric" id="teacher_4" name="teacher_4" class="form-control school_code"  value="" >
                        </div>                                                 
                    </div>
                  
                    <div class="form-group row">
                        <div class="form-group col-lg-3">
                            <label for="teacher_5">5 - CPF number</label>
                            <input type="numeric" class="form-control" id="teacher_5" name="teacher_5" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-lg-12">
                            <label for="teacher_6">6 - Full name </label>
                            <input type="text" class="form-control" id="teacher_6" name="teacher_6" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-lg-3"> 
                            <label for="teacher_7">7 - Date of Birth</label>
                            <input class="form-control" name="teacher_7" id="teacher_7" type="date" value="">
                        </div>  
                        
                        <div class="form-group col-lg-4"> 
                            <label for="teacher_8">8 - Affiliation</label>
                            <select type="text" id="teacher_8" name="teacher_8" class="form-control"  value="" >
                                <option value="">None</option>
                                <option value="0">Undeclared / Ignored</option>
                                <option value="1">Affiliation 1 and / or Affiliation 2.</option>
                            </select>
                        </div> 
                    </div>

                    <div class="form-group row mb-1">
                        <div class="form-group col-lg-6 mb-1">                                
                            <label  for="teacher_9"><b>9 - Affiliation 1 (preferably the mother's name)</b></label>
                            <input type="numeric" id="teacher_9" name="teacher_9" class="form-control"  value="" >
                        </div>
                        <div class="form-group col-lg-6 mb-1">
                            <label  for="teacher_10"><b>10 - Affiliation 2 (preferably the name of the father)</b></label>
                            <input type="numeric" id="teacher_10" name="teacher_10" class="form-control"  value="" >
                        </div>                    

                    </div>

                    <div class="form-group row">
                        <div class="form-group col-lg-3"> 
                            <label for="teacher_11">11 - Sex</label>
                            <select type="text" id="teacher_11" name="teacher_11" class="form-control"  value="" >
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>  
                        
                        <div class="form-group col-lg-3"> 
                            <label for="teacher_12">12 - Color / Race</label>
                            <select type="text" id="teacher_12" name="teacher_12" class="form-control"  value="" >
                                <option value="">None</option>
                                <option value="0">Undeclared</option>
                                <option value="1">White</option>
                                <option value="2">Black</option>
                                <option value="3">Brown</option>
                                <option value="4">Yellow</option>
                                <option value="5">Indigenous</option>                                                                
                            </select>
                        </div> 
                    </div>       

                    <div class="form-group row">
                        <div class="form-group col-lg-5"> 
                            <label for="teacher_13">13 - Nationality</label>
                            <select type="text" id="teacher_13" name="teacher_13" class="form-control"  value="" >
                                <option value="1">Brazilian</option>
                                <option value="2">Brazilian - born abroad or Naturalized</option>
                                <option value="3">Foreigner</option>
                            </select>
                        </div>  
                        
                        <div class="form-group col-lg-4 "> 
                            <label for="teacher_14">14 - Country of nationality</label>
                            <select type="text" id="teacher_14" name="teacher_14" class="form-control chosen"  value="" >
                                <?php foreach($countries as $country){?>
                                    <option value="<?php echo $country['country_name']; ?>"><?php echo $country['country_name']; ?></option>
                                <?php } ?>                           
                            </select>                                
                        </div> 
                    </div>                                  

                    <div class="form-group row">
                        <div class="form-group col-lg-4"> 
                            <label for="teacher_15a">Birth UF</label>
                            <select type="text" id="teacher_15a" name="teacher_15a" class="form-control"  value="" >
                                <?php foreach($UF as $uf){?>
                                    <option value="<?php echo $uf['UF']; ?>"><?php echo $uf['UF']; ?></option>
                                <?php } ?>                           
                            </select>
                        </div>  
                        
                        <div class="form-group col-lg-5"> 
                            <label for="teacher_15">15 - City of Birth</label>
                            <select type="text" id="teacher_15" name="teacher_15" class="form-control chosen"  value="" >
                                <?php foreach($municipility as $mun){?>
                                    <option value="<?php echo $mun['country_name']; ?>"><?php echo $mun['country_name']; ?></option>
                                <?php } ?> 
                            </select>  
                            </select>
                        </div>  
                    </div>    

                    <hr>
                    <h5>16 - Individuals with disabilities, autism spectrum disorder or high abilities / giftedness</h5>

                    <div class="form-check form-check-radio">
                        <div class="form-group col-lg-12 mb-1">                             
                            <label class="form-check-label">
                                <input class="form-check-input teacher_16" type="radio" name="teacher_16" id="teacher_16a" value="1">
                                Yes
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1">
                            <label class="form-check-label">
                                <input class="form-check-input teacher_16" type="radio" name="teacher_16" id="teacher_16b" value="0">
                                No
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>                                                                 
                    </div>                    
                    <hr>
                    <h5 class="teacher_17div">Type of disability, autism spectrum disorder and high skills / giftedness.</h5>
                    <div class="form-group form-check row teacher_17div">
                            <label class="checkbox-inline col-lg-4">
                                <input class="form-check-input teacher_17" name="teacher_17[]" id="teacher_17" type="checkbox" value="Blindness">
                                17 - Blindness
                            </label>
                            <label class="checkbox-inline col-lg-4">
                                <input class="form-check-input teacher_17" name="teacher_17[]" type="checkbox" value="Low vision">
                                18 - Low vision
                            </label>                   
                            <label class="checkbox-inline col-lg-4">
                                <input class="form-check-input teacher_17" name="teacher_17[]" type="checkbox" value="Deafness">
                                19 - Deafness
                            </label>
                            <label class="checkbox-inline col-lg-4">
                                <input class="form-check-input teacher_17" name="teacher_17[]" type="checkbox" value="Hearing deficiency">
                                20 - Hearing deficiency
                            </label>
                            <label class="checkbox-inline col-lg-4">
                                <input class="form-check-input teacher_17" name="teacher_17[]" type="checkbox" value="Deafblindness">
                                21 - Deafblindness
                            </label>
                            <label class="checkbox-inline col-lg-4">
                                <input class="form-check-input teacher_17" name="teacher_17[]" type="checkbox" value="Physical disability">
                                22 - Physical disability
                            </label>
                            <label class="checkbox-inline col-lg-4">
                                <input class="form-check-input teacher_17" name="teacher_17[]" type="checkbox" value="Intellectual disability">
                                23 - Intellectual disability
                            </label>     
                            <label class="checkbox-inline col-lg-4">
                                <input class="form-check-input teacher_17" name="teacher_17[]" type="checkbox" value="Multiple disability">
                                24 - Multiple disability
                            </label>
                            <label class="checkbox-inline col-lg-4">
                                <input class="form-check-input teacher_17" name="teacher_17[]" type="checkbox" value="Autism spectrum disorder">
                                25 - Autism spectrum disorder
                            </label>
                            <label class="checkbox-inline col-lg-4">
                                <input class="form-check-input teacher_17" name="teacher_17[]" type="checkbox" value="High skills / giftedness">
                                26 - High skills / giftedness
                            </label>                                                                                                      
                    </div>          
                    <h5 class="teacher_27div">Resources for teacher use and participation in Inep (Saeb) assessments</h5>
                    <div class="form-check teacher_27div">
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input teacher_27" name="teacher_27[]" id="subject_" type="checkbox" value="Reading aid">
                                27 - Reading aid
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input teacher_27" name="teacher_27[]" type="checkbox" value="Transcription assistance">
                                28 - Transcription assistance
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input teacher_27" name="teacher_27[]" type="checkbox" value="Interpreter guide">
                                29 - Interpreter guide
                            </label>
                        </div>      
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input teacher_27" name="teacher_27[]" type="checkbox" value="Pound Translator-Interpreter">
                                30 - Pound Translator-Interpreter
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input teacher_27" name="teacher_27[]" type="checkbox" value="Lip reading">
                                31 - Lip reading
                            </label>                                                                                  
                        </div>  
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input teacher_27" name="teacher_27[]" type="checkbox" value="Extended Proof">
                                32 - Extended Proof (Source 18)
                            </label>
                        </div>      
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input teacher_27" name="teacher_27[]" type="checkbox" value="Over-magnified proof">
                                33 - Over-magnified proof (Source 24)
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input teacher_27" name="teacher_27[]" type="checkbox" value="CD with audio for the visually impaired">
                                34 - CD with audio for the visually impaired
                            </label>                                                                                  
                        </div>              
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input teacher_27" name="teacher_27[]" type="checkbox" value="Portuguese Language Test">
                                35 -  Portuguese Language Test as a Second Language for the Deaf and Hearing Impaired
                            </label>
                        </div>      
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input teacher_27" name="teacher_27[]" type="checkbox" value="Video Test in Pounds">
                                36 - Video Test in Pounds
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input teacher_27" name="teacher_27[]" type="checkbox" value="Didactic material and test in Braille">
                                37 - Didactic material and test in Braille
                            </label>                                                                                  
                        </div>       
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input teacher_27" name="teacher_27[]" type="checkbox" value="none">
                                38 - none
                            </label>                                                                                  
                        </div>                                                       
                    </div>               

                    <div class="form-group row mb-1">
                        <div class="form-group col-lg-5 mb-1">                                
                            <label  for="teacher_40"><b>40 - Birth certificate registration number (new certificate)</b></label>
                            <input type="numeric" id="teacher_40" name="teacher_40" class="form-control"  value="" >
                        </div>
                    </div>

                    <div class="form-group row">                           
                        <div class="form-group col-lg-8"> 
                            <label for="teacher_41">41 - Country of residence</label>
                            <select type="text" id="teacher_41" name="teacher_41" class="form-control"  value="" >
                                <option value="">None</option>
                                <option value="32">Argentina</option>
                                <option value="68">Bolivia</option>
                                <option value="76">Brazil</option>
                                <option value="170">Colombia</option>
                                <option value="328">Guyana</option>
                                <option value="254">French Guiana</option>
                                <option value="600">Paraguay</option> 
                                <option value="604">Peru</option>
                                <option value="740">Suriname</option>
                                <option value="858">Uruguay</option>
                                <option value="862">Venezuela</option>
                            </select>
                        </div> 
                    </div>
                    <div class="form-group row">   
                        <div class="form-group col-lg-2"> 
                            <label for="teacher_42">42 - CEP</label>
                            <input type="text" id="teacher_42" name="teacher_42" class="form-control"  value="" >                          
                        </div> 
                        <div class="form-group col-lg-2"> 
                            <label for="teacher_39">UF</label>
                            <select type="text" id="teacher_39" name="teacher_39" class="form-control"  value="" >
                                <?php foreach($UF as $uf){?>
                                    <option value="<?php echo $uf['UF']; ?>"><?php echo $uf['UF']; ?></option>
                                <?php } ?>                           
                            </select>                            
                        </div> 
                        <div class="form-group col-lg-4"> 
                            <label for="teacher_43">43 - Municipality of residence</label>
                            <select type="text" id="teacher_43" name="teacher_43" class="form-control chosen" value=""> 
                                <?php foreach($municipility as $mun){?>
                                    <option value="<?php echo $mun['country_name']; ?>"><?php echo $mun['country_name']; ?></option>
                                <?php } ?> 
                            </select>                                                   
                        </div> 
                    </div>

                    <div class="form-group row">   
                        <div class="form-group col-lg-8"> 
                            <label for="teacher_44">44 - Location / Area of ​​residence</label>
                            <select type="text" id="teacher_44" name="teacher_44" class="form-control"  value="" >
                                <option value="">None</option>
                                <option value="1">Urban</option>
                                <option value="2">Rural</option>
                            </select>                            
                        </div> 
                    </div>

                    <div class="form-group row">   
                        <div class="form-group col-lg-8"> 
                            <label for="teacher_45">45 - Differentiated residence location</label>
                            <select type="text" id="teacher_45" name="teacher_45" class="form-control"  value="" >
                                <option value="">None</option>
                                <option value="1">Settlement area</option>
                                <option value="2">Indigenous land</option>
                                <option value="3">Area where remnant quilombos community is located</option>
                                <option value="7">Not in a different location area</option>
                            </select>                            
                        </div> 
                    </div>
                    <div class="form-group row">   
                        <div class="form-group col-lg-8"> 
                            <label for="teacher_46">46 - Higher education level completed</label>
                            <select type="text" id="teacher_46" name="teacher_46" class="form-control"  value="" >
                                <option value="">None</option>
                                <option value="1">Did not finish elementary school</option>
                                <option value="2">Elementary school</option>
                                <option value="6">Higher education</option>
                                <option value="7">High school</option>
                            </select>                            
                        </div> 
                    </div>

                    <div class="form-group row">   
                        <div class="form-group col-lg-8"> 
                            <label for="teacher_47">47 - Type of high school attended</label>
                            <select type="text" id="teacher_47" name="teacher_47" class="form-control"  value="" >
                                <option value="">None</option>
                                <option value="1">General training</option>
                                <option value="2">Normal modality (teaching)</option>
                                <option value="3">Technical course</option>
                                <option value="4">Indigenous teaching - normal modality</option>
                            </select>                            
                        </div> 
                    </div>
                    
                    <hr>
                    <h5><a href="">Higher Courses</a></h5>
                    <div class="modal">
                    <div class="form-group row mb-1">
                        <div class="form-group col-lg-3 offset-lg-1 mb-1">                                
                            <label  for="teacher_48"><b>48 - Course Code 1</b></label>
                            <input type="numeric" id="teacher_48" name="teacher_48" class="form-control"  value="">
                        </div>
                        <div class="form-group col-lg-3 mb-1">
                            <label  for="teacher_49"><b>49 - Completion Year 1</b></label>
                            <input type="numeric" id="teacher_49" name="teacher_49" class="form-control"  value="">
                        </div>
                        <div class="form-group col-lg-4 mb-1">
                            <label  for="teacher_50"><b>50 - Higher education institution 1</b></label>
                            <input type="numeric" id="teacher_50" name="teacher_50" class="form-control"  value="">
                        </div>     
                        <div class="form-group col-lg-3 offset-lg-1 mb-1">                                
                            <label  for="teacher_51"><b>51 - Course Code 2</b></label>
                            <input type="numeric" id="teacher_51" name="teacher_51" class="form-control"  value="">
                        </div>
                        <div class="form-group col-lg-3 mb-1">
                            <label  for="teacher_52"><b>52 - Completion Year 2</b></label>
                            <input type="numeric" id="teacher_52" name="teacher_52" class="form-control"  value="">
                        </div>
                        <div class="form-group col-lg-4 mb-1">
                            <label  for="teacher_53"><b>53 - Higher education institution 2</b></label>
                            <input type="numeric" id="teacher_53" name="teacher_53" class="form-control"  value="">
                        </div>   
                        <div class="form-group col-lg-3 offset-lg-1 mb-1">                                
                            <label  for="teacher_54"><b>54 - Course Code 3</b></label>
                            <input type="numeric" id="teacher_54" name="teacher_54" class="form-control"  value="">
                        </div>
                        <div class="form-group col-lg-3 mb-1">
                            <label  for="teacher_55"><b>55 - Completion Year 3</b></label>
                            <input type="numeric" id="teacher_55" name="teacher_55" class="form-control"  value="">
                        </div>
                        <div class="form-group col-lg-4 mb-1">
                            <label  for="teacher_56"><b>56 - Higher education institution 3</b></label>
                            <input type="numeric" id="teacher_56" name="teacher_56" class="form-control"  value="">
                        </div>                                                                                 
                    </div>   
                    <hr>
                    <h5>Training / Pedagogical Complementation</h5>
                    <div class="form-group row mb-1">
                        <div class="form-group col-lg-4 mb-1">                                
                            <label  for="teacher_57"><b>57 - Knowledge area / curricular components 1</b></label>
                            <input type="numeric" id="teacher_57" name="teacher_57" class="form-control"  value="">
                        </div>
                        <div class="form-group col-lg-4 mb-1">
                            <label  for="teacher_58"><b>58 - Knowledge area / curricular components 2</b></label>
                            <input type="numeric" id="teacher_58" name="teacher_58" class="form-control"  value="">
                        </div>
                        <div class="form-group col-lg-4 mb-1">
                            <label  for="teacher_59"><b>59 - Knowledge area / curricular components 3</b></label>
                            <input type="numeric" id="teacher_59" name="teacher_59" class="form-control"  value="">
                        </div> 
                    </div>
                    
                    </div>
                    <hr>
                    <h5>Completed Post-Graduations</h5>
                    <div class="form-check">
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_60[]" id="teacher_60" type="checkbox" value="Specialization">
                                60 - Specialization
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_60[]" type="checkbox" value="Master's degree">
                                61 - Master's degree
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_60[]" type="checkbox" value="Doctorate degree">
                                62 - Doctorate degree
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_60[]" type="checkbox" value="none">
                                63 - Has no graduate degree completed
                            </label>
                        </div>                        
                    </div>

                    <h5>Other specific courses (Continuing training with a minimum of 80 hours)</h5>
                    <div class="form-check">
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" id="teacher_64" type="checkbox" value="Nursery">
                                64 - Nursery (0 to 3 years)
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="Pre-school">
                                65 - Pre-school (4 and 5 years)
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="Early years of elementary school">
                                66 - Early years of elementary school
                            </label>
                        </div>      
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="Final years of elementary school">
                                67 - Final years of elementary school
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="High school">
                                68 - High school
                            </label>                                                                                  
                        </div>  
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="Youth and adult education">
                                69 - Youth and adult education
                            </label>
                        </div>      
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="Special education">
                                70 - Special education
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="Indigenous Education">
                                71 - Indigenous Education
                            </label>                                                                                  
                        </div>              
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="Countryside education">
                                72 - Countryside education
                            </label>
                        </div>      
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="Environmental education">
                                73 - Environmental education
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="Human rights education">
                                74 - Human rights education
                            </label>                                                                                  
                        </div>       
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="Gender and sexual diversity">
                                75 - Gender and sexual diversity
                            </label>                                                                                  
                        </div>  
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value=" Rights of children and adolescents">
                                76 - Rights of children and adolescents
                            </label>                                                                                  
                        </div>  
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="Education for ethnic-racial relations">
                                77 - Education for ethnic-racial relations and Afro-Brazilian and African history and culture
                            </label>                                                                                  
                        </div> 
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="School management">
                                78 - School management
                            </label>                                                                                  
                        </div> 
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="Others">
                                79 - Others
                            </label>                                                                                  
                        </div> 
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input" name="teacher_64[]" type="checkbox" value="None">
                                80 - None
                            </label>                                                                                  
                        </div>                                                 
                    </div>
                    <hr>
                    <div class="form-group row mb-1">
                        <div class="form-group col-lg-5 mb-1">                                
                            <label  for="teacher_81"><b>81 - E-mail address (e-mail)</b></label>
                            <input type="email" id="teacher_81" name="teacher_81" class="form-control"  value="">
                        </div>
                        <div class="form-group col-lg-5 mb-1">                                
                            <label  for="teacher_82"><b>Password</b></label>
                            <input type="password" id="teacher_82" name="teacher_82" class="form-control"  value="">
                        </div>                        
                    </div>
                </div>
                </div>
                </div>
                <div class="card">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="">
                                <input type="reset" class="btn btn-warning float-left col-xl-3 col-lg-3 col-md-12 col-sm-12" value="Cancel">
                            </div>
                            <div class="">
                                <input type="submit" class="btn btn-success float-right col-xl-3 col-lg-3 col-md-12 col-sm-12" value="<?php echo get_phrase('create_class'); ?>"  onclick="directorSignup()">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            </div>
</div> 
<script type="text/javascript">
$(".chosen").chosen();
</script>
<script>
$(document).ready(function(){

$("#teacher_9").prop("disabled", true ); 
$("#teacher_10").prop("disabled", true );

$("#teacher_8").change(function(){
    if($(this).val() == 1)
    {  
        $("#teacher_9").prop("disabled", false );
        $("#teacher_10").prop("disabled", false );   
    }
    else
    {
        $("#teacher_9").prop("disabled", true ); 
        $("#teacher_10").prop("disabled", true );
    }
});

$("#teacher_15").prop("disabled",true); 

$("#teacher_13").change(function(){
    if($(this).val() == 1)
    {  
        $("#teacher_15").prop("disabled", false );   
    }
    else
    {
        $("#teacher_15").prop("disabled", true );  
    }
});

$(".teacher_17").prop( "disabled", true ); 
    $(".teacher_27").prop( "disabled", true ); 
    $(".teacher_17div").hide(); 
    $(".teacher_27div").hide();   

    $(".teacher_16").change(function(){
        if($(this).val() == 1)
        {  
            $(".teacher_17").prop( "checked", false);
            $(".teacher_17").prop( "disabled", false);   
            $(".teacher_17div").show(); 
        }
        else
        {
            $(".teacher_17").prop( "checked", false);
            $(".teacher_17").prop( "disabled", true );  
            $(".teacher_27").prop( "checked", false);
            $(".teacher_27").prop( "disabled", true ); 
            $(".teacher_17div").hide(); 
            $(".teacher_27div").hide(); 
        }
    });



    $(".teacher_17").change(function() { 
        if($("[name='teacher_17[]']:checked").length > 0)
        {console.log('1');
        // $(".teacher_27").prop( "checked", false);
        $(".teacher_27div").show(); 
        $(".teacher_27").prop( "disabled", false );   
        }
        else
        {
        $(".teacher_27").prop( "checked", false);
        $(".teacher_27").prop( "disabled", true );  
        $(".teacher_27div").hide(); 
        }
    });   

    $(".modal").hide(); 

$("#teacher_45").prop( "disabled", true ); 
$("#teacher_44").prop( "disabled", true ); 

$("#teacher_41").change(function() {
    if($(this).val() == "76")
    {  
    $("#teacher_45").prop( "disabled", false );   
    $("#teacher_44").prop( "disabled", false );     
    }
    else
    {
    $("#teacher_45").prop( "disabled", true );  
    $("#teacher_44").prop( "disabled", true );     
    }
});    
});

function directorSignup(){
    $.validator.addMethod("alphanumeric", function (value, element) {
        return this.optional(element) || /^[\w.]+$/i.test(value);
}, "Special characters not allowed");

$(".directorSignup").validate({        
rules:{
    school_id:{
        required:true,
        // minlength:8, 
        // maxlength:8
    },
    teacher_3:{
        required:true,
        maxlength:20,
        alphanumeric:true,
    },  
    teacher_4:{
        minlength:12, 
        maxlength:12
    },  
    teacher_5:{
        minlength:11, 
        maxlength:11,
        alphanumeric:true,
    },  
    teacher_6:{
        required:true,
        maxlength:100,
        alphanumeric:true,
    },  
    teacher_7:{
        required:true,
        // minlength:8, 
        // maxlength:8
    },  
    // teacher_8:{
    //     required:true,
    //     // minlength:10, 
    //     // maxlength:10
    // },  
    // teacher_9:{
    //     required:true,
    //     // minlength:8, 
    //     // maxlength:8
    // },  
    teacher_10:{
        required:true,
        // minlength:8, 
        // maxlength:8
    },  
    teacher_11:{
        required:true,
        // minlength:8, 
        // maxlength:8
    },                                   
    teacher_12:{
        required:true,
    },  
    teacher_13:{
        required:true,
    },     
    teacher_14:{
        required:true, 
        maxlength:3
    },  
    teacher_15:{
        required:function() {
                    if($("#teacher_13").val()== 1)
                    { console.log($("#teacher_13").val()); }
                  },
        minlength:7, 
        maxlength:7
    },  
    'teacher_16':{
        required:true,
        // minlength:8, 
        // maxlength:8
    },  
    'teacher_17[]':{
        required:function() {
                    if($(".teacher_16").val()== 1)
                    {console.log($(".teacher_13").val());}
                  },
    },  
    'teacher_27[]':{
        required:function() {
                    if($(".teacher_17").is(":checked"))
                    { console.log($(".teacher_17").val()); }
                  },
        // minlength:1, 
        // maxlength:1
    },  
    teacher_40:{ 
        minlength:32, 
        maxlength:32,
        alphanumeric:true,
    },  
    teacher_41:{
        maxlength:3,
    },  
    teacher_43:{
        minlength:7, 
        maxlength:7
    },  
    teacher_44:{ 
        required:function() {
                    if($("#teacher_41").val() == '76')
                    { console.log($("#teacher_41").val()); }
                  },        
        // minlength:32, 
        // maxlength:32,
        // alphanumeric:true,
    },  
    teacher_47:{
        required:function() {
                    if($("#teacher_46").val()== '7') 
                    { console.log($("#teacher_46").val()); }
                  }, 
    },  
    teacher_48:{
        required:function() {
                    if($("#teacher_46").val()== '6')
                    { console.log($("#teacher_46").val()); }
                  }
    },     
    teacher_49:{
        required:function() {
                    if($("#teacher_48").val() != '')
                    { console.log($("#teacher_48").val()); }
                  }, 
    },  
    teacher_50:{
        required:function() {
                    if($("#teacher_48").val() != '')
                    { console.log($("#teacher_48").val()); }
                  }
    },  
    teacher_52:{
        required:function() {
                    if($("#teacher_51").val() != '')
                    {console.log($("#teacher_51").val()); }
                  }, 
    },  
    teacher_53:{
        required:function() {
                    if($("#teacher_51").val() != '')
                    { console.log($("#teacher_51").val()); }
                  }
    },            
    teacher_55:{
        required:function() {
                    if($("#teacher_54").val() != '')
                    { console.log($("#teacher_54").val());}
                  }, 
    },  
    teacher_56:{
        required:function() {
                    if($("#teacher_54").val() != '')
                    { console.log($("#teacher_54").val());}
                  }
    },   
    'teacher_60[]':{
        required:function() {
                    if($("#teacher_46").val() == '6')
                    { console.log($("#teacher_46").val()) ;}
                  }
    },
    'teacher_64[]':{
        required:true,
    },      
    teacher_81:{
        maxlength:100,
    },           
},
messages:{
    school_id:{
        required:"This field is required",
        // minlength:8, 
        // maxlength:8
    },
    teacher_3:{
        required:"This field is required",
        maxlength:"Maximum 12 characters allowed",
        alphanumeric:"Spaces and Special characters not allowed",
    },  
    teacher_4:{
        minlength:"Must be 12 characters", 
        maxlength:"Must be 12 characters"
    },  
    teacher_5:{
        minlength:"Must be 11 characters", 
        maxlength:"Must be 11 characters",
        alphanumeric:"Spaces and Special characters not allowed",
    },  
    teacher_6:{
        required:"This field is required",
        maxlength:"Maximum 100 characters allowed",
        alphanumeric:"Spaces and Special characters not allowed",
    },  
    teacher_7:{
        required:"This field is required",
        // minlength:8, 
        // maxlength:8
    },  
    teacher_8:{
        required:"This field is required",
        // minlength:"Must be 10 characters", 
        // maxlength:"Must be 10 characters"
    },  
    // teacher_9:{
    //     required:"This field is required",
    //     // minlength:8, 
    //     // maxlength:8
    // },  
    // teacher_10:{
    //     required:"This field is required",
    //     // minlength:8, 
    //     // maxlength:8
    // },  
    teacher_11:{
        required:"This field is required",
        // minlength:8, 
        // maxlength:8
    },                                   
    teacher_12:{
        required:"This field is required",
    },  
    teacher_13:{
        required:"This field is required",
    },     
    teacher_14:{
        required:"This field is required", 
        maxlength:"Maximum 3 characters allowed"
    },  
    teacher_15:{
        required:"This field is required",
        minlength:"Must be 7 characters", 
        maxlength:"Must be 7 characters"
    },  
    'teacher_16':{
        required:"This field is required",
        // minlength:8, 
        // maxlength:8
    },  
    'teacher_17[]':{
        required:"This field is required",
    },  
    'teacher_27[]':{
        required:"This field is required",
        // minlength:1, 
        // maxlength:1
    },  
    teacher_40:{ 
        minlength:"Must be 32 characters", 
        maxlength:"Must be 32 characters",
        alphanumeric:"Spaces and Special characters not allowed",
    },  
    teacher_41:{
        maxlength:"Maximum 3 characters allowed",
    },  
    teacher_43:{
        minlength:"Must be 7 characters", 
        maxlength:"Must be 7 characters"
    },  
    teacher_44:{ 
        required:"This field is required",       
        // minlength:"Must be 32 characters", 
        // maxlength:"Must be 32 characters",
        // alphanumeric:"Spaces and Special characters not allowed",
    },  
    teacher_47:{
        required:"This field is required",
    },  
    teacher_48:{
        required:"This field is required",
    },     
    teacher_49:{
        required:"This field is required",
    },  
    teacher_50:{
        required:"This field is required",
    },  
    teacher_52:{
        required:"This field is required", 
    },  
    teacher_53:{
        required:"This field is required",
    },            
    teacher_55:{
        required:"This field is required",
    },  
    teacher_56:{
        required:"This field is required",
    },   
    'teacher_60[]':{
        required:"This field is required",
    },  
    'teacher_64[]':{
        required:"This field is required",
    }, 
    teacher_81:{
        maxlength:"email cannot be more than 100 characters",
    },         
}
}); // Jquery form validation initialization

if($('.directorSignup').valid()) {
  
  $(".directorSignup").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, reload);
  });
}
}
function reload() {
  setTimeout(
    function()
    {
      location.reload();
    }, 1000);
}
function doNothing() {

}
</script>
