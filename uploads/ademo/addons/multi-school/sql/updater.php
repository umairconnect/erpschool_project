<?php
	$CI = get_instance();
	$CI->load->database();
	$CI->load->dbforge();

    // DATA TO UPDATE
    $addon_menu_data = array(
        'status' => 1,
        'superadmin_access' => 1,
        'is_addon' => 1,
        'unique_identifier' => "multi-school",
        'route_name' => 'multischool',
        'displayed_name' => 'school_manager',
        'parent' => 28,
        'sort_order' => 40
    );

    // CHECK IF THE DATA IS ALREADY THERE
    $checker = array(
        'unique_identifier' => 'multi-school'
    );
    
    $this->db->where($checker);
    $number_of_rows = $this->db->get('menus')->num_rows();
    
    // IF THE DATA IS NOT THERE INSERT IT, OTHERWISE UPDATE IT
    if($number_of_rows > 0) {
        $this->db->where($checker);
        $this->db->update('menus', $addon_menu_data);
    }else{
        $this->db->insert('menus', $addon_menu_data);
    }
?>