<?php $this->load->view('Shared/header'); ?>

<style type="text/css" media="screen">
    .text-upper{ text-transform: uppercase; }
    .profile-box{ font-size: 0.9rem }
    .profile-box-font{ font-size: 0.9rem }
    .title{ vertical-align: middle; display: flex; align-items: center; margin-bottom: 0rem!important; }
    .df{ display: flex; }

    .profile-box{ background: #fff; }
    .profile-image{ border-radius: 100%; }
</style>

<main id="main-container">

    <div class="bg-image overflow-hidden" style="background-image: url('<?php echo base_url('assets/'); ?>media/photos/photo3@2x.jpg');">
        <div class="bg-primary-dark-op">
            <div class="content content-narrow content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Dashboard</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Welcome <?php echo (($this->session->userdata('user_type') == 1) ? '' : 'Dr. ').$this->session->userdata('first_name'); ?></h2> 
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="content content-narrow">
    <div class="row">
        <div class="col-md-3">
            <img src="<?php echo base_url('assets/') ?>media/photos/logo-asu.png" class="img-fluid"/>
        </div>
        <div class="col-md-9 df">
            <p class="title">Single use FURS versus Reusable FURS in the management of adults with renal stones less than 2cm: Multicentre Randomized Controlled Trial.</p>
        </div>
    </div>

<?php foreach ($result as $row): ?>
        <div class="row py-4">
            <div class="col-md-6">
                <div class="row profile-box">
                    <div class="col-md-4 py-4 px-2">
                        <img src="<?php echo base_url('assets/').$row->profile_image; ?>" class="img-fluid profile-image" alt="">
                    </div>
                    <div class="col-md-8  py-4 px-2">
                        <h1 class="h2 text-grey-75 mb-2 text-upper"><?php echo (($this->session->userdata('user_type') == 1) ? '' : 'Dr. ').$row->first_name.' '.$row->last_name; ?>
                            <?php echo ($row->education) ? '</br><span class="profile-box-font">'.$row->education.'</span>' : '' ?>
                        </h1>
                        <?php echo ($row->organization) ? '<p class="text-grey-75 mb-1"><b>'.$row->organization.'</b></p>' : '' ?>
                        <?php echo ($row->doctor_type) ? '<p class="text-grey-75 mb-1"><b>'.$row->doctor_type.'</b></p>' : '' ?>
                        <?php echo ($row->user_intro) ? '<p class="text-grey-75 mb-2">'.$row->user_intro.'</p>' : '' ?>
                        <?php echo ($row->mobile) ? '<p class="text-grey-75 mb-1"><b>Tel : </b>'.$row->mobile.'</p>' : '' ?>
                        <?php echo ($row->address) ? '<p class="text-grey-75 mb-0">'.$row->address.'</p>' : '' ?>
                    </div> 
                </div>
            </div>
        </div>
<?php endforeach ?>
    </div>
</main>

<?php $this->load->view('Shared/footer'); ?>