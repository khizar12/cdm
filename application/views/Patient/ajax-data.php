<?php if (!empty($posts)): ?>
    <table role="table">
        <tbody role="rowgroup">
            <?php foreach ($posts as $row): ?>
                <tr role="row">
                    <td role="cell" class="thead">
                        <a onClick="return confirm('Are you sure you want to delete?')" href="<?php echo base_url().'patient/delete/'.$row['patient_id']; ?>" type="button" class='btn btn-sm btn-outline-danger del-btn float-right mx-2'><i class="fa fa-fw fa-times mr-1"></i> Delete</a>
                        <a href="<?php echo base_url().'patient/edit/'.$row['patient_id']; ?>" class="btn btn-sm btn-outline-info float-right"><i class="fa fa-receipt fa-fw"></i> View Details</a>
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
