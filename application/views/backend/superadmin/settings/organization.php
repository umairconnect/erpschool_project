<?php $ind_lang = $this->db->get('indigenous_language')->result_array();   ?>
<div class="row justify-content-md-center">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="col-12 descpForm2" action="<?php echo route('organization/update') ;?>" id = "descpForm2">
                        <div class="col-12">
                            <h5>Form (s) of teaching organization</h5>
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="129_desc[]" type="checkbox" value="129">
                                        129 - Series / Year (annual series)
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="129_desc[]" type="checkbox" value="130">
                                        130 - Semiannual periods
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="129_desc[]" type="checkbox" value="131">
                                        131 - Elementary school cycle (s)
                                    </label>
                                </div>       
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="129_desc[]" type="checkbox" value="132">
                                        132 - Non-serial groups based on age or competence (art. 23 LDB)
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="129_desc[]" type="checkbox" value="133">
                                        133 - Modules 
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="129_desc[]" type="checkbox" value="134">
                                        134 - Regular alternation of study periods (pedagogical proposal for alternating training: school-time and community-time)
                                    </label>
                                </div>                                                           
                            </div>  
                            <h5>Instruments, socio-cultural and / or pedagogical materials in use at school for the development of teaching and learning activities</h5>
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="135_desc[]" type="checkbox" value="135">
                                        135 - Multimedia collection
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="135_desc[]" type="checkbox" value="136">
                                        136 - Toys for early childhood education
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="135_desc[]" type="checkbox" value="13">
                                        137 - Set of scientific materials
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="135_desc[]" type="checkbox" value="138">
                                        138 - Equipment for amplification and diffusion of sound / audio
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="135_desc[]" type="checkbox" value="139">
                                        139 - Musical instruments for ensemble, band / fanfare and / or music lessons
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="135_desc[]" type="checkbox" value="140">
                                        140 - Educational games
                                    </label>
                                </div>  
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="135_desc[]" type="checkbox" value="141">
                                        141 - Materials for cultural and artistic activities
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="135_desc[]" type="checkbox" value="142">
                                        142 - Materials for sports and recreation
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="135_desc[]" type="checkbox" value="143">
                                        143 - Teaching materials for indigenous school education
                                    </label>
                                </div>  
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="135_desc[]" type="checkbox" value="144">
                                        144 - Pedagogical materials for the education of ethnic racial relations
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="135_desc[]" type="checkbox" value="145">
                                        145 - Pedagogical materials for rural education
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="135_desc[]" id="146_desc" type="checkbox" value="146">
                                        146 - Indigenous school education
                                    </label>
                                </div>                                                                                                                            
                            </div>

                        <h5>Language in which teaching is taught</h5>
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input 147_desc" name="147_desc[]" id="147_desc" type="checkbox" value="147">
                                        147 - Indigenous language
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input 147_desc" name="147_desc[]" type="checkbox" value="148">
                                        148 - Portuguese language
                                    </label>
                                </div>                                                                                                                            
                            </div>

                            <div class="form-group row mb-1 149_desc_div">
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="149_desc"><b>149- Indigenous language code 1</b></label>
                                    <select type="text" id="149_desc" name="149_desc" class="form-control 149_desc chosen"  value="" >
                                        <?php foreach($ind_lang as $lang){?>
                                        <option value="<?php echo $lang['code']; ?>"><?php echo $lang['language']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="150_desc"><b>150- Indigenous language code 2</b></label>
                                    <select type="text" id="150_desc" name="150_desc" class="form-control 149_desc chosen"  value="" >
                                        <?php foreach($ind_lang as $lang){?>
                                        <option value="<?php echo $lang['code']; ?>"><?php echo $lang['language']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="151_desc"><b>151- Indigenous language code 3</b></label>
                                    <select type="text" id="151_desc" name="151_desc" class="form-control 149_desc chosen"  value="" >
                                        <?php foreach($ind_lang as $lang){?>
                                        <option value="<?php echo $lang['code']; ?>"><?php echo $lang['language']; ?></option>
                                        <?php } ?>
                                    </select>                                    
                                </div>                                                                
                            </div>                            

                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="152_desc"><b>152- The school takes a selection exam for the admission of its students (evaluation by exam and / or curriculum analysis)<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <select type="text" id="152_desc" name="152_desc" class="form-control"  value="" >
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>    

                            <h5>Reservation of vacancies by quota system for specific groups of students</h5>
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="153_desc[]" type="checkbox" value="153">
                                        153 - Self-declared black, brown or indigenous (PPI)
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="153_desc[]" type="checkbox" value="154">
                                        154 - Income condition
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="153_desc[]" type="checkbox" value="155">
                                        155 - From public school
                                    </label>
                                </div>       
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="153_desc[]" type="checkbox" value="156">
                                        156 - Disabled person (PCD)
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="153_desc[]" type="checkbox" value="157">
                                        157 - Groups other than those listed
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="153_desc[]" type="checkbox" value="158">
                                        158 - No quota reservations for quota system (wide competition)
                                    </label>
                                </div>                                                           
                            </div>        

                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="159_desc"><b>159- The school has a website or blog or social media page for institutional communication<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <select type="text" id="159_desc" name="159_desc" class="form-control"  value="" >
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="160_desc"><b>160- The school shares spaces for school-community integration activities<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <select type="text" id="160_desc" name="160_desc" class="form-control"  value="" >
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="161_desc"><b>161- The school uses spaces and equipment from the school environment for regular activities with students<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <select type="text" id="161_desc" name="161_desc" class="form-control"  value="" >
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>     

                            <h5>Collegiate bodies in operation at school</h5>
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="162_desc[]" type="checkbox" value="162">
                                        162 - Parent Association
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="162_desc[]" type="checkbox" value="163">
                                        163 - Parents and Teachers Association
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="162_desc[]" type="checkbox" value="164">
                                        164 - School board
                                    </label>
                                </div>       
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="162_desc[]" type="checkbox" value="165">
                                        165 - Student union
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="162_desc[]" type="checkbox" value="166">
                                        166 - Others
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="162_desc[]" type="checkbox" value="167">
                                        167 - There are no collegiate bodies in operation
                                    </label>
                                </div>                                                           
                            </div>     

                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-12 mb-1">                                
                                    <label  for="168_desc"><b>168- The political pedagogical project or the pedagogical proposal of the school (according to art. 12 of the LDB) was updated in the last 12 months until the reference date<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <select type="text" id="168_desc" name="168_desc" class="form-control"  value="" >
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                        <option value="2">The school does not have a pedagogical political project / pedagogical proposal</option>
                                    </select>
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
                                <input type="reset" class="btn btn-warning float-left col-xl-3 col-lg-3 col-md-12 col-sm-12" value="Cancel" >
                            </div>
                            <div class="">
                                <input type="submit" class="btn btn-success float-right col-xl-3 col-lg-3 col-md-12 col-sm-12" value="Submit"  onclick="updateDescription()">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
    </div>
</div>
