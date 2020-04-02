

<script type="text/javascript">

	    

	    

	    // UPDATE OPERATIVE FORM DATA ADDITIONAL FIELDS

	    // PROPHYLACTIC ANTIBIOTIC FIELDS
	    <?php if ($operative_data_value->prophylactic_antibiotic == "Yes"): ?>
	    	$("#prophylactic-antibiotic-fields").show();
	    <?php else: ?>
	    	$("#prophylactic-antibiotic-fields").hide();
	    <?php endif ?>
	    
        $("input[name='prophylactic-antibiotic']").change(function(){
            var prophylactic_antibiotic_radio_value = $(this).val();
            if(prophylactic_antibiotic_radio_value === "Yes"){
                $("#prophylactic-antibiotic-fields").show();
            }else{
            	$("input[name='prophylactic-antibiotic-amoxicillin']").attr("value","");
				$("input[name='prophylactic-antibiotic-cephalosporin']").attr("value","");
				$("textarea[name='prophylactic-antibiotic-others']").val("");
                $("#prophylactic-antibiotic-fields").hide();
            }
        });

        // PRE STENDED FIELDS
        <?php if ($operative_data_value->pre_stented == "Yes"): ?>
        	$("#pre-stented-fields").show();
        <?php else: ?>
        	$("#pre-stented-fields").hide();
        <?php endif ?>
        
        $("input[name='pre-stented']").change(function(){
            var pre_stented_radio_value = $(this).val();
            if(pre_stented_radio_value === "Yes"){
                $("#pre-stented-fields").show();
            }else{
                $("#pre-stented-fields").hide();
                $("#pre_stended_no_of_days").val("");
				$("textarea[name='pre_stended_reason']").val("");
            }
        });

        // ACCESS SHEETH FIELDS
        <?php if ($operative_data_value->access_sheeth == "Yes"): ?>
        	$("#access-sheeth-fields").show();
        <?php else: ?>
        	$("#access-sheeth-fields").hide();
        <?php endif ?>
        
        $("input[name='access-sheeth']").change(function(){
            var access_sheeth = $(this).val();
            if(access_sheeth === "Yes"){
                $("#access-sheeth-fields").show();
            }else{
                $("#access-sheeth-fields").hide();
                $("input[name='access-sheeth-size']").val("");
				$("input[name='access-sheeth-length']").val("");
            }
        });

        // IRRIGATION TYPE FIELDS
        <?php if ($operative_data_value->irrigation_type == "Others"): ?>
        	$("#irrigation_type_add_field").show();
        <?php else: ?>
        	$("#irrigation_type_add_field").hide();
        <?php endif ?>

        $("#irrigation_type").change(function(){
            if($(this).val() === "Others"){
                $("#irrigation_type_add_field").show();
            }else{
                $("#irrigation_type_add_field").hide();
                $("textarea[name='irrigation_type_others']").val("");
            }
        });

        // POST STENTING FIELDS
        <?php if ($operative_data_value->post_stenting == "Yes"): ?>
        	$("#post-stenting-fields").show();
        <?php else: ?>
        	$("#post-stenting-fields").hide();
        <?php endif ?>

        $("input[name='post-stenting']").change(function(){
            var post_stenting_radio_value = $(this).val();
            if(post_stenting_radio_value === "Yes"){
                $("#post-stenting-fields").show();
            }else{
                $("#post-stenting-fields").hide();
                $("input[name='post-stending-length']").val("");
				$("input[name='post-stending-diameter']").val("");
				$("#post_stenting_type").val("");
				$("#post_stenting_reason").val("");
            }
        });

        // SCOPE EVALUATION FIELDS
        $("#scope_evaluation_maneuverability").ionRangeSlider({
            min: 1,
            max: 10,
            from: <?php echo $operative_data_value->maneuverability_value; ?>,
        });

        $("#scope_evaluation_image_quality").ionRangeSlider({
            min: 1,
            max: 10,
            from: <?php echo $operative_data_value->image_quality_value; ?>,
        });

        $("#scope_evaluation_ergonomics").ionRangeSlider({
            min: 1,
            max: 10,
            from: <?php echo $operative_data_value->ergonomics_value; ?>,
        });

        $("#scope_evaluation_overall_satisfaction").ionRangeSlider({
            min: 1,
            max: 10,
            step: 10,
            from: <?php echo $operative_data_value->overall_satisfaction_value; ?>,
        });

	    // UPDATE OPERATIVE FORM DATA TO DATABASE
        $("#update_form_operative_data").submit(function(e){
	        e.preventDefault();
	        if($("input[name='formSteps']").val() == "2"){
	            $.ajax({
	                url: '<?php echo base_url() ?>patient/updateOperativeData',
	                type: 'POST',
	                data: $(this).serialize(),
	                success: function(data){
	                    $("#message_opertive_data").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Operative Data Updated Successfully</p></div>');
	                    $("#update_form_operative_data").hide();
	                    $("input[name='formSteps']").attr("value","3");
	                },
	                error: function(){
	                    alert('Something is wrong');
	                }
	            });
	        }else{
	            One.helpers('notify', {type: 'danger', icon: 'fa fa-check mr-1', message: 'Please fill Pre-Opertive form first'});
	        }
	    });

	    // POST OPERATION ANTIBIOTIC FIELDS
	    <?php if ($early_post_operative_data_value->post_operation_anitbiotic == "Others"): ?>
	    	$("#post_operation_anitbiotic_add_field").show();
	    <?php else: ?>
	    	$("#post_operation_anitbiotic_add_field").hide();
	    <?php endif ?>
	    
        $("#post_operation_anitbiotic").change(function(){
            if($(this).val() === "Others"){
                $("#post_operation_anitbiotic_add_field").show();
            }else{
            	$("textarea[name='post_operation_anitbiotic_others']").val("");
                $("#post_operation_anitbiotic_add_field").hide();
            }
        });

       // EMERGENCY VISIT FIELD
       <?php if ($early_post_operative_data_value->emergency_visit == "Yes"): ?>
       	 	$("#emergency_visit_add_field").show();	
       <?php else: ?>
       		$("#emergency_visit_add_field").hide();
       <?php endif ?>

       $("input[name='emergency-visit']").change(function(){
       		var emergency_visit_radio_value = $(this).val();
            if(emergency_visit_radio_value === "Yes"){
                $("#emergency_visit_add_field").show();
            }else{
                $("#emergency_visit_add_field").hide();
                $("textarea[name='emergency_visit_reason']").val("");
            }
       });

       // RE ADMISSION FIELD
       <?php if ($early_post_operative_data_value->re_admission == "Yes"): ?>
        	$("#re_admission_add_field").show(); 	
         <?php else: ?>
         	$("#re_admission_add_field").hide();
         <?php endif ?>
        
         $("input[name='re-admission']").change(function(){
            var re_admission_radio_value = $(this).val();
            if(re_admission_radio_value === "Yes"){
                $("#re_admission_add_field").show();
            }else{
                $("#re_admission_add_field").hide();
                $("textarea[name='re_admission_reason']").val("");
            }
        });

	    // UPDATE EARLY POST OPERATIVE FORM DATA TO DATABASE
        $("#update_early_post_operative_form").submit(function(e){
	        e.preventDefault();
	        // alert("HEllo");
	        if($("input[name='formSteps']").val() == "3"){
	            $.ajax({
	                url: '<?php echo base_url() ?>patient/updateEarlyPostOperativeData',
	                type: 'POST',
	                data: $(this).serialize(),
	                success: function(data){
	                    $("#message_early_opertive_data").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Early Post Operative Data Updated Successfully</p></div>');
	                    $("#update_early_post_operative_form").hide();
	                },
	                error: function(){
	                    alert('Something is wrong');
	                }
	            });
	        }else{
	            One.helpers('notify', {type: 'danger', icon: 'fa fa-check mr-1', message: 'Please fill Pre-Opertive form first'});
	        }
	    });




	});
</script>