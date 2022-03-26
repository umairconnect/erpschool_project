<style>
.error {
  color: #F00;
  background-color: #FFF;
}
</style>
<?php $school_data = $this->settings_model->get_current_school_data(); 
$school_id = school_id();
$classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array(); ?>
<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
            <i class="mdi mdi-book-open-page-variant title_icon"></i> Teacher
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body class_content">
            <form method="POST" class="d-block teacherSearch" action="<?php echo route('teacher/link'); ?>">
                <div class="col-12">
                    <input type="hidden" name="record_type" value="40">
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
                            <label  for="t_search_3"><b>3 - Individuals' code in their own system</b></label>
                            <input type="numeric" id="t_search_3" name="t_search_3" class="form-control school_code"  value="" >
                        </div>
                        <div class="form-group col-lg-4 mb-1">
                            <label  for="t_search_4"><b>4 - Unique identification (Inep)</b></label>
                            <input type="numeric" id="t_search_4" name="t_search_4" class="form-control school_code"  value="" >
                        </div>                                                 
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-8 mb-1">
                            <label  for="t_search_5"><b>5 - Class Code at the Entity / School</b></label>
                            <select type="numeric" id="t_search_5" name="t_search_5" class="form-control school_code"  value="" >
                                <option value="">None</option>
                                <?php foreach($classes as $class){ ?>
                                    <option value="<?php echo $class['4_classes']; ?>"><?php echo $class['name']; ?></option>
                                    <?php } ?>
                            </select>        
                        </div>                                                 
                    </div>                    
                    <div class="form-group row">
                        <div class="form-group col-lg-8"> 
                            <label for="t_search_6">6 - Role held at school / Class</label>
                            <select class="form-control" name="t_search_6" id="t_search_6" type="text" value="">
                                <option value="">None</option>
                                <option value="1">Teacher</option>
                                <option value="2">Assistant / educational assistant</option>
                                <option value="3">Professional / complementary activity monitor</option>
                                <option value="4">Translator and Interpreter of Libra</option>
                                <option value="5">Full teacher - tutor coordinator (module or discipline) - EAD</option>
                                <option value="6">Teacher tutor - auxiliary (de module or discipline) - EAD</option>
                                <option value="7">Guide-Interpreter</option>
                                <option value="8">School support professional for students with disabilities (Law 13.146 / 2015)</option>
                            </select>                            
                        </div>  
                        
                        <div class="form-group col-lg-8 mb-1">
                            <label  for="t_search_7"><b>7 - Functional Situation / Contracting regime / Type of bond</b></label>
                            <select type="numeric" id="t_search_7" name="t_search_7" class="form-control"  value="" >
                                <option value="">None</option>
                                <option value="1">Open / effective / stable</option>
                                <option value="2">Temporary contract</option>
                                <option value="3">Outsourced contract</option>
                                <option value="4">CLT contract</option>                                                                
                            </select>                        
                        </div> 
                    </div> 
                    <h5>Knowledge areas / curricular components(get it filled from the class selected in field 5</h5>
                    <div class="form-group form-check row checkboxes">
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
                            <input type="submit" class="btn btn-success float-right col-xl-3 col-lg-3 col-md-12 col-sm-12" value="<?php echo get_phrase('create_class'); ?>"  onclick="teacherSearch()">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
            </div>
</div> 

<script>
$(document).ready(function() {
    // $("#t_search_6").prop( "disabled", true ); 
    $("#t_search_7").prop( "disabled", true );

    $( "#t_search_6" ).change(function() {
    if($(this).val() == 1)
    {  
    // $("#t_search_6").prop( "disabled", false );   
    $("#t_search_7").prop( "disabled", false );     
    }
    else
    {
    // $("#t_search_6").prop( "disabled", true );  
    $("#t_search_7").prop( "disabled", true );     
    }

    });  

    $( "#t_search_5" ).change(function() {
    value = $(this).val();
    console.log(value);   
    
    get_class();
});

var get_class = function () {
    var url = '<?php echo route('manage_class/get/'); ?>';
    $.ajax({
        type : 'GET',
        url: url+value,
        dataType: 'JSON',
        success : function(response) {
            var len= response.length;
            $('.checkboxes').html('');
            i=31;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="01">Chemistry</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="02">Physics</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="03">Mathematics</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="04">Biology</label>');
            i++;
            if(response[0][i+'_classes'] == 1)            
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="05">Sciences</label>');
            i++;
            if(response[0][i+'_classes'] == 1)            
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="06">Portuguese Language / Literature</label>');
            i++;
            if(response[0][i+'_classes'] == 1)            
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="07">Foreign Language / Literature - English</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="08">Foreign Language / Literature - Spanish</label>');
            i++;
            if(response[0][i+'_classes'] == 1)            
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="09">Foreign Language / Literature - other</label>');
            i++;
            if(response[0][i+'_classes'] == 1)            
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="10">Art (Art Education, Theater, Dance, Music, Plastic Arts and others)</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="11">Physical Education</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="12">History</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="13">Geography</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="14">Philosophy</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="16">Informatics / Computing</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="17">Areas of professional knowledge</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="23">Pounds</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="25">Pedagogical knowledge areas</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="26">Religious Education</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="27">Indigenous language</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="28">Social Studies</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="29">Sociology</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="30">Foreign Language / Literature - French</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="31">Portuguese as a Second Language</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="32">Supervised curricular internship</label>');
            i++;
            if(response[0][i+'_classes'] == 1)
            $('.checkboxes').append('<label class="checkbox-inline col-lg-12"><input class="form-check-input class_9" name="class_9[]" type="checkbox" value="99">Other areas of knowledge</label>');
        }
    });
}
});
function teacherSearch(){
    $.validator.addMethod("alphanumeric", function (value, element) {
        return this.optional(element) || /^[\w.]+$/i.test(value);
}, "Special characters not allowed");

$(".teacherSearch").validate({
    rules:{
    school_id:{
        required:true,
    },
    t_search_3:{
        required:true,
        maxlength:20       
    },  
    t_search_4:{
        minlength:12, 
        maxlength:12
    }, 
    t_search_5:{
        required:true,
    }, 
    t_search_6:{
        required:function() {
                    if($("#t_search_5").val()== 1)
                    {console.log($("#t_search_5").val());}
                  },
    }, 
    t_search_7:{
        required:function() {
                    if($("#t_search_5").val()== 1)
                    {console.log($("#t_search_5").val());}
                  },
    }, 
    },
    messages:{
    school_id:{
        required:"This field is required"
    },
    t_search_3:{
        required:"This field is required",
        maxlength:"Maximum 20 characters allowed",
    },  
    t_search_4:{
        minlength:"Field must be of 12 characters", 
        maxlength:"Field must be of 12 characters"        
    }, 
    t_search_5:{
        required:"This field is required",
    }, 
    t_search_6:{
        required:"This field is required",
    }, 
    t_search_7:{
        required:"This field is required",
    },     
    }
});

if($('.teacherSearch').valid()) {
  
  $(".teacherSearch").submit(function(e) {
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
