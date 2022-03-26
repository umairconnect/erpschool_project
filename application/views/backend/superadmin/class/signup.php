<style>
.error {
  color: #F00;
  background-color: #FFF;
}
</style>
<?php $school_data = $this->settings_model->get_current_school_data(); 
$modality_steps = $this->db->get('modality_steps')->result_array();
$compl_activity = $this->db->get('complementary_activity')->result_array(); ?>
<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
            <i class="mdi mdi-book-open-page-variant title_icon"></i> Register Class
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body class_content">
            <form method="POST" class="d-block registerClass" action="<?php echo route('register_class/insert'); ?>">
                <div class="col-12">
                    <input type="hidden" name="record_type" value="20">
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
                            <label  for="class_3"><b>3 - Class Code at the Entity / School</b></label>
                            <input type="numeric" id="class_3" name="class_3" class="form-control school_code"  value="" >
                        </div>
                        <div class="form-group col-lg-4 mb-1">
                            <label  for="class_4"><b>4 -Class Code - Inep </b></label>
                            <input type="numeric" id="class_4" name="class_4" class="form-control school_code"  value="" >
                        </div>                                                 
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-12">
                            <label for="name">5 - <?php echo get_phrase('class_name'); ?></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-lg-6"> 
                            <label for="class_6">6 - Type of didactic-pedagogical mediation</label>
                            <select class="form-control" name="class_6" id="class_6" type="text" value="">
                                <option value="">Select</option>
                                <option value="1">Presential</option>
                                <option value="2">Semi-presential</option>
                                <option value="3">Distance education - Distance Learning</option>
                            </select>
                        </div>  
                    </div> 
                    <div class="form-group row">                           
                        <div class="form-group col-lg-6 class_27"> 
                            <label for="class_27" >27 - Differentiated working place of the class</label>
                            <select type="text" id="class_27" name="class_27" class="form-control"  value="" >
                                <option value="">Select</option>
                                <option value="0">The class is not in a different place of operation</option>
                                <option value="1">Adjoining room</option>
                                <!-- <option value="2">Socio-educational service unit</option>
                                <option value="3">Prison unit</option> -->
                            </select>
                        </div> 
                    </div>
                    <h5 class="opening_hours">Opening Hours</h5>
                    <hr class="opening_hours">
                    <div class="form-group row opening_hours">
                        <div class="form-group col-lg-3 offset-lg-3 mb-1">
                            <label for="class_7"><b>7 - Start Time - Time<span style="color:red; font-weight:900; font-size:15px;">*</span></b></label>
                            <select type="text" id="class_7" name="class_7" class="form-control"  value="" >
                                <?php for($i=0; $i<=9; $i++){?>
                                    <option value="0<?php echo $i; ?>">0<?php echo $i; ?></option>
                                <?php }?>
                                <?php for($i=10; $i<=23; $i++){?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php }?>
                            </select>
                        </div>    
                        <div class="form-group col-lg-3 mb-1">
                            <label for="class_8"><b>8 - Start Time - Minute</b></label>
                            <select type="text" id="class_8" name="class_8" class="form-control"  value="" >
                                <option value="00">00</option>
                                <option value="05">05</option>
                                <?php for($i=10; $i<=55; $i=$i+5){?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php }?>
                            </select>                        
                        </div>
                        <div class="form-group col-lg-3 offset-lg-3 mb-1">
                            <label for="class_9"><b>9 - End Time - Hour</b></label>
                            <select type="text" id="class_9" name="class_9" class="form-control"  value="" >
                                <?php for($i=0; $i<=9; $i++){?>
                                    <option value="0<?php echo $i; ?>">0<?php echo $i; ?></option>
                                <?php }?>
                                <?php for($i=10; $i<=23; $i++){?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php }?>
                            </select>                        
                        </div>      
                        <div class="form-group col-lg-3 mb-1">
                            <label  for="class_10"><b>10 - Final Hour - Minute</b></label>
                            <select type="text" id="class_10" name="class_10" class="form-control"  value="" >
                                <option value="00">00</option>
                                <option value="05">05</option>
                                <?php for($i=10; $i<=55; $i=$i+5){?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php }?>
                            </select>
                        </div> +
                    </div>
                    <h5 class="opening_hours">Days of week</h5>
                    <hr class="opening_hours">

                    <div class="form-group form-check row opening_hours">
                            <label class="checkbox-inline col-lg-2">
                                <input class="form-check-input class_11" name="class_11[]" type="checkbox" value="11">
                                11 - Sunday
                            </label>
                            <label class="checkbox-inline col-lg-2">
                                <input class="form-check-input class_11" name="class_11[]" type="checkbox" value="12">
                                12 - Monday
                            </label>
                    
                            <label class="checkbox-inline col-lg-2">
                                <input class="form-check-input class_11" name="class_11[]" type="checkbox" value="13">
                                13 - Tuesday
                            </label>
                            <label class="checkbox-inline col-lg-2">
                                <input class="form-check-input class_11" name="class_11[]" type="checkbox" value="14">
                                14 - Wednesday
                            </label>
                            <label class="checkbox-inline col-lg-2">
                                <input class="form-check-input class_11" name="class_11[]" type="checkbox" value="15">
                                15 - Thursday
                            </label>
                            <label class="checkbox-inline col-lg-2">
                                <input class="form-check-input class_11" name="class_11[]" type="checkbox" value="16">
                                16 - Friday
                            </label>
                            <label class="checkbox-inline col-lg-2">
                                <input class="form-check-input class_11" name="class_11[]" type="checkbox" value="17">
                                17 - Saturday
                            </label>                                                                               
                    </div>          
                    <h6 class="class_18_div">Type of service</h6>
                    <div class="form-check class_18_div">
                        <div class="form-group col-lg-12 mb-1"> 
                            <label class="form-check-label">
                                <input class="form-check-input class_18" name="class_18[]" id="class_18" type="checkbox" value="18">
                                18 - Schooling
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1 class_19"> 
                            <label class="form-check-label">
                                <input class="form-check-input class_18" name="class_18[]" id="class_19" type="checkbox" value="19">
                                19 - Complementary activity
                            </label>
                        </div>
                        <div class="form-group col-lg-12 mb-1 class_20"> 
                            <label class="form-check-label">
                                <input class="form-check-input class_18" name="class_18[]" id="class_20" type="checkbox" value="20">
                                20 - Specialized educational assistance - AEE
                            </label>
                        </div>                                                                
                    </div>                                       
                    <div class="form-group row modality">                           
                        <div class="form-group col-lg-6"> 
                            <label for="class_28">28 - Modality</label>
                            <select type="text" id="class_28" name="class_28" class="form-control" >
                                <option id="opt_0" value="">Select</option>
                                <option id="opt_1" value="1">Regular education</option>
                                <option id="opt_2" value="2">Special education - substitutive modality</option>
                                <option id="opt_3" value="3">Youth and adult education (EJA) </option>
                                <option id="opt_4" value="4">Professional education</option>
                            </select>
                        </div> 
                    </div>
                    <div class="form-group row stage">   
                        <div class="form-group col-lg-12"> 
                            <label for="class_29">29 - Stage</label>
                            <select type="number" id="class_29" name="class_29" class="form-control getStages" onchange="getAreas(this.value)">

                            </select>
                        </div> 
                    </div>
                    <div class="form-group row">   
                        <div class="form-group col-lg-12 course_code"> 
                            <label for="class_30">30 - Course Code </label>
                            <input type="number" id="class_30" name="class_30" class="form-control"  value="" >
                        </div> 
                    </div>

                    <h5 class="subjects_h">Knowledge areas / curricular components</h5>
                    <div class="form-group row subjects">                           

                    </div>

                    <h5 class="activity_type">Type of complementary activity</h5>
                    <div class="form-group row mb-1 activity_type">
                        <div class="form-group col-lg-2 mb-1">                                
                            <label  for="class_21"><b>21- code 1</b></label>
                            <select type="numeric" id="class_21" name="class_21" class="form-control class_21"  value="" >
                                <option value="">none</option>
                                <?php foreach($compl_activity as $steps){?>
                                    <option value="<?php echo $steps['activity_id']; ?>"><?php echo $steps['activity_name']; ?></option>
                                <?php } ?> 
                            </select>
                        </div>
                        <div class="form-group col-lg-2 mb-1">
                            <label  for="class_22"><b>22- code 2</b></label>
                            <select type="numeric" id="class_22" name="class_22" class="form-control class_21"  value="" >
                                <option value="">none</option>
                                <?php foreach($compl_activity as $steps){?>
                                    <option value="<?php echo $steps['activity_id']; ?>"><?php echo $steps['activity_name']; ?></option>
                                <?php } ?> 
                            </select>
                        </div>
                        <div class="form-group col-lg-2 mb-1">
                            <label  for="class_23"><b>23- code 3</b></label>
                            <select type="numeric" id="class_23" name="class_23" class="form-control class_21"  value="" >
                                <option value="">none</option>
                                <?php foreach($compl_activity as $steps){?>
                                    <option value="<?php echo $steps['activity_id']; ?>"><?php echo $steps['activity_name']; ?></option>
                                <?php } ?> 
                            </select>                            
                        </div>     
                        <div class="form-group col-lg-2 mb-1">                                
                            <label  for="class_24"><b>24- code 4</b></label>
                            <select type="numeric" id="class_24" name="class_24" class="form-control class_21"  value="" >
                                <option value="">none</option>
                                <?php foreach($compl_activity as $steps){?>
                                    <option value="<?php echo $steps['activity_id']; ?>"><?php echo $steps['activity_name']; ?></option>
                                <?php } ?> 
                            </select>                            
                        </div>
                        <div class="form-group col-lg-2 mb-1">
                            <label  for="class_25"><b>25- code 5</b></label>
                            <select type="numeric" id="class_25" name="class_25" class="form-control class_21"  value="" >
                                <option value="">none</option>
                                <?php foreach($compl_activity as $steps){?>
                                    <option value="<?php echo $steps['activity_id']; ?>"><?php echo $steps['activity_name']; ?></option>
                                <?php } ?> 
                            </select>
                        </div>
                        <div class="form-group col-lg-2 mb-1">
                            <label  for="class_26"><b>26- code 6</b></label>
                            <select type="numeric" id="class_26" name="class_26" class="form-control class_21"  value="" >
                                <option value="">none</option>
                                <?php foreach($compl_activity as $steps){?>
                                    <option value="<?php echo $steps['activity_id']; ?>"><?php echo $steps['activity_name']; ?></option>
                                <?php } ?> 
                            </select>
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
                                <input type="submit" class="btn btn-success float-right col-xl-3 col-lg-3 col-md-12 col-sm-12" value="<?php echo get_phrase('create_class'); ?>"  onclick="registerClass()">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            </div>
</div>            
<script>

function getAreas(value) {
    console.log(value);
    var url = '<?php echo route('manage_class/get_areas/'); ?>';
    $.ajax({
        type : 'GET',
        url: url+value,
        dataType: 'JSON',
        success : function(response) {
            var len= response.length;
            console.log(len);
            $('.subjects').show();
            $('.subjects_h').show();
            $('.subjects').html('');
            for(i=0; i<len; i++)
            {
                $('.subjects').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input areas" name="areas[]" type="checkbox" value="'+response[i]['course_code']+'">'+response[i]['course_name']+'</label>');
            }
        }
    })
};

function getStages(value1,value2) {
    console.log(value1);
    var url = '<?php echo route('manage_class/get_steps/'); ?>';
    $.ajax({
        type : 'GET',
        url: url+value1+value2,
        dataType: 'JSON',
        success : function(response) {
            var len= response.length;
            console.log(len);
            $(".stage").show();
            $('.getStages').html('');
            $('.getStages').append('<option value="">Select</option>');
            for(i=0; i<len; i++)
            {
                $('.getStages').append('<option value="'+response[i]["step_code"]+'">'+response[i]["step_name"]+'</option>');
            }
        }
    })
};

function disabled()
{
    $("#class_7").prop( "disabled", true );
    $("#class_8").prop( "disabled", true );
    $("#class_9").prop( "disabled", true );    
    $("#class_10").prop( "disabled", true );  
    $(".class_11").prop( "disabled", true ); 
    $(".opening_hours").hide();

    $(".modality").hide();
    $(".stage").hide();
    $(".subjects").hide(); 
    $(".subjects_h").hide();
    $(".activity_type").hide();
    $(".course_code").hide();
    $(".class_21").prop( "disabled", true ); 

    $(".class_18").prop( "checked", false);
    $(".class_18").prop( "disabled", true ); 
    $(".class_18_div").hide(); 
}

$(document).ready(function() {

disabled();

    $( "#class_6" ).change(function() {
  if($(this).val()==1)
  {  
    disabled();
    $("#class_7").prop( "disabled", false );
    $("#class_8").prop( "disabled", false );
    $("#class_9").prop( "disabled", false );
    $("#class_10").prop( "disabled", false ); 
    $(".class_11").prop( "disabled", false );   
    $(".class_19").show();
    $(".class_20").show(); 
    $("#class_19").prop( "disabled", false );
    $("#class_20").prop( "disabled", false ); 
    $("#class_18").prop( "disabled", false );  

    $(".modality select").val("");
    $("#class_29 select").val("");
    $(".opening_hours").show(); 
    $(".class_27").show();
    $("#opt_1").show();
    $("#opt_4").show();
  }
  else if($(this).val()==2)
  {
    disabled();
    $("#class_19").prop( "disabled", true );
    $("#class_20").prop( "disabled", true ); 
    $(".class_19").hide();
    $(".class_20").hide(); 
    $(".modality select").val("");
    $("#class_29 select").val("");
    $(".opening_hours").hide();  
    $(".class_18").prop( "disabled", false ); 
    $(".class_18_div").show(); 
    $(".class_27").show();
    $("#opt_1").hide();
    $("#opt_4").hide();
    $("#opt_2").show();
    $("#opt_3").show();    
  }
  else if($(this).val()==3)
  {
    disabled();
    // $("#class_7").prop( "disabled", false );
    // $("#class_8").prop( "disabled", false );
    // $(".class_11").prop( "disabled", false );  
    $(".modality select").val(""); 
    $("#class_29 select").val("");
    $(".opening_hours").hide();  
    $(".class_27").hide();
    $("#class_19").prop( "disabled", true );
    $("#class_20").prop( "disabled", true ); 
    $(".class_19").hide();
    $(".class_20").hide(); 
    $(".class_18").prop( "disabled", false ); 
    $(".class_18_div").show(); 
    $("#opt_1").show();
    $("#opt_2").show();
    $("#opt_3").show(); 
  }
  else{
    disabled();
  }
});


$(".class_11").change(function() { 
    if($("[name='class_11[]']:checked").length > 0)
    {
        // $(".class_18").prop( "checked", false);
        // $(".class_11").prop( "disabled", false );   
        $(".class_18").prop( "disabled", false ); 
        $(".class_18_div").show(); 
    }
    else
    {
        $(".class_18").prop( "checked", false);
        $(".class_18").prop( "disabled", true ); 
        $(".class_18_div").hide();  
    }
});



$("#class_18").change(function() { 
    console.log($("[name='class_18[]']:checked").val());
    if($("[id='class_18']:checked").length > 0 )
    { 
        $(".modality").show(); 
        $(".modality select").val("");
        $("#class_29 select").val("");
    }   
    else
    {
        $(".modality").hide();  
        $(".stage").hide();
        $(".subjects").hide(); 
        $(".subjects_h").hide();       
    }    
});

$("#class_19").change(function() { 
    if($("[id='class_19']:checked").length > 0)
    {
        $(".activity_type").show();
        $(".class_21").prop( "disabled", false ); 
        // $(".course_code").hide();
    }
    else
    {
        $(".class_21").prop( "disabled", true ); 
        $(".activity_type").hide();
        // $(".course_code").hide();
    }    
});
$("#class_20").change(function() { 
    if($("[id='class_20']:checked").length == 1)
    {
        $("#class_18").prop( "checked", false);
        $("#class_19").prop( "checked", false);
        $("#class_19").prop( "disabled", true );
        $("#class_18").prop( "disabled", true );
        $(".modality").hide();
        $(".stage").hide();
        $(".subjects").hide(); 
        $(".subjects_h").hide();
        $(".activity_type").hide();
        $(".course_code").hide();
        // $(".course_code").hide();
    } 
    else{
        $("#class_19").prop( "disabled", false );
        $("#class_18").prop( "disabled", false );        
    }
});

$("#class_28").change(function() { 
    $(".subjects").hide(); 
    $(".subjects_h").hide();

    a = $(this).val();
    b = $("#class_6").val();
    if(a=='')
    {
        $(".stage").hide();       
    }
    else
    getStages(b,a);
    // $(".stage").show();
});

});



function registerClass(){

$(".registerClass").validate({
rules:{
    school_id:{
        required:true,
        // minlength:8, 
        // maxlength:8
    },
    class_3:{
        required:true,
        maxlength:20        
    },
    class_4:{
        maxlength:10        
    },
    name:{
        required:true,
        maxlength:80       
    },
    class_6:{
        required:true,      
    },
    class_7:{
        required: function() {
                    //returns true if email is empty
                    if($("#class_6").val()== 1)
                    {console.log($("#class_6").val());
                    // return true;
                    }
                  }    
    },    
    class_8:{
        required: function() {
                    //returns true if email is empty
                    if($("#class_6").val()== 1)
                    {console.log($("#class_6").val());
                    // return true;
                    }
                  }       
    },
    class_9:{
        required: function() {
                    //returns true if email is empty
                    if($("#class_6").val()== 1)
                    {console.log($("#class_6").val());
                    // return true;
                    }
                  }        
    },     
    class_10:{
        required: function() {
                    //returns true if email is empty
                    if($("#class_6").val()== 1)
                    {console.log($("#class_6").val());
                    // return true;
                    }
                  }        
    },     
    'class_11[]':{
        required: function() {
                    //returns true if email is empty
                    if($("#class_6").val()== 1)
                    {console.log($("#class_6").val());
                    // return true;
                    }
                  }        
    },      
    'class_18[]':{
        required: true,
        // required: function() {
        //             //returns true if email is empty
        //             if($("#class_6").val()== 1)
        //             {console.log($("#class_6").val());
        //             // return true;
        //             }
        //           }        
        },
        class_3:{
        required:true,
        maxlength:20        
    },
    // class_21:{
    //     minlength:5, 
    //     maxlength:5    
    // },
    // class_22:{
    //     minlength:5, 
    //     maxlength:5      
    // },
    // class_23:{
    //     minlength:5, 
    //     maxlength:5      
    // },
    // class_24:{
    //     minlength:5, 
    //     maxlength:5       
    // },
    // class_25:{
    //     minlength:5, 
    //     maxlength:5 
    // },
    // class_26:{
    //     minlength:5, 
    //     maxlength:5        
    // },
    class_27:{
        required: function() {
            //returns true if email is empty
            if($("#class_6").val()== 1)
            {console.log($("#class_6").val());
            }  
            if($("#class_6").val()== 2)
            {console.log($("#class_6").val());
            // return true;
            }
            },              
    },
  
},
messages:{
    school_id:{
        required:"This field is required",
        // minlength:8, 
        // maxlength:8
    },
    class_3:{
        required:"This field is required",
        maxlength:"Maximum 20 characters allowed"       
    },
    class_4:{
        maxlength:"Maximum 10 characters allowed"        
    },
    name:{
        required:"This field is required",
        maxlength:"Maximum 80 characters allowed"       
    },
    class_6:{
        required:"This field is required",      
    },
    class_7:{
        required:"This field is required"   
    },    
    class_8:{
        required:"This field is required"     
    },
    class_9:{
        required:"This field is required"       
    },     
    class_10:{
        required:"This field is required"       
    },     
    'class_11[]':{
        required:"This field is required"       
    },      
    'class_18[]':{
        required:"This field is required",
        // required: function() {
        //             //returns true if email is empty
        //             if($("#class_6").val()== 1)
        //             {console.log($("#class_6").val());
        //             // return true;
        //             }
        //           }        
        },
    class_3:{
    required:"This field is required",
    maxlength:"Maximum 20 characters allowed"       
    },
    // class_21:{
    //     minlength:"Field must be of 5 characters", 
    //     maxlength:"Field must be of 5 characters"    
    // },
    // class_22:{
    //     minlength:"Field must be of 5 characters", 
    //     maxlength:"Field must be of 5 characters"      
    // },
    // class_23:{
    //     minlength:"Field must be of 5 characters", 
    //     maxlength:"Field must be of 5 characters"      
    // },
    // class_24:{
    //     minlength:"Field must be of 5 characters", 
    //     maxlength:"Field must be of 5 characters"       
    // },
    // class_25:{
    //     minlength:"Field must be of 5 characters", 
    //     maxlength:"Field must be of 5 characters" 
    // },
    // class_26:{
    //     minlength:"Field must be of 5 characters", 
    //     maxlength:"Field must be of 5 characters"        
    // },
    class_27:{
        required:"This field is required",              
    },   
}
}); // Jquery form validation initialization

if($('.registerClass').valid()) {
  
  $(".registerClass").submit(function(e) {
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
