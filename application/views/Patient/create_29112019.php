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
                            <a class="nav-link active" href="#wizard-simple2-step1" data-toggle="tab">Pre - Operative Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step2" data-toggle="tab">Operative Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step3" data-toggle="tab">Early Post-Operative</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step4" data-toggle="tab">Follow up 1<br/>(2 weeks Out)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step5" data-toggle="tab">Follow up 2<br/>(4 weeks Out)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step6" data-toggle="tab">Follow up 3<br/>(12 weeks Out)</a>
                        </li>
                    </ul>

                        <input type="hidden" name="formSteps" value="0">

                        <div class="block-content col-md-8 block-content-full tab-content px-md-5" style="min-height: 303px;">
                            <div class="tab-pane active" id="wizard-simple2-step1" role="tabpanel">
                                <div id="message">
                                    
                                </div>
                                <form action="#" method="POST" id="pre_operative_data_form" enctype="multipart/form-data">
                                    <?php $randomNumber = rand(1,2); ?>

                                    <input type="hidden" name="group" id="group_value" value="<?php echo $randomNumber; ?>">
                                    <div class="form-group">
                                        <label for="code">Code <span class="text-danger">*</span></label>
                                        <input class="form-control form-control-alt" type="text" value="<?php echo $this->session->userdata('user_code'); ?>" name="code" required readonly="">
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
                                        <label for="height">Height(feet) <span class="text-danger">*</span></label>
                                        <input class="form-control form-control-alt" type="number" id="height" name="height" min="0" step=".01" required>
                                    </div> 
                                    <div class="form-group">
                                        <label for="bmi">BMI</label>
                                        <input class="form-control form-control-alt" type="number" id="bmi" name="bmi" step=".01" readonly="">
                                    </div> 

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Comorbidities</h2>
                                   
                                    <div class="form-group">
                                        <label class="d-block">DM</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="yes" id="comorbidities-dm-yes" name="comorbidities-dm" checked="">
                                            <label class="custom-control-label" for="comorbidities-dm-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="no" id="comorbidities-dm-no" name="comorbidities-dm">
                                            <label class="custom-control-label" for="comorbidities-dm-no">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">HTN</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="yes" id="comorbidities-htn-yes" name="comorbidities-htn" checked="">
                                            <label class="custom-control-label" for="comorbidities-htn-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="no" id="comorbidities-htn-no" name="comorbidities-htn">
                                            <label class="custom-control-label" for="comorbidities-htn-no">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">IHD</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="yes" id="comorbidities-ihd-yes" name="comorbidities-ihd" checked="">
                                            <label class="custom-control-label" for="comorbidities-ihd-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="no" id="comorbidities-ihd-no" name="comorbidities-ihd">
                                            <label class="custom-control-label" for="comorbidities-ihd-no">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Thyroid Disorder</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="yes" id="comorbidities-thyroid-disorder-yes" name="comorbidities-thyroid-disorder" checked="">
                                            <label class="custom-control-label" for="comorbidities-thyroid-disorder-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="no" id="comorbidities-thyroid-disorder-no" name="comorbidities-thyroid-disorder">
                                            <label class="custom-control-label" for="comorbidities-thyroid-disorder-no">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Neurogenic Disorder</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="comorbidities-neurogenic-disorder-yes" value="yes" name="comorbidities-neurogenic-disorder" checked="">
                                            <label class="custom-control-label" for="comorbidities-neurogenic-disorder-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="comorbidities-neurogenic-disorder-no" value="no" name="comorbidities-neurogenic-disorder">
                                            <label class="custom-control-label" for="comorbidities-neurogenic-disorder-no">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="others">Others <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="others" name="others" rows="5" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">UTI</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="yes" id="uti-yes" name="uti" checked="">
                                            <label class="custom-control-label" for="uti-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="no" id="uti-no" name="uti">
                                            <label class="custom-control-label" for="uti-no">No</label>
                                        </div>
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Radiological Evaluation</h2>

                                    <div class="form-group">
                                        <label for="medication">Medication <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="medication" name="medication" rows="5" required></textarea>
                                    </div>

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
                                        <label class="d-block">Side</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="left" id="left" name="side" checked="">
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

                                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                                    </div>

                                    <div class="form-group">
                                        <label for="hydronephrosis">Hydronephrosis</label>
                                        <select class="form-control form-control-alt" id="hydronephrosis" name="hydronephrosis" required>
                                            <option value="">Select Option</option>}
                                            option
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

                                    <input type="hidden" class="pre_operative_id" name="pre_operative_id" value="">
                                    <div class="form-group">
                                        <label class="d-block">Please select the below Reusable Scope</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Storz" id="reusable-scope-storz" name="reusable-scope">
                                            <label class="custom-control-label" for="reusable-scope-storz">Storz</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Olympus" id="reusable-scope-olympus" name="reusable-scope" checked="">
                                            <label class="custom-control-label" for="reusable-scope-olympus">Olympus</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Wolf" id="reusable-scope-wolf" name="reusable-scope">
                                            <label class="custom-control-label" for="reusable-scope-wolf">Wolf</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Others" id="reusable-scope-others" name="reusable-scope" checked="">
                                            <label class="custom-control-label" for="reusable-scope-others">Others</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" id="update_patient" name="update_patient" value="Update" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="wizard-simple2-step2" role="tabpanel">
                                <div id="message_opertive_data"></div>
                                <form action="#" method="post" id="operative_data_form" accept-charset="utf-8">

                                    <input type="hidden" class="patient_id" name="patient_id" value="">

                                    <div class="form-group">
                                        <label for="date-of-surgery">Date of Surgery</label>
                                        <input type="text" class="js-flatpickr form-control bg-white" id="date-of-surgery" name="date-of-surgery" placeholder="Y-m-d" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="anesthesia">Anesthesia</label>
                                        <select class="form-control form-control-alt" id="anesthesia" name="anesthesia" required="">
                                            <option value="">Select Option</option>
                                            <option value="General">General</option>
                                            <option value="Spinal">Spinal</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Prophylactic Antibiotic</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="prophylactic-antibiotic-yes" name="prophylactic-antibiotic">
                                            <label class="custom-control-label" for="prophylactic-antibiotic-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="prophylactic-antibiotic-no" name="prophylactic-antibiotic" checked="">
                                            <label class="custom-control-label" for="prophylactic-antibiotic-no">No</label>
                                        </div>
                                    </div>

                                    <div id="prophylactic-antibiotic-fields">
                                        <div class="form-group">
                                            <label for="code">Amoxicillin</label>
                                            <input class="form-control form-control-alt" type="text" name="prophylactic-antibiotic-amoxicillin">
                                        </div>
                                        <div class="form-group">
                                            <label for="code">Cephalosporin</label>
                                            <input class="form-control form-control-alt" type="text" name="prophylactic-antibiotic-cephalosporin">
                                        </div>
                                        <div class="form-group">
                                            <label for="prophylactic-antibiotic-others">Others</label>
                                            <textarea class="form-control" id="prophylactic-antibiotic-others" name="prophylactic-antibiotic-others" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Pre-Stented</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="pre-stented-yes" name="pre-stented">
                                            <label class="custom-control-label" for="pre-stented-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="pre-stented-no" name="pre-stented" checked="">
                                            <label class="custom-control-label" for="pre-stented-no">No</label>
                                        </div>
                                    </div>

                                    <div id="pre-stented-fields">
                                        <div class="form-group">
                                            <label for="pre_stended_no_of_days">Number of Days</label>
                                            <select class="form-control form-control-alt" id="pre_stended_no_of_days" name="pre_stended_no_of_days">
                                                <option value="">Select Option</option>
                                                <?php for ($i=0; $i <= 20 ; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pre_stended_reason">Reason</label>
                                            <textarea class="form-control" id="pre_stended_reason" name="pre_stended_reason" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Access Sheeth</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="access-sheeth-yes" name="access-sheeth">
                                            <label class="custom-control-label" for="access-sheeth-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="access-sheeth-no" name="access-sheeth" checked="">
                                            <label class="custom-control-label" for="access-sheeth-no">No</label>
                                        </div>
                                    </div>

                                    <div id="access-sheeth-fields">
                                        <div class="form-group">
                                            <label for="access-sheeth-size">Size(Fr) <span class="text-danger">*</span></label>
                                            <input class="form-control form-control-alt" type="number" id="access-sheeth-size" name="access-sheeth-size" min="0" step=".01">
                                        </div>
                                        <div class="form-group">
                                            <label for="access-sheeth-length">Length(cm) <span class="text-danger">*</span></label>
                                            <input class="form-control form-control-alt" type="number" id="access-sheeth-length" name="access-sheeth-length" min="0" step=".01">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Safety Wire</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="safety-wire-yes" name="safety-wire">
                                            <label class="custom-control-label" for="safety-wire-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="safety-wire-no" name="safety-wire" checked="">
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
                                        <select class="form-control form-control-alt" id="laser_type" name="laser_type" required="">
                                            <option value="">Select Option</option>
                                            <?php foreach ($laser_type as $laser_type_value): ?>
                                                <option value="<?php echo $laser_type_value ?>"><?php echo $laser_type_value ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Machine</label>
                                        <input class="form-control form-control-alt" type="text" name="laser-machine" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Fiber Size</label>
                                        <input class="form-control form-control-alt" type="text" name="laser-fiber-size" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="laser_mode">Mode</label>
                                        <select class="form-control form-control-alt" id="laser_mode" name="laser_mode" required="">
                                            <option value="">Select Option</option>
                                            <?php foreach ($laser_mode as $laser_mode_value): ?>
                                                <option value="<?php echo $laser_mode_value ?>"><?php echo $laser_mode_value ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>


                                    <h2 class="content-heading border-bottom mb-4 pb-2">Basket</h2>
                                    <div class="form-group">
                                        <label for="basket-size">Size(Fr) <span class="text-danger">*</span></label>
                                        <input class="form-control form-control-alt" type="number" id="basket-size" name="basket-size" min="0" step=".01" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Type</label>
                                        <input class="form-control form-control-alt" type="text" name="basket-type" required="">
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Irrigation</h2>
                                    <?php 
                                        $irrigation_type       = array("Saline" , "Others"); 
                                        $irrigation_temprature = array("Room Temprature" , "Warm");
                                        $irrigation_delivery   = array("Gravity" , "Manual" , "Pump");
                                    ?>
                                    <div class="form-group">
                                        <label for="irrigation_type">Type</label>
                                        <select class="form-control form-control-alt" id="irrigation_type" name="irrigation_type" required="">
                                            <option value="">Select Option</option>
                                            <?php foreach ($irrigation_type as $irrigation_type_value): ?>
                                                <option value="<?php echo $irrigation_type_value ?>"><?php echo $irrigation_type_value ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group" id="irrigation_type_add_field">
                                        <label for="irrigation_type_others">Others</label>
                                        <textarea class="form-control" id="irrigation_type_others" name="irrigation_type_others" rows="5"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="irrigation_temprature">Temprature</label>
                                        <select class="form-control form-control-alt" id="irrigation_temprature" name="irrigation_temprature" required="">
                                            <option value="">Select Option</option>
                                            <?php foreach ($irrigation_temprature as $irrigation_temprature_value): ?>
                                                <option value="<?php echo $irrigation_temprature_value ?>"><?php echo $irrigation_temprature_value ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="irrigation_delivery">Delivery</label>
                                        <select class="form-control form-control-alt" id="irrigation_delivery" name="irrigation_delivery" required="">
                                            <option value="">Select Option</option>
                                            <?php foreach ($irrigation_delivery as $irrigation_delivery_value): ?>
                                                <option value="<?php echo $irrigation_delivery_value ?>"><?php echo $irrigation_delivery_value ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Post Stenting</h2>
                                    <div class="form-group">
                                        <label class="d-block">Post Stenting</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="post-stenting-yes" name="post-stenting">
                                            <label class="custom-control-label" for="post-stenting-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="post-stenting-no" name="post-stenting" checked="">
                                            <label class="custom-control-label" for="post-stenting-no">No</label>
                                        </div>
                                    </div>

                                    <div id="post-stenting-fields">
                                        <?php 
                                            $post_stenting_type   = array("Double J" , "Single J", "Ureteral Catheter"); 
                                            $post_stenting_reason = array("Injury" , "bleeding" , "Residual" , "Duration" , "Access Sheeth" , "Surgeon preference");
                                             
                                        ?>
                                        <div class="form-group">
                                            <label for="post_stenting_type">Type</label>
                                            <select class="form-control form-control-alt" id="post_stenting_type" name="post_stenting_type">
                                                <option value="">Select Option</option>
                                                <?php foreach ($post_stenting_type as $post_stenting_type_value): ?>
                                                    <option value="<?php echo $post_stenting_type_value ?>"><?php echo $post_stenting_type_value ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <h2 class="content-heading border-bottom mb-4 pb-2">Size</h2>
                                        <div class="form-group">
                                            <label for="post-stending-length">Length(cm) <span class="text-danger">*</span></label>
                                            <input class="form-control form-control-alt" type="number" id="post-stending-length" name="post-stending-length" min="0" step=".01">
                                        </div>
                                        <div class="form-group">
                                            <label for="basket-diameter">Diameter(Fr) <span class="text-danger">*</span></label>
                                            <input class="form-control form-control-alt" type="number" id="post-stending-diameter" name="post-stending-diameter" min="0" step=".01">
                                        </div>

                                        <div class="form-group">
                                            <label for="post_stenting_reason">Reason</label>
                                            <select class="form-control form-control-alt" id="post_stenting_reason" name="post_stenting_reason">
                                                <option value="">Select Option</option>
                                                <?php foreach ($post_stenting_reason as $post_stenting_reason_value): ?>
                                                    <option value="<?php echo $post_stenting_reason_value ?>"><?php echo $post_stenting_reason_value ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Complications</h2>
                                    <div class="form-group">
                                        <label class="d-block">Injury</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="complications-yes" name="complications">
                                            <label class="custom-control-label" for="complications-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="complications-no" name="complications" checked="">
                                            <label class="custom-control-label" for="complications-no">No</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Perforation</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="complications_perforation-yes" name="complications_perforation">
                                            <label class="custom-control-label" for="complications_perforation-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="complications_perforation-no" name="complications_perforation" checked="">
                                            <label class="custom-control-label" for="complications_perforation-no">No</label>
                                        </div>
                                    </div>

                                    <?php 
                                        $complications_bleeding   = array("Significant" , "Non – Significant"); 
                                         
                                    ?>
                                    <div class="form-group">
                                        <label for="complications_bleeding">Bleeding</label>
                                        <select class="form-control form-control-alt" id="complications_bleeding" name="complications_bleeding" required="">
                                            <option value="">Select Option</option>
                                            <?php foreach ($complications_bleeding as $complications_bleeding_value): ?>
                                                <option value="<?php echo $complications_bleeding_value ?>"><?php echo $complications_bleeding_value ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="complications_others">Others</label>
                                        <textarea class="form-control" id="complications_others" name="complications_others" rows="5" required=""></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="operative-time">Operative Time(minutes) <span class="text-danger">*</span></label>
                                        <input class="form-control form-control-alt" type="number" id="operative-time" name="operative-time" min="0" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="lasing-time">Lasing Time(minutes) <span class="text-danger">*</span></label>
                                        <input class="form-control form-control-alt" type="number" id="lasing-time" name="lasing-time" min="0" required="">
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Scope Evaluation</h2>
                                    <div class="form-group mb-5">
                                        <label class="mb-4">Maneuverability</label>
                                        <input type="range" id="scope_evaluation_maneuverability" oninput="$('#maneuverability_value').attr('value',this.value)" />
                                        <input type="hidden" name="maneuverability_value" id="maneuverability_value" value="10">
                                    </div>

                                    <div class="form-group mb-5">
                                        <label class="mb-4">Image Quality</label>
                                        <input type="range" id="scope_evaluation_image_quality" oninput="$('#image_quality_value').attr('value',this.value)" />
                                        <input type="hidden" name="image_quality_value" id="image_quality_value" value="10">
                                    </div>

                                    <div class="form-group mb-5">
                                        <label class="mb-4">Ergonomics</label>
                                        <input type="range" id="scope_evaluation_ergonomics" oninput="$('#ergonomics_value').attr('value',this.value)" />
                                        <input type="hidden" name="ergonomics_value" id="ergonomics_value" value="10">
                                    </div>

                                    <div class="form-group mb-5">
                                        <label class="mb-4">Overall satisfaction</label>
                                        <input type="range" id="scope_evaluation_overall_satisfaction" oninput="$('#overall_satisfaction_value').attr('value',this.value)" />
                                        <input type="hidden" name="overall_satisfaction_value" id="overall_satisfaction_value" value="10">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" id="addOperativeData" name="addOperativeData" value="Add" class="btn btn-primary">
                                    </div>
                                </form>

                            </div>

                            <div class="tab-pane" id="wizard-simple2-step3" role="tabpanel">
                                <div id="message_early_opertive_data"></div>
                                <form action="#" method="post" id="early_post_operative_form" accept-charset="utf-8">
                                    <input type="hidden" class="patient_id" name="patient_id" value="">
                                    <div class="form-group">
                                        <label for="hospital_stay">Hospital Stay</label>
                                        <select class="form-control form-control-alt" id="hospital_stay" name="hospital_stay" required="">
                                            <option value="">Select Option</option>
                                            <?php for ($i=0; $i <= 20 ; $i++) { 
                                                echo "<option value='".$i."'>".$i."</option>";
                                            } ?>
                                        </select>
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Post Operation Analgesia</h2>

                                    <?php 
                                        $narcotics = array("Non-steroidal Anti-inflammatory" , "Paracetamol" , "Combination" , "None");
                                    ?>
                                    <div class="form-group">
                                        <label for="narcotics">Narcotics</label>
                                        <select class="form-control form-control-alt" id="narcotics" name="narcotics" required="">
                                            <option value="">Select Option</option>
                                            <?php foreach ($narcotics  as $narcotics_value): ?>
                                                <option value="<?php echo $narcotics_value ?>"><?php echo $narcotics_value ?></option>
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
                                                <option value="<?php echo $post_operation_anitbiotic_value ?>"><?php echo $post_operation_anitbiotic_value ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group" id="post_operation_anitbiotic_add_field">
                                        <label for="post_operation_anitbiotic_others">Others</label>
                                        <textarea class="form-control" id="post_operation_anitbiotic_others" name="post_operation_anitbiotic_others" rows="5"></textarea>
                                    </div>

                                    <h2 class="content-heading border-bottom mb-4 pb-2">Early Post-operative Complications</h2>
                                    <div class="form-group">
                                        <label class="d-block">Fever</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="fever-yes" name="fever">
                                            <label class="custom-control-label" for="fever-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="fever-no" name="fever" checked="">
                                            <label class="custom-control-label" for="fever-no">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Pain</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="pain-yes" name="pain">
                                            <label class="custom-control-label" for="pain-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="pain-no" name="pain" checked="">
                                            <label class="custom-control-label" for="pain-no">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Hematuria</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="hematuria-yes" name="hematuria">
                                            <label class="custom-control-label" for="hematuria-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="hematuria-no" name="hematuria" checked="">
                                            <label class="custom-control-label" for="hematuria-no">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">UTI</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="early-post-operative-complications-uti-yes" name="early-post-operative-complications-uti">
                                            <label class="custom-control-label" for="early-post-operative-complications-uti-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="early-post-operative-complications-uti-no" name="early-post-operative-complications-uti" checked="">
                                            <label class="custom-control-label" for="early-post-operative-complications-uti-no">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Sepsis</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="sepsis-yes" name="sepsis">
                                            <label class="custom-control-label" for="sepsis-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="sepsis-no" name="sepsis" checked="">
                                            <label class="custom-control-label" for="sepsis-no">No</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="early_post_operative_complications_others">Others</label>
                                        <textarea class="form-control" id="early_post_operative_complications_others" name="early_post_operative_complications_others" rows="5" required=""></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Emergency Visit</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="emergency-visit-yes" name="emergency-visit">
                                            <label class="custom-control-label" for="emergency-visit-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="emergency-visit-no" name="emergency-visit" checked="">
                                            <label class="custom-control-label" for="emergency-visit-no">No</label>
                                        </div>
                                    </div>

                                    <div class="form-group" id="emergency_visit_add_field">
                                        <label for="emergency_visit_reason">Reason</label>
                                        <textarea class="form-control" id="emergency_visit_reason" name="emergency_visit_reason" rows="5"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Re - Admission</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="Yes" id="re-admission-yes" name="re-admission">
                                            <label class="custom-control-label" for="re-admission-yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" value="No" id="re-admission-no" name="re-admission" checked="">
                                            <label class="custom-control-label" for="re-admission-no">No</label>
                                        </div>
                                    </div>

                                    <div class="form-group" id="re_admission_add_field">
                                        <label for="re_admission_reason">Reason</label>
                                        <textarea class="form-control" id="re_admission_reason" name="re_admission_reason" rows="5"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" id="addEarlyOperativeData" name="addEarlyOperativeData" value="Add" class="btn btn-primary">
                                    </div>
                                </form> 
                            </div>

                            <div class="tab-pane" id="wizard-simple2-step4" role="tabpanel"></div>

                            <div class="tab-pane" id="wizard-simple2-step5" role="tabpanel"></div>

                            <div class="tab-pane" id="wizard-simple2-step6" role="tabpanel"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
 

<script src="<?php echo base_url('assets/') ?>jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $("#scope_evaluation_maneuverability,#scope_evaluation_image_quality,#scope_evaluation_ergonomics").ionRangeSlider({
            min: 1,
            max: 10,
        });

        $("#scope_evaluation_overall_satisfaction").ionRangeSlider({
            min: 1,
            max: 10,
            step: 10,
        });

        $("#emergency_visit_add_field").hide();
         $("input[name='emergency-visit']").change(function(){
            var emergency_visit_radio_value = $(this).val();
            if(emergency_visit_radio_value === "Yes"){
                $("#emergency_visit_add_field").show();
            }else{
                $("#emergency_visit_add_field").hide();
            }
        });

        $("#re_admission_add_field").hide();
         $("input[name='re-admission']").change(function(){
            var re_admission_radio_value = $(this).val();
            if(re_admission_radio_value === "Yes"){
                $("#re_admission_add_field").show();
            }else{
                $("#re_admission_add_field").hide();
            }
        });

        $("#post_operation_anitbiotic_add_field").hide();

        $("#post_operation_anitbiotic").change(function(){
            if($(this).val() === "Others"){
                $("#post_operation_anitbiotic_add_field").show();
            }else{
                $("#post_operation_anitbiotic_add_field").hide();
            }
        });

        $("#irrigation_type_add_field").hide();

        $("#irrigation_type").change(function(){
            if($(this).val() === "Others"){
                $("#irrigation_type_add_field").show();
            }else{
                $("#irrigation_type_add_field").hide();
            }
        });

        


        $("#pre-stented-fields").hide();

        $("input[name='pre-stented']").change(function(){
            var pre_stented_radio_value = $(this).val();
            if(pre_stented_radio_value === "Yes"){
                $("#pre-stented-fields").show();
            }else{
                $("#pre-stented-fields").hide();
            }
        });

        $("#post-stenting-fields").hide();

        $("input[name='post-stenting']").change(function(){
            var post_stenting_radio_value = $(this).val();
            if(post_stenting_radio_value === "Yes"){
                $("#post-stenting-fields").show();
            }else{
                $("#post-stenting-fields").hide();
            }
        });

        $("#prophylactic-antibiotic-fields").hide();

        $("input[name='prophylactic-antibiotic']").change(function(){
            var prophylactic_antibiotic_radio_value = $(this).val();
            if(prophylactic_antibiotic_radio_value === "Yes"){
                $("#prophylactic-antibiotic-fields").show();
            }else{
                $("#prophylactic-antibiotic-fields").hide();
            }
        });

        $("#access-sheeth-fields").hide();

        $("input[name='access-sheeth']").change(function(){
            var access_sheeth = $(this).val();
            if(access_sheeth === "Yes"){
                $("#access-sheeth-fields").show();
            }else{
                $("#access-sheeth-fields").hide();
            }
        });

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

        $("#weight").change(function(){
            var weight = this.value;

            $("#height").change(function(){
                
                var height  = this.value*30.48;
                var bmi     = weight/height/height*10000;
                var bmi_value  = bmi.toFixed(2)
                $("#bmi").attr("value",bmi_value);
            });
        });
    });

    $("#update_patient_form").hide();

    $("#pre_operative_data_form").submit(function(e){
            e.preventDefault();
            
            var group = $("#group_value").val();
            var group_field = "";
            if(group == 2){
                $.ajax({
                    url: '<?php echo base_url() ?>patient/ajaxRequestPost',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: "JSON",
                    success: function(data) {
                        One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: 'Thank you for submitting the pre -operative data. You are assigned Group 2 so please select the below reusable scope'});

                        $("#message").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Thank you for submitting the pre -operative data. You are assigned Group 2 so please select the below reusable scope</p></div>');

                        $(".patient_id").val(data.patient_id);
                        $(".pre_opertive_id").val(data.pre_operative_id);
                        // alert(data.patient_id);
                    },
                    error: function() {
                        alert('Something is wrong');
                    },
                   
                });

                $("#pre_operative_data_form").hide();
                $("#update_patient_form").show();
                //  e.preventDefault();
            }else{
                // One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: 'Thank you for submitting the pre -operative data. You are assigned Group 1 for this patient so you will use only Pusen scope'});

                $.ajax({
                   url: '<?php echo base_url() ?>patient/ajaxRequestPost',
                   type: 'POST',
                   data: $(this).serialize(),
                   dataType: "JSON",
                   success: function(data) {
                        // alert("Record added successfully");  
                        $("#message").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Thank you for submitting the pre -operative data. You are assigned Group 1 for this patient so you will use only Pusen scope</p></div><div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Patient Added Successfully</p></div>');

                        $(".patient_id").val(data.patient_id);
                        $(".pre_opertive_id").val(data.pre_operative_id);
                   },
                   error: function() {
                      alert('Something is wrong');
                   },
                   
                });
                $("#pre_operative_data_form").hide();
                $("#update_patient_form").hide();
                $("input[name='formSteps']").attr("value","1");

            }
        });

    $("#update_patient_form").submit(function(e){
        e.preventDefault();
        $.ajax({
           url: '<?php echo base_url() ?>patient/updateAjaxRequestPost',
           type: 'POST',
           data: $(this).serialize(),
           success: function(data) {
                // One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: 'Patient Added Successfully'});
                $("#message").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Patient Added Successfully</p></div>');
                $("#pre_operative_data_form").hide();
                $("#update_patient_form").hide(); 
                $("input[name='formSteps']").attr("value","1");
           },
           error: function() {
              alert('Something is wrong');
           },
           
        });
    });

    $("#operative_data_form").submit(function(e){
        e.preventDefault();
        if($("input[name='formSteps']").val() == "1"){
            $.ajax({
                url: '<?php echo base_url() ?>patient/addOperativeData',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data){
                    // One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: 'Operative Data Added Successfully'});
                    $("#message_opertive_data").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Operative Data Added Successfully</p></div>');
                    $("#operative_data_form").hide();
                    $("input[name='formSteps']").attr("value","2");
                },
                error: function(){
                    alert('Something is wrong');
                }
            });
        }else{
            One.helpers('notify', {type: 'danger', icon: 'fa fa-check mr-1', message: 'Please fill Pre-Opertive form first'});
        }
    });

    $("#early_post_operative_form").submit(function(e){
        e.preventDefault();
        if($("input[name='formSteps']").val() == "2"){
            $.ajax({
                url: '<?php echo base_url() ?>patient/addEarlyPostOperativeData',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data){
                    $("#message_early_opertive_data").html('<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="mb-0">Early Post Operative Data Added Successfully</p></div>');
                    $("#early_post_operative_form").hide();
                },
                error: function(){
                    alert('something is fishy fishy');
                }
            })
        }else{
            One.helpers('notify', {type: 'danger', icon: 'fa fa-check mr-1', message: 'Please fill Opertive Data form first'});
        }
    });

    
</script>

<?php $this->load->view('Shared/footer'); ?>