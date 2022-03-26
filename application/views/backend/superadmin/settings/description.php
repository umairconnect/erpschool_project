<div class="row justify-content-md-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="col-12 descpForm1" action="<?php echo route('description/update') ;?>" id = "descpForm1">
                        <div class="col-12">
                        <h5>School operating location (check more than one option if applicable)<span style="color:red; font-weight:900; font-size:15px;">*</span></h5>
                        <input type="hidden" name="record_type" value="10">
                        <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_3[]" id="desc_3" type="checkbox" value="3">
                                        3 - School building
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_3[]" type="checkbox" value="4">
                                        4 - Classroom (s) at another school
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_3[]" type="checkbox" value="5">
                                        5 - Shed / ranch / storeroom
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_3[]" type="checkbox" value="6">
                                        6 - Socio-educational care unit
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_3[]" type="checkbox" value="7">
                                        7 - Prison Unit
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_3[]" type="checkbox" value="8">
                                        8 - Others
                                    </label>
                                </div>                                                                
                            </div> 

                            <div class="form-group row">
                                <div class="form-group col-lg-12 mb-1">
                                    <label  for="desc_9"><b>9- Form of occupation of the building<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <select type="text" id="desc_9" name="desc_9" class="form-control"  value="" >
                                        <option value="">None</option>
                                        <option value="1">Own</option>
                                        <option value="2">Rented</option>
                                        <option value="3">Ceded</option>
                                    </select>
                                </div>                            
                            </div>

                            <div class="form-group row">
                                <div class="form-group col-lg-12 mb-1">
                                    <label  for="desc_10"><b>10- School building shared with another school<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <select type="text" id="desc_10" name="desc_10" class="form-control"  value="" >
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>                            
                            </div>
                            <h5>Code of the school you share with</h5>
                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-2 mb-1">                                
                                    <label  for="desc_11"><b>11 </b></label>
                                    <input type="numeric" id="desc_11" name="desc_11" class="form-control school_code"  value="" >
                                </div>
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="desc_12"><b>12 </b></label>
                                    <input type="numeric" id="desc_12" name="desc_12" class="form-control school_code"  value="" >
                                </div>
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="desc_13"><b>13 </b></label>
                                    <input type="numeric" id="desc_13" name="desc_13" class="form-control school_code"  value="" >
                                </div>     
                                <div class="form-group col-lg-2 mb-1">                                
                                    <label  for="desc_14"><b>14 </b></label>
                                    <input type="numeric" id="desc_14" name="desc_14" class="form-control school_code"  value="" >
                                </div>
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="desc_15"><b>15 </b></label>
                                    <input type="numeric" id="desc_15" name="desc_15" class="form-control school_code"  value="" >
                                </div>
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="desc_16"><b>16 </b></label>
                                    <input type="numeric" id="desc_16" name="desc_16" class="form-control school_code"  value="" >
                                </div>                                                            
                            </div>                          

                            <div class="form-group row">
                                <div class="form-group col-lg-12 mb-1">
                                    <label  for="desc_17"><b>17 Provides drinking water for human consumption<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <select type="text" id="desc_17" name="desc_17" class="form-control"  value="" >
                                        <option value="">None</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>                            
                            </div>

                            <h5>Water supply (check more than one option if applicable)<span style="color:red; font-weight:900; font-size:15px;">*</span></h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_18" name="desc_18[]" id="desc_18" type="checkbox" value="18">
                                        18 - Public network
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_18" name="desc_18[]" id="desc_19" type="checkbox" value="19">
                                        19 - Artesian well
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_18" name="desc_18[]" id="desc_20" type="checkbox" value="20">
                                        20 - Cacimba / cistern / well
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_18" name="desc_18[]" id="desc_21" type="checkbox" value="21">
                                        21 - Source / river / stream
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_18[]" id="desc_22" type="checkbox" value="22">
                                        22 - There is no water supply
                                    </label>
                                </div>                                
                            </div> 

                            <h5>Electric power source (check more than one option if applicable)<span style="color:red; font-weight:900; font-size:15px;">*</span></h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_23" name="desc_23[]" type="checkbox" value="23">
                                        23 - Public network
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_23" name="desc_23[]" type="checkbox" value="24">
                                        24 - Generator powered by fossil fuel
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_23" name="desc_23[]" type="checkbox" value="25">
                                        25 - Renewable or alternative energy sources (biofuel generator and / or biodigestors, wind, solar, others)
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_23[]" id="desc_23" type="checkbox" value="26">
                                        26 - There is no electricity
                                    </label>
                                </div>                              
                            </div> 

                            <h5>Sewerage (check more than one option if applicable)<span style="color:red; font-weight:900; font-size:15px;">*</span></h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_27" name="desc_27[]" type="checkbox" value="27">
                                        27 - Public network
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_27" name="desc_27[]" type="checkbox" value="28">
                                        28 - Septic Tank
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_27" name="desc_27[]" type="checkbox" value="29">
                                        29 - Rudimentary pit / common
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_27[]" id="desc_27"  type="checkbox" value="30">
                                        30 - There is no sanitary sewage
                                    </label>
                                </div>                                
                            </div> 

                            <h5>Waste disposal (check more than one option if applicable)<span style="color:red; font-weight:900; font-size:15px;">*</span></h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_31[]" type="checkbox" value="31">
                                        31 - Pick-up service
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_31[]" type="checkbox" value="32">
                                        32 - Burn
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_31[]" type="checkbox" value="33">
                                        33 - Buries
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_31[]" type="checkbox" value="34">
                                        34 - Leads to a final destination licensed by the government
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_31[]" type="checkbox" value="35">
                                        35 - Discard in another area
                                    </label>
                                </div>                                
                            </div> 

                            <h5>Waste / waste treatment carried out by the school (check more than one option if applicable)<span style="color:red; font-weight:900; font-size:15px;">*</span></h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_36[]" id="desc_36" type="checkbox" value="36">
                                        36 - Separation of garbage / waste
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_36" name="desc_36[]" type="checkbox" value="37">
                                        37 - Reuse
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_36" name="desc_36[]" type="checkbox" value="38">
                                        38 - Recycling
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_36[]" id="desc_39" type="checkbox" value="39">
                                        39 - No Treatment
                                    </label>
                                </div>                           
                            </div> 

                            <h5>Physical facilities existing and used at school (check more than one option if applicable)<span style="color:red; font-weight:900; font-size:15px;">*</span></h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="40">
                                        40 - Warehouse
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="41">
                                        41 - Green area
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="42">
                                        42 - Auditorium
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="43">
                                        43 - WC
                                    </label>
                                </div>   
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="44">
                                        44 - Accessible bathroom suitable for the use of people with disabilities or reduced mobility
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="45">
                                        45 - Bathroom suitable for early childhood education
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="46">
                                        46 - Exclusive bathroom for employees
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="47">
                                        47 - Bathroom or dressing room with shower
                                    </label>
                                </div>   
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="48">
                                        48 - Library
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="49">
                                        49 - Kitchen
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="50">
                                        50 - Pantry
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="51">
                                        51 - Student dormitory
                                    </label>
                                </div>   
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="52">
                                        52 - Teacher dormitory
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="53">
                                        53 - Science lab
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="54">
                                        54 - Computer lab
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="55">
                                        55 - playground
                                    </label>
                                </div>   
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="56">
                                        56 - Covered patio
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="57">
                                        57 - Uncovered patio
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="58">
                                        58 - Pool
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="59">
                                        59 - Indoor sports court
                                    </label>
                                </div>     
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="60">
                                        60 - Outdoor sports court
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="61">
                                        61 - Refectory
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="62">
                                        62 - Student rest room
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="63">
                                        63 - Art room/ studio
                                    </label>
                                </div>   
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="64">
                                        64 - Music room / choir
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="65">
                                        65 - Dance room / studio
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="66">
                                        66 - Multipurpose room (music, dance and arts)
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="67">
                                        67 - Terreirão (area for sports and recreation without cover, without floor and without buildings)
                                    </label>
                                </div>   
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="68">
                                        68 - Nursery / breeding
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="69">
                                        69 - Boardroom
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="70">
                                        70 - Reading room
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="71">
                                        71 - Teachers room
                                    </label>
                                </div>   
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="72">
                                        72 - Multifunctional resource room for specialized educational assistance (AEE)
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="73">
                                        73 - Secretary Room
                                    </label>
                                </div>               
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_40[]" id="desc_74" type="checkbox" value="74">
                                        74 - None of the related dependencies
                                    </label>
                                </div>                                                                                                                                                                                                      
                            </div> 

                            <h5>Accessibility resources for people with disabilities or reduced mobility on internal school traffic routes (check more than one option if applicable)<span style="color:red; font-weight:900; font-size:15px;">*</span></h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_83" name="desc_75[]" type="checkbox" value="75">
                                        75 - Handrail and guardrails
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_83" name="desc_75[]" type="checkbox" value="76">
                                        76 - Elevator
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_83" name="desc_75[]" type="checkbox" value="77">
                                        77 - Tactile floors
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_83" name="desc_75[]" type="checkbox" value="78">
                                        78 - Doors with free span of at least 80 cm
                                    </label>
                                </div>       
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_83" name="desc_75[]" type="checkbox" value="79">
                                        79 - Ramps
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_83" name="desc_75[]" type="checkbox" value="80">
                                        80 - Audible signaling
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_83" name="desc_75[]" type="checkbox" value="81">
                                        81 - Tactile signaling
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_83" name="desc_75[]" type="checkbox" value="82">
                                        82 - Visual signage (floor / walls)
                                    </label>
                                </div>   
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_75[]" id="desc_83" type="checkbox" value="83">
                                        83 - None of the accessibility features listed
                                    </label>
                                </div>                                                                                             
                            </div> 

                            <div class="form-group row">                      
                                <div class="form-group col-lg-6 mb-1">
                                    <label  for="desc_84"><b>84- Number of classrooms used in the school within the school building<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <input type="numeric" id="desc_84" name="desc_84" class="form-control"  value="" >
                                </div>
                            </div>

                            <div class="form-group row">                      
                                <div class="form-group col-lg-6 mb-1">
                                    <label  for="desc_85"><b>85- Number of classrooms used in the school outside the school building<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <input type="numeric" id="desc_85" name="desc_85" class="form-control"  value="" >
                                </div>
                            </div>
                            <div class="form-group row">                      
                                <div class="form-group col-lg-6 mb-1">
                                    <label  for="desc_86"><b>86- Number of air-conditioned classrooms (air conditioning, heating or air conditioning)<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <input type="numeric" id="desc_86" name="desc_86" class="form-control"  value="" >
                                </div>
                            </div>
                            <div class="form-group row">                      
                                <div class="form-group col-lg-6 mb-1">
                                    <label  for="desc_87"><b>87- Number of classrooms with accessibility for people with disabilities or reduced mobility<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <input type="numeric" id="desc_87" name="desc_87" class="form-control"  value="" >
                                </div>
                            </div>

                            <h5>Existing school equipment for technical and administrative use (check more than one option if applicable)<span style="color:red; font-weight:900; font-size:15px;">*</span></h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_88[]" type="checkbox" value="88">
                                        88 - Satellite dish
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_88[]" type="checkbox" value="89">
                                        89 - Computers
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_88[]" type="checkbox" value="90">
                                        90 - Copy machine
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_88[]" type="checkbox" value="91">
                                        91 - Printer
                                    </label>
                                </div>       
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_88[]" type="checkbox" value="92">
                                        92 - Multifunction pritner
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_88[]" type="checkbox" value="93">
                                        93 - Scanner
                                    </label>
                                </div>                                                                                         
                            </div> 

                            <h5 class="mb-1">Quantity of equipment for the teaching-learning process</h5>
                            <div class="form-group row">                      
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="desc_94"><b>94 - DVD / Blu-ray player</b></label>
                                    <input type="text" id="desc_94" name="desc_94" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="desc_95"><b>95 - Stereo</b></label>
                                    <input type="text" id="desc_95" name="desc_95" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="desc_96"><b>96 - Television device</b></label>
                                    <input type="text" id="desc_96" name="desc_96" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="desc_97"><b>97 - Digital board</b></label>
                                    <input type="text" id="desc_97" name="desc_97" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="desc_98"><b>98 - Multimedia Projector (Data show)</b></label>
                                    <input type="text" id="desc_98" name="desc_98" class="form-control"  value="" >
                                </div>                                                              
                            </div>

                            <h5 class="mb-1">Number of computers in use by students</h5>
                            <div class="form-group row">                      
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="desc_99"><b>99 - Desktop computers (desktop)</b></label>
                                    <input type="text" id="desc_99" name="desc_99" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="desc_100"><b>100 - Laptops</b></label>
                                    <input type="text" id="desc_100" name="desc_100" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-2 mb-1">
                                    <label  for="desc_101"><b>101 - Tablets</b></label>
                                    <input type="text" id="desc_101" name="desc_101" class="form-control"  value="" >
                                </div>                                                           
                            </div>

                            <h5>Internet access (check more than one option if applicable)<span style="color:red; font-weight:900; font-size:15px;">*</span></h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_106" name="desc_102[]" type="checkbox" value="102">
                                        102 - For administrative use
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_106" name="desc_102[]" type="checkbox" value="103">
                                        103 - For use in the teaching and learning process
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_106" name="desc_102[]" type="checkbox" value="104">
                                        104 - For Student use 
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input desc_106" name="desc_102[]" type="checkbox" value="105">
                                        105 - For community use
                                    </label>
                                </div>       
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_102[]" id="desc_106" type="checkbox" value="106">
                                        106 - Do not have internet access
                                    </label>
                                </div>                                                                                       
                            </div> 
                            <h5>Equipment that students use to access the school internet (check more than one option if applicable)</h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_107[]" type="checkbox" value="107">
                                        107 - School desktops, laptops and tablets (in the computer lab, library, classroom, etc.)
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_107[]" type="checkbox" value="108">
                                        108 - Personal devices (laptops, cell phones, tablets, etc.)
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_109"><b>109- Broadband Internet</b></label>
                                    <input type="text" id="desc_109" name="desc_109" class="form-control"  value="" >
                                </div>
                            </div>

                            <h5>Local computer interconnection network (check more than one option if applicable)</h5>
                            
                            <div class="form-check">
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_110[]" type="checkbox" value="110">
                                        110 - Cable
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_110[]" type="checkbox" value="111">
                                        111 - Wireless
                                    </label>
                                </div>
                                <div class="form-group col-lg-12 mb-1"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="desc_110[]" type="checkbox" value="112">
                                        112 - There is no local network connecting computers
                                    </label>
                                </div>                                
                            </div>


                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_113"><b>113- Secretarial assistants or administrative assistants, attendants</b></label>
                                    <input type="text" id="desc_113" name="desc_113" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_114"><b>114- General services assistant, concierge, janitor, janitor, horticulturist, gardener</b></label>
                                    <input type="text" id="desc_114" name="desc_114" class="form-control"  value="" >
                                </div>             
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_115"><b>115- Librarian, library assistant or reading room monitor</b></label>
                                    <input type="text" id="desc_115" name="desc_115" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_116"><b>116- Brigadier firefighter, health care professionals (urgency and emergency), nurse, nursing technician and rescuer</b></label>
                                    <input type="text" id="desc_116" name="desc_116" class="form-control"  value="" >
                                </div> 
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_117"><b>117- Shift / disciplinary coordinator</b></label>
                                    <input type="text" id="desc_117" name="desc_117" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_118"><b>118- Speech therapist</b></label>
                                    <input type="text" id="desc_118" name="desc_118" class="form-control"  value="" >
                                </div> 
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_119"><b>119- Nutritionist</b></label>
                                    <input type="text" id="desc_119" name="desc_119" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_120"><b>120- School Psychologist</b></label>
                                    <input type="text" id="desc_120" name="desc_120" class="form-control"  value="" >
                                </div> 
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_121"><b>121- Food preparation and safety professionals, cook, lunch box and kitchen assistant</b></label>
                                    <input type="text" id="desc_121" name="desc_121" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_122"><b>122- Pedagogical support and supervision professionals: (pedagogue, pedagogical coordinator, educational advisor, school supervisor and teaching area coordinator</b></label>
                                    <input type="text" id="desc_122" name="desc_122" class="form-control"  value="" >
                                </div> 
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_123"><b>123- School Secretary</b></label>
                                    <input type="text" id="desc_123" name="desc_123" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_124"><b>124- Security, custody or security of property</b></label>
                                    <input type="text" id="desc_124" name="desc_124" class="form-control"  value="" >
                                </div> 
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_125"><b>125- Technicians, monitors, supervisors or laboratory assistants, in support of educational technologies or in electronic / digital multimedia / multimedia.</b></label>
                                    <input type="text" id="desc_125" name="desc_125" class="form-control"  value="" >
                                </div>
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_126"><b>126- Deputy director or assistant director, professionals responsible for administrative and / or financial management</b></label>
                                    <input type="text" id="desc_126" name="desc_126" class="form-control"  value="" >
                                </div> 
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_127"><b>127- Community counselor or social worker</b></label>
                                    <input type="text" id="desc_127" name="desc_127" class="form-control"  value="" >
                                </div>                                                                                                                                                                                                                                                   
                            </div>

                            <!-- <div class="form-group col-lg-12"> 
                                <label class="form-check-label">
                                    <input class="form-check-input desc_74" name="desc_40[]" type="checkbox" value="0">
                                    School meals for students
                                </label>
                            </div>                               -->

                            <div class="form-group row mb-1">
                                <div class="form-group col-lg-6 mb-1">                                
                                    <label  for="desc_128"><b>128- School meals for students<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                                    <select type="text" id="desc_128" name="desc_128" class="form-control"  value="" >
                                        <option value="0">Does not offer</option>
                                        <option value="1">Offers</option>
                                    </select>
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
                                <input type="submit" class="btn btn-success float-right col-xl-3 col-lg-3 col-md-12 col-sm-12" value="Next"  onclick="insertDescription()">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
