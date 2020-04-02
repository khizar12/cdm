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
    .form-control.form-control-alt {
        border-color: #fff;
        background-color: #FFF;
        transition: none;
    }
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
                <form action="#" method="POST" id="pre_operative_data_form">
                    <div class="form-group">
                        <label for="code">Name <span class="text-danger">*</span></label>
                        <input class="form-control form-control-alt" type="text" name="name" required>
                    </div> 

                    <div class="form-group">
                        <label for="code">Code <span class="text-danger">*</span></label>
                        <input class="form-control form-control-alt" type="text" name="email" required>
                    </div> 

                    <div class="form-group">
                        <label for="bmi">BMI</label>
                        <input class="form-control form-control-alt" type="number" id="bmi" name="bmi" step=".01">
                    </div>

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
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="<?php echo base_url('assets/') ?>jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#pre_operative_data_form').submit(function(e) {
            e.preventDefault();

            var dataString = $(this).serialize();
            
            
            $.ajax({
               url: '/cdm/demo/create',
               type: 'POST',
               data: $(this).serialize(),
               success: function(data) {
                    alert("Record added successfully");  
               },
               error: function() {
                  alert('Something is wrong');
               },
               
            });
        });
    });
   


</script>

<?php $this->load->view('Shared/footer'); ?>