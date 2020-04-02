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
    .pre-operative-h{ padding-top: 1rem!important; padding-bottom: 1rem!important; font-size: 1.2rem!important; font-weight: 700; }
    .font-size-sm{ font-weight: 500 }
</style>

<main id="main-container">

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Add New Patient
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="<?php echo base_url('patient/create'); ?>">Add New Patient</a>
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
                    <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active pre-operative-h" href="#wizard-simple2-step1" data-toggle="tab">PRE - OPERATIVE DATA</a>
                        </li>
                    </ul>

                    <input type="hidden" name="formSteps" value="0">

                    <div class="block-content col-md-8 block-content-full tab-content px-md-5" style="min-height: 303px;">
                        <div class="tab-pane active" id="wizard-simple2-step1" role="tabpanel">
                            <div id="message"></div>
                            <form action="#" method="POST" id="pre_operative_data_form" enctype="multipart/form-data">
                                <?php 
                                    $groupNumber;
                                    $groupNumber = rand(1,2);

                                    foreach ($group_number as $key => $group_value) {
                                        if($group_value->group_number == 2){
                                            $groupNumber = 1;
                                        }else{
                                            $groupNumber = 2;
                                        }
                                    }
                                ?>

                                <input type="hidden" name="group" id="group_value" value="<?php echo $groupNumber; ?>">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <?php foreach ($user_detail as $key => $user_value): ?>
                                                        <?php echo $user_value->user_code ?>
                                                    <?php endforeach ?>
                                                </span>
                                            </div>
                                            <?php 
                                                $user_code    = preg_replace('/\d+/u', '', $user_value->user_code);
                                                $patient_code = str_pad(($patient_data->id + 1), 3, '0', STR_PAD_LEFT);
                                            ?>
                                            <input type="text" class="form-control" value="<?php echo $patient_code; ?>" readonly="">
                                            <input type="hidden" class="form-control" name="code" value="<?php echo $user_value->user_code.$patient_code; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Patient Reference</label>
                                    <input type="text" class="form-control form-control-alt" name="patient_reference">
                                    <p class="font-size-sm text-muted">(This can be patient name/ file number or any other patient reference.This field will only be viewed by you.)</p>
                                </div>

                                <div class="form-group">
                                    <label for="age">Age <span class="text-danger">*</span></label>
                                    <input class="form-control form-control-alt" type="number" id="age" name="age" min="0" required>
                                </div> 
                                <div class="form-group">
                                    <label class="d-block">Sex <span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="male" id="male" name="gender" checked="">
                                        <label class="custom-control-label" for="male">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="female" id="female" name="gender">
                                        <label class="custom-control-label" for="female">Female</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Weight(kg) <span class="text-danger">*</span></label>
                                    <input class="form-control form-control-alt" type="number" id="weight" name="weight" min="0" step=".01" required>
                                </div> 
                                <div class="form-group">
                                    <label for="height">Height(cm) <span class="text-danger">*</span></label>
                                    <input class="form-control form-control-alt" type="number" id="height" name="height" min="0" step=".01" required>
                                </div> 
                                <div class="form-group">
                                    <label for="bmi">BMI</label>
                                    <input class="form-control form-control-alt" type="number" id="bmi" name="bmi" step=".01" readonly="">
                                </div> 

                                <h2 class="content-heading border-bottom mb-4 pb-2">Comorbidities</h2>
                               
                                <div class="form-group">
                                    <label class="d-block">DM <span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="yes" id="comorbidities-dm-yes" name="comorbidities-dm" required="">
                                        <label class="custom-control-label" for="comorbidities-dm-yes">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="no" id="comorbidities-dm-no" name="comorbidities-dm">
                                        <label class="custom-control-label" for="comorbidities-dm-no">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="d-block">HTN <span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="yes" id="comorbidities-htn-yes" name="comorbidities-htn" required="">
                                        <label class="custom-control-label" for="comorbidities-htn-yes">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="no" id="comorbidities-htn-no" name="comorbidities-htn">
                                        <label class="custom-control-label" for="comorbidities-htn-no">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="d-block">IHD <span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="yes" id="comorbidities-ihd-yes" name="comorbidities-ihd" required="">
                                        <label class="custom-control-label" for="comorbidities-ihd-yes">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="no" id="comorbidities-ihd-no" name="comorbidities-ihd">
                                        <label class="custom-control-label" for="comorbidities-ihd-no">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Thyroid Disorder <span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="yes" id="comorbidities-thyroid-disorder-yes" name="comorbidities-thyroid-disorder" required="">
                                        <label class="custom-control-label" for="comorbidities-thyroid-disorder-yes">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="no" id="comorbidities-thyroid-disorder-no" name="comorbidities-thyroid-disorder">
                                        <label class="custom-control-label" for="comorbidities-thyroid-disorder-no">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Neurogenic Disorder <span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="comorbidities-neurogenic-disorder-yes" value="yes" name="comorbidities-neurogenic-disorder" required="">
                                        <label class="custom-control-label" for="comorbidities-neurogenic-disorder-yes">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="comorbidities-neurogenic-disorder-no" value="no" name="comorbidities-neurogenic-disorder">
                                        <label class="custom-control-label" for="comorbidities-neurogenic-disorder-no">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="others">Others</label>
                                    <textarea class="form-control" id="others" name="others" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="d-block">UTI <span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="yes" id="uti-yes" name="uti" required="">
                                        <label class="custom-control-label" for="uti-yes">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="no" id="uti-no" name="uti">
                                        <label class="custom-control-label" for="uti-no">No</label>
                                    </div>
                                </div>

                                <div id="uti_add_fields">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="uti-treated" name="uti-treated" value="yes" checked="">
                                            <label class="custom-control-label" for="uti-treated">Treated</label>
                                        </div>
                                    </div>

                                    <div class="form-group" id="uti_treatment">
                                        <textarea class="form-control" id="uti-treatment" name="uti-treatment" rows="5"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="medication">Medication for other diseases</label>
                                    <textarea class="form-control" id="medication" name="medication" rows="5"></textarea>
                                </div>
                                
                                  <h2 class="content-heading border-bottom mb-4 pb-2">Laboratory Tests</h2>
                                
                                <div class="form-group">
                                    <label>Creatinine(mg/dL)</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="custom-file">
                                                  <input class="form-control form-control-alt" type="number" id="creatinine" name="creatinine" min="0" step=".01">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="creatinine_image" name="creatinine-image">
                                                <label class="custom-file-label" for="xray">Choose file</label>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                
                                <div class="form-group">
                                    <label>Urea(mg/dL)</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="custom-file">
                                                  <input class="form-control form-control-alt" type="number" id="urea" name="urea" min="0" step=".01">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="urea_image" name="urea-image">
                                                <label class="custom-file-label" for="xray">Choose file</label>
                                            </div>
                                        </div>
                                    </div>      
                                </div>
                                
                                <div class="form-group">
                                    <label>Calcium(mg/dL)</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="custom-file">
                                                  <input class="form-control form-control-alt" type="number" id="calcium " name="calcium" min="0" step=".01">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="calcium_image" name="calcium-image">
                                                <label class="custom-file-label" for="xray">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Uric Acid(mg/dL)</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="custom-file">
                                                  <input class="form-control form-control-alt" type="number" id="uric_acid" name="uric-acid" min="0" step=".01">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="uric_acid_image" name="uric-acid-image">
                                                <label class="custom-file-label" for="xray">Choose file</label>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                
                                <div class="form-group">
                                    <label>Urine </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="urine_image" name="urine-image">
                                                <label class="custom-file-label" for="xray">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="content-heading border-bottom mb-4 pb-2">Radiological Evaluation</h2>

                                <div class="form-group">
                                    <label>Xray</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="xray" name="xray">
                                        <label class="custom-file-label" for="xray">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>US</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="us" name="us">
                                        <label class="custom-file-label" for="us">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>CT</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="ct" name="ct">
                                        <label class="custom-file-label" for="ct">Choose file</label>
                                    </div>
                                </div>
                                
                                <h2 class="content-heading border-bottom mb-4 pb-2">Stone Criteria</h2>

                                <div class="form-group">
                                    <label class="d-block">Side <span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="left" id="left" name="side" required="">
                                        <label class="custom-control-label" for="left">Left</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="right" id="right" name="side">
                                        <label class="custom-control-label" for="right">Right</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="number-of-stones">Number of Stones <span class="text-danger">*</span></label>
                                    <select class="form-control form-control-alt" id="number-of-stones" name="number-of-stones" required>
                                        <option value="">Select Option</option>
                                        <?php
                                        for ($no_of_stones=0; $no_of_stones <=10 ; $no_of_stones++) { 
                                            echo '<option value="'. $no_of_stones .'">'. $no_of_stones .'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                  <div class="form-group">
                                    <label class="d-block">Stones in Contralateral <span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="yes" id="stones-contralateral-yes" name="stones-contralateral" required="">
                                        <label class="custom-control-label" for="stones-contralateral-yes">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" value="no" id="stones-contralateral-no" name="stones-contralateral">
                                        <label class="custom-control-label" for="stones-contralateral-no">No</label>
                                    </div>
                                </div>

                                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                                </div>

                                <div class="form-group">
                                    <label for="hydronephrosis">Hydronephrosis <span class="text-danger">*</span></label>
                                    <select class="form-control form-control-alt" id="hydronephrosis" name="hydronephrosis" required>
                                        <option value="">Select Option</option>
                                        <option value="Mild">Mild</option>
                                        <option value="Moderate">Moderate</option>
                                        <option value="Severe">Severe</option>
                                        <option value="None">None</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" id="add_patient" name="add_patient" value="Add" class="btn btn-primary">
                                </div>
                            </form>

                            <form action="#" method="post" accept-charset="utf-8" id="update_patient_form">
                                <h2 class="content-heading border-bottom mb-4 pb-2">Additional Fields for Group 2</h2>

                                <input type="hidden" class="patient_id" name="patient_id" value="">
                                
                                <div class="form-group">
                                    <label for="reusable-scope">Reusable Scope <span class="text-danger">*</span></label>
                                    <select class="form-control form-control-alt" id="reusable-scope" name="reusable-scope" required="">
                                        <option value="">Please select the below Reusable Scope</option>
                                        <option value="Storz">Storz</option>
                                        <option value="Olympus">Olympus</option>
                                        <option value="Wolf">Wolf</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="update_patient" name="update_patient" value="Update" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
 

<script src="<?php echo base_url('assets/') ?>jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        if($("#uti-treated").prop('checked')){
            $("#uti_treatment").show();
        }else{
            $("#uti_treatment").hide();
        }

        $("#uti-treated").change(function(){
            if($("#uti-treated").prop('checked')){
                $(this).val("yes");
                $("#uti_treatment").show();
            }else{
                $(this).val("no");
                $("#uti_treatment").hide();
            }
        });

        $("#uti_add_fields").hide();
        $("input[name='uti']").change(function(){
            var uti = $(this).val();
            if(uti === "yes"){
                $("#uti_add_fields").show();
            }
            else{
                $("#uti_add_fields").hide();
            }
        });

        var count = 1;
        $("#number-of-stones").change(function () {
            var end  = this.value;
            var text = "";
            for (var i = count; i <= end; i++) {
                text = text + '<div class="card mb-2"><div class="card-header" role="tab" id="heading_stone_'+ i +'"><a data-toggle="collapse" data-parent="#accordionEx" href="#collapse_stone_'+ i +'" aria-expanded="true" aria-controls="collapse_stone_'+ i +'"><h5 class="mb-0">Stone '+ i +' <i class="fas fa-angle-down rotate-icon float-right"></i></h5></a></div><div id="collapse_stone_'+ i +'" class="collapse show" role="tabpanel" aria-labelledby="heading_stone_'+ i +'" data-parent="#accordionEx"><div class="card-body p-3"><div class="form-group"><label>Length(cm) <span class="text-danger">*</span></label><input class="form-control form-control-alt" type="number" name="stone_data['+i+'][length]" min="0" step=".01" required></div><div class="form-group"><label>Width(cm) <span class="text-danger">*</span></label><input class="form-control form-control-alt" type="number" name="stone_data['+i+'][width]" min="0" step=".01" required></div><div class="form-group"><label>Depth(cm)</label><input class="form-control form-control-alt" type="number" name="stone_data['+i+'][depth]" min="0" step=".01"></div><div class="form-group"><label>Volume(cm<sup>3</sup>)</label><input class="form-control form-control-alt" type="number" name="stone_data['+i+'][volume]" min="0" step=".01"></div><div class="form-group"><label>Hounsfield(HU)</label><input class="form-control form-control-alt" type="number" name="stone_data['+i+'][hu]" min="0" step=".01"></div><div class="form-group"><label>Stone Location  <span class="text-danger">*</span></label><select class="form-control form-control-alt"  name="stone_data['+i+'][stone_site]" required><option value="Renal">Renal</option><option value="Pelvis">Pelvis</option><option value="Lower calyx">Lower calyx</option><option value="Middle calyx">Middle calyx</option><option value="upper calyx">upper calyx</option></select></div></div></div></div>';
            }
            $("#accordionEx").html(text);
        });

        $("#weight").change(function(){
            var weight = this.value;

            $("#height").keyup(function(){
                
                if(weight != ""){
					var height    = this.value;
					var bmi       = weight/height/height*10000;
					var bmi_value = bmi.toFixed(2);
	                $("#bmi").attr("value",bmi_value);
                }else{
                	One.helpers('notify', {type: 'danger', icon: 'fa fa-check mr-1', message: 'Please enter height first!'});
                }
            });
        });
    });

    $("#update_patient_form").hide();

    $("#pre_operative_data_form").submit(function(e){
            e.preventDefault();

            var group       = $("#group_value").val();
            var group_field = "";
            if(group == 2){
                $.ajax({
                    url        : '<?php echo base_url() ?>patient/ajaxRequestPost',
                    type       : 'POST',
                    data       : new FormData(this),
                    processData: false,
                    contentType: false,
                    cache      : false,
                    async      : false,
                    success    : function(data) {
                                    $('.patient_id').val(data);

                                    One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: 'Thank you for submitting the pre -operative data. You are assigned Group 2 so please select the below reusable scope'});

                                    $("#message").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Thank you for submitting the pre -operative data. This patient is assigned Group 2 so please select from the below reusable scope</p></div>');
                                },
                    error      : function() {
                                    One.helpers('notify', {type: 'danger', icon: 'fa fa-check mr-1', message: 'Something is wrong!'});
                                },
                   
                });

                $("#pre_operative_data_form").hide();
                $("#update_patient_form").show();
            }else{
                $.ajax({
                    url        : '<?php echo base_url() ?>patient/ajaxRequestPost',
                    type       : 'POST',
                    data       : new FormData(this),
                    processData: false,
                    contentType: false,
                    cache      : false,
                    async      : false,
                    success    : function(data) {
                                    $("#message").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Thank you for submitting the pre -operative data. This patient is assigned Group 1 so please only use Pusen scope</p></div><div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Patient Added Successfully</p></div><a href="<?php echo base_url('patient');?>" class="btn btn-primary px-5">View All Patients</a>');

                                    $(".patient_id").val(data.patient_id);
                                    $(".pre_opertive_id").val(data.pre_operative_id);
                                },
                    error      : function() {
                                    One.helpers('notify', {type: 'danger', icon: 'fa fa-check mr-1', message: 'Something is wrong!'});
                                },
                   
                });
                $("#pre_operative_data_form").hide();
                $("#update_patient_form").hide();
            }
        });

    $("#update_patient_form").submit(function(e){
        e.preventDefault();
        $.ajax({
           url      : '<?php echo base_url() ?>patient/updateAjaxRequestPost',
           type     : 'POST',
           data     : $(this).serialize(),
           success  : function(data) {
                        $("#message").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Patient Added Successfully</p></div><a href="<?php echo base_url('patient');?>" class="btn btn-primary px-5">View All Patients</a>');
                        $("#pre_operative_data_form").hide();
                        $("#update_patient_form").hide(); 
                        $("input[name='formSteps']").attr("value","1");
                    },
           error    : function() {
                        One.helpers('notify', {type: 'danger', icon: 'fa fa-check mr-1', message: 'Something is wrong!'});
                    },
        });
    });

</script>

<?php $this->load->view('Shared/footer'); ?>