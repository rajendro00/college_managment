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

     add_meta_box(
        'cms_student_academic',
        __('Academic Information', CMS_TEXT_DOMAIN),
        'cms_render_academic_info_metabox',
        'student',
        'normal',
        'default'
    );

     add_meta_box(
        'cms_student_contact',
        __('Contact Information', CMS_TEXT_DOMAIN),
        'cms_render_contact_info_metabox',
        'student',
        'side',
        'default'
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
   $blood_group = get_post_meta($post->ID, '_cms_blood_group', true);
   $religion = get_post_meta($post->ID, '_cms_religion', true);

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
        <!-- blood group -->
         <div class="cms-form-row">
            <label for="cms_blood_group">Blood Group</label>
           <select name="cms_blood_group" id="cms_blood_group">
                <option value="">Select Blood Group</option>
                <option value="A+" <?php selected($blood_group, 'A+'); ?>>A+</option>
                <option value="A-" <?php selected($blood_group, 'A-'); ?>>A-</option>
                <option value="B+" <?php selected($blood_group, 'B+'); ?>>B+</option>
                <option value="B-" <?php selected($blood_group, 'B-'); ?>>B-</option>
                <option value="O+" <?php selected($blood_group, 'O+'); ?>>O+</option>
                <option value="O-" <?php selected($blood_group, 'O-'); ?>>O-</option>
                <option value="AB+" <?php selected($blood_group, 'AB+'); ?>>AB+</option>
                <option value="AB-" <?php selected($blood_group, 'AB-'); ?>>AB-</option>
           </select>
        </div>
        <!-- religion -->
         <div class="cms-form-row">
            <label for="cms_religion">Religion</label>
            <input type="text" id="cms_religion" name="cms_religion" value="<?php echo esc_attr($religion); ?>" class="regular-text">
        </div>
    </div>
<?php }

// academic
function cms_render_academic_info_metabox($post){ 
    $class = get_post_meta($post->ID, '_cms_class', true);
    $section = get_post_meta($post->ID, '_cms_section', true);
      $academic_year = get_post_meta($post->ID, '_cms_academic_year', true);
    $admission_date = get_post_meta($post->ID, '_cms_admission_date', true);
    $registration_no = get_post_meta($post->ID, '_cms_registration_no', true);
    $status = get_post_meta($post->ID, '_cms_status', true);
    ?>

    <div class="cms-matabox-container">
        <!-- class -->
        <div class="cms-form-row">
            <label for="cms_class">Class</label>
            <select name="cms_class" id="cms_class">
                <option value="">Select Class</option>
                <?php 
                for($i=1; $i<=12; $i++){ ?>
                <option value="Class <?php echo $i; ?> " <?php selected($class, 'Class' . $i); ?>>Class <?php echo $i; ?></option>
               <?php }
                ?>
                <option value="HSC" <?php selected($class, 'HSC'); ?>>HSC</option>
            </select>
        </div>
        <!-- section -->
        <div class="cms-form-row">
            <label for="cms_section">Section</label>
            <select name="cms_section" id="cms_section">
                <option value="">Select Section</option>
                <?php 
                foreach(range('A', 'F') as $letter){ ?>
                <option value="Section<?php echo $letter ?>" <?php selected($section, 'Section' . $letter); ?>>Section <?php echo $letter ?></option>
              <?php  }
                ?>
            </select>
        </div>
         <div class="cms-form-row">
            <label for="cms_academic_year"><?php _e('Academic Year', CMS_TEXT_DOMAIN); ?></label>
            <input type="text" 
                   id="cms_academic_year" 
                   name="cms_academic_year" 
                   value="<?php echo esc_attr($academic_year ? $academic_year : date('Y')); ?>" 
                   class="regular-text" 
                   placeholder="e.g., 2024-2025" />
        </div>
        
        <!-- admission date -->
        <div class="cms-form-row">
            <label for="cms_admission_date"><?php _e('Admission Date', CMS_TEXT_DOMAIN); ?></label>
            <input type="date" 
                   id="cms_admission_date" 
                   name="cms_admission_date" 
                   value="<?php echo esc_attr($admission_date); ?>" 
                   class="regular-text" />
        </div>
        
        <!-- reg num-->
        <div class="cms-form-row">
            <label for="cms_registration_no"><?php _e('Registration Number', CMS_TEXT_DOMAIN); ?></label>
            <input type="text" 
                   id="cms_registration_no" 
                   name="cms_registration_no" 
                   value="<?php echo esc_attr($registration_no); ?>" 
                   class="regular-text" />
        </div>
        
        <!-- status -->
        <div class="cms-form-row">
            <label for="cms_status"><?php _e('Student Status', CMS_TEXT_DOMAIN); ?></label>
            <select id="cms_status" name="cms_status">
                <option value="active" <?php selected($status, 'active'); ?>><?php _e('Active', CMS_TEXT_DOMAIN); ?></option>
                <option value="pass_out" <?php selected($status, 'pass_out'); ?>><?php _e('Pass Out', CMS_TEXT_DOMAIN); ?></option>
                <option value="dropped" <?php selected($status, 'dropped'); ?>><?php _e('Dropped', CMS_TEXT_DOMAIN); ?></option>
                <option value="inactive" <?php selected($status, 'inactive'); ?>><?php _e('Inactive', CMS_TEXT_DOMAIN); ?></option>
            </select>
        </div>
    </div>
<?php }

// contact info
function cms_render_contact_info_metabox($post) {
    $phone = get_post_meta($post->ID, '_cms_phone', true);
    $email = get_post_meta($post->ID, '_cms_email', true);
    $address = get_post_meta($post->ID, '_cms_address', true);
    $city = get_post_meta($post->ID, '_cms_city', true);
    $pincode = get_post_meta($post->ID, '_cms_pincode', true);
    ?>
    
    <div class="cms-metabox-container">
        <!-- phone -->
        <div class="cms-form-row">
            <label for="cms_phone"><?php _e('Phone Number', CMS_TEXT_DOMAIN); ?></label>
            <input type="text" 
                   id="cms_phone" 
                   name="cms_phone" 
                   value="<?php echo esc_attr($phone); ?>" 
                   class="regular-text" 
                   placeholder="+8801XXXXXXXXX" />
        </div>
        
        <!-- email -->
        <div class="cms-form-row">
            <label for="cms_email"><?php _e('Email Address', CMS_TEXT_DOMAIN); ?></label>
            <input type="email" 
                   id="cms_email" 
                   name="cms_email" 
                   value="<?php echo esc_attr($email); ?>" 
                   class="regular-text" />
        </div>
        
        <!-- address -->
        <div class="cms-form-row">
            <label for="cms_address"><?php _e('Address', CMS_TEXT_DOMAIN); ?></label>
            <textarea id="cms_address" 
                      name="cms_address" 
                      rows="3" 
                      class="large-text"><?php echo esc_textarea($address); ?></textarea>
        </div>
        
        <!-- city -->
        <div class="cms-form-row">
            <label for="cms_city"><?php _e('City', CMS_TEXT_DOMAIN); ?></label>
            <input type="text" 
                   id="cms_city" 
                   name="cms_city" 
                   value="<?php echo esc_attr($city); ?>" 
                   class="regular-text" />
        </div>
        
        <!-- zipcode -->
        <div class="cms-form-row">
            <label for="cms_pincode"><?php _e('Pincode/ZIP', CMS_TEXT_DOMAIN); ?></label>
            <input type="text" 
                   id="cms_pincode" 
                   name="cms_pincode" 
                   value="<?php echo esc_attr($pincode); ?>" 
                   class="regular-text" />
        </div>
    </div>
    <?php
}


function cms_save_student_meta($post_id){

    $fields = [
        // studnet info
        'cms_roll_no'           => '_cms_roll_no',
        'cms_father_name'       => '_cms_father_name',
        'cms_mother_name'       => '_cms_mother_name',
        'cms_gender'            => '_cms_gender',
        'cms_date_of_birth'     => '_cms_date_of_birth',
        'cms_blood_group'       => '_cms_blood_group',
        'cms_religion'          => '_cms_religion',

        // academic
        'cms_class'          => '_cms_class',
        'cms_section'          => '_cms_section',
        'cms_academic_year'     => '_cms_academic_year',
        'cms_admission_date'    => '_cms_admission_date',
        'cms_registration_no'   => '_cms_registration_no',
        'cms_status'            => '_cms_status',

         // contact
        'cms_phone'             => '_cms_phone',
        'cms_email'             => '_cms_email',
        'cms_address'           => '_cms_address',
        'cms_city'              => '_cms_city',
        'cms_pincode'           => '_cms_pincode'

    ];

    foreach(  $fields as  $field_name=>$meta_key ){
        if(isset($_POST[$field_name])){
            $value = sanitize_text_field($_POST[$field_name]);
            update_post_meta($post_id, $meta_key, $value);
        }
    }
}

add_action('save_post_student' ,'cms_save_student_meta');
