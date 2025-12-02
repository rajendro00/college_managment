<?php  

// ============================================
// STUDENT METABOXES - 
// ============================================

function cms_add_student_metaboxs(){
    add_meta_box(
        'cms_student_info',
        __('Student Information', CMS_TEXT_DOMAIN),
        'cms_render_student_info_metabox',
        'student',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'cms_add_student_metaboxs');


// students information
function cms_render_student_info_metabox($post){ 
    
   $roll_no = get_post_meta($post->ID, '_cms_roll_no', true );
   $father_name = get_post_meta($post->ID, '_cms_father_name', true );
   $mother_name = get_post_meta($post->ID, '_cms_mother_name', true );
   $gender = get_post_meta($post->ID, '_cms_gender', true );
   $dob = get_post_meta($post->ID, '_cms_date_of_birth', true);

    ?>
    <div class="cms-matabox-container">
        <!-- Roll number -->
        <div class="cms-form-row">
            <label for="cms_roll_no">Roll Number</label>
            <input type="text" id="cms_roll_no" name="cms_roll_no" value="<?php echo esc_attr($roll_no); ?>" class="regular-text">
            <p class="description">Unique roll number for the student</p>
        </div>
        <!-- father name -->
        <div class="cms-form-row">
            <label for="cms_father_name">Father Name</label>
            <input type="text" id="cms_father_name" name="cms_father_name" value="<?php echo esc_attr($father_name); ?>" class="regular-text">
        </div>
        <!-- mother name -->
        <div class="cms-form-row">
            <label for="cms_mother_name">Mother Name</label>
            <input type="text" id="cms_mother_name" name="cms_mother_name" value="<?php echo esc_attr($mother_name); ?>" class="regular-text">
        </div>
        <!-- gender-->
        <div class="cms-form-row">
            <label for="cms_gender">gender</label>
            <select name="cms_gender" id="cms_gender">
                <option value="">Select Gender</option>
                <option value="male" <?php selected($gender, 'male'); ?>>Male</option>
                <option value="female" <?php selected($gender, 'female'); ?>>Female</option>
                <option value="other" <?php selected($gender, 'other'); ?>>other</option>
            </select>
        </div>
        <!-- date of birth -->
         <div class="cms-form-row">
            <label for="cms_date_of_birth">Date of Birth</label>
            <input type="date" 
                   id="cms_date_of_birth" 
                   name="cms_date_of_birth" 
                   value="<?php echo esc_attr($dob); ?>" 
                   class="regular-text" />
        </div>
    </div>
<?php }


function cms_save_student_meta($post_id){

    $fields = [
        // studnet info
        'cms_roll_no'           => '_cms_roll_no',
        'cms_father_name'       => '_cms_father_name',
        'cms_mother_name'       => '_cms_mother_name',
        'cms_gender'            => '_cms_gender',
        'cms_date_of_birth'     => '_cms_date_of_birth',
    ];

    foreach(  $fields as  $field_name=>$meta_key ){
        if(isset($_POST[$field_name])){
            $value = sanitize_text_field($_POST[$field_name]);
            update_post_meta($post_id, $meta_key, $value);
        }
    }
}

add_action('save_post_student' ,'cms_save_student_meta');
