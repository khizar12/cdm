<?php $this->load->view('Shared/header'); ?>

<style type="text/css" media="screen">
    .table td, .table th{ padding: .5rem .75rem!important; font-size: .849rem!important; text-align: center; }
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
      <div class="block-content" style="overflow-x: auto;">
        <table class="table table-bordered table-striped table-vcenter">
          <thead>
              <tr>
                  <th class="text-center">Group No</th>
                  <th class="text-center">Code</th>
                  <th class="text-center">Age</th>
                  <th class="text-center">Sex</th>
                  <th class="text-center">Weight</th>
                  <th class="text-center">Height</th>
                  <th class="text-center">BMI</th>
                  <th class="text-center">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($result as $row): ?>
              <tr>
                <td><?php echo $row->group_number; ?></td>
                <td><?php echo $row->code; ?></td>
                <td><?php echo $row->patient_age; ?></td>
                <td><?php echo $row->patient_sex; ?></td>
                <td><?php echo $row->patient_height; ?></td>
                <td><?php echo $row->patient_weight; ?></td>
                <td><?php echo $row->bmi; ?></td>
                <td>
                  <a href="" class="btn btn-sm btn-outline-info"><i class="fa fa-receipt fa-fw"></i> View Details</a>
                  <a href="" class="btn btn-sm btn-outline-danger"><i class="fa fa-fw fa-times mr-1"></i> Delete</a>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>

<?php $this->load->view('Shared/footer'); ?>