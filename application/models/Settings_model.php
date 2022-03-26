<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*  @author   : Creativeitem
*  date      : November, 2019
*  Ekattor School Management System With Addons
*  http://codecanyon.net/user/Creativeitem
*  http://support.creativeitem.com
*/

class Settings_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function update_system_settings() {
    $data['system_name'] = $this->input->post('system_name');
    $data['system_email'] = $this->input->post('system_email');
    $data['system_title'] = $this->input->post('system_title');
    $data['phone'] = $this->input->post('phone');
    $data['purchase_code'] = $this->input->post('purchase_code');
    $data['address'] = $this->input->post('address');
    $data['fax'] = $this->input->post('fax');
    $data['footer_text'] = $this->input->post('footer_text');
    $data['footer_link'] = $this->input->post('footer_link');
    $data['timezone'] = $this->input->post('timezone');
    $data['youtube_api_key'] = $this->input->post('youtube_api_key');
    $data['vimeo_api_key'] = $this->input->post('vimeo_api_key');
    $this->db->where('id', 1);
    $this->db->update('settings', $data);
    $response = array(
      'status' => true,
      'notification' => get_phrase('system_settings_updated_successfully')
    );
    return json_encode($response);
  }

  public function last_updated_attendance_data() {
    $data['date_of_last_updated_attendance'] = strtotime(date('d-m-Y H:i:s'));
    $this->db->where('id', 1);
    $this->db->update('settings', $data);
  }

  public function update_system_logo() {
    
    if ($_FILES['dark_logo']['name'] != "") {
      move_uploaded_file($_FILES['dark_logo']['tmp_name'], $this->config->item('asset_url').'/system/logo/logo-dark.png');
    }
    if ($_FILES['light_logo']['name'] != "") {
      move_uploaded_file($_FILES['light_logo']['tmp_name'], $this->config->item('asset_url').'/system/logo/logo-light.png');
    }
    if ($_FILES['small_logo']['name'] != "") {
      move_uploaded_file($_FILES['small_logo']['tmp_name'], $this->config->item('asset_url').'/system/logo/logo-light-sm.png');
    }
    if ($_FILES['favicon']['name'] != "") {
      move_uploaded_file($_FILES['favicon']['tmp_name'], $this->config->item('asset_url').'/system/logo/favicon.png');
    }

    $response = array(
      'status' => true,
      'notification' => get_phrase('logo_updated_successfully')
    );
    return json_encode($response);
  }

  // SCHOOL SETTINGS
  public function get_current_school_data() {
    return $this->db->get_where('schools', array('id' => school_id()))->row_array();
  }

  public function update_current_school_settings() {

    $data['2_schools'] = $this->input->post('school_code');
    $data['3_schools'] = $this->input->post('op_status');
    $data['name'] = $this->input->post('school_name');
    $data['7_schools'] = ($this->input->post('cep')).($this->input->post('uf'));
    $data['8_schools'] = $this->input->post('municipality');
    $data['9_schools'] = $this->input->post('district');
    $data['address'] = $this->input->post('address');
    $data['19_schools'] = $this->input->post('location');
    $data['20_schools'] = $this->input->post('location1');
    $data['21_schools'] = $this->input->post('admin');
   
    if($this->input->post('date_start'))
    $data['4_schools'] = $this->input->post('date_start');

    if($this->input->post('date_end'))
    $data['5_schools'] = $this->input->post('date_end');

    if($this->input->post('number'))
    $data['11_schools'] = $this->input->post('number');

    if($this->input->post('complement'))
    $data['12_schools'] = $this->input->post('complement');

    if($this->input->post('neighbour'))
    $data['13_schools'] = $this->input->post('neighbour');

    if($this->input->post('ddd'))
    $data['14_schools'] = $this->input->post('ddd');

    if($this->input->post('phone'))
    $data['phone'] = $this->input->post('phone');

    if($this->input->post('phone1'))
    $data['16_schools'] = $this->input->post('phone1');

    if($this->input->post('email'))
    $data['17_schools'] = $this->input->post('email');

    if($this->input->post('teaching_body'))
    $data['18_schools'] = $this->input->post('teaching_body');

    if($this->input->post('agency'))
    { $i=22;
      foreach($this->input->post('agency') as $checked){
        $data[$checked.'_schools'] = 1;
      }
    }

    if($this->input->post('private_school'))
    { $i=26;
      foreach($this->input->post('private_school') as $checked){
          $data[$checked.'_schools'] = 1;
      }
    }    
    if($this->input->post('school_cat'))
    $data['32_schools'] = $this->input->post('school_cat');
    
    if($this->input->post('agreed_pub'))
    $data['33_schools'] = $this->input->post('agreed_pub');

    if($this->input->post('CNPJ_sponsor'))
    $data['34_schools'] = $this->input->post('CNPJ_sponsor');
    
    if($this->input->post('CNPJ_number'))
    $data['35_schools'] = $this->input->post('CNPJ_number');   
    
    if($this->input->post('auth_body'))
    $data['36_schools'] = $this->input->post('auth_body'); 

    if($this->input->post('admin_auth'))
    { $i=37;
      foreach($this->input->post('admin_auth') as $checked)
      { $data[$checked.'_schools'] = 1;  }
    }   

    if($this->input->post('linked_unit'))
    $data['40_schools'] = $this->input->post('linked_unit'); 

    if($this->input->post('hq_code'))
    $data['41_schools'] = $this->input->post('hq_code'); 

    if($this->input->post('ies_code'))
    $data['42_schools'] = $this->input->post('ies_code');  
    
    // $data['_schools'] = $this->input->post('');    

    
    // $this->db->where('id', school_id());
    // $this->db->update('schools', $data);
    if($this->db->insert('schools', $data))
    {
    $response = array(
      'status' => true,
      'notification' => get_phrase('school_settings_inserted_successfully')
    );
    return json_encode($response);
  }
}
  

  // public function update_current_school_settings() {
  //   $data['name_schools'] = $this->input->post('school_name');
  //   $data['phone'] = $this->input->post('phone');
  //   $data['address'] = $this->input->post('address');
  //   $this->db->where('id', school_id());
  //   $this->db->update('schools', $data);
  //   $response = array(
  //     'status' => true,
  //     'notification' => get_phrase('school_settings_updated_successfully')
  //   );
  //   return json_encode($response);
  // }
  public function insert_new_description() {

    if($this->input->post('desc_3'))
    { $i=3;
      foreach($this->input->post('desc_3') as $checked){
        $data[$checked.'_sd'] = 1; 
      }
    }   
    if($this->input->post('desc_9'))
    $data['9_sd'] = $this->input->post('desc_9'); 
    
    if($this->input->post('desc_10'))
    $data['10_sd'] = $this->input->post('desc_10'); 
    
    if($this->input->post('desc_11'))
    $data['11_sd'] = $this->input->post('desc_11'); 
    
    if($this->input->post('desc_12'))
    $data['12_sd'] = $this->input->post('desc_12'); 

    if($this->input->post('desc_13'))
    $data['13_sd'] = $this->input->post('desc_13'); 
    
    if($this->input->post('desc_14'))
    $data['14_sd'] = $this->input->post('desc_14'); 

    if($this->input->post('desc_15'))
    $data['15_sd'] = $this->input->post('desc_15'); 
    
    if($this->input->post('desc_16'))
    $data['16_sd'] = $this->input->post('desc_16'); 
    
    if($this->input->post('desc_17'))
    $data['17_sd'] = $this->input->post('desc_17'); 
    
    if($this->input->post('desc_18'))
    { $i=18;
      foreach($this->input->post('desc_18') as $checked){
        $data[$checked.'_sd'] = 1; 
    }  }
    
    if($this->input->post('desc_23'))
    { $i=23;
      foreach($this->input->post('desc_23') as $checked){
        $data[$checked.'_sd'] = 1;  
      }
    }  
    
    if($this->input->post('desc_27'))
    { $i=27;
      foreach($this->input->post('desc_27') as $checked){
        $data[$checked.'_sd'] = 1; 
      }
    }      
    if($this->input->post('desc_31'))
    { $i=31;
      foreach($this->input->post('desc_31') as $checked){
        $data[$checked.'_sd'] = 1; 
      }
    }  
    if($this->input->post('desc_36'))
    { $i=36;
      foreach($this->input->post('desc_36') as $checked){
        $data[$checked.'_sd'] = 1; 
      }
    }  
    if($this->input->post('desc_40'))
    { $i=40;
      foreach($this->input->post('desc_40') as $checked){
        $data[$checked.'_sd'] = 1; 
      }
    }  
    if($this->input->post('desc_75'))
    { $i=75;
      foreach($this->input->post('desc_75') as $checked){
        $data[$checked.'_sd'] = 1; 
      }
    }            
    
    if($this->input->post('desc_84'))
    $data['84_sd'] = $this->input->post('desc_84'); 

    if($this->input->post('desc_85'))
    $data['85_sd'] = $this->input->post('desc_85'); 
    
    if($this->input->post('desc_86'))
    $data['86_sd'] = $this->input->post('desc_86'); 
    
    if($this->input->post('desc_87'))
    $data['87_sd'] = $this->input->post('desc_87');   

    if($this->input->post('desc_88'))
    { $i=88;
      foreach($this->input->post('desc_88') as $checked){
        $data[$checked.'_sd'] = 1; 
      }
    }   

    if($this->input->post('desc_94'))
    $data['94_sd'] = $this->input->post('desc_94'); 

    if($this->input->post('desc_95'))
    $data['95_sd'] = $this->input->post('desc_95'); 
    
    if($this->input->post('desc_96'))
    $data['96_sd'] = $this->input->post('desc_96'); 
    
    if($this->input->post('desc_97'))
    $data['97_sd'] = $this->input->post('desc_97');   

    if($this->input->post('desc_98'))
    $data['98_sd'] = $this->input->post('desc_98'); 

    if($this->input->post('desc_99'))
    $data['99_sd'] = $this->input->post('desc_99'); 
    
    if($this->input->post('desc_100'))
    $data['100_sd'] = $this->input->post('desc_100'); 
    
    if($this->input->post('desc_101'))
    $data['101_sd'] = $this->input->post('desc_101'); 

    if($this->input->post('desc_102'))
    { $i=102;
      foreach($this->input->post('desc_102') as $checked){
        $data[$checked.'_sd'] = 1; 
    }   
  }

    if($this->input->post('desc_107'))
    { $i=107;
      foreach($this->input->post('desc_107') as $checked){
        $data[$checked.'_sd'] = 1; 
    }  
  }

    if($this->input->post('desc_109'))
    $data['109_sd'] = $this->input->post('desc_109'); 

    if($this->input->post('desc_110'))
    { $i=110;
      foreach($this->input->post('desc_110') as $checked){
        $data[$checked.'_sd'] = 1; 
    }      
  }

    if($this->input->post('desc_113'))
    $data['113_sd'] = $this->input->post('desc_113'); 

    if($this->input->post('desc_114'))
    $data['114_sd'] = $this->input->post('desc_114'); 

    if($this->input->post('desc_115'))
    $data['115_sd'] = $this->input->post('desc_115'); 
    
    if($this->input->post('desc_116'))
    $data['116_sd'] = $this->input->post('desc_116'); 
    
    if($this->input->post('desc_117'))
    $data['117_sd'] = $this->input->post('desc_117');   

    if($this->input->post('desc_118'))
    $data['118_sd'] = $this->input->post('desc_118'); 

    if($this->input->post('desc_119'))
    $data['119_sd'] = $this->input->post('desc_119'); 
    
    if($this->input->post('desc_120'))
    $data['120_sd'] = $this->input->post('desc_120'); 
    
    if($this->input->post('desc_121'))
    $data['121_sd'] = $this->input->post('desc_121');     

    if($this->input->post('desc_122'))
    $data['122_sd'] = $this->input->post('desc_122');     

    if($this->input->post('desc_123'))
    $data['123_sd'] = $this->input->post('desc_123'); 

    if($this->input->post('desc_124'))
    $data['124_sd'] = $this->input->post('desc_124'); 

    if($this->input->post('desc_125'))
    $data['125_sd'] = $this->input->post('desc_125'); 
    
    if($this->input->post('desc_126'))
    $data['126_sd'] = $this->input->post('desc_126'); 
    
    if($this->input->post('desc_127'))
    $data['127_sd'] = $this->input->post('desc_127');   

    if($this->input->post('desc_128'))
    $data['128_sd'] = $this->input->post('desc_128');     

    if($this->db->insert('schools_description', $data))
    {
    $response = array(
      'status' => true,
      'notification' => get_phrase('description_inserted_successfully')
    );
    return json_encode($response);
  }
}

  public function insert_new_organization() {

    if($this->input->post('129_desc'))
    {
      foreach($this->input->post('129_desc') as $checked){
        $data[$checked.'_sd'] = 1; 
      }
    }      
    if($this->input->post('135_desc'))
    { 
      foreach($this->input->post('135_desc') as $checked){
        $data[$checked.'_sd'] = 1; 
      }
    }  
    if($this->input->post('147_desc'))
    {
      foreach($this->input->post('147_desc') as $checked){
        $data[$checked.'_sd'] = 1; 
      }
    } 

    if($this->input->post('149_desc'))
    $data['149_sd'] = $this->input->post('149_desc'); 

    if($this->input->post('150_desc'))
    $data['150_sd'] = $this->input->post('150_desc'); 
    
    if($this->input->post('151_desc'))
    $data['151_sd'] = $this->input->post('151_desc'); 

    if($this->input->post('152_desc'))
    $data['152_sd'] = $this->input->post('152_desc'); 

    if($this->input->post('153_desc'))
    {
      foreach($this->input->post('153_desc') as $checked){
        $data[$checked.'_sd'] = 1; 
      }
    }  

    if($this->input->post('159_desc'))
    $data['159_sd'] = $this->input->post('159_desc'); 

    if($this->input->post('160_desc'))
    $data['160_sd'] = $this->input->post('160_desc'); 
    
    if($this->input->post('161_desc'))
    $data['161_sd'] = $this->input->post('161_desc'); 

    if($this->input->post('162_desc'))
    { 
      foreach($this->input->post('162_desc') as $checked){
        $data[$checked.'_sd'] = 1; 
      }
    }      

    if($this->input->post('168_desc'))
    $data['168_sd'] = $this->input->post('168_desc'); 

    $this->db->select('id');
    $this->db->from('schools_description');
    $this->db->order_by('id','desc');
    $query=$this->db->get();
    $row=$query->row();

    $id = $row->id;

    $this->db->where('id', $id);
    $this->db->update('schools_description', $data);
    $response = array(
      'status' => true,
      'notification' => get_phrase('school_settings_updated_successfully')
    );
    return json_encode($response);
  }


  // PAYMENT SETTINGS
  public function update_system_currency_settings() {
    $data['system_currency'] = $this->input->post('system_currency');
    $data['currency_position'] = $this->input->post('currency_position');
    $this->db->where('id', 1);
    $this->db->update('settings', $data);

    $response = array(
      'status' => true,
      'notification' => get_phrase('system_settings_updated_successfully')
    );
    return json_encode($response);
  }

  public function update_paypal_settings() {
    $paypal_info = array();

    $paypal['paypal_active'] = $this->input->post('paypal_active');
    $paypal['paypal_mode'] = $this->input->post('paypal_mode');
    $paypal['paypal_client_id_sandbox'] = $this->input->post('paypal_client_id_sandbox');
    $paypal['paypal_client_id_production'] = $this->input->post('paypal_client_id_production');
    $paypal['paypal_currency'] = $this->input->post('paypal_currency');
    
    array_push($paypal_info, $paypal);

    $data['value']    =   json_encode($paypal_info);
    $this->db->where('key', 'paypal_settings');
    $this->db->update('payment_settings', $data);

    $response = array(
      'status' => true,
      'notification' => get_phrase('paypal_settings_updated_successfully')
    );
    return json_encode($response);
  }

  public function update_stripe_settings() {
    $stripe_info = array();

    $stripe['stripe_active'] = $this->input->post('stripe_active');
    $stripe['stripe_mode'] = $this->input->post('stripe_mode');
    $stripe['stripe_test_secret_key'] = $this->input->post('stripe_test_secret_key');
    $stripe['stripe_test_public_key'] = $this->input->post('stripe_test_public_key');
    $stripe['stripe_live_secret_key'] = $this->input->post('stripe_live_secret_key');
    $stripe['stripe_live_public_key'] = $this->input->post('stripe_live_public_key');
    $stripe['stripe_currency'] = $this->input->post('stripe_currency');

    array_push($stripe_info, $stripe);

    $data['value']    =   json_encode($stripe_info);
    $this->db->where('key', 'stripe_settings');
    $this->db->update('payment_settings', $data);

    $response = array(
      'status' => true,
      'notification' => get_phrase('paypal_settings_updated_successfully')
    );
    return json_encode($response);
  }

  // UPDATE SMTP CREDENTIALS
  public function update_smtp_settings() {
    if ($this->input->post('mail_sender') == 'php_mailer') {
      if (empty($this->input->post('smtp_secure')) || empty($this->input->post('smtp_set_from')) || empty($this->input->post('smtp_show_error'))) {
        $response = array(
          'status' => false,
          'notification' => get_phrase('please_fill_all_the_fields')
        );
        return json_encode($response);
      }
    }

    $data['mail_sender'] = $this->input->post('mail_sender');
    $data['smtp_protocol'] = $this->input->post('smtp_protocol');
    $data['smtp_host'] = $this->input->post('smtp_host');
    $data['smtp_username'] = $this->input->post('smtp_username');
    $data['smtp_password'] = $this->input->post('smtp_password');
    $data['smtp_port'] = $this->input->post('smtp_port');

    $data['smtp_secure'] = strtolower($this->input->post('smtp_secure'));
    $data['smtp_set_from'] = $this->input->post('smtp_set_from');
    $data['smtp_show_error'] = $this->input->post('smtp_show_error');

    if ($this->db->get('smtp_settings')->num_rows() > 0) {
      $this->db->where('id', 1);
      $this->db->update('smtp_settings', $data);
    }else{
      $this->db->insert('smtp_settings', $data);
    }

    $response = array(
      'status' => true,
      'notification' => get_phrase('smtp_settings_updated_successfully')
    );
    return json_encode($response);
  }

  // This function is responsible for retreving all the files and folder
  function get_list_of_directories_and_files($dir = APPPATH, &$results = array()) {
    $files = scandir($dir);
    foreach($files as $key => $value){
      $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
      if(!is_dir($path)) {
        $results[] = $path;
      } else if($value != "." && $value != "..") {
        $this->get_list_of_directories_and_files($path, $results);
        $results[] = $path;
      }
    }
    return $results;
  }

  // This function is responsible for retreving all the language file from language folder
  function get_list_of_language_files($dir = APPPATH.'/language', &$results = array()) {
    $files = scandir($dir);
    foreach($files as $key => $value){
      $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
      if(!is_dir($path)) {
        $results[] = $path;
      } else if($value != "." && $value != "..") {
        $this->get_list_of_directories_and_files($path, $results);
        $results[] = $path;
      }
    }
    return $results;
  }

  // LANGUAGE SETTINGS
  public function get_all_languages() {
    $language_files = array();
    $all_files = $this->get_list_of_language_files();
    foreach ($all_files as $file) {
      $info = pathinfo($file);
      if( isset($info['extension']) && strtolower($info['extension']) == 'json') {
        $file_name = explode('.json', $info['basename']);
        array_push($language_files, $file_name[0]);
      }
    }
    return $language_files;
  }

  public function create_language() {
    saveDefaultJSONFile(trimmer($this->input->post('language')));
    $response = array(
      'status' => true,
      'notification' => get_phrase('language_added_successfully')
    );
    return json_encode($response);
  }

  public function update_language($param1 = "") {
    if (file_exists('application/language/'.$param1.'.json')) {
      unlink('application/language/'.$param1.'.json');
    }
    saveDefaultJSONFile(trimmer($this->input->post('language')));
    $response = array(
      'status' => true,
      'notification' => get_phrase('language_added_successfully')
    );
    return json_encode($response);
  }

  public function delete_language($param1 = "") {
    if (file_exists('application/language/'.$param1.'.json')) {
      unlink('application/language/'.$param1.'.json');
    }
    $response = array(
      'status' => true,
      'notification' => get_phrase('language_deleted_successfully')
    );
    return json_encode($response);
  }

  public function update_system_language($selected_language = "") {
    $data['language'] = $selected_language;

    $this->db->where('id', 1);
    $this->db->update('settings', $data);
  }

  function get_currencies() {
    return $this->db->get('currencies')->result_array();
  }

  function get_paypal_supported_currencies() {
    $this->db->where('paypal_supported', 1);
    return $this->db->get('currencies')->result_array();
  }

  function get_stripe_supported_currencies() {
    $this->db->where('stripe_supported', 1);
    return $this->db->get('currencies')->result_array();
  }

  // ABOUT APPLICATION INFORMATION
  function get_application_details() {
    $purchase_code = get_settings('purchase_code');
    $returnable_array = array(
      'purchase_code_status' => get_phrase('not_found'),
      'support_expiry_date'  => get_phrase('not_found'),
      'customer_name'        => get_phrase('not_found')
    );

    $personal_token = "gC0J1ZpY53kRpynNe4g2rWT5s4MW56Zg";
    $url = "https://api.envato.com/v3/market/author/sale?code=".$purchase_code;
    $curl = curl_init($url);

    //setting the header for the rest of the api
    $bearer   = 'bearer ' . $personal_token;
    $header   = array();
    $header[] = 'Content-length: 0';
    $header[] = 'Content-type: application/json; charset=utf-8';
    $header[] = 'Authorization: ' . $bearer;

    $verify_url = 'https://api.envato.com/v1/market/private/user/verify-purchase:'.$purchase_code.'.json';
    $ch_verify = curl_init( $verify_url . '?code=' . $purchase_code );

    curl_setopt( $ch_verify, CURLOPT_HTTPHEADER, $header );
    curl_setopt( $ch_verify, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch_verify, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $ch_verify, CURLOPT_CONNECTTIMEOUT, 5 );
    curl_setopt( $ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    $cinit_verify_data = curl_exec( $ch_verify );
    curl_close( $ch_verify );

    $response = json_decode($cinit_verify_data, true);

    if (count($response['verify-purchase']) > 0) {

      //print_r($response);
      $item_name 				= $response['verify-purchase']['item_name'];
      $purchase_time 			= $response['verify-purchase']['created_at'];
      $customer 				= $response['verify-purchase']['buyer'];
      $licence_type 			= $response['verify-purchase']['licence'];
      $support_until			= $response['verify-purchase']['supported_until'];
      $customer 				= $response['verify-purchase']['buyer'];

      $purchase_date			= date("d M, Y", strtotime($purchase_time));

      $todays_timestamp 		= strtotime(date("d M, Y"));
      $support_expiry_timestamp = strtotime($support_until);

      $support_expiry_date	= date("d M, Y", $support_expiry_timestamp);

      if ($todays_timestamp > $support_expiry_timestamp)
      $support_status		= get_phrase('expired');
      else
      $support_status		= get_phrase('valid');

      $returnable_array = array(
        'purchase_code_status' => $support_status,
        'support_expiry_date'  => $support_expiry_date,
        'customer_name'        => $customer
      );
    }
    else {
      $returnable_array = array(
        'purchase_code_status' => 'invalid',
        'support_expiry_date'  => 'invalid',
        'customer_name'        => 'invalid'
      );
    }

    return $returnable_array;
  }

    // GET SYSTEM DATA

  // GET DARK LOGO
  public function get_logo_dark($type = "") {
    if ($type == 'small') {
      return base_url($this->config->item('asset_url').'/system/logo/logo-dark-sm.png');
    }else{
      return base_url($this->config->item('asset_url').'/system/logo/logo-dark.png');
    }

  }

  // GET LIGHT LOGO
  public function get_logo_light($type = "") {
    if ($type == 'small') {
      return base_url($this->config->item('asset_url').'/system/logo/logo-light-sm.png');
    }else{
      return base_url($this->config->item('asset_url').'/system/logo/logo-light.png');
    }
  }

  // GET FAVICON
  public function get_favicon() {
    return base_url($this->config->item('asset_url').'/system/logo/favicon.png');
  }


}