<?php $this->load->view('Shared/header'); ?>

<link rel="stylesheet" href="<?php echo base_url('assets/') ?>js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="<?php echo base_url('assets/') ?>js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">

<style type="text/css" media="screen">
    .table td, .table th{ padding: .5rem .75rem!important; font-size: .8rem!important; text-align: center; }
    .del-btn{ -webkit-appearance: none; }

    .dtHorizontalVerticalExampleWrapper { max-width: 600px; margin: 0 auto; }
    #dtHorizontalVerticalExample th, td { white-space: nowrap; }
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
      bottom: .5em;
    }
    .buttons-copy, .buttons-csv{ display: none; }
    .buttons-print{ padding-left: 3rem!important; padding-right: 3rem!important; }
    .buttons-print span{ font-size: 1rem!important; font-weight: 500; text-transform: uppercase; }
    .btn-tick, .btn-tick:hover{ color: #46c37b; }
    .btn-cross, .btn-cross:hover{ color: #d26a5c; }
</style>

<main id="main-container">
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill h3 my-2">View All Patients</h1>
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item" aria-current="page">
              <a class="link-fx" href="<?php echo base_url('patient'); ?>">View All Patients</a>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="block">
      <div class="block-header">
          <h3 class="block-title">Patients</h3>
      </div>
      <div class="block-content block-content-full">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
          <thead>
            <tr>
              <th class="text-center">Code</th>
              <th class="text-center">Patient Reference</th>
              <th class="text-center">Group No</th>
              <th class="text-center">Pre-Operative Data</th>
              <th class="text-center">Operative Data</th>
              <th class="text-center">Early Post Operative Data</th>
              <th class="text-center">Follow up 1<br/>(2 weeks out)</th>
              <th class="text-center">Follow up 2<br/>(4 weeks out)</th>
              <th class="text-center">Follow up 3<br/>(12 weeks out)</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($result as $row): ?>
              <?php $tickIcon = '<i class="btn btn-tick fa fa-fw fa-check"></i>'; ?>
              <?php $crossIcon = '<i class="btn btn-cross fa fa-fw fa-times"></i>'; ?>

              <tr>
                <td><?php echo $row->code; ?></td>
                <td><?php echo $row->patient_reference; ?></td>
                <td><?php echo $row->group_number; ?></td>
                <td><?php echo ($row->pre_operative_status == 1 ? $tickIcon : $crossIcon); ?></td>
                <td><?php echo ($row->operative_status == 1 ? $tickIcon : $crossIcon); ?></td>
                <td><?php echo ($row->early_post_operative_status == 1 ? $tickIcon : $crossIcon); ?></td>
                <td><?php echo ($row->follow_up_1_status == 1 ? $tickIcon : $crossIcon); ?></td>
                <td><?php echo ($row->follow_up_2_status == 1 ? $tickIcon : $crossIcon); ?></td>
                <td><?php echo ($row->follow_up_3_status == 1 ? $tickIcon : $crossIcon); ?></td>
                <td>
                  <a href="<?php echo base_url().'/patient/edit/'.$row->id; ?>" class="btn btn-sm btn-outline-info"><i class="fa fa-receipt fa-fw"></i> View Details</a>
                  <a onClick="return confirm('Are you sure you want to delete?')" href="<?php echo base_url().'/patient/delete/'.$row->id; ?>" type="button" class='btn btn-sm btn-outline-danger del-btn'><i class="fa fa-fw fa-times mr-1"></i> Delete</a>
                </td>
              </tr>
            <?php endforeach ?>
              
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>


<?php $this->load->view('Shared/footer'); ?>
        
<script src="<?php echo base_url('assets/'); ?>js/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url('assets/'); ?>js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/plugins/datatables/buttons/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/plugins/datatables/buttons/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/plugins/datatables/buttons/buttons.flash.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/plugins/datatables/buttons/buttons.colVis.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo base_url('assets/'); ?>js/pages/be_tables_datatables.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){  

    <?php if ($this->session->flashdata('delSuccess')): ?>
      One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: 'Patient data deleted successfully!'});
    <?php endif ?>
  });
</script>