<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/chosen_style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/choosen.js"></script>
<?php
if($settings_type == 'system_settings')
$class = 'col-xl-12';
else if($settings_type == 'payment_settings')
$class = 'col-xl-10 offset-xl-1';
else if($settings_type == 'language_settings')
$class = 'col-xl-10 offset-xl-1';
else if($settings_type == 'sms_settings')
$class = 'col-xl-10 offset-xl-1';
else if($settings_type == 'smtp_settings')
$class = 'col-xl-10 offset-xl-1';
else if($settings_type == 'school_settings')
$class = 'col-xl-12';
else if($settings_type == 'sms_settings')
$class = 'col-xl-10 offset-xl-1';
?>

<style>
.error {
  color: #F00;
  background-color: #FFF;
}
</style>
<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-settings title_icon"></i><?php echo ucfirst(get_phrase($settings_type)); ?>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end page title -->
<div class="row">
  <div class="<?php echo $class; ?>">
    <div class="settings_content">
      <?php include $settings_type.'.php'; ?>
    </div>
  </div>
</div>

<script type="text/javascript">
function updateSystemInfo(system_name) {
  $(".systemAjaxForm").validate({});
  $(".systemAjaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, reload);
  });
}

function updateSystemLogo() {
  $(".systemLogoAjaxForm").validate({});
  $(".systemLogoAjaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, reload);
  });
}


function updateSystemCurrencyInfo() {
  $(".systemAjaxForm").validate({});
  $(".systemAjaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, reload);
  });
}

function updatePaypalInfo() {
  $(".paypalAjaxForm").validate({});
  $(".paypalAjaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, reload);
  });
}

function updateStripeInfo() {
  $(".stripeAjaxForm").validate({});
  $(".stripeAjaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, reload);
  });
}

function updateSmsInfo() {
  $(".smsForm").validate({});
  $(".smsForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, reload);
  });
}

function updateSmtpInfo() {
  $(".smtpForm").validate({});
  $(".smtpForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, reload);
  });
}

$(".chosen").chosen();

$(document).ready(function() {
//   $('input[type="checkbox"]').on('change', function(){
//     this.value = this.checked ? 1 : 0;
//     console.log(this.value);
// });  

$("#date_start").prop( "disabled", true);
$("#date_end").prop( "disabled", true );

$("#school_cat").prop( "disabled", true );
$("#CNPJ_sponsor").prop( "disabled", true );
$("#CNPJ_number").prop( "disabled", true );
$(".private_school").prop( 'disabled', true);
$(".agreed_pub").prop( "disabled", true );

$( "#op_status" ).change(function() {
  if($(this).val()==1)
  { $("#date_start").prop( "disabled", false );
    $("#date_end").prop( "disabled", false );
  }
  else
  {
    $("#date_start").prop( "disabled", true );
    $("#date_end").prop( "disabled", true );
  }

  if($(this).val()==1 && $("#admin").val()== 4)
      {
        $("#school_cat").prop( "disabled", false );
        $("#CNPJ_sponsor").prop( "disabled", false );
        $("#CNPJ_number").prop( "disabled", false );
        $(".private_school").prop( 'disabled', false);
        $(".agreed_pub").prop( "disabled", false );        
      }  
  else{
      $("#school_cat").prop( "disabled", true );
      $("#CNPJ_sponsor").prop( "disabled", true );
      $("#CNPJ_number").prop( "disabled", true );
      $(".private_school").prop( 'disabled', true);
      $(".agreed_pub").prop( "disabled", true );    
  }

});

  $( "#admin" ).change(function() {
    if($(this).val()==4 && $("#op_status").val()== 1)
    {
        $("#school_cat").prop( "disabled", false );
        $("#CNPJ_sponsor").prop( "disabled", false );
        $("#CNPJ_number").prop( "disabled", false );
        $(".private_school").prop( 'disabled', false);
        $(".agreed_pub").prop( "disabled", false );        
    }
    else
    {
        $("#school_cat").prop( "disabled", true );
        $("#CNPJ_sponsor").prop( "disabled", true );
        $("#CNPJ_number").prop( "disabled", true );
        $(".private_school").prop( 'disabled', true);
        $(".agreed_pub").prop( "disabled", true );
    }
  });

//insert description

  $("#desc_9").prop( "disabled", true);
  $("#desc_10").prop( "disabled", true);
  $(".school_code").prop( "disabled", true);    

  $( "#desc_3" ).change(function() {
  if($("#desc_3").is( ":checked" ))
  {
    $("#desc_9").prop( "disabled", false);
    $("#desc_10").prop( "disabled", false);    
  }
  else
  { $("#desc_9").prop( "disabled", true);
    $("#desc_10").prop( "disabled", true);}
});

$( "#desc_10" ).change(function() {
  if($("#desc_10").val()== 1)
  {
    $(".school_code").prop( "disabled", false);     
  }
  else
  {   $(".school_code").prop( "disabled", true);  }
});

$( "#desc_22" ).change(function() {
  if($("#desc_22").is(":checked"))
  {
    $(".desc_18").prop( "checked", false);
    $(".desc_18").prop( "disabled", true);    
  }
  else
  {   $(".desc_18").prop( "disabled", false);  }
});
  
$( "#desc_23" ).change(function() {
  if($("#desc_23").is(":checked"))
  {
    $(".desc_23").prop( "checked", false);
    $(".desc_23").prop( "disabled", true);    
  }
  else
  {   $(".desc_23").prop( "disabled", false);  }
});

$( "#desc_27" ).change(function() {
  if($("#desc_27").is(":checked"))
  {
    $(".desc_27").prop( "checked", false);
    $(".desc_27").prop( "disabled", true);    
  }
  else
  {   $(".desc_27").prop( "disabled", false);  }
});

$(".desc_36").prop( "disabled", true); 

$( "#desc_39" ).change(function() {
  if($("#desc_39").is(":checked"))
  {
    $(".desc_36").prop( "checked", false);   
    $("#desc_36").prop( "checked", false);
    $("#desc_36").prop( "disabled", true);      
  }
  else
  { $("#desc_36").prop( "disabled", false);  }
});

$( "#desc_36" ).change(function() {
  if($("#desc_36").is(":checked"))
  { 
    $(".desc_36").prop( "disabled", false); 
  }
  else
  { $(".desc_36").prop( "checked", false); 
    $(".desc_36").prop( "disabled", true); 
     }
});

$( "#desc_74" ).change(function() {
  if($("#desc_74").is(":checked"))
  {
    $(".desc_74").prop( "checked", false);
    $(".desc_74").prop( "disabled", true);    
  }
  else
  {   $(".desc_74").prop( "disabled", false);  }
});

$( "#desc_83" ).change(function() {
  if($("#desc_83").is(":checked"))
  {
    $(".desc_83").prop( "checked", false);
    $(".desc_83").prop( "disabled", true);    
  }
  else
  {   $(".desc_83").prop( "disabled", false);  }
});

$( "#desc_106" ).change(function() {
  if($("#desc_106").is(":checked"))
  {
    $(".desc_106").prop( "checked", false);
    $(".desc_106").prop( "disabled", true);    
  }
  else
  {   $(".desc_106").prop( "disabled", false);  }
});

$("#hq_code").prop( "disabled", true); 
$("#ies_code").prop( "disabled", true); 

$( ".linked_unit" ).change(function() {
  if($("[name='linked_unit']:checked").val()==1)
  {
    $("#hq_code").prop( "disabled", false); 
    $("#ies_code").prop( "disabled", true);  

  }
  else if($("[name='linked_unit']:checked").val()==2)
  {  $("#ies_code").prop( "disabled", false); 
    $("#hq_code").prop( "disabled", true);   }

  else{
    $("#hq_code").prop( "disabled", true); 
    $("#ies_code").prop( "disabled", true);   
  }
});

$(".149_desc").prop( "disabled", true);
$(".149_desc_div").hide();

$( ".147_desc" ).change(function() {
  if($("[name='147_desc[]']:checked").val() == '147')
  { 
    $(".149_desc_div").show();
    $(".149_desc").prop( "disabled", false); 
  }
  else{
    $(".149_desc").prop( "disabled", true);  
    $(".149_desc_div").hide();
  }
});

});


function updateSchoolInfo() {
 
  $(".schoolForm").validate({
    rules:{
      school_code:{
        required:true,
        minlength:8, 
        maxlength:8
      },
      op_status:"required",
      date_start:{
        required: function() {
                    //returns true if email is empty
                    if($("#op_status").val()== 1 )
                    {console.log($("#op_status").val());
                    // return true;
                    }
                  }
      },
      date_end:{
        required: function() {
                    //returns true if email is empty
                    if($("#op_status").val()== 1 )
                    {console.log($("#op_status").val());
                    // return true;
                    }
                  }
      },
      school_name:"required",
      cep:"required",
      uf:"required",
      municipality:{
        required:true,
        minlength:7, 
        maxlength:7
      },
      district:{
        required:true,
      },
      address:{
        required:true,
        maxlength:100
      },
      number:{
        maxlength:10,
      },
      complement:{
        maxlength:20,
      },
      neighbour:
      {
        maxlength:50,
      },
      ddd:{
        maxlength:2,
      },
      phone:{
        maxlength:9,
      },
      phone1:{
        maxlength:9,
      },
      email:{
        email:true,
        maxlength:50,
      },
      teaching_body:{
        minlength:5,
        maxlength:5,
      },
      location:{
        required:true,
        minlength:1,
        maxlength:1
      },
      location1:{
        required:true,
        minlength:1,
        maxlength:1
      },
      admin:{
        required:true,
        minlength:1,
        maxlength:1
      },
      CNPJ_sponsor:{
        required: function() {
                    //returns true if email is empty
                    if($("#private_school").val()== 1 && $("#auth_body").val()== 1)
                    {console.log($("#private_school").val());
                      console.log($("#auth_body").val());
                    // return true;
                    }
                  },
        minlength:14,
        maxlength:14
      },
      CNPJ_number:{
        required: function() {
                    //returns true if email is empty
                    if($("#private_school").val()== 1 && $("#auth_body").val()== 1)
                    {console.log($("#private_school").val());
                      console.log($("#auth_body").val());
                    // return true;
                    }
                  },
        minlength:14,
        maxlength:14
      },
      linked_unit:{
        required: function() {
                    //returns true if email is empty
                    if($("#op_status").val()== 1 )
                    {console.log($("#op_status").val());
                    // return true;
                    }
                  }
      },
      hq_code:{
        required: function() {
                    if($("[name='linked_unit']:checked").val()==1)
                    {console.log($("[name='linked_unit']:checked").val());
                      return true;
                    }
                  },
        minlength:8,
        maxlength:8
      },
      ies_code:{
        required: function() {
                    if($("[name='linked_unit']:checked").val()==2)
                    {console.log($("[name='linked_unit']:checked").val());
                      return true;
                    }
                  },        
        maxlength:9
      },
      agency:{
        required: function() {
                    //returns true if email is empty
                    if($("#admin").val()== 1)
                    {console.log($("#admin").val());
                    // return true;
                    }
                    else if($("#admin").val()== 2)
                    {console.log($("#admin").val());
                    // return true;
                    }
                    else if($("#admin").val()== 3)
                    {console.log($("#admin").val());
                    // return true;
                    }                                        
                  }
               },
      private_school:{
        required: function() {
                    //returns true if email is empty
                    if($("#op_status").val()== 1 && $("#admin").val()== 4)
                    {console.log($("#admin").val());
                      console.log($("#op_status").val());
                    // return true;
                    }
                  }
               },
      school_cat:{
        required: function() {
                    //returns true if email is empty
                    if($("#op_status").val()== 1 && $("#admin").val()== 4)
                    {console.log($("#admin").val());
                      console.log($("#op_status").val());
                    // return true;
                    }
                  }
               },
      agreed_pub:{
        required: function() {
                    //returns true if email is empty
                    if($("#op_status").val()== 1 && $("#admin").val()== 4)
                    {console.log($("#admin").val());
                      console.log($("#op_status").val());
                    // return true;
                    }
                  }
               },
      auth_body:{
        required: function() {
                    //returns true if email is empty
                    if($("#op_status").val()== 1)
                    { console.log($("#op_status").val());
                    // return true;
                    }
                  }
               },
    },
    messages: {
      school_code:{
        required:"Please Enter School Code",
        minlength:"Must be 8 characters",
        maxlength:"Must be 8 characters"
      },
      op_status:"Please select an Operating Status",
      date_start:{
        required:"Please select Start Date"
      },
      date_end:{
        required:"Please select Start Date"
      },    
      school_name:"Please Enter School Name",
      cep:"Please Enter a valid Zip code",
      uf:"Please Enter a valid UF",
      municipality:{
        required:"This field is required",
        minlength:"Must be 7 characters",
        maxlength:"Must be 7 characters"
      },
      district:{
        required:"Please Enter District",
      },
      address:{
        required:"Please Enter a valid Address",
        maxlength:"Address cannot be more then 100 characters"
      },
      number:{
        maxlength:"Max allowed characters 10",
      },
      complement:{
        maxlength:"Max allowed characters 20",
      },
      neighbour:
      {
        maxlength:"Max allowed characters 50",
      },
      ddd:{
        maxlength:"Max allowed characters 2",
      },
      phone:{
        maxlength:"Max allowed characters 9",
      },
      phone1:{
        maxlength:"Max allowed characters 9",
      },
      email:{
        email:"Not a valid email address",
        maxlength:"Max allowed characters 50",
      },
      teaching_body:{
        minlength:"5",
        maxlength:"5",
      },
      location:{
        required:"Please select an option",
      },
      location1:{
        required:"Please select an option",
      },
      admin:{
        required:"Please select an option",
      },
      CNPJ_sponsor:{
        minlength:"Must be 14 characters",
        maxlength:"Must be 14 characters"
      },
      CNPJ_number:{
        minlength:"Must be 14 characters",
        maxlength:"Must be 14 characters"
      },
      linked_unit:{
        required:"Please select an option"
      },
      hq_code:{
        minlength:"Must be 8 characters",
        maxlength:"Must be 8 characters"
      },
      ies_code:{
        maxlength:"Must be 9 characters"
      },
      agency:{
        required:"Select atleast one option",
      },
      private_school:{
        required:"Select atleast one option",
      },
      school_cat:{
        required:"This field is required",
      },
      agreed_pub:{
        required:"This field is required",
      },
      auth_body:{
        required:"This field is required",
      }
    }      
  });

  if($('.schoolForm').valid()) {
    $(".schoolForm").submit(function(e) {
      var form = $(this);
      ajaxSubmit(e, form, reload);
    });
  }
}

function insertDescription() {

  // $.validator.addMethod('min', function (value, el, param) {
  //   return value > param; });  

    $.validator.addMethod("min", function (value, element, param) {
    return this.optional(element) || parseInt(value) > 0;
});

 $(".descpForm1").validate({
  rules:{
    'desc_3[]':{
      required:true,
    },
    'desc_9':{
      required: function() {
                    if($("#desc_3").is( ":checked" ))
                    { console.log($("#desc_3").val());}
                  },
    },
    'desc_10':{
      required: function() {
                    if($("#desc_3").is( ":checked" ))
                    { console.log($("#desc_3").val());}
                  },
    },
    'desc_11':{
      required: function() {
                    if($("#desc_10").val() == 1)
                    { console.log($("#desc_10").val());}
                  },
      minlength:8, 
      maxlength:8
    },
    'desc_12':{
      minlength:8, 
      maxlength:8
    },    
    'desc_13':{
      minlength:8, 
      maxlength:8
    }, 
    'desc_14':{
      minlength:8, 
      maxlength:8
    }, 
    'desc_15':{
      minlength:8, 
      maxlength:8
    }, 
    'desc_16':{
      minlength:8, 
      maxlength:8
    }, 
    'desc_17':{
      required:true,
    }, 
    'desc_18[]':{
      required:true,
    }, 
    'desc_23[]':{
      required:true,
    },    
    'desc_27[]':{
      required:true,
    }, 
    'desc_31[]':{
      required:true,
    }, 
    'desc_36[]':{
      required:true,
    }, 
    'desc_40[]':{
      required:true,
    },     
    'desc_75[]':{
      required:true,
    }, 
    'desc_84':{ 
      required: function() {
                    if($("#desc_3").is( ":checked" ) && $("#desc_85").val() == '')
                    { console.log($("#desc_85").val());}
                  },
      maxlength:4
    }, 
    'desc_85':{
      required: function() {
                    if($("#desc_84").val() == '')
                    { console.log($("#desc_84").val());}
                  },      
      maxlength:4
    }, 
    'desc_86':{
      maxlength:4
    }, 
    'desc_87':{
      maxlength:4
    },     
    'desc_88[]':{
      required:true,
    },    
    'desc_94':{ 
      min:1,
      maxlength:4
    }, 
    'desc_95':{     
      min:1,
      maxlength:4
    }, 
    'desc_96':{
      min:1,
      maxlength:4
    }, 
    'desc_97':{
      min:1,
      maxlength:4
    },
    'desc_98':{
      min:1,
      maxlength:4
    },
    'desc_99':{
      min:1,
      maxlength:4
    }, 
    'desc_100':{
      min:1,
      maxlength:4
    },
    'desc_101':{
      min:1,
      maxlength:4
    },     
    'desc_113':{     
      min:1,
      maxlength:4
    }, 
    'desc_114':{
      min:1,
      maxlength:4
    }, 
    'desc_115':{
      min:1,
      maxlength:4
    },
    'desc_116':{
      min:1,
      maxlength:4
    },
    'desc_117':{
      min:1,
      maxlength:4
    }, 
    'desc_118':{
      min:1,
      maxlength:4
    },
    'desc_119':{
      min:1,
      maxlength:4
    },  
    'desc_120':{     
      min:1,
      maxlength:4
    }, 
    'desc_121':{
      min:1,
      maxlength:4
    }, 
    'desc_122':{
      min:1,
      maxlength:4
    },
    'desc_123':{
      min:1,
      maxlength:4
    },
    'desc_124':{
      min:1,
      maxlength:4
    }, 
    'desc_125':{
      min:1,
      maxlength:4
    },
    'desc_126':{
      min:1,
      maxlength:4
    },
    'desc_127':{
      min:1,
      maxlength:4
    },
    'desc_128':{
      required:true,
    },                                                      
  },
  messages:{
    'desc_3[]':{
      required:"This field is required",
    },
    'desc_9':{
      required: "This field is required"      
    },
    'desc_10':{
      required: "This field is required"      
    },    
    'desc_11':{
      required:"Please Enter School Code",
      minlength:"Must be 8 characters",
      maxlength:"Must be 8 characters"     
    },  
    'desc_12':{
      minlength:"Must be 8 characters",
      maxlength:"Must be 8 characters"     
    },   
    'desc_13':{
      minlength:"Must be 8 characters",
      maxlength:"Must be 8 characters"     
    },  
    'desc_14':{
      minlength:"Must be 8 characters",
      maxlength:"Must be 8 characters"     
    },  
    'desc_15':{
      minlength:"Must be 8 characters",
      maxlength:"Must be 8 characters"     
    },  
    'desc_16':{
      minlength:"Must be 8 characters",
      maxlength:"Must be 8 characters"     
    },   
    'desc_17':{
      required:"This field is required" 
    }, 
    'desc_18[]':{
      required:"Please select atleast one field",
    }, 
    'desc_23[]':{
      required:"Please select atleast one field",
    },   
    'desc_27[]':{
      required:"Please select atleast one field",
    },  
    'desc_31[]':{
      required:"Please select atleast one field",
    }, 
    'desc_36[]':{
      required:"Please select atleast one field",
    },  
    'desc_40[]':{
      required:"Please select atleast one field",
    },  
    'desc_75[]':{
      required:"Please select atleast one field",
    },
    'desc_84':{ 
      maxlength:"Max 4 characters allowed"
    }, 
    'desc_85':{
      maxlength:"Max 4 characters allowed"
    }, 
    'desc_86':{
      maxlength:"Max 4 characters allowed"
    }, 
    'desc_87':{
      maxlength:"Max 4 characters allowed"
    },               
    'desc_88[]':{
      required:"Please select atleast one field",
    },   
    'desc_94':{ 
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    }, 
    'desc_95':{     
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    }, 
    'desc_96':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    }, 
    'desc_97':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    },
    'desc_98':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    },         
    'desc_99':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    }, 
    'desc_100':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    },
    'desc_101':{
      min:"Value must not be all zeros",
      maxlength:"Max characters allowed"
    },
    'desc_113':{     
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    }, 
    'desc_114':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    }, 
    'desc_115':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    },
    'desc_116':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    },
    'desc_117':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    }, 
    'desc_118':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    },
    'desc_119':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    },  
    'desc_120':{     
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    }, 
    'desc_121':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    }, 
    'desc_122':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    },
    'desc_123':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    },
    'desc_124':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    }, 
    'desc_125':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    },
    'desc_126':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    },
    'desc_127':{
      min:"Value must not be all zeros",
      maxlength:"Max 4 characters allowed"
    },
    'desc_128':{
      required:"This field is required",
    },     
    // 'desc_32':{
    //   required:true,
    // }, 
    // 'desc_33':{
    //   required:true,
    // }, 
    // 'desc_34':{
    //   required:true,
    // }, 
    // 'desc_35':{
    //   required:true,
    // },                          
  },
 });

 if($('.descpForm1').valid()) {
    $(".descpForm1").submit(function(e) {
      var form = $(this);
      // ajaxSubmit(e, form, reload);
      // location.href = "<?php echo site_url('superadmin/organization'); ?>";
    });
  } 
}

function updateDescription() {
 
 $(".descpForm2").validate({
   rules:{
    '135_desc[]':{
      required:true,
    },
    '147_desc[]':{
      required: function() {
                    if($("#146_desc").is( ":checked" ))
                    { console.log($("#146_desc").val());}
                  },
    },    
    '149_desc':{
      required: function() {
                    if($("#147_desc").is( ":checked" ))
                    { console.log($("#147_desc").val());}
                  },
    }, 
    '150_desc':{
      required: function() {
                    if($("#149_desc").val() != '')
                    { console.log($("#149_desc").val());}
                  },
    }, 
    '151_desc':{
      required: function() {
                    if($("#150_desc").val() != '')
                    { console.log($("#150_desc").val());}
                  },
    },      
    '153_desc[]':{
      required: function() {
                    if($("#152_desc").val() == 1)
                    { console.log($("#152_desc").val());}
                  },
    },
    '162_desc[]':{
      required:true,
    },              
   },
   messages:{
    '135_desc[]':{
      required:"This field is required",
    },
    '147_desc[]':{
      required:"This field is required",
    },    
    '149_desc':{
      required: "This field is required",
    }, 
    '150_desc':{
      required: "This field is required",
    }, 
    '151_desc':{
      required: "This field is required",
    },      
    '153_desc[]':{
      required: "This field is required",
    },
    '162_desc[]':{
      required:"This field is required",
    }, 
   }
 });

 if($('.descpForm2').valid()) {
  
    $(".descpForm2").submit(function(e) {
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

<script type="text/javascript">
$(".chosen").chosen();
</script>