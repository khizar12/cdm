<?php $this->load->view('Shared/header'); ?>

<style type="text/css" media="screen">
    .accordion.md-accordion.accordion-1 .card .card-header, .accordion.md-accordion.accordion-2 .card .card-header, .accordion.md-accordion.accordion-4 .card .card-header, .accordion.md-accordion.accordion-5 .card .card-header { border: 0; }
    .md-accordion .card .card-header { padding: .50rem .75rem; background: #f5f5f5; border-bottom: 0; }
    .card-header:first-child { border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0; }
    .z-depth-1, .chip:active { box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12) !important; }
    .accordion.md-accordion.accordion-2 .card { background-color: transparent; }
    .accordion.md-accordion.accordion-1 .card, .accordion.md-accordion.accordion-2 .card, .accordion.md-accordion.accordion-4 .card, .accordion.md-accordion.accordion-5 .card { border: 0; }
    .accordion > .card:first-of-type { border-bottom-right-radius: 0; border-bottom-left-radius: 0; }
    .md-accordion .card { overflow: visible; border-bottom: 1px solid #e0e0e0; -webkit-box-shadow: none; box-shadow: none; }
    .accordion h5{ font-size: 0.9rem!important; font-weight: 600; text-transform: uppercase; }
    .btn-primary{ font-weight: 500!important }
    .irs--flat .irs-from, .irs--flat .irs-to, .irs--flat .irs-single, .irs--flat .irs-bar{ background-color: #2c343f; }

    .btn-form-1-success,.btn-form-2-success,.btn-form-3-success,.btn-form-4-success{ background: none!important; color: #46c37b; border: none!important; display: initial; }
</style>

<script src="<?php echo base_url('assets/') ?>jquery.min.js"></script>

<main id="main-container">

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Edit New Patient
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="<?php echo base_url('patient/create'); ?>">Edit New Patient</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="js-wizard-simple block block">
                	<!-- FORMS TABS START -->
                    <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#wizard-simple2-step1" data-toggle="tab">
                            	<i class="btn btn-form-1-success fa fa-fw fa-check"></i>
                            	<?php foreach ($pre_operative_data as $pre_operative_status): ?>
                            		<script type="text/javascript">
                            			$(document).ready(function(){
                            				<?php if ($pre_operative_status->status == 1): ?>
                            					$(".btn-form-1-success").show();
		                					<?php else: ?>
		                						$(".btn-form-1-success").hide();
		                					<?php endif ?>
                            			});
                					</script>
                				<?php endforeach ?>
                            	Pre - Operative Data
                        	</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step2" data-toggle="tab">
                            	<i class="btn btn-form-2-success fa fa-fw fa-check"></i>
                            	<?php foreach ($operative_data as $operative_status): ?>
                            		<script type="text/javascript">
                            			$(document).ready(function(){
                            				<?php if ($operative_status->status == 1): ?>
				                				$(".btn-form-2-success").show();
				                			<?php else: ?>
				                				$(".btn-form-2-success").hide();
				                			<?php endif ?>
                            			});
		                			</script>
		                		<?php endforeach ?>
                            	Operative Data
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step3" data-toggle="tab">
                            	<i class="btn btn-form-3-success fa fa-fw fa-check"></i>
                            	<?php foreach ($early_post_operative_data as $early_post_operative_status): ?>
                            		<script type="text/javascript">
                            			$(document).ready(function(){
                            				<?php if ($early_post_operative_status->status == 1): ?>
				                				$(".btn-form-3-success").show();
				                			<?php else: ?>
				                				$(".btn-form-3-success").hide();
				                			<?php endif ?>
                            			});
		                			</script>
		                		<?php endforeach ?>
                            	Early Post-Operative
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step4" data-toggle="tab">
                            	<i class="btn btn-form-4-success fa fa-fw fa-check"></i>
                            	<?php foreach ($follow_up_data as $follow_up_status): ?>
                            		<script type="text/javascript">
                            			$(document).ready(function(){
                            				<?php if ($follow_up_status->status == 1): ?>
				                				$(".btn-form-4-success").show();
				                			<?php else: ?>
				                				$(".btn-form-4-success").hide();
				                			<?php endif ?>
                            			});
		                			</script>
		                		<?php endforeach ?>
                            	Follow up 1<br/>(2 weeks Out)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step5" data-toggle="tab">
                            	Follow up 2<br/>(4 weeks Out)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step6" data-toggle="tab">
                            	Follow up 3<br/>(12 weeks Out)
                            </a>
                        </li>
                    </ul>
                    <!-- FORMS TABS ENDS -->

                    <div class="block-content col-md-8 block-content-full tab-content px-md-5" style="min-height: 303px;">
                        
                        <!-- UPDATE FORM OF PRE OPERATIVE FORM STARTS -->
                        <div class="tab-pane active" id="wizard-simple2-step1" role="tabpanel">
                            <div id="message_pre_opertive_data"></div>
                            <?php foreach ($patient_data as $patient_data_value): ?>
                            	<?php foreach ($pre_operative_data as $pre_operative_data_value): ?>
                            		<form action="" method="post" id="update_form_pre_operative_data" enctype="multipart/form-data">
                            			<input type="hidden" name="patient_id" value="<?php echo $patient_data_value->id; ?>">
                            			<div class="form-group">
	                                        <label for="group_no">Group Number</label>
	                                        <input class="form-control form-control-alt" type="text" value="<?php echo $patient_data_value->group_number; ?>" name="group_no" readonly="">
	                                    </div>
	                                    <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <?php echo $this->session->userdata('user_code'); ?>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="code" value="<?php echo $patient_data_value->code; ?>" readonly="">
                                            </div>
                                        </div>
	                                    <div class="form-group">
	                                        <label for="age">Age</label>
	                                        <input class="form-control form-control-alt" type="number" id="age" name="age" min="0" value="<?php echo $patient_data_value->patient_age; ?>">
	                                    </div> 
	                                    <div class="form-group">
	                                        <label class="d-block">Sex</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="male" id="male" name="gender" <?php echo ($patient_data_value->patient_sex == "male" ? "checked" : ""); ?>>
	                                            <label class="custom-control-label" for="male">Male</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="female" id="female" name="gender" <?php echo ($patient_data_value->patient_sex == "female" ? "checked" : ""); ?>>
	                                            <label class="custom-control-label" for="female">Female</label>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                        <label for="weight">Weight(kg) <span class="text-danger">*</span></label>
	                                        <input class="form-control form-control-alt" type="number" id="weight" name="weight" min="0" step=".01" value="<?php echo $patient_data_value->patient_weight; ?>">
	                                    </div> 
	                                    <div class="form-group">
	                                        <label for="height">Height(feet) <span class="text-danger">*</span></label>
	                                        <input class="form-control form-control-alt" type="number" id="height" name="height" min="0" step=".01" value="<?php echo $patient_data_value->patient_height; ?>">
	                                    </div> 
	                                    <div class="form-group">
	                                        <label for="bmi">BMI</label>
	                                        <input class="form-control form-control-alt" type="number" id="bmi" name="bmi" step=".01" readonly="" value="<?php echo $patient_data_value->bmi; ?>">
	                                    </div> 

	                                    <h2 class="content-heading border-bottom mb-4 pb-2">Comorbidities</h2>
                                   
		                                <div class="form-group">
		                                    <label class="d-block">DM</label>
		                                    <div class="custom-control custom-radio custom-control-inline">
		                                        <input type="radio" class="custom-control-input" value="yes" id="comorbidities-dm-yes" name="comorbidities-dm" <?php echo ($pre_operative_data_value->dm == "yes" ? "checked" : ""); ?>>
		                                        <label class="custom-control-label" for="comorbidities-dm-yes">Yes</label>
		                                    </div>
		                                    <div class="custom-control custom-radio custom-control-inline">
		                                        <input type="radio" class="custom-control-input" value="no" id="comorbidities-dm-no" name="comorbidities-dm" <?php echo ($pre_operative_data_value->dm == "no" ? "checked" : ""); ?>>
		                                        <label class="custom-control-label" for="comorbidities-dm-no">No</label>
		                                    </div>
		                                </div>
		                                <div class="form-group">
		                                    <label class="d-block">HTN</label>
		                                    <div class="custom-control custom-radio custom-control-inline">
		                                        <input type="radio" class="custom-control-input" value="yes" id="comorbidities-htn-yes" name="comorbidities-htn" <?php echo ($pre_operative_data_value->htn == "yes" ? "checked" : ""); ?>>
		                                        <label class="custom-control-label" for="comorbidities-htn-yes">Yes</label>
		                                    </div>
		                                    <div class="custom-control custom-radio custom-control-inline">
		                                        <input type="radio" class="custom-control-input" value="no" id="comorbidities-htn-no" name="comorbidities-htn" <?php echo ($pre_operative_data_value->htn == "no" ? "checked" : ""); ?>>
		                                        <label class="custom-control-label" for="comorbidities-htn-no">No</label>
		                                    </div>
		                                </div>
		                                <div class="form-group">
		                                    <label class="d-block">IHD</label>
		                                    <div class="custom-control custom-radio custom-control-inline">
		                                        <input type="radio" class="custom-control-input" value="yes" id="comorbidities-ihd-yes" name="comorbidities-ihd" <?php echo ($pre_operative_data_value->ihd == "yes" ? "checked" : ""); ?>>
		                                        <label class="custom-control-label" for="comorbidities-ihd-yes">Yes</label>
		                                    </div>
		                                    <div class="custom-control custom-radio custom-control-inline">
		                                        <input type="radio" class="custom-control-input" value="no" id="comorbidities-ihd-no" name="comorbidities-ihd" <?php echo ($pre_operative_data_value->ihd == "no" ? "checked" : ""); ?>>
		                                        <label class="custom-control-label" for="comorbidities-ihd-no">No</label>
		                                    </div>
		                                </div>
		                                <div class="form-group">
		                                    <label class="d-block">Thyroid Disorder</label>
		                                    <div class="custom-control custom-radio custom-control-inline">
		                                        <input type="radio" class="custom-control-input" value="yes" id="comorbidities-thyroid-disorder-yes" name="comorbidities-thyroid-disorder" <?php echo ($pre_operative_data_value->thyroid_disorder == "yes" ? "checked" : ""); ?>>
		                                        <label class="custom-control-label" for="comorbidities-thyroid-disorder-yes">Yes</label>
		                                    </div>
		                                    <div class="custom-control custom-radio custom-control-inline">
		                                        <input type="radio" class="custom-control-input" value="no" id="comorbidities-thyroid-disorder-no" name="comorbidities-thyroid-disorder" <?php echo ($pre_operative_data_value->thyroid_disorder == "no" ? "checked" : ""); ?>>
		                                        <label class="custom-control-label" for="comorbidities-thyroid-disorder-no">No</label>
		                                    </div>
		                                </div>
		                                <div class="form-group">
	                                        <label class="d-block">Neurogenic Disorder</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" id="comorbidities-neurogenic-disorder-yes" value="yes" name="comorbidities-neurogenic-disorder" <?php echo ($pre_operative_data_value->neurogenic_disorder == "yes" ? "checked" : ""); ?>>
	                                            <label class="custom-control-label" for="comorbidities-neurogenic-disorder-yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" id="comorbidities-neurogenic-disorder-no" value="no" name="comorbidities-neurogenic-disorder" <?php echo ($pre_operative_data_value->neurogenic_disorder == "no" ? "checked" : ""); ?>>
	                                            <label class="custom-control-label" for="comorbidities-neurogenic-disorder-no">No</label>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
                                        <label for="others">Others</label>
	                                        <textarea class="form-control" id="others" name="others" rows="5"><?php echo $pre_operative_data_value->others; ?></textarea>
	                                    </div>

	                                    <div class="form-group">
	                                        <label class="d-block">UTI</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="yes" id="uti-yes" name="uti" <?php echo ($pre_operative_data_value->uti == "yes" ? "checked" : ""); ?>>
	                                            <label class="custom-control-label" for="uti-yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="no" id="uti-no" name="uti" <?php echo ($pre_operative_data_value->uti == "no" ? "checked" : ""); ?>>
	                                            <label class="custom-control-label" for="uti-no">No</label>
	                                        </div>
	                                    </div>

	                                    <h2 class="content-heading border-bottom mb-4 pb-2">Laboratory Tests</h2>
                                         
                                        <style type="text/css" media="screen">
                                        	.label-flex{ display: flex; align-items: center; }
                                        	.df{ display: flex; margin-bottom: 0rem; }
                                        </style>	
                                    
	                                    <div class="form-group">
	                                    	<div class="row">
	                                    		<div class="col-md-2 df">
		                                    		<label class="label-flex">Creatinine</label>	
		                                    	</div>
		                                    	<div class="col-md-5 custom-file">
		                                    		<input class="form-control form-control-alt" type="text" id="creatinine" name="creatinine" value="<?php if(isset($pre_laboratory_tests)) echo $pre_laboratory_tests->creatinine; ?>" required>
		                                    	</div>
		                                    	<div class="col-md-5 custom-file">
		                                    		<input type="file" class="custom-file-input" data-toggle="custom-file-input" id="creatinine_image" name="creatinine-image">
		                                            <label class="custom-file-label" for="xray">Choose file</label>
		                                    	</div>
	                                    	</div>
	                                    </div>
                                    
	                                    <div class="form-group">
	                                    	<div class="row">
	                                    		<div class="col-md-2 df">
	                                        		<label class="label-flex">Urea</label>
	                                        	</div>
		                                        <div class="custom-file col-md-5">
		                                            <input class="form-control form-control-alt" type="text" id="urea" name="urea" value="<?php if(isset($pre_laboratory_tests)) echo $pre_laboratory_tests->urea; ?>" required>
		                                        </div>
		                                        <div class="custom-file col-md-5">
		                                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="urea_image" name="urea-image">
		                                            <label class="custom-file-label" for="xray">Choose file</label>
		                                        </div>
		                                    </div>
	                                    </div>
                                    
	                                    <div class="form-group">
	                                    	<div class="row">
	                                    		<div class="col-md-2 df">
	                                        		<label class="label-flex">Calcium </label>
	                                        	</div>
		                                        <div class="custom-file col-md-5">
		                                            <input class="form-control form-control-alt" type="text" id="calcium" name="calcium" value="<?php if(isset($pre_laboratory_tests)) echo $pre_laboratory_tests->calcium; ?>" required>
		                                        </div>
		                                        <div class="custom-file col-md-5">
		                                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="calcium_image" name="calcium-image">
		                                            <label class="custom-file-label" for="xray">Choose file</label>
		                                        </div>
		                                    </div>
	                                    </div>
                                    
	                                    <div class="form-group">
	                                    	<div class="row">
	                                    		<div class="col-md-2 df">
	                                        		<label class="label-flex">Uric Acid </label>
	                                        	</div>
		                                        <div class="custom-file col-md-5">
		                                            <input class="form-control form-control-alt" type="text" id="uric_acid" name="uric-acid" value="<?php if(isset($pre_laboratory_tests)) echo $pre_laboratory_tests->uric_acid; ?>" required>
		                                        </div>
		                                        <div class="custom-file col-md-5">
		                                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="uric_acid_image" name="uric-acid-image">
		                                            <label class="custom-file-label" for="xray">Choose file</label>
		                                        </div>
		                                    </div>
	                                    </div>
                                    
	                                    <div class="form-group">
	                                    	<div class="row">
	                                    		<div class="col-md-2 df">
	                                        		<label class="label-flex">Urine </label>
	                                        	</div>
		                                        <div class="custom-file col-md-5">
		                                              <input class="form-control form-control-alt" type="text" id="urine" name="urine" value="<?php  if(isset($pre_laboratory_tests)) echo $pre_laboratory_tests->urine; ?>" required>
		                                        </div>
		                                        <div class="custom-file col-md-5">
		                                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="urine_image"  name="urine-image">
		                                            <label class="custom-file-label" for="xray">Choose file</label>
		                                        </div>
		                                    </div>
	                                    </div>

	                                    <h2 class="content-heading border-bottom mb-4 pb-2">Radiological Evaluation</h2>

	                                    <div class="form-group">
	                                        <label for="medication">Medication</label>
	                                        <textarea class="form-control" id="medication" name="medication" rows="5" required><?php echo $pre_operative_data_value->medication; ?></textarea>
	                                    </div>

	                                    <div class="form-group">
	                                        <label>Xray</label>
	                                        <div class="custom-file">
	                                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="xray" name="xray">
	                                            <label class="custom-file-label" for="xray">
	                                            	<?php echo ($pre_operative_data_value->xray == "" ? "Choose file" : $pre_operative_data_value->xray); ?>
	                                            </label>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                        <label>US</label>
	                                        <div class="custom-file">
	                                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="us" name="us">
	                                            <label class="custom-file-label" for="us">
	                                            	<?php echo ($pre_operative_data_value->us == "" ? "Choose file" : $pre_operative_data_value->us); ?>
	                                            </label>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                        <label>CT</label>
	                                        <div class="custom-file">
	                                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="ct" name="ct">
	                                            <label class="custom-file-label" for="ct">
	                                            	<?php echo ($pre_operative_data_value->ct == "" ? "Choose file" : $pre_operative_data_value->ct); ?>
	                                            </label>
	                                        </div>
	                                    </div>
	                                    
	                                    <h2 class="content-heading border-bottom mb-4 pb-2">Stone Criteria</h2>

	                                    <div class="form-group">
	                                        <label class="d-block">Side</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="left" id="left" name="side" <?php echo ($pre_operative_data_value->side == "left" ? "checked" : ""); ?>>
	                                            <label class="custom-control-label" for="left">Left</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="right" id="right" name="side" <?php echo ($pre_operative_data_value->side == "right" ? "checked" : ""); ?>>
	                                            <label class="custom-control-label" for="right">Right</label>
	                                        </div>
	                                    </div>

	                                    <div class="form-group">
	                                        <label for="number-of-stones">Number of Stones <span class="text-danger">*</span></label>
	                                        <input class="form-control form-control-alt" type="text" value="<?php echo $pre_operative_data_value->number_of_stones; ?>" name="number-of-stones" readonly="">
	                                    </div>
                                        
                                        
                                        <div class="form-group">
	                                        <label class="d-block">Stones in Ureteric</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="yes" id="stones-ureteric-yes" name="stones-ureteric" <?php echo ($pre_operative_data_value->stones_ureteric == "yes" ? "checked" : ""); ?>  >
	                                            <label class="custom-control-label" for="stones-ureteric-yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="no" id="stones-ureteric-no" name="stones-ureteric" <?php echo ($pre_operative_data_value->stones_ureteric == "no" ? "checked" : ""); ?>>
	                                            <label class="custom-control-label" for="stones-ureteric-no">No</label>
	                                        </div>
	                                    </div>
                                    
                                      	<div class="form-group">
	                                        <label class="d-block">Stones in Contralateral</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="yes" id="stones-contralateral-yes" name="stones-contralateral"  <?php echo ($pre_operative_data_value->stones_contralateral == "yes" ? "checked" : ""); ?>  >
	                                            <label class="custom-control-label" for="stones-contralateral-yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="no" id="stones-contralateral-no" name="stones-contralateral"  <?php echo ($pre_operative_data_value->stones_contralateral == "no" ? "checked" : ""); ?>  >
	                                            <label class="custom-control-label" for="stones-contralateral-no">No</label>
	                                        </div>
	                                    </div>

	                                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                                    		<?php 
                                    			$i = 1;
                                    			foreach ($stone_data as $key => $stone_value){ 
                                    		?>

	                                    	<div class="card mb-2">
	                                    		<input type="hidden" name="stone_data[<?php echo $i ?>][id]" value="<?php echo $stone_value->id; ?>">
	                                    		<div class="card-header" role="tab" id="heading_stone_<?php echo $i; ?>">
	                                    			<a data-toggle="collapse" data-parent="#accordionEx" href="#collapse_stone_<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse_stone_<?php echo $i; ?>">
	                                    				<h5 class="mb-0">Stone <?php echo $i; ?> <i class="fas fa-angle-down rotate-icon float-right"></i></h5>
	                                    			</a>
	                                    		</div>
	                                    		<div id="collapse_stone_<?php echo $i; ?>" class="collapse show" role="tabpanel" aria-labelledby="heading_stone_<?php echo $i; ?>" data-parent="#accordionEx">
	                                    			<div class="card-body p-3">
	                                    				<div class="form-group">
	                                    					<label>Length(cm)</label>
	                                    					<input class="form-control form-control-alt" type="number" name="stone_data[<?php echo $i; ?>][length]" min="0" step=".01" value="<?php echo $stone_value->length; ?>">
	                                    				</div>
	                                    				<div class="form-group">
	                                    					<label>Width(cm)</label>
	                                    					<input class="form-control form-control-alt" type="number" name="stone_data[<?php echo $i; ?>][width]" min="0" step=".01" value="<?php echo $stone_value->width; ?>">
	                                    				</div>
                                                        <div class="form-group">
	                                    					<label>Depth(cm)</label>
	                                    					<input class="form-control form-control-alt" type="number" name="stone_data[<?php echo $i; ?>][depth]" min="0" step=".01" value="<?php echo $stone_value->depth; ?>">
	                                    				</div>
	                                    				<div class="form-group">
	                                    					<label>Volume(cm<sup>3</sup>)</label>
	                                    					<input class="form-control form-control-alt" type="number" name="stone_data[<?php echo $i; ?>][volume]" min="0" step=".01" value="<?php echo $stone_value->volume; ?>">
	                                    				</div>
	                                    				<div class="form-group">
	                                    					<label>Hounsfield(HU)</label>
	                                    					<input class="form-control form-control-alt" type="number" name="stone_data[<?php echo $i; ?>][hu]" min="0" step=".01" value="<?php echo $stone_value->hounsfield; ?>">
	                                    				</div>
                                                        <div class="form-group">
	                                    					<label>Stone Location </label>
                                                            
	                                    					<select class="form-control form-control-alt" id="stone-site" name="stone-site" required>
	                                                            <option value="Renal" <?php echo ($stone_value->stone_site == "Renal" ? "selected" : ""); ?> >Renal</option>
	                                                            <option value="Pelvis" <?php echo ($stone_value->stone_site == "Pelvis" ? "selected" : ""); ?>>Pelvis</option>
	                                                            <option value="Lower calyx" <?php echo ($stone_value->stone_site == "Lower calyx" ? "selected" : ""); ?>>Lower calyx</option>
																<option value="Middle calyx" <?php echo ($stone_value->stone_site == "Middle calyx" ? "selected" : ""); ?>>Middle calyx</option>
																<option value="upper calyx" <?php echo ($stone_value->stone_site == "upper calyx" ? "selected" : ""); ?>>upper calyx</option>
                                                        	</select>
	                                    				</div>
                                                        
                                                        
	                                    			</div>
	                                    		</div>
	                                    	</div>
	                                    	<?php 
	                                    			$i++;
	                                    		}; 
	                                    	?>

	                                    	<div class="form-group">
		                                        <label for="hydronephrosis">Hydronephrosis</label>
		                                        <select class="form-control form-control-alt" id="hydronephrosis" name="hydronephrosis">
		                                        	<?php $hydronephrosis = array('Mild' , 'Moderate' , 'Severe' , 'None'); ?>
		                                            <option value="">Select Option</option>
		                                            <?php foreach ($hydronephrosis as $hydronephrosis_value): ?>
		                                            	<?php
		                                            		echo ($pre_operative_data_value->hydronephrosis == $hydronephrosis_value ? "<option value='". $hydronephrosis_value ."' selected>". $hydronephrosis_value ."</option>" : "<option value='". $hydronephrosis_value ."'>". $hydronephrosis_value ."</option>");  
		                                            	?>
		                                            <?php endforeach ?>
		                                        </select>
		                                    </div>
		                                    <?php if ($patient_data_value->group_number == "1"): ?>
		                                    	
		                                    <?php else: ?>
		                                    	<div class="form-group">
			                                        <label for="reusable-scope">Reusable Scope</label>
			                                        <select class="form-control form-control-alt" id="reusable-scope" name="reusable-scope" required="">
			                                        	<?php $reusable_scope = array('Storz' , 'Olympus' , 'Wolf' , 'Others'); ?>
				                                            <option value="">Please select the below Reusable Scope</option>
				                                            <?php foreach ($reusable_scope as $reusable_scope_value): ?>
				                                            	<?php
				                                            		echo ($pre_operative_data_value->reusable_scope_2 == $reusable_scope_value ? "<option value='".$reusable_scope_value."' selected>".$reusable_scope_value."</option>" : "<option value='".$reusable_scope_value."'>".$reusable_scope_value."</option>");
				                                            	?>
				                                            <?php endforeach ?>
			                                        </select>
			                                    </div>
		                                    <?php endif ?>
		                                    
		                                    <div class="form-group">
		                                        <input type="submit" id="update_pre_operative_data" name="update_pre_operative_data" value="Update" class="btn btn-primary">
		                                    </div>
                                    	</div>
                            		</form>
                            	<?php endforeach ?>
                            <?php endforeach ?>
                        </div>
                        <!-- UPDATE FORM OF PRE OPERATIVE FORM ENDS -->

                        <!-- UPDATE FORM OF OPERATIVE DATA STARTS -->
                        <div class="tab-pane" id="wizard-simple2-step2" role="tabpanel">
                        	<div id="message_opertive_data"></div>
                        	<form action="#" method="post" id="update_form_operative_data" accept-charset="utf-8">
                        		<?php foreach ($operative_data as $operative_data_value): ?>
                        			<input type="hidden" name="patient_id" value="<?php echo $operative_data_value->patient_id; ?>">
                        			
                        			<div class="form-group">
                                        <label for="date-of-surgery">Date of Surgery</label>
                                        <input type="text" class="js-flatpickr form-control bg-white" id="date-of-surgery" name="date-of-surgery" placeholder="Y-m-d" value="<?php echo date('m-d-y',strtotime($operative_data_value->date_of_surgery)); ?>">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="anesthesia">Anesthesia</label>
                                        <select class="form-control form-control-alt" id="anesthesia" name="anesthesia">
                                            <?php $anesthesia = array('General' , 'Spinal'); ?>
                                            <option value="">Select Option</option>
                                            <?php foreach ($anesthesia as $anesthesia_value): ?>
                                            	<?php if ($operative_data_value->anesthesia == $anesthesia_value): ?>
                                            		<option value="<?php echo $anesthesia_value; ?>" selected><?php echo $anesthesia_value; ?></option>
                                            	<?php else: ?>
                                            		<option value="<?php echo $anesthesia_value; ?>"><?php echo $anesthesia_value; ?></option>
                                            	<?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Prophylactic Antibiotic</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="prophylactic-antibiotic-yes" name="prophylactic-antibiotic" <?php echo ($operative_data_value->prophylactic_antibiotic == "Yes") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="prophylactic-antibiotic-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="prophylactic-antibiotic-no" name="prophylactic-antibiotic" <?php echo ($operative_data_value->prophylactic_antibiotic == "No") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="prophylactic-antibiotic-no" >No</label>
                                        </div>
                                    </div>

                                	<div id="prophylactic-antibiotic-fields">
                                        <div class="form-group">
                                            <label for="code">Amoxicillin</label>
                                            <input class="form-control form-control-alt" type="text" name="prophylactic-antibiotic-amoxicillin" value="<?php echo $operative_data_value->prophylactic_antibiotic_amoxicillin; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="code">Cephalosporin</label>
                                            <input class="form-control form-control-alt" type="text" name="prophylactic-antibiotic-cephalosporin" value="<?php echo $operative_data_value->prophylactic_antibiotic_cephalosporin; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="prophylactic-antibiotic-others">Others</label>
                                            <textarea class="form-control" id="prophylactic-antibiotic-others" name="prophylactic-antibiotic-others" rows="5"><?php echo $operative_data_value->prophylactic_antibiotic_others; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Pre-Stented</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="pre-stented-yes" name="pre-stented" <?php echo ($operative_data_value->pre_stented == "Yes") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="pre-stented-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="pre-stented-no" name="pre-stented" <?php echo ($operative_data_value->pre_stented == "No") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="pre-stented-no">No</label>
                                        </div>
                                    </div>

                                    <div id="pre-stented-fields">
                                        <div class="form-group">
                                            <label for="pre_stended_no_of_days">Number of Days</label>
                                            <select class="form-control form-control-alt" id="pre_stended_no_of_days" name="pre_stended_no_of_days">
                                                <option value="">Select Option</option>
                                                <?php for ($i=0; $i <= 20 ; $i++) { 
                                                	if ($operative_data_value->pre_stended_no_of_days == $i) {
                                                		echo "<option value='".$i."' selected>".$i."</option>";
                                                	}else{
                                                    	echo "<option value='".$i."'>".$i."</option>";
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pre_stended_reason">Reason</label>
                                            <textarea class="form-control" id="pre_stended_reason" name="pre_stended_reason" rows="5"><?php echo $operative_data_value->pre_stended_reason; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Access Sheeth</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="access-sheeth-yes" name="access-sheeth" <?php echo ($operative_data_value->access_sheeth == "Yes") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="access-sheeth-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="access-sheeth-no" name="access-sheeth" <?php echo ($operative_data_value->access_sheeth == "No") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="access-sheeth-no">No</label>
                                        </div>
                                    </div>

                                    <div id="access-sheeth-fields">
                                        <div class="form-group">
                                            <label for="access-sheeth-size">Size(Fr) <span class="text-danger">*</span></label>
                                            <input class="form-control form-control-alt" type="text" id="access-sheeth-size" name="access-sheeth-size" value="<?php echo $operative_data_value->access_sheeth_size; ?>" maxlength="5">
                                        </div>
                                        <div class="form-group">
                                            <label for="access-sheeth-length">Length(cm) <span class="text-danger">*</span></label>
                                            <input class="form-control form-control-alt" type="number" id="access-sheeth-length" name="access-sheeth-length" min="0" step=".01" value="<?php echo $operative_data_value->access_sheeth_length; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Safety Wire</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="safety-wire-yes" name="safety-wire" <?php echo ($operative_data_value->safety_wire == "Yes") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="safety-wire-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="safety-wire-no" name="safety-wire" <?php echo ($operative_data_value->safety_wire == "No") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="safety-wire-no">No</label>
                                        </div>
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Laser</h2>
                                    <?php 
                                        $laser_type = array("Holmium" , "Thulium"); 
                                        $laser_mode = array("Dusting" , "Fragmentation" , "Both");
                                    ?>
                                    <div class="form-group">
                                        <label for="laser_type">Type</label>
                                        <select class="form-control form-control-alt" id="laser_type" name="laser_type">
                                            <option value="">Select Option</option>
                                            <?php foreach ($laser_type as $laser_type_value): ?>
                                            	<?php if ($operative_data_value->laser_type == $laser_type_value): ?>
                                            		<option value="<?php echo $laser_type_value ?>" selected><?php echo $laser_type_value ?></option>
                                            	<?php else: ?>
                                            		<option value="<?php echo $laser_type_value ?>"><?php echo $laser_type_value ?></option>
                                            	<?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Machine</label>
                                        <input class="form-control form-control-alt" type="text" name="laser-machine" value="<?php echo $operative_data_value->laser_machine; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Fiber Size</label>
                                        <input class="form-control form-control-alt" type="text" name="laser-fiber-size" value="<?php echo $operative_data_value->laser_fiber_size; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="laser_mode">Mode</label>
                                        <select class="form-control form-control-alt" id="laser_mode" name="laser_mode">
                                            <option value="">Select Option</option>
                                            <?php foreach ($laser_mode as $laser_mode_value): ?>
                                            	<?php if ($operative_data_value->laser_mode == $laser_mode_value): ?>
                                            		<option value="<?php echo $laser_mode_value ?>" selected><?php echo $laser_mode_value ?></option>
                                            	<?php else: ?>
                                            		<option value="<?php echo $laser_mode_value ?>"><?php echo $laser_mode_value ?></option>
                                            	<?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
									
                                    <div id="laser_mode_add_fields">
                                    	<div class="form-group">
	                                        <label for="laser_energy">Energy(Jouls) <span class="text-danger">*</span></label>
	                                        <input class="form-control form-control-alt" type="number" id="laser_energy" name="laser_energy" min="0" step=".01" value="<?php echo $operative_data_value->laser_energy; ?>" required>
	                                    </div> 
	                                    <div class="form-group">
	                                        <label for="laser_frequency">Frequency(Hertz) <span class="text-danger">*</span></label>
	                                        <input class="form-control form-control-alt" type="number" id="laser_frequency" name="laser_frequency" min="0" step=".01" value="<?php echo $operative_data_value->laser_frequency; ?>" required>
	                                    </div> 
	                                    <div class="form-group" id="pulse_duration_field">
	                                        <label class="d-block">Pulse duration</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Short" id="laser_pulse_rate_short" name="laser_pulse_rate" <?php echo ($operative_data_value->laser_pulse_rate == "Short") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="laser_pulse_rate_short">Short</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Long" id="laser_pulse_rate_long" name="laser_pulse_rate" <?php echo ($operative_data_value->laser_pulse_rate == "Long") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="laser_pulse_rate_long">Long</label>
	                                        </div>
	                                    </div>
                                    </div>

                                  	<script type="text/javascript">
                                  		$(document).ready(function(){
                                    		<?php if ($operative_data_value->laser_mode == "Dusting" || $operative_data_value->laser_mode == "Fragmentation"): ?>
                                    			$("#laser_mode_add_fields").show();
                                    			$("#pulse_duration_field").hide();
                                    		<?php elseif ($operative_data_value->laser_mode == "Both"): ?>
                                    			$("#laser_mode_add_fields").show();
                                    		<?php else: ?>											    
                                    			$("#laser_mode_add_fields").hide();
                                    		<?php endif ?>

                                    		$("select[name='laser_mode']").change(function(){
                                    			var laser_mode = $(this).val();
                                    			if(laser_mode === "Dusting" || laser_mode === "Fragmentation"){
	                                    			$("#laser_mode_add_fields").show();
	                                    			$("#pulse_duration_field").hide();
	                                    		}
	                                    		else{
	                                    			$("#laser_mode_add_fields").show();
	                                    			$("#pulse_duration_field").show();
	                                    		}
                                    		});

                                  		});
                                  	</script>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Basket</h2>
                                    <div class="form-group">
                                        <label for="basket-size">Size(Fr) <span class="text-danger">*</span></label>
                                        <input class="form-control form-control-alt" type="number" id="basket-size" name="basket-size" min="0" step=".01" value="<?php echo $operative_data_value->basket_size; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Type</label>
                                        <input class="form-control form-control-alt" type="text" name="basket-type" value="<?php echo $operative_data_value->basket_type ?>">
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Irrigation</h2>
                                    <?php 
                                        $irrigation_type       = array("Saline" , "Others"); 
                                        $irrigation_temprature = array("Room Temprature" , "Warm");
                                        $irrigation_delivery   = array("Gravity held" , "Manual pump" , "Automatic pump");
                                    ?>
                                    <div class="form-group">
                                        <label for="irrigation_type">Type</label>
                                        <select class="form-control form-control-alt" id="irrigation_type" name="irrigation_type" required="">
                                            <option value="">Select Option</option>
                                            <?php foreach ($irrigation_type as $irrigation_type_value): ?>
                                            	<?php if ($operative_data_value->irrigation_type == $irrigation_type_value): ?>
                                            		<option value="<?php echo $irrigation_type_value ?>" selected><?php echo $irrigation_type_value ?></option>
                                            	<?php else: ?>
                                            		<option value="<?php echo $irrigation_type_value ?>"><?php echo $irrigation_type_value ?></option>
                                            	<?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group" id="irrigation_type_add_field">
                                        <label for="irrigation_type_others">Others</label>
                                        <textarea class="form-control" id="irrigation_type_others" name="irrigation_type_others" rows="5"><?php echo $operative_data_value->irrigation_type_others; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="irrigation_temprature">Temprature</label>
                                        <select class="form-control form-control-alt" id="irrigation_temprature" name="irrigation_temprature" required="">
                                            <option value="">Select Option</option>
                                            <?php foreach ($irrigation_temprature as $irrigation_temprature_value): ?>
                                            	<?php if ($operative_data_value->irrigation_temprature ==$irrigation_temprature_value): ?>
                                            		<option value="<?php echo $irrigation_temprature_value ?>" selected><?php echo $irrigation_temprature_value ?></option>
                                            	<?php else: ?>
                                            		<option value="<?php echo $irrigation_temprature_value ?>"><?php echo $irrigation_temprature_value ?></option>
                                            	<?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="irrigation_delivery">Delivery</label>
                                        <select class="form-control form-control-alt" id="irrigation_delivery" name="irrigation_delivery" required="">
                                            <option value="">Select Option</option>
                                            <?php foreach ($irrigation_delivery as $irrigation_delivery_value): ?>
                                            	<?php if ($operative_data_value->irrigation_delivery ==$irrigation_delivery_value): ?>
                                            		<option value="<?php echo $irrigation_delivery_value ?>" selected><?php echo $irrigation_delivery_value ?></option>
                                            	<?php else: ?>
                                            		<option value="<?php echo $irrigation_delivery_value ?>"><?php echo $irrigation_delivery_value ?></option>
                                            	<?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Post Stenting</h2>
                                    <div class="form-group">
                                        <label class="d-block">Post Stenting</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="post-stenting-yes" name="post-stenting" <?php echo ($operative_data_value->post_stenting == "Yes") ? "checked" : ""; ?>>
                                            <label class="custom-control-label" for="post-stenting-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="post-stenting-no" name="post-stenting" <?php echo ($operative_data_value->post_stenting == "No") ? "checked" : ""; ?>>
                                            <label class="custom-control-label" for="post-stenting-no">No</label>
                                        </div>
                                    </div>

                                    <div id="post-stenting-fields">
                                        <?php 
                                            $post_stenting_type   = array("Double J" , "Single J", "Ureteral Catheter"); 
                                            $post_stenting_reason = array("Injury" , "Bleeding" , "Fragments" , "Prolonged procedure duration" , "Use of access sheets" , "Preference");  
                                        ?>
                                        <div class="form-group">
                                            <label for="post_stenting_type">Type</label>
                                            <select class="form-control form-control-alt" id="post_stenting_type" name="post_stenting_type">
                                                <option value="">Select Option</option>
                                                <?php foreach ($post_stenting_type as $post_stenting_type_value): ?>
                                                	<?php if ($operative_data_value->post_stenting_type == $post_stenting_type_value): ?>
                                                		<option value="<?php echo $post_stenting_type_value ?>" selected><?php echo $post_stenting_type_value ?></option>
                                                	<?php else: ?>
                                                		<option value="<?php echo $post_stenting_type_value ?>"><?php echo $post_stenting_type_value ?></option>
                                                	<?php endif ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <h2 class="content-heading border-bottom mb-4 pb-2">Size</h2>
                                        <div class="form-group">
                                            <label for="post-stending-length">Length(cm) <span class="text-danger">*</span></label>
                                            <input class="form-control form-control-alt" type="number" id="post-stending-length" name="post-stending-length" min="0" step=".01" value="<?php echo $operative_data_value->post_stending_length; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="basket-diameter">Diameter(Fr) <span class="text-danger">*</span></label>
                                            <input class="form-control form-control-alt" type="number" id="post-stending-diameter" name="post-stending-diameter" min="0" step=".01" value="<?php echo $operative_data_value->post_stending_diameter; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="post_stenting_reason">Reason</label>
                                            <select class="form-control form-control-alt" id="post_stenting_reason" name="post_stenting_reason">
                                                <option value="">Select Option</option>
                                                <?php foreach ($post_stenting_reason as $post_stenting_reason_value): ?>
                                                	<?php if ($operative_data_value->post_stenting_reason == $post_stenting_reason_value): ?>
                                                		<option value="<?php echo $post_stenting_reason_value ?>" selected><?php echo $post_stenting_reason_value ?></option>
                                                	<?php else: ?>
                                                		<option value="<?php echo $post_stenting_reason_value ?>"><?php echo $post_stenting_reason_value ?></option>
                                                	<?php endif ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Complications</h2>
                                    <div class="form-group">
                                        <label class="d-block">Injury</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="complications-yes" name="complications" <?php echo ($operative_data_value->complications == "Yes") ? "checked" : ""; ?>>
                                            <label class="custom-control-label" for="complications-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="complications-no" name="complications" <?php echo ($operative_data_value->complications == "No") ? "checked" : ""; ?>>
                                            <label class="custom-control-label" for="complications-no">No</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Perforation</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="complications_perforation-yes" name="complications_perforation" <?php echo ($operative_data_value->complications_perforation == "Yes") ? "checked" : ""; ?>>
                                            <label class="custom-control-label" for="complications_perforation-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="complications_perforation-no" name="complications_perforation" <?php echo ($operative_data_value->complications_perforation == "No") ? "checked" : ""; ?>>
                                            <label class="custom-control-label" for="complications_perforation-no">No</label>
                                        </div>
                                    </div>

                                    <?php 
                                        $complications_bleeding   = array("Significant" , "Non – Significant"); 
                                         
                                    ?>
                                    <div class="form-group">
                                        <label for="complications_bleeding">Bleeding</label>
                                        <select class="form-control form-control-alt" id="complications_bleeding" name="complications_bleeding">
                                            <option value="">Select Option</option>
                                            <?php foreach ($complications_bleeding as $complications_bleeding_value): ?>
                                            	<?php if ($operative_data_value->complications_bleeding == $complications_bleeding_value): ?>
                                            		<option value="<?php echo $complications_bleeding_value ?>" selected><?php echo $complications_bleeding_value ?></option>
                                            	<?php else: ?>
                                            		<option value="<?php echo $complications_bleeding_value ?>"><?php echo $complications_bleeding_value ?></option>
                                            	<?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="complications_others">Others</label>
                                        <textarea class="form-control" id="complications_others" name="complications_others" rows="5"><?php echo $operative_data_value->complications_others; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="operative-time">Operative Time(minutes) <span class="text-danger">*</span></label>
                                        <input class="form-control form-control-alt" type="number" id="operative-time" name="operative-time" min="0" value="<?php echo $operative_data_value->operative_time; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="lasing-time">Lasing Time(minutes) <span class="text-danger">*</span></label>
                                        <input class="form-control form-control-alt" type="number" id="lasing-time" name="lasing-time" min="0" value="<?php echo $operative_data_value->lasing_time; ?>">
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Scope Evaluation</h2>
                                    <div class="form-group mb-5">
                                        <label class="mb-4">Maneuverability</label>
                                        <input type="range" id="scope_evaluation_maneuverability" oninput="$('#maneuverability_value').attr('value',this.value)" />
                                        <input type="hidden" name="maneuverability_value" id="maneuverability_value" value="<?php echo $operative_data_value->maneuverability_value; ?>">
                                    </div>

                                    <div class="form-group mb-5">
                                        <label class="mb-4">Image Quality</label>
                                        <input type="range" id="scope_evaluation_image_quality" oninput="$('#image_quality_value').attr('value',this.value)" />
                                        <input type="hidden" name="image_quality_value" id="image_quality_value" value="<?php echo $operative_data_value->image_quality_value; ?>">
                                    </div>

                                    <div class="form-group mb-5">
                                        <label class="mb-4">Ergonomics</label>
                                        <input type="range" id="scope_evaluation_ergonomics" oninput="$('#ergonomics_value').attr('value',this.value)" />
                                        <input type="hidden" name="ergonomics_value" id="ergonomics_value" value="<?php echo $operative_data_value->ergonomics_value; ?>">
                                    </div>

                                    <div class="form-group mb-5">
                                        <label class="mb-4">Overall satisfaction</label>
                                        <input type="range" id="scope_evaluation_overall_satisfaction" oninput="$('#overall_satisfaction_value').attr('value',this.value)" />
                                        <input type="hidden" name="overall_satisfaction_value" id="overall_satisfaction_value" value="<?php echo $operative_data_value->overall_satisfaction_value; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" id="update_operative_data" name="update_operative_data" value="Update" class="btn btn-primary">
                                    </div>
                        		<?php endforeach ?>
                        	</form>
                        </div>
                        <!-- UPDATE FORM OF OPERATIVE DATA ENDS -->

                        <!-- UPDATE FORM OF EARLY POST OPERATIVE DATA STARTS -->
                        <div class="tab-pane" id="wizard-simple2-step3" role="tabpanel">
                            <div id="message_early_opertive_data"></div>
                            <form action="#" method="post" id="update_early_post_operative_form" accept-charset="utf-8">
                            	<?php foreach ($early_post_operative_data as $early_post_operative_data_value): ?>
                            		<input type="hidden" class="patient_id" name="patient_id" value="<?php echo $early_post_operative_data_value->patient_id; ?>">

                            		<div class="form-group">
                                        <label for="hospital_stay">Hospital Stay</label>
                                        <select class="form-control form-control-alt" id="hospital_stay" name="hospital_stay">
                                            <option value="">Select Option</option>
                                            <?php for ($i=0; $i <= 20 ; $i++) { 
                                            	if ($early_post_operative_data_value->hospital_stay == $i) {
                                            		echo "<option value='".$i."' selected>".$i."</option>";
                                            	} else {
                                            		echo "<option value='".$i."'>".$i."</option>";
                                            	};
                                            } ?>
                                        </select>

                                        <h2 class="content-heading border-bottom mb-4 pb-2">Post Operation Analgesia</h2>

	                                    <?php 
	                                        $narcotics = array("Non-steroidal Anti-inflammatory" , "Paracetamol" , "Combination" , "None");
	                                    ?>
	                                    <div class="form-group">
	                                        <label for="narcotics">Narcotics</label>
	                                        <select class="form-control form-control-alt" id="narcotics" name="narcotics" required="">
	                                            <option value="">Select Option</option>
	                                            <?php foreach ($narcotics  as $narcotics_value): ?>
	                                            	<?php if ($early_post_operative_data_value->narcotics == $narcotics_value): ?>
	                                            		<option value="<?php echo $narcotics_value ?>" selected><?php echo $narcotics_value ?></option>
	                                            	<?php else: ?>
	                                            		<option value="<?php echo $narcotics_value ?>"><?php echo $narcotics_value ?></option>
	                                            	<?php endif ?>
	                                            <?php endforeach ?>
	                                        </select>
	                                    </div>

	                                    <?php 
	                                        $post_operation_anitbiotic = array("Amoxicillin" , "Cephalosporin" , "Quinolone" , "Others");
	                                    ?>
	                                    <div class="form-group">
	                                        <label for="post_operation_anitbiotic">Post – Operation Antibiotic</label>
	                                        <select class="form-control form-control-alt" id="post_operation_anitbiotic" name="post_operation_anitbiotic" required="">
	                                            <option value="">Select Option</option>
	                                            <?php foreach ($post_operation_anitbiotic as $post_operation_anitbiotic_value): ?>
	                                                <?php if ($early_post_operative_data_value->post_operation_anitbiotic == $post_operation_anitbiotic_value): ?>
	                                                	<option value="<?php echo $post_operation_anitbiotic_value ?>" selected><?php echo $post_operation_anitbiotic_value ?></option>
	                                                <?php else: ?>
	                                                	<option value="<?php echo $post_operation_anitbiotic_value ?>"><?php echo $post_operation_anitbiotic_value ?></option>
	                                                <?php endif ?>
	                                            <?php endforeach ?>
	                                        </select>
	                                    </div>

	                                    <div class="form-group" id="post_operation_anitbiotic_add_field">
	                                        <label for="post_operation_anitbiotic_others">Others</label>
	                                        <textarea class="form-control" id="post_operation_anitbiotic_others" name="post_operation_anitbiotic_others" rows="5"><?php echo $early_post_operative_data_value->post_operation_anitbiotic_others; ?></textarea>
	                                    </div>

	                                    <h2 class="content-heading border-bottom mb-4 pb-2">Early Post-operative Complications</h2>
	                                    <div class="form-group">
	                                        <label class="d-block">Fever</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="fever-yes" name="fever" <?php echo ($early_post_operative_data_value->fever == "Yes") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="fever-yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="fever-no" name="fever" <?php echo ($early_post_operative_data_value->fever == "No") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="fever-no">No</label>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                        <label class="d-block">Pain</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="pain-yes" name="pain" <?php echo ($early_post_operative_data_value->pain == "Yes") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="pain-yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="pain-no" name="pain" <?php echo ($early_post_operative_data_value->pain == "No") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="pain-no">No</label>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                        <label class="d-block">Hematuria</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="hematuria-yes" name="hematuria" <?php echo ($early_post_operative_data_value->hematuria == "Yes") ? "checked" : ""; ?>>
	                                            <label class="custom-control-label" for="hematuria-yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="hematuria-no" name="hematuria" <?php echo ($early_post_operative_data_value->hematuria == "No") ? "checked" : ""; ?>>
	                                            <label class="custom-control-label" for="hematuria-no">No</label>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                        <label class="d-block">UTI</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="early-post-operative-complications-uti-yes" name="early-post-operative-complications-uti" <?php echo ($early_post_operative_data_value->uti == "Yes") ? "checked" : ""; ?>>
	                                            <label class="custom-control-label" for="early-post-operative-complications-uti-yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="early-post-operative-complications-uti-no" name="early-post-operative-complications-uti" <?php echo ($early_post_operative_data_value->uti == "No") ? "checked" : ""; ?>>
	                                            <label class="custom-control-label" for="early-post-operative-complications-uti-no">No</label>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                        <label class="d-block">Sepsis</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="sepsis-yes" name="sepsis" <?php echo ($early_post_operative_data_value->sepsis == "Yes") ? "checked" : ""; ?>>
	                                            <label class="custom-control-label" for="sepsis-yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="sepsis-no" name="sepsis" <?php echo ($early_post_operative_data_value->sepsis == "No") ? "checked" : ""; ?>>
	                                            <label class="custom-control-label" for="sepsis-no">No</label>
	                                        </div>
	                                    </div>

	                                    <div class="form-group">
	                                        <label for="early_post_operative_complications_others">Others</label>
	                                        <textarea class="form-control" id="early_post_operative_complications_others" name="early_post_operative_complications_others" rows="5"><?php echo $early_post_operative_data_value->others; ?></textarea>
	                                    </div>

	                                    <div class="form-group">
	                                        <label class="d-block">Emergency Visit</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="emergency-visit-yes" name="emergency-visit" <?php echo ($early_post_operative_data_value->emergency_visit == "Yes") ? "checked" : ""; ?>>
	                                            <label class="custom-control-label" for="emergency-visit-yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="emergency-visit-no" name="emergency-visit" <?php echo ($early_post_operative_data_value->emergency_visit == "No") ? "checked" : ""; ?>>
	                                            <label class="custom-control-label" for="emergency-visit-no">No</label>
	                                        </div>
	                                    </div>

	                                    <div class="form-group" id="emergency_visit_add_field">
	                                        <label for="emergency_visit_reason">Reason</label>
	                                        <textarea class="form-control" id="emergency_visit_reason" name="emergency_visit_reason" rows="5"><?php echo $early_post_operative_data_value->emergency_visit_reason; ?></textarea>
	                                    </div>

	                                    <div class="form-group">
	                                        <label class="d-block">Re - Admission</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="re-admission-yes" name="re-admission" <?php echo ($early_post_operative_data_value->re_admission == "Yes") ? "checked" : ""; ?>>
	                                            <label class="custom-control-label" for="re-admission-yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="re-admission-no" name="re-admission" <?php echo ($early_post_operative_data_value->re_admission == "No") ? "checked" : ""; ?>>
	                                            <label class="custom-control-label" for="re-admission-no">No</label>
	                                        </div>
	                                    </div>

	                                    <div class="form-group" id="re_admission_add_field">
	                                        <label for="re_admission_reason">Reason</label>
	                                        <textarea class="form-control" id="re_admission_reason" name="re_admission_reason" rows="5"><?php echo $early_post_operative_data_value->re_admission_reason; ?></textarea>
	                                    </div>

	                                    <div class="form-group">
	                                        <input type="submit" id="update_early_post_operative_data" name="update_early_post_operative_data" value="Update" class="btn btn-primary">
	                                    </div>
                                    </div>
                            	<?php endforeach ?>
                            </form>
                        </div>
                        <!-- UPDATE FORM OF EARLY POST OPERATIVE DATA ENDS -->

                        <!-- UPDATE FORM OF FOLLOW UP 1 DATA STARTS -->
                        <div class="tab-pane" id="wizard-simple2-step4" role="tabpanel">
                            <div id="message_follow_up_1_data"></div>
                            <form action="#" method="post" id="update_follow_up_form" accept-charset="utf-8">
                            	<?php foreach ($follow_up_data as $key => $value): ?>
                            		<input type="hidden" name="patient_id" value="<?php echo $value->patient_id; ?>">
	                            	<h2 class="content-heading border-bottom mb-4 pb-2">Clinical Evaluation</h2>
	                            	<div class="form-group">
                                        <label class="d-block">Pain</label>
                                        <?php if ($value->pain == ""): ?>
                                        	<div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="pain_yes" name="pain">
                                            <label class="custom-control-label" for="pain_yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="pain_no" name="pain" checked="">
                                            <label class="custom-control-label" for="pain_no">No</label>
                                        </div>
                                        <?php else: ?>
                                        	<div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="pain_yes" name="pain" <?php echo ($value->pain == "Yes") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="pain_yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="pain_no" name="pain" <?php echo ($value->pain == "No") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="pain_no">No</label>
                                        </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">LUTS (Stent Related)</label>
                                        <?php if ($value->luts == ""): ?>
                                        	<div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="luts_yes" name="luts">
	                                            <label class="custom-control-label" for="luts_yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="luts_no" name="luts" checked="">
	                                            <label class="custom-control-label" for="luts_no">No</label>
	                                        </div>
                                        <?php else: ?>
                                        	<div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="luts_yes" name="luts" <?php echo ($value->luts == "Yes") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="luts_yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="luts_no" name="luts" <?php echo ($value->luts == "No") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="luts_no">No</label>
	                                        </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">UTI</label>
                                        <?php if ($value->uti == ""): ?>
                                        	<div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="uti_yes" name="uti">
                                            <label class="custom-control-label" for="uti_yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="uti_no" name="uti" checked="">
                                            <label class="custom-control-label" for="uti_no">No</label>
                                        </div>
                                        <?php else: ?>
                                        	<div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="uti_yes" name="uti" <?php echo ($value->uti == "Yes") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="uti_yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="uti_no" name="uti" <?php echo ($value->uti == "No") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="uti_no">No</label>
                                        </div>
                                        <?php endif ?>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Hematuria</label>
                                        <?php if ($value->hematuria == ""): ?>
                                        	<div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="hematuria_yes" name="hematuria">
	                                            <label class="custom-control-label" for="hematuria_yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="hematuria_no" name="hematuria" checked="">
	                                            <label class="custom-control-label" for="hematuria_no">No</label>
	                                        </div>
                                        <?php else: ?>
                                        	<div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="hematuria_yes" name="hematuria" <?php echo ($value->hematuria == "Yes") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="hematuria_yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="hematuria_no" name="hematuria" <?php echo ($value->hematuria == "No") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="hematuria_no">No</label>
	                                        </div>
                                        <?php endif ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="others">Others</label>
                                        <input class="form-control form-control-alt" type="text" value="<?php echo $value->others; ?>" name="follow_up_others">
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Laboratory Tests</h2>
                                    <div class="form-group">
                                        <label>Creatinine</label>
                                        <div class="custom-file col-xs-10 col-sm-6 col-md-6 col-lg-4">
                                              <input class="form-control form-control-alt" type="text" id="creatinine" name="follow_up_creatinine" value="<?php echo $value->creatinine; ?>">
                                        </div>
                                        <div class="custom-file col-xs-10 col-sm-6 col-md-6 col-lg-4">
                                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="creatinine_image" name="follow_up_creatinine-image" value="<?php echo ($value->creatinine_image == "") ? "" : $value->creatinine_image ; ?>">
                                            <label class="custom-file-label" for="creatinine_image">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Urea</label>
                                        <div class="custom-file col-xs-10 col-sm-6 col-md-6 col-lg-4">
                                              <input class="form-control form-control-alt" type="text" id="urea" name="follow_up_urea" value="<?php echo $value->urea; ?>">
                                        </div>
                                        <div class="custom-file col-xs-10 col-sm-6 col-md-6 col-lg-4">
                                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="urea_image" name="follow_up_urea-image" value="<?php echo ($value->urea_image == "") ? "" : $value->urea_image ; ?>">
                                            <label class="custom-file-label" for="urea_image">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Urine </label>
                                        <div class="custom-file col-xs-10 col-sm-6 col-md-6 col-lg-4">
                                              <input class="form-control form-control-alt" type="text" id="urine" name="follow_up_urine" value="<?php echo $value->urine; ?>">
                                        </div>
                                        <div class="custom-file col-xs-10 col-sm-6 col-md-6 col-lg-4">
                                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="urine_image" name="follow_up_urine-image" value="<?php echo ($value->urine_image == "") ? "" : $value->urine_image ; ?>">
                                            <label class="custom-file-label" for="urine_image">Choose file</label>
                                        </div>
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Radiological Evaluation</h2>
                                    <div class="form-group">
                                        <label>Xray</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="xray" name="follow_up_xray" value="<?php echo $value->xray; ?>">
                                            <label class="custom-file-label" for="xray">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>US</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="us" name="follow_up_us" value="<?php echo $value->us; ?>">
                                            <label class="custom-file-label" for="us">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>CT</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="ct" name="follow_up_ct" value="<?php echo $value->ct; ?>">
                                            <label class="custom-file-label" for="ct">Choose file</label>
                                        </div>
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Stent Removal</h2>
                                    <div class="form-group">
                                        <label class="d-block">Stent Removal</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="stent_removal_yes" name="stent_removal" <?php echo ($value->stent_removal == "Yes") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="stent_removal_yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="stent_removal_no" name="stent_removal" <?php echo ($value->stent_removal == "No") ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="stent_removal_no">No</label>
                                        </div>
                                    </div>

                                    <div id="stent_removal_add_field_yes">
                                    	<div class="form-group">
	                                        <label class="d-block">Smooth</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="smooth_yes" name="follow_up_smooth" <?php echo ($value->smooth == "Yes") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="smooth_yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="smooth_no" name="follow_up_smooth" <?php echo ($value->smooth == "No") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="smooth_no">No</label>
	                                        </div>
	                                    </div>

	                                    <div class="form-group">
	                                        <label class="d-block">Adverse Event</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="adverse_event_yes" name="follow_up_adverse_event" <?php echo ($value->adverse_event == "Yes") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="adverse_event_yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="adverse_event_no" name="follow_up_adverse_event" <?php echo ($value->adverse_event == "No") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="adverse_event_no">No</label>
	                                        </div>
	                                    </div>

	                                    <div class="form-group">
	                                        <label class="d-block">Office Based</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="office_based_yes" name="follow_up_office_based" <?php echo ($value->office_based == "Yes") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="office_based_yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="office_based_no" name="follow_up_office_based" <?php echo ($value->office_based == "No") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="office_based_no">No</label>
	                                        </div>
	                                    </div>

	                                    <div class="form-group">
	                                        <label class="d-block">Day Care</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="day_care_yes" name="follow_up_day_care" <?php echo ($value->day_care == "Yes") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="day_care_yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="day_care_no" name="follow_up_day_care" <?php echo ($value->day_care == "No") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="day_care_no">No</label>
	                                        </div>
	                                    </div>

	                                    <div class="form-group">
	                                        <label class="d-block">Flexible Cystoscope</label>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="flexible_cystoscope_yes" name="follow_up_flexible_cystoscope" <?php echo ($value->flexible_cystoscope == "Yes") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="flexible_cystoscope_yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="flexible_cystoscope_no" name="follow_up_flexible_cystoscope" <?php echo ($value->flexible_cystoscope == "No") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="flexible_cystoscope_no">No</label>
	                                        </div>
	                                    </div>

	                                    <div class="form-group">
	                                        <label class="d-block">Rigid Cystoscope</label>
                                        	<div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="Yes" id="rigid_cystoscope_yes" name="follow_up_rigid_cystoscope" <?php echo ($value->rigid_cystoscope == "Yes") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="rigid_cystoscope_yes">Yes</label>
	                                        </div>
	                                        <div class="custom-control custom-radio custom-control-inline">
	                                            <input type="radio" class="custom-control-input" value="No" id="rigid_cystoscope_no" name="follow_up_rigid_cystoscope" <?php echo ($value->rigid_cystoscope == "No") ? "checked" : "" ?>>
	                                            <label class="custom-control-label" for="rigid_cystoscope_no">No</label>
	                                        </div>
	                                    </div>

                                    </div>

                                    <div id="stent_removal_add_field_no">
                                    	<div class="form-group">
	                                        <label for="reason">Reason</label>
	                                        <input class="form-control form-control-alt" type="text" value="<?php echo $value->reason; ?>" name="follow_up_reason">
	                                    </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" id="update_follow_up_data" name="update_follow_up_data" value="Update" class="btn btn-primary">
                                    </div>

                                    <script type="text/javascript">
                                    	$(document).ready(function(){
                                    		<?php if ($value->stent_removal == "Yes"): ?>
                                    			$("#stent_removal_add_field_yes").show();
                                    			$("#stent_removal_add_field_no").hide();
                                    		<?php elseif ($value->stent_removal == "No"): ?>
                                    			$("#stent_removal_add_field_yes").hide();
                                    			$("#stent_removal_add_field_no").show();
                                    		<?php else: ?>											    
                                    			$("#stent_removal_add_field_yes").hide();
                                    			$("#stent_removal_add_field_no").hide();
                                    		<?php endif ?>

                                    		$("input[name='stent_removal']").change(function(){
                                    			var stent_removal = $(this).val();
                                    			if(stent_removal === "Yes"){
	                                    			$("#stent_removal_add_field_yes").show();
	                                    			$("#stent_removal_add_field_no").hide();
	                                    		}
	                                    		else{
	                                    			$("#stent_removal_add_field_yes").hide();
	                                    			$("#stent_removal_add_field_no").show();
	                                    		}
                                    		});

                                    	});
                                    </script>
                            	<?php endforeach ?>
                            </form>
                        </div>
                        <!-- UPDATE FORM OF FOLLOW UP 1 DATA STARTS -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script type="text/javascript">
	$(document).ready(function(){

		$('#height').change(function(){
			var height    = $(this).val()*30.48;
			var weight    = $('#weight').val();
			var bmi       = weight/height/height*10000;
			var bmi_value = bmi.toFixed(2)
            $("#bmi").val(bmi_value);
		});

		$('#weight').change(function(){
			var weight    = $(this).val();
			var height    = $('#height').val()*30.48;
			var bmi       = weight/height/height*10000;
			var bmi_value = bmi.toFixed(2)
            $("#bmi").val(bmi_value);
		});
		// alert();

		// GENERATE ACCORDIONS FOR STONE FIELDS
		var count = 1;
	    $("#number-of-stones").change(function () {
	        var end = this.value;
	        var text  = "";
	        for (var i = count; i <= end; i++) {
	            // console.log(i);
	            text = text + '<div class="card mb-2"><div class="card-header" role="tab" id="heading_stone_'+ i +'"><a data-toggle="collapse" data-parent="#accordionEx" href="#collapse_stone_'+ i +'" aria-expanded="true" aria-controls="collapse_stone_'+ i +'"><h5 class="mb-0">Stone '+ i +' <i class="fas fa-angle-down rotate-icon float-right"></i></h5></a></div><div id="collapse_stone_'+ i +'" class="collapse show" role="tabpanel" aria-labelledby="heading_stone_'+ i +'" data-parent="#accordionEx"><div class="card-body p-3"><div class="form-group"><label>Length(cm)</label><input class="form-control form-control-alt" type="number" name="stone_data['+i+'][length]" min="0" step=".01" required></div><div class="form-group"><label>Width(cm)</label><input class="form-control form-control-alt" type="number" name="stone_data['+i+'][width]" min="0" step=".01" required></div><div class="form-group"><label>Volume(cm<sup>3</sup>)</label><input class="form-control form-control-alt" type="number" name="stone_data['+i+'][volume]" min="0" step=".01" required></div><div class="form-group"><label>Hounsfield(HU)</label><input class="form-control form-control-alt" type="number" name="stone_data['+i+'][hu]" min="0" step=".01" required></div></div></div></div>';
	        }
	        $("#accordionEx").html(text);
	    });

	    // GENEREATE BMI VALUE 
	    $("#weight").change(function(){
            var weight = this.value;

            $("#height").change(function(){
                
                var height  = this.value*30.48;
                var bmi     = weight/height/height*10000;
                var bmi_value  = bmi.toFixed(2)
                $("#bmi").attr("value",bmi_value);
            });
        });

	    // UPDATE PRE-OPERATIVE FORM DATA TO DATABASE
        $("#update_form_pre_operative_data").submit(function(e){
	        e.preventDefault();
            $.ajax({
                url: '<?php echo base_url() ?>patient/updatePreOperativeData',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data){
                    $("#message_pre_opertive_data").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Pre Operative Data Updated Successfully</p></div>');
                    $("#update_form_pre_operative_data").hide();
                    $(".btn-form-1-success").show();
                    $("input[name='formSteps']").attr("value","2");
                },
                error: function(){
                    alert('Something is wrong');
                }
            });
	    });

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
            grid: true,
            skin: "round",
            values: ['1','2','3','4','5','6','7','8','9','10'],
            from: <?php echo $operative_data_value->maneuverability_value; ?>,
        });

        $("#scope_evaluation_image_quality").ionRangeSlider({
            min: 1,
            max: 10,
            grid: true,
            skin: "round",
            values: ['1','2','3','4','5','6','7','8','9','10'],
            from: <?php echo $operative_data_value->image_quality_value; ?>,
        });

        $("#scope_evaluation_ergonomics").ionRangeSlider({
            min: 1,
            max: 10,
            grid: true,
            skin: "round",
            values: ['1','2','3','4','5','6','7','8','9','10'],
            from: <?php echo $operative_data_value->ergonomics_value; ?>,
        });

        $("#scope_evaluation_overall_satisfaction").ionRangeSlider({
            min: 1,
            max: 10,
            grid: true,
            skin: "round",
            values: ['1','10'],
            step: 10,
            from: <?php echo $operative_data_value->overall_satisfaction_value; ?>,
        });

	    // UPDATE OPERATIVE FORM DATA TO DATABASE
        $("#update_form_operative_data").submit(function(e){
	        e.preventDefault();
            $.ajax({
                url: '<?php echo base_url() ?>patient/updateOperativeData',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data){
                    $("#message_opertive_data").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Operative Data Updated Successfully</p></div>');
                    $("#update_form_operative_data").hide();
                    $(".btn-form-2-success").show();
                    $("input[name='formSteps']").attr("value","3");
                },
                error: function(){
                    alert('Something is wrong');
                }
            });
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
            $.ajax({
                url: '<?php echo base_url() ?>patient/updateEarlyPostOperativeData',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data){
                    $("#message_early_opertive_data").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Early Post Operative Data Updated Successfully</p></div>');
                    $("#update_early_post_operative_form").hide();
                    $(".btn-form-3-success").show();
                },
                error: function(){
                    alert('Something is wrong');
                }
            });
	    });

	    // UPDATE FOLLOW UP FORM DATA TO DATABASE
	    $("#update_follow_up_form").submit(function(e){
	    	e.preventDefault();
	    	$.ajax({
	    		url: '<?php echo base_url() ?>patient/updateFollowUpData',
	    		type: 'POST',
	    		data: $(this).serialize(),
	    		success:function(data){
	    			$("#message_follow_up_1_data").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Follow Up Data Updated Successfully</p></div>');
	                $("#update_follow_up_form").hide();
	                $(".btn-form-4-success").show();
	    		},
	    		error: function(){
	    			alert('something is wrong');
	    		}
	    	});
	    });




	});
</script>

<?php $this->load->view('Shared/footer'); ?>