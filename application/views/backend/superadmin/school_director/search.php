<style>
.error {
  color: #F00;
  background-color: #FFF;
}
</style>
<?php $school_data = $this->settings_model->get_current_school_data(); ?>

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
            <form method="POST" class="d-block directorSearch" action="<?php echo route('director_signup/link'); ?>">
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
                            <label  for="d_search_3"><b>3 - Individuals' code in their own system</b></label>
                            <input type="numeric" id="d_search_3" name="d_search_3" class="form-control school_code"  value="" >
                        </div>
                        <div class="form-group col-lg-4 mb-1">
                            <label  for="d_search_4"><b>4 - Unique identification (Inep)</b></label>
                            <input type="numeric" id="d_search_4" name="d_search_4" class="form-control school_code"  value="" >
                        </div>                                                 
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-4"> 
                            <label for="d_search_5">5 - Office</label>
                            <select class="form-control" name="d_search_5" id="d_search_5" type="text" value="">
                                <option value="">None</option>
                                <option value="1">Director</option>
                                <option value="2">Other position</option>
                            </select>                            
                        </div>  
                        
                        <div class="form-group col-lg-5"> 
                            <label for="d_search_6">6 - Criteria for access to the position / function</label>
                            <select type="text" id="d_search_6" name="d_search_6" class="form-control"  value="" >
                                <option value="">None</option>
                                <option value="1">Being an owner or partner (owner) of the school</option>
                                <option value="2">Exclusively by indication / choice of management</option>
                                <option value="3">Qualified selection process and choice / appointment of management</option>
                                <option value="4">Specific public tender for the position of school manager</option>
                                <option value="5">Exclusively by electoral process with the participation of the school community</option>
                                <option value="6">Qualified selection process and election with the participation of the school community</option>
                                <option value="7">Others</option>                                                                
                            </select>
                        </div> 
                        <div class="form-group col-lg-12 mb-1">
                            <label  for="d_search_7"><b>7 - Functional Situation / Contracting regime / Type of bond</b></label>
                            <select type="numeric" id="d_search_7" name="d_search_7" class="form-control"  value="" >
                                <option value="">None</option>
                                <option value="1">Open / effective / stable</option>
                                <option value="2">Temporary contract</option>
                                <option value="3">Outsourced contract</option>
                                <option value="4">CLT contract</option>                                                                
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
                            <input type="submit" class="btn btn-success float-right col-xl-3 col-lg-3 col-md-12 col-sm-12" value="<?php echo get_phrase('create_class'); ?>"  onclick="directorSearch()">
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
    $("#d_search_6").prop( "disabled", true ); 
    $("#d_search_7").prop( "disabled", true );

    $( "#d_search_5" ).change(function() {
    if($(this).val() == 1)
    {  
    $("#d_search_6").prop( "disabled", false );   
    $("#d_search_7").prop( "disabled", false );     
    }
    else
    {
    $("#d_search_6").prop( "disabled", true );  
    $("#d_search_7").prop( "disabled", true );     
    }
    });  
});

function directorSearch(){
    $.validator.addMethod("alphanumeric", function (value, element) {
        return this.optional(element) || /^[\w.]+$/i.test(value);
}, "Special characters not allowed");

$(".directorSearch").validate({
    rules:{
    school_id:{
        required:true,
    },
    d_search_3:{
        required:true,
        maxlength:20       
    },  
    d_search_4:{
        minlength:12, 
        maxlength:12
    }, 
    d_search_5:{
        required:true,
    }, 
    d_search_6:{
        required:function() {
                    if($("#d_search_5").val()== 1)
                    {console.log($("#d_search_5").val());}
                  },
    }, 
    d_search_7:{
        required:function() {
                    if($("#d_search_5").val()== 1)
                    {console.log($("#d_search_5").val());}
                  },
    }, 
    },
    messages:{
    school_id:{
        required:"This field is required"
    },
    d_search_3:{
        required:"This field is required",
        maxlength:"Maximum 20 characters allowed",
    },  
    d_search_4:{
        minlength:"Field must be of 12 characters", 
        maxlength:"Field must be of 12 characters"        
    }, 
    d_search_5:{
        required:"This field is required",
    }, 
    d_search_6:{
        required:"This field is required",
    }, 
    d_search_7:{
        required:"This field is required",
    },     
    }
});

if($('.directorSearch').valid()) {
  
  $(".directorSearch").submit(function(e) {
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
