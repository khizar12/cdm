<?php $this->load->view('Shared/header'); ?>

<link rel="stylesheet" href="<?php echo base_url('assets/') ?>js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="<?php echo base_url('assets/') ?>js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">

<style type="text/css" media="screen">
    span.page-link{ cursor: pointer; }
    table, thead, tbody, th, td, tr { display: block; }
    thead tr { position: absolute; top: -9999px; left: -9999px; }
    tr { margin: 0 0 1rem 0; }
    /*tr:nth-child(odd) { background: #ccc; }*/
    td { border: none; border-bottom: 1px solid #eee; position: relative; padding-left: 50%; padding-top: 5px; padding-bottom: 5px; }
    td:before { position: absolute; top: 0; left: 6px; width: 45%; padding-right: 10px; white-space: nowrap; padding-top: 5px; padding-bottom: 5px; }
    td:nth-of-type(1),td:nth-of-type(13),td:nth-of-type(43),td:nth-of-type(87),td:nth-of-type(105),td:nth-of-type(135),td:nth-of-type(161) { padding: 8px 0px 8px 7px; text-align: left; font-weight: 700; font-size: 20px; }
    
    td:nth-of-type(1):after    { content: "PATIENT DATA"; }
    td:nth-of-type(2):before   { content: "ID"; }
    td:nth-of-type(3):before   { content: "User ID"; }
    td:nth-of-type(4):before   { content: "Group Number"; }
    td:nth-of-type(5):before   { content: "Patient Code"; }
    td:nth-of-type(6):before   { content: "Patient Reference"; }
    td:nth-of-type(7):before   { content: "Name"; }
    td:nth-of-type(8):before   { content: "Age"; }
    td:nth-of-type(9):before   { content: "Sex"; }
    td:nth-of-type(10):before  { content: "Height"; }
    td:nth-of-type(11):before  { content: "Weight"; }
    td:nth-of-type(12):before  { content: "BMI"; }
    td:nth-of-type(13):after   { content: "PRE-OPERATIVE DATA"; }
    td:nth-of-type(14):before  { content: "Patient ID"; }
    td:nth-of-type(15):before  { content: "DM"; }
    td:nth-of-type(16):before  { content: "HTN"; }
    td:nth-of-type(17):before  { content: "IHD"; }
    td:nth-of-type(18):before  { content: "Thyroid Disorder"; }
    td:nth-of-type(19):before  { content: "Neurogenic Disorder"; }
    td:nth-of-type(20):before  { content: "Others"; }
    td:nth-of-type(21):before  { content: "UTI"; }
    td:nth-of-type(22):before  { content: "UTI Treated"; }
    td:nth-of-type(23):before  { content: "UTI Treatment"; }
    td:nth-of-type(24):before  { content: "Medication"; }
    td:nth-of-type(25):before  { content: "Creatinine"; }
    td:nth-of-type(26):before  { content: "Creatinine File"; }
    td:nth-of-type(27):before  { content: "Urea"; }
    td:nth-of-type(28):before  { content: "Urea File"; }
    td:nth-of-type(29):before  { content: "Calcium"; }
    td:nth-of-type(30):before  { content: "Calcium File"; }
    td:nth-of-type(31):before  { content: "Uric Acid"; }
    td:nth-of-type(32):before  { content: "Uric Acid File"; }
    td:nth-of-type(33):before  { content: "Urine File"; }
    td:nth-of-type(34):before  { content: "Xray"; }
    td:nth-of-type(35):before  { content: "US"; }
    td:nth-of-type(36):before  { content: "CT"; }
    td:nth-of-type(37):before  { content: "Side"; }
    td:nth-of-type(38):before  { content: "Number of Stones"; }
    td:nth-of-type(39):before  { content: "Stones Contralateral"; }
    td:nth-of-type(40):before  { content: "Hydronephrosis"; }
    td:nth-of-type(41):before  { content: "Reusable scope"; }
    td:nth-of-type(42):before  { content: "Status"; }
    td:nth-of-type(43):after   { content: "OPERATIVE DATA"; }
    td:nth-of-type(44):before  { content: "Date of Surgery"; }
    td:nth-of-type(45):before  { content: "Anesthesia"; }
    td:nth-of-type(46):before  { content: "Prophylactic Antibiotic"; }
    td:nth-of-type(47):before  { content: "Prophylactic Antibiotic Additional"; }
    td:nth-of-type(48):before  { content: "Prophylactic Antibiotic Additional Other"; }
    td:nth-of-type(49):before  { content: "Pre Stented"; }
    td:nth-of-type(50):before  { content: "Pre Stended no of days"; }
    td:nth-of-type(51):before  { content: "Pre Stended reason"; }
    td:nth-of-type(52):before  { content: "Access sheeth"; }
    td:nth-of-type(53):before  { content: "Access sheeth size"; }
    td:nth-of-type(54):before  { content: "Access sheeth length"; }
    td:nth-of-type(55):before  { content: "Access sheeth insertion"; }
    td:nth-of-type(56):before  { content: "Safety wire"; }
    td:nth-of-type(57):before  { content: "Laser type"; }
    td:nth-of-type(58):before  { content: "Laser machine"; }
    td:nth-of-type(59):before  { content: "Laser fiber_size"; }
    td:nth-of-type(60):before  { content: "Dusting energy"; }
    td:nth-of-type(61):before  { content: "Dusting frequency"; }
    td:nth-of-type(62):before  { content: "Fragmentation energy"; }
    td:nth-of-type(63):before  { content: "Fragmentation frequency"; }
    td:nth-of-type(64):before  { content: "Basket"; }
    td:nth-of-type(65):before  { content: "Basket size"; }
    td:nth-of-type(66):before  { content: "Basket type"; }
    td:nth-of-type(67):before  { content: "Irrigation type"; }
    td:nth-of-type(68):before  { content: "Irrigation type others"; }
    td:nth-of-type(69):before  { content: "Irrigation temprature"; }
    td:nth-of-type(70):before  { content: "Irrigation delivery"; }
    td:nth-of-type(71):before  { content: "Post stenting"; }
    td:nth-of-type(72):before  { content: "Post stenting type"; }
    td:nth-of-type(73):before  { content: "Post stending length"; }
    td:nth-of-type(74):before  { content: "Post stending diameter"; }
    td:nth-of-type(75):before  { content: "Post stenting reason"; }
    td:nth-of-type(76):before  { content: "Complications"; }
    td:nth-of-type(77):before  { content: "Complications perforation"; }
    td:nth-of-type(78):before  { content: "Complications bleeding"; }
    td:nth-of-type(79):before  { content: "Complications others"; }
    td:nth-of-type(80):before  { content: "Operative time"; }
    td:nth-of-type(81):before  { content: "Lasing time"; }
    td:nth-of-type(82):before  { content: "Maneuverability value"; }
    td:nth-of-type(83):before  { content: "Image quality value"; }
    td:nth-of-type(84):before  { content: "Ergonomics value"; }
    td:nth-of-type(85):before  { content: "Overall satisfaction value"; }
    td:nth-of-type(86):before  { content: "Status"; }
    td:nth-of-type(87):after   { content: "EARLY POST OPERATIVE DATA"; }
    td:nth-of-type(88):before  { content: "Hospital stay"; }
    td:nth-of-type(89):before  { content: "Narcotics"; }
    td:nth-of-type(90):before  { content: "Post operation anitbiotic"; }
    td:nth-of-type(91):before  { content: "Post operation anitbiotic others"; }
    td:nth-of-type(92):before  { content: "Fever"; }
    td:nth-of-type(93):before  { content: "Pain"; }
    td:nth-of-type(94):before  { content: "Hematuria"; }
    td:nth-of-type(95):before  { content: "Early post uti"; }
    td:nth-of-type(96):before  { content: "Early post uti treated"; }
    td:nth-of-type(97):before  { content: "Early post uti treatment"; }
    td:nth-of-type(98):before  { content: "Sepsis"; }
    td:nth-of-type(99):before  { content: "Others"; }
    td:nth-of-type(100):before  { content: "Emergency visit"; }
    td:nth-of-type(101):before  { content: "Emergency visit reason"; }
    td:nth-of-type(102):before  { content: "Re admission"; }
    td:nth-of-type(103):before  { content: "Re admission reason"; }
    td:nth-of-type(104):before  { content: "Status"; }
    td:nth-of-type(105):after   { content: "FOLLOW UP 1"; }
    td:nth-of-type(106):before  { content: "Pain"; }
    td:nth-of-type(107):before  { content: "Luts"; }
    td:nth-of-type(108):before  { content: "UTI"; }
    td:nth-of-type(109):before { content: "UTI treated"; }
    td:nth-of-type(110):before { content: "UTI treatment"; }
    td:nth-of-type(111):before { content: "Hematuria"; }
    td:nth-of-type(112):before { content: "Others"; }
    td:nth-of-type(113):before { content: "Creatinine"; }
    td:nth-of-type(114):before { content: "Creatinine image"; }
    td:nth-of-type(115):before { content: "Urea"; }
    td:nth-of-type(116):before { content: "Urea image"; }
    td:nth-of-type(117):before { content: "Urine"; }
    td:nth-of-type(118):before { content: "Urine_image"; }
    td:nth-of-type(119):before { content: "XRAY"; }
    td:nth-of-type(120):before { content: "US"; }
    td:nth-of-type(121):before { content: "CT"; }
    td:nth-of-type(122):before { content: "Residual fragment"; }
    td:nth-of-type(123):before { content: "Residual fragment size"; }
    td:nth-of-type(124):before { content: "Residual fragment location"; }
    td:nth-of-type(125):before { content: "Residual fragment number"; }
    td:nth-of-type(126):before { content: "Stent removal"; }
    td:nth-of-type(127):before { content: "Smooth"; }
    td:nth-of-type(128):before { content: "Adverse event"; }
    td:nth-of-type(129):before { content: "Office based"; }
    td:nth-of-type(130):before { content: "Day care"; }
    td:nth-of-type(131):before { content: "Flexible cystoscope"; }
    td:nth-of-type(132):before { content: "Rigid cystoscope"; }
    td:nth-of-type(133):before { content: "Reason"; }
    td:nth-of-type(134):before { content: "Status"; }
    td:nth-of-type(135):after  { content: "FOLLOW UP 2"; }
    td:nth-of-type(136):before { content: "pain"; }
    td:nth-of-type(137):before { content: "Luts"; }
    td:nth-of-type(138):before { content: "UTI"; }
    td:nth-of-type(139):before { content: "UTI treated"; }
    td:nth-of-type(140):before { content: "UTI treatment"; }
    td:nth-of-type(141):before { content: "Hematuria"; }
    td:nth-of-type(142):before { content: "Others"; }
    td:nth-of-type(143):before { content: "XRAY"; }
    td:nth-of-type(144):before { content: "US"; }
    td:nth-of-type(145):before { content: "CT"; }
    td:nth-of-type(146):before { content: "Residual fragment"; }
    td:nth-of-type(147):before { content: "Residual fragment size"; }
    td:nth-of-type(148):before { content: "Residual fragment location"; }
    td:nth-of-type(149):before { content: "Residual fragment number"; }
    td:nth-of-type(150):before { content: "Stent removal"; }
    td:nth-of-type(151):before { content: "Smooth"; }
    td:nth-of-type(152):before { content: "Adverse event"; }
    td:nth-of-type(153):before { content: "Office based"; }
    td:nth-of-type(154):before { content: "Day care"; }
    td:nth-of-type(155):before { content: "LA"; }
    td:nth-of-type(156):before { content: "GA"; }
    td:nth-of-type(157):before { content: "Flexible cystoscope"; }
    td:nth-of-type(158):before { content: "Rigid cystoscope"; }
    td:nth-of-type(159):before { content: "Reason"; }
    td:nth-of-type(160):before { content: "Status"; }
    td:nth-of-type(161):after  { content: "FOLLOW UP 3"; }
    td:nth-of-type(162):before { content: "Pain"; }
    td:nth-of-type(163):before { content: "Luts"; }
    td:nth-of-type(164):before { content: "UTI"; }
    td:nth-of-type(165):before { content: "UTI treated"; }
    td:nth-of-type(166):before { content: "UTI treatment"; }
    td:nth-of-type(167):before { content: "Hematuria"; }
    td:nth-of-type(168):before { content: "Others"; }
    td:nth-of-type(169):before { content: "XRAY"; }
    td:nth-of-type(170):before { content: "US"; }
    td:nth-of-type(171):before { content: "CT"; }
    td:nth-of-type(172):before { content: "Residual fragment"; }
    td:nth-of-type(173):before { content: "Residual fragment size"; }
    td:nth-of-type(174):before { content: "Residual fragment location"; }
    td:nth-of-type(175):before { content: "Residual fragment number"; }
    td:nth-of-type(176):before { content: "Status"; }

    .thead{ background: #2c343f; color: #fff;}
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
                <form action="" method="POST">
                    <div class="input-group">
                        <input type="text" id="keywords" class="form-control" placeholder="Search.." onkeyup="searchFilter();">
                    </div>
                </form>
            </div>

            <div class="block-content block-content-full" id="dataList">
                <?php if (!empty($posts)): ?>
                    <table role="table">
                        <tbody role="rowgroup">
                            <?php foreach ($posts as $row): ?>
                                <tr role="row">
                                    <td role="cell" class="thead">
                                        <!-- <a onClick="return confirm('Are you sure you want to delete?')" href="<?php echo base_url().'patient/delete/'.$row['patient_id']; ?>" type="button" class='btn btn-sm btn-outline-danger del-btn float-right mx-2'><i class="fa fa-fw fa-times mr-1"></i> Delete</a>
                                        <a href="<?php echo base_url().'patient/edit/'.$row['patient_id']; ?>" class="btn btn-sm btn-outline-info float-right"><i class="fa fa-receipt fa-fw"></i> View Details</a> -->
                                    </td>
                                    <td role="cell"><?php echo ($row['patient_id'] == "") ? " - " : $row['patient_id']; ?></td>
                                    <td role="cell"><?php echo ($row['user_id'] == "") ? " - " : $row['user_id']; ?></td>
                                    <td role="cell"><?php echo ($row['group_number'] == "") ? " - " : $row['group_number']; ?></td>
                                    <td role="cell"><?php echo ($row['code'] == "") ? " - " : $row['code']; ?></td>
                                    <td role="cell"><?php echo ($row['patient_reference'] == "") ? " - " : $row['patient_reference']; ?></td>
                                    <td role="cell"><?php echo ($row['patient_name'] == "") ? " - " : $row['patient_name']; ?> </td>
                                    <td role="cell"><?php echo ($row['patient_age'] == "") ? " - " : $row['patient_age']; ?></td>
                                    <td role="cell"><?php echo ($row['patient_sex'] == "") ? " - " : $row['patient_sex']; ?></td>
                                    <td role="cell"><?php echo ($row['patient_height'] == "") ? " - " : $row['patient_height']; ?></td>
                                    <td role="cell"><?php echo ($row['patient_weight'] == "") ? " - " : $row['patient_weight']; ?></td>
                                    <td role="cell"><?php echo ($row['bmi'] == "") ? " - " : $row['bmi']; ?></td>
                                    <td role="cell" class="thead"></td>
                                    <td role="cell"><?php echo ($row['pre_operative_patient_id'] == "") ? " - " : $row['pre_operative_patient_id']; ?></td>
                                    <td role="cell"><?php echo ($row['dm'] == "") ? " - " : $row['dm']; ?></td>
                                    <td role="cell"><?php echo ($row['htn'] == "") ? " - " : $row['htn']; ?></td>
                                    <td role="cell"><?php echo ($row['ihd'] == "") ? " - " : $row['ihd']; ?></td>
                                    <td role="cell"><?php echo ($row['thyroid_disorder'] == "") ? " - " : $row['thyroid_disorder']; ?></td>
                                    <td role="cell"><?php echo ($row['neurogenic_disorder'] == "") ? " - " : $row['neurogenic_disorder']; ?></td>
                                    <td role="cell"><?php echo ($row['pre_operative_others'] == "") ? " - " : $row['pre_operative_others']; ?></td>
                                    <td role="cell"><?php echo ($row['pre_operative_uti'] == "") ? " - " : $row['pre_operative_uti']; ?></td>
                                    <td role="cell"><?php echo ($row['pre_operative_uti_treated'] == "") ? " - " : $row['pre_operative_uti_treated']; ?></td>
                                    <td role="cell"><?php echo ($row['pre_operative_uti_treatment'] == "") ? " - " : $row['pre_operative_uti_treatment']; ?></td>
                                    <td role="cell"><?php echo ($row['medication'] == "") ? " - " : $row['medication']; ?></td>
                                    <td role="cell"><?php echo ($row['lab_creatinine'] == "") ? " - " : $row['lab_creatinine']; ?></td>
                                    <td role="cell">
                                        <?php echo ($row['lab_creatinine_file'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['lab_creatinine_file']."'>".$row['lab_creatinine_file']."</a>" ?>
                                    </td>
                                    <td role="cell"><?php echo ($row['lab_urea'] == "") ? " - " : $row['lab_urea']; ?></td>
                                    <td role="cell">
                                        <?php echo ($row['lab_urea_file'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['lab_urea_file']."'>".$row['lab_urea_file']."</a>" ?>
                                    </td>
                                    <td role="cell"><?php echo ($row['lab_calcium'] == "") ? " - " : $row['lab_calcium']; ?></td>
                                    <td role="cell">
                                        <?php echo ($row['lab_calcium_file'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['lab_calcium_file']."'>".$row['lab_calcium_file']."</a>" ?>
                                    </td>
                                    <td role="cell"><?php echo ($row['lab_uric_acid'] == "") ? " - " : $row['lab_uric_acid']; ?></td>
                                    <td role="cell">
                                        <?php echo ($row['lab_uric_acid_file'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['lab_uric_acid_file']."'>".$row['lab_uric_acid_file']."</a>" ?>
                                    </td>
                                    <td role="cell">
                                        <?php echo ($row['lab_urine_file'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['lab_urine_file']."'>".$row['lab_urine_file']."</a>" ?>
                                    </td>
                                    <td role="cell">
                                        <?php echo ($row['xray'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['xray']."'>".$row['xray']."</a>" ?>
                                    </td>
                                    <td role="cell">
                                        <?php echo ($row['us'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['us']."'>".$row['us']."</a>" ?>
                                    </td>
                                    <td role="cell">
                                        <?php echo ($row['ct'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['ct']."'>".$row['ct']."</a>" ?>
                                    </td>

                                    <td role="cell"><?php echo ($row['side'] == "") ? " - " : $row['side']; ?></td>
                                    <td role="cell"><?php echo ($row['number_of_stones'] == "") ? " - " : $row['number_of_stones']; ?></td>
                                    <td role="cell"><?php echo ($row['stones_contralateral'] == "") ? " - " : $row['stones_contralateral']; ?></td>
                                    <td role="cell"><?php echo ($row['hydronephrosis'] == "") ? " - " : $row['hydronephrosis']; ?></td>
                                    <td role="cell"><?php echo ($row['reusable_scope_2'] == "") ? " - " : $row['reusable_scope_2']; ?></td>
                                    <td role="cell"><?php echo ($row['status'] == 0) ? 0 : 1; ?></td>
                                    <td role="cell" class="thead"></td>
                                    <td role="cell"><?php echo ($row['date_of_surgery'] == "") ? " - " : date("d-m-Y", strtotime($row['date_of_surgery'])); ?></td>
                                    <td role="cell"><?php echo ($row['anesthesia'] == "") ? " - " : $row['anesthesia']; ?></td>
                                    <td role="cell"><?php echo ($row['prophylactic_antibiotic'] == "") ? " - " : $row['prophylactic_antibiotic']; ?></td>
                                    <td role="cell"><?php echo ($row['prophylactic_antibiotic_additional'] == "") ? " - " : $row['prophylactic_antibiotic_additional']; ?></td>
                                    <td role="cell"><?php echo ($row['prophylactic_antibiotic_additional_other'] == "") ? " - " : $row['prophylactic_antibiotic_additional_other']; ?></td>
                                    <td role="cell"><?php echo ($row['pre_stented'] == "") ? " - " : $row['pre_stented']; ?></td>
                                    <td role="cell"><?php echo ($row['pre_stended_no_of_days'] == "") ? " - " : $row['pre_stended_no_of_days']; ?></td>
                                    <td role="cell"><?php echo ($row['pre_stended_reason'] == "") ? " - " : $row['pre_stended_reason']; ?></td>
                                    <td role="cell"><?php echo ($row['access_sheeth'] == "") ? " - " : $row['access_sheeth']; ?></td>
                                    <td role="cell"><?php echo ($row['access_sheeth_size'] == "") ? " - " : $row['access_sheeth_size']; ?></td>
                                    <td role="cell"><?php echo ($row['access_sheeth_length'] == "") ? " - " : $row['access_sheeth_length']; ?></td>
                                    <td role="cell"><?php echo ($row['access_sheeth_insertion'] == "") ? " - " : $row['access_sheeth_insertion']; ?></td>
                                    <td role="cell"><?php echo ($row['safety_wire'] == "") ? " - " : $row['safety_wire']; ?></td>
                                    <td role="cell"><?php echo ($row['laser_type'] == "") ? " - " : $row['laser_type']; ?></td>
                                    <td role="cell"><?php echo ($row['laser_machine'] == "") ? " - " : $row['laser_machine']; ?></td>
                                    <td role="cell"><?php echo ($row['laser_fiber_size'] == "") ? " - " : $row['laser_fiber_size']; ?></td>
                                    <td role="cell"><?php echo ($row['dusting_energy'] == "") ? " - " : $row['dusting_energy']; ?></td>
                                    <td role="cell"><?php echo ($row['dusting_frequency'] == "") ? " - " : $row['dusting_frequency']; ?></td>
                                    <td role="cell"><?php echo ($row['fragmentation_energy'] == "") ? " - " : $row['fragmentation_energy']; ?></td>
                                    <td role="cell"><?php echo ($row['fragmentation_frequency'] == "") ? " - " : $row['fragmentation_frequency']; ?></td>
                                    <td role="cell"><?php echo ($row['basket'] == "") ? " - " : $row['basket']; ?></td>
                                    <td role="cell"><?php echo ($row['basket_size'] == "") ? " - " : $row['basket_size']; ?></td>
                                    <td role="cell"><?php echo ($row['basket_type'] == "") ? " - " : $row['basket_type']; ?></td>
                                    <td role="cell"><?php echo ($row['irrigation_type'] == "") ? " - " : $row['irrigation_type']; ?></td>
                                    <td role="cell"><?php echo ($row['irrigation_type_others'] == "") ? " - " : $row['irrigation_type_others']; ?></td>
                                    <td role="cell"><?php echo ($row['irrigation_temprature'] == "") ? " - " : $row['irrigation_temprature']; ?></td>
                                    <td role="cell"><?php echo ($row['irrigation_delivery'] == "") ? " - " : $row['irrigation_delivery']; ?></td>
                                    <td role="cell"><?php echo ($row['post_stenting'] == "") ? " - " : $row['post_stenting']; ?></td>
                                    <td role="cell"><?php echo ($row['post_stenting_type'] == "") ? " - " : $row['post_stenting_type']; ?></td>
                                    <td role="cell"><?php echo ($row['post_stending_length'] == "") ? " - " : $row['post_stending_length']; ?></td>
                                    <td role="cell"><?php echo ($row['post_stending_diameter'] == "") ? " - " : $row['post_stending_diameter']; ?></td>
                                    <td role="cell"><?php echo ($row['post_stenting_reason'] == "") ? " - " : $row['post_stenting_reason']; ?></td>
                                    <td role="cell"><?php echo ($row['complications'] == "") ? " - " : $row['complications']; ?></td>
                                    <td role="cell"><?php echo ($row['complications_perforation'] == "") ? " - " : $row['complications_perforation']; ?></td>
                                    <td role="cell"><?php echo ($row['complications_bleeding'] == "") ? " - " : $row['complications_bleeding']; ?></td>
                                    <td role="cell"><?php echo ($row['complications_others'] == "") ? " - " : $row['complications_others']; ?></td>
                                    <td role="cell"><?php echo ($row['operative_time'] == "") ? " - " : $row['operative_time']; ?></td>
                                    <td role="cell"><?php echo ($row['lasing_time'] == "") ? " - " : $row['lasing_time']; ?></td>
                                    <td role="cell"><?php echo ($row['maneuverability_value'] == "") ? " - " : $row['maneuverability_value']; ?></td>
                                    <td role="cell"><?php echo ($row['image_quality_value'] == "") ? " - " : $row['image_quality_value']; ?></td>
                                    <td role="cell"><?php echo ($row['ergonomics_value'] == "") ? " - " : $row['ergonomics_value']; ?></td>
                                    <td role="cell"><?php echo ($row['overall_satisfaction_value'] == "") ? " - " : $row['overall_satisfaction_value']; ?></td>
                                    <td role="cell"><?php echo ($row['operative_data_status'] == 0) ? 0 : 1; ?></td>
                                    <td role="cell" class="thead"></td>
                                    <td role="cell"><?php echo ($row['hospital_stay'] == "") ? " - " : $row['hospital_stay']; ?></td>
                                    <td role="cell"><?php echo ($row['narcotics'] == "") ? " - " : $row['narcotics']; ?></td>
                                    <td role="cell"><?php echo ($row['post_operation_anitbiotic'] == "") ? " - " : $row['post_operation_anitbiotic']; ?></td>
                                    <td role="cell"><?php echo ($row['post_operation_anitbiotic_others'] == "") ? " - " : $row['post_operation_anitbiotic_others']; ?></td>
                                    <td role="cell"><?php echo ($row['fever'] == "") ? " - " : $row['fever']; ?></td>
                                    <td role="cell"><?php echo ($row['pain'] == "") ? " - " : $row['pain']; ?></td>
                                    <td role="cell"><?php echo ($row['hematuria'] == "") ? " - " : $row['hematuria']; ?></td>
                                    <td role="cell"><?php echo ($row['early_post_uti'] == "") ? " - " : $row['early_post_uti']; ?></td>
                                    <td role="cell"><?php echo ($row['early_post_uti_treated'] == "") ? " - " : $row['early_post_uti_treated']; ?></td>
                                    <td role="cell"><?php echo ($row['early_post_uti_treatment'] == "") ? " - " : $row['early_post_uti_treatment']; ?></td>
                                    <td role="cell"><?php echo ($row['sepsis'] == "") ? " - " : $row['sepsis']; ?></td>
                                    <td role="cell"><?php echo ($row['early_post_others'] == "") ? " - " : $row['early_post_others']; ?></td>
                                    <td role="cell"><?php echo ($row['emergency_visit'] == "") ? " - " : $row['emergency_visit']; ?></td>
                                    <td role="cell"><?php echo ($row['emergency_visit_reason'] == "") ? " - " : $row['emergency_visit_reason']; ?></td>
                                    <td role="cell"><?php echo ($row['re_admission'] == "") ? " - " : $row['re_admission']; ?></td>
                                    <td role="cell"><?php echo ($row['re_admission_reason'] == "") ? " - " : $row['re_admission_reason']; ?></td>
                                    <td role="cell"><?php echo ($row['early_post_status'] == 0) ? 0 : 1; ?></td>
                                    <td role="cell" class="thead"></td>
                                    <td role="cell"><?php echo ($row['follow_1_pain'] == "") ? " - " : $row['follow_1_pain']; ?></td>
                                    <td role="cell"><?php echo ($row['luts'] == "") ? " - " : $row['luts']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_1_uti'] == "") ? " - " : $row['follow_1_uti']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_1_uti_treated'] == "") ? " - " : $row['follow_1_uti_treated']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_1_uti_treatment'] == "") ? " - " : $row['follow_1_uti_treatment']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_1_hematuria'] == "") ? " - " : $row['follow_1_hematuria']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_1_others'] == "") ? " - " : $row['follow_1_others']; ?></td>
                                    <td role="cell"><?php echo ($row['creatinine'] == "") ? " - " : $row['creatinine']; ?></td>
                                    <td role="cell">
                                        <?php echo ($row->creatinine_image == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row->creatinine_image."'>".$row->creatinine_image."</a>" ?>
                                    </td>
                                    <td role="cell"><?php echo ($row->urea == "") ? " - " : $row->urea; ?></td>
                                    <td role="cell">
                                        <?php echo ($row->urea_image == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row->urea_image."'>".$row->urea_image."</a>" ?>
                                    </td>
                                    <td role="cell"><?php echo ($row['urine'] == "") ? " - " : $row['urine']; ?></td>
                                    <td role="cell">
                                        <?php echo ($row['urine_image'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['urine_image']."'>".$row['urine_image']."</a>" ?>
                                    </td>
                                    <td role="cell">
                                        <?php echo ($row['follow_1_xray'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['follow_1_xray']."'>".$row['follow_1_xray']."</a>" ?>
                                    </td>
                                    <td role="cell">
                                        <?php echo ($row['follow_1_us'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['follow_1_us']."'>".$row['follow_1_us']."</a>" ?>
                                    </td>
                                    <td role="cell">
                                        <?php echo ($row['follow_1_ct'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['follow_1_ct']."'>".$row['follow_1_ct']."</a>" ?>
                                    </td>
                                    <td role="cell"><?php echo ($row['f1_residual_fragment'] == "") ? " - " : $row['f1_residual_fragment']; ?></td>
                                    <td role="cell"><?php echo ($row['f1_residual_fragment_size'] == "") ? " - " : $row['f1_residual_fragment_size']; ?></td>
                                    <td role="cell"><?php echo ($row['f1_residual_fragment_location'] == "") ? " - " : $row['f1_residual_fragment_location']; ?></td>
                                    <td role="cell"><?php echo ($row['f1_residual_fragment_number'] == "") ? " - " : $row['f1_residual_fragment_number']; ?></td>
                                    <td role="cell"><?php echo ($row['stent_removal'] == "") ? " - " : $row['stent_removal']; ?></td>
                                    <td role="cell"><?php echo ($row['smooth'] == "") ? " - " : $row['smooth']; ?></td>
                                    <td role="cell"><?php echo ($row['adverse_event'] == "") ? " - " : $row['adverse_event']; ?></td>
                                    <td role="cell"><?php echo ($row['office_based'] == "") ? " - " : $row['office_based']; ?></td>
                                    <td role="cell"><?php echo ($row['day_care'] == "") ? " - " : $row['day_care']; ?></td>
                                    <td role="cell"><?php echo ($row['flexible_cystoscope'] == "") ? " - " : $row['flexible_cystoscope']; ?></td>
                                    <td role="cell"><?php echo ($row['rigid_cystoscope'] == "") ? " - " : $row['rigid_cystoscope']; ?></td>
                                    <td role="cell"><?php echo ($row['reason'] == "") ? " - " : $row['reason']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_1_status'] == 0) ? 0 : 1; ?></td>
                                    <td role="cell" class="thead"></td>
                                    <td role="cell"><?php echo ($row['follow_2_pain'] == "") ? " - " : $row['follow_2_pain']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_luts'] == "") ? " - " : $row['follow_2_luts']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_uti'] == "") ? " - " : $row['follow_2_uti']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_uti_treated'] == "") ? " - " : $row['follow_2_uti_treated']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_uti_treatment']) ? $row['follow_2_uti_treatment'] : " - "; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_hematuria'] == "") ? " - " : $row['follow_2_hematuria']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_others'] == "") ? " - " : $row['follow_2_others']; ?></td>
                                    <td role="cell">
                                        <?php echo ($row['follow_2_xray'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['follow_2_xray']."'>".$row['follow_2_xray']."</a>" ?>
                                    </td>
                                    <td role="cell">
                                        <?php echo ($row['follow_2_us'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['follow_2_us']."'>".$row['follow_2_us']."</a>" ?>
                                    </td>
                                    <td role="cell">
                                        <?php echo ($row['follow_2_ct'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['follow_2_ct']."'>".$row['follow_2_ct']."</a>" ?>
                                    </td>
                                    <td role="cell"><?php echo ($row['f2_residual_fragment'] == "") ? " - " : $row['f2_residual_fragment']; ?></td>
                                    <td role="cell"><?php echo ($row['f2_residual_fragment_size'] == "") ? " - " : $row['f2_residual_fragment_size']; ?></td>
                                    <td role="cell"><?php echo ($row['f2_residual_fragment_location'] == "") ? " - " : $row['f2_residual_fragment_location']; ?></td>
                                    <td role="cell"><?php echo ($row['f2_residual_fragment_number'] == "") ? " - " : $row['f2_residual_fragment_number']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_stent_removal'] == "") ? " - " : $row['follow_2_stent_removal']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_smooth'] == "") ? " - " : $row['follow_2_smooth']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_adverse_event'] == "") ? " - " : $row['follow_2_adverse_event']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_office_based'] == "") ? " - " : $row['follow_2_office_based']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_day_care'] == "") ? " - " : $row['follow_2_day_care']; ?></td>
                                    <td role="cell"><?php echo ($row['la'] == "") ? " - " : $row['la']; ?></td>
                                    <td role="cell"><?php echo ($row['ga'] == "") ? " - " : $row['ga']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_flexible_cystoscope'] == "") ? " - " : $row['follow_2_flexible_cystoscope']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_rigid_cystoscope'] == "") ? " - " : $row['follow_2_rigid_cystoscope']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_reason'] == "") ? " - " : $row['follow_2_reason']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_2_status'] == 0) ? 0 : 1; ?></td>
                                    <td role="cell" class="thead"></td>
                                    <td role="cell"><?php echo ($row['follow_3_pain'] == "") ? " - " : $row['follow_3_pain']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_3_luts'] == "") ? " - " : $row['follow_3_luts']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_3_uti'] == "") ? " - " : $row['follow_3_uti']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_3_uti_treated'] == "") ? " - " : $row['follow_3_uti_treated']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_3_uti_treatment'] == "") ? " - " : $row['follow_3_uti_treatment']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_3_hematuria'] == "") ? " - " : $row['follow_3_hematuria']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_3_others'] == "") ? " - " : $row['follow_3_others']; ?></td>
                                    <td role="cell">
                                        <?php echo ($row['follow_3_xray'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['follow_3_xray']."'>".$row['follow_3_xray']."</a>" ?>
                                    </td>
                                    <td role="cell">
                                        <?php echo ($row['follow_3_us'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['follow_3_us']."'>".$row['follow_3_us']."</a>" ?>
                                    </td>
                                    <td role="cell">
                                        <?php echo ($row['follow_3_ct'] == "") ? " - " : "<a target='_blank' href='".base_url()."uploads/".$row['follow_3_ct']."'>".$row['follow_3_ct']."</a>" ?>
                                    </td>
                                    <td role="cell"><?php echo ($row['f3_residual_fragment'] == "") ? " - " : $row['f3_residual_fragment']; ?></td>
                                    <td role="cell"><?php echo ($row['f3_residual_fragment_size'] == "") ? " - " : $row['f3_residual_fragment_size']; ?></td>
                                    <td role="cell"><?php echo ($row['f3_residual_fragment_location'] == "") ? " - " : $row['f3_residual_fragment_location']; ?></td>
                                    <td role="cell"><?php echo ($row['f3_residual_fragment_number'] == "") ? " - " : $row['f3_residual_fragment_number']; ?></td>
                                    <td role="cell"><?php echo ($row['follow_3_status'] == 0) ? 0 : 1; ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Post(s) not found...</p>
                <?php endif ?>
                <?php echo $this->ajax_pagination->create_links(); ?>
            </div>
        </div>
    </div>
</main>


<?php $this->load->view('Shared/footer'); ?>
        
<script src="<?php echo base_url('assets/js/core/jquery.min.js'); ?>"></script>
<script>
    function searchFilter(page_num){
        page_num     = page_num ? page_num : 0;
        var keywords = $('#keywords').val();
        var sortBy   = $('#sortBy').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('patient/ajaxPaginationData/'); ?>'+page_num,
            data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
            beforeSend: function(){
                $('.loading').show();
            },
            success: function(html){
                $('#dataList').html(html);
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function(){  
        <?php if ($this->session->flashdata('delSuccess')): ?>
            One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: 'Patient data deleted successfully!'});
        <?php endif ?>
    });
</script>