<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*  @author   : Creativeitem
*  date      : November, 2019
*  Ekattor School Management System With Addons
*  http://codecanyon.net/user/Creativeitem
*  http://support.creativeitem.com
*/

class User_model extends CI_Model {

	protected $school_id;
	protected $active_session;

	public function __construct()
	{
		parent::__construct();
		$this->school_id = school_id();
		$this->active_session = active_session();
	}

	// GET SUPERADMIN DETAILS
	public function get_superadmin() {
		$this->db->where('role', 'superadmin');
		return $this->db->get('users')->row_array();
	}
	// GET USER DETAILS
	public function get_user_details($user_id = '', $column_name = '') {
		if($column_name != ''){
			return $this->db->get_where('users', array('id' => $user_id))->row($column_name);
		}else{
			return $this->db->get_where('users', array('id' => $user_id))->row_array();
		}
	}

	// ADMIN CRUD SECTION STARTS
	public function create_admin() {
		$data['school_id'] = html_escape($this->input->post('school_id'));
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['password'] = sha1($this->input->post('password'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
		$data['role'] = 'admin';
		$data['watch_history'] = '[]';

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $data['email']);
		if($duplication_status){
			$this->db->insert('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('admin_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function update_admin($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
		$data['school_id'] = html_escape($this->input->post('school_id'));
		// check email duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->where('id', $param1);
			$this->db->update('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('admin_has_been_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function delete_admin($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$response = array(
			'status' => true,
			'notification' => get_phrase('admin_has_been_deleted_successfully')
		);
		return json_encode($response);
	}
	// ADMIN CRUD SECTION ENDS

	//START TEACHER section
	public function create_teacher()
	{
		$data['school_id'] = html_escape($this->input->post('school_id'));
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['password'] = sha1($this->input->post('password'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
		$data['role'] = 'teacher';
		$data['watch_history'] = '[]';

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $data['email']);
		if($duplication_status){
			$this->db->insert('users', $data);


			$teacher_id = $this->db->insert_id();
			$teacher_table_data['user_id'] = $teacher_id;
			$teacher_table_data['about'] = html_escape($this->input->post('about'));
			$social_links = array(
				'facebook' => $this->input->post('facebook_link'),
				'twitter' => $this->input->post('twitter_link'),
				'linkedin' => $this->input->post('linkedin_link')
			);
			$teacher_table_data['social_links'] = json_encode($social_links);
			$teacher_table_data['department_id'] = html_escape($this->input->post('department'));
			$teacher_table_data['designation'] = html_escape($this->input->post('designation'));
			$teacher_table_data['school_id'] = html_escape($this->input->post('school_id'));
			$teacher_table_data['show_on_website'] = $this->input->post('show_on_website');
			
			$teacher_table_data['cpf'] = $this->input->post('cpf');
			$teacher_table_data['informal_name'] = $this->input->post('informal_name');
			$teacher_table_data['color'] = $this->input->post('color');
			$teacher_table_data['nationality'] = $this->input->post('nationality');
			$teacher_table_data['cnationality'] = $this->input->post('cnationality');
			$teacher_table_data['birth_city'] = $this->input->post('birth_city');
			$teacher_table_data['disabilities'] = $this->input->post('disabilities');
			$teacher_table_data['typedisability'] = $this->input->post('typedisability');
			$teacher_table_data['residence'] = $this->input->post('residence');
			$teacher_table_data['cep'] = $this->input->post('cep');
			$teacher_table_data['uf'] = $this->input->post('uf');
			$teacher_table_data['municipality'] = $this->input->post('municipality');
			$teacher_table_data['location_of_residence'] = $this->input->post('location_of_residence');
			$teacher_table_data['higher_education'] = $this->input->post('higher_education');
			$teacher_table_data['high_school'] = $this->input->post('high_school');
			$teacher_table_data['course_area'] = $this->input->post('course_area');
			$teacher_table_data['degree'] = $this->input->post('degree');
			$teacher_table_data['course_code'] = $this->input->post('course_code');
			$teacher_table_data['conclusion_year'] = $this->input->post('conclusion_year');
			$teacher_table_data['type_of_institution'] = $this->input->post('type_of_institution');
			$teacher_table_data['institution'] = $this->input->post('institution');
			$teacher_table_data['graduate_courses'] = $this->input->post('graduate_courses');
			$teacher_table_data['performs_at_school'] = $this->input->post('performs_at_school');
			$teacher_table_data['type_of_bond'] = $this->input->post('type_of_bond');
			
			$this->db->insert('teachers', $teacher_table_data);

			if ($_FILES['image_file']['name'] != "") {
					move_uploaded_file($_FILES['image_file']['tmp_name'], $this->config->item('asset_url').'/users/'.$teacher_id.'.jpg');
			}

			$response = array(
				'status' => true,
				'notification' => get_phrase('teacher_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function update_teacher($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));

		// check email duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->where('id', $param1);
			$this->db->where('school_id', $this->input->post('school_id'));
			$this->db->update('users', $data);

			$teacher_table_data['department_id'] = html_escape($this->input->post('department'));
			$teacher_table_data['designation'] = html_escape($this->input->post('designation'));
			$teacher_table_data['about'] = html_escape($this->input->post('about'));
			$social_links = array(
				'facebook' => $this->input->post('facebook_link'),
				'twitter' => $this->input->post('twitter_link'),
				'linkedin' => $this->input->post('linkedin_link')
			);
			$teacher_table_data['social_links'] = json_encode($social_links);
			$teacher_table_data['show_on_website'] = $this->input->post('show_on_website');
			$this->db->where('school_id', $this->input->post('school_id'));
			$this->db->where('user_id', $param1);
			$this->db->update('teachers', $teacher_table_data);

			if ($_FILES['image_file']['name'] != "") {
				move_uploaded_file($_FILES['image_file']['tmp_name'], $this->config->item('asset_url').'/users/'.$param1.'.jpg');
			}

			$response = array(
				'status' => true,
				'notification' => get_phrase('teacher_has_been_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function delete_teacher($param1 = '', $param2)
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$this->db->where('user_id', $param1);
		$this->db->delete('teachers');

		$this->db->where('teacher_id', $param2);
		$this->db->delete('teacher_permissions');

		$response = array(
			'status' => true,
			'notification' => get_phrase('teacher_has_been_deleted_successfully')
		);
		return json_encode($response);
	}

	public function get_teachers() {
		$checker = array(
			'school_id' => $this->school_id,
			'role' => 'teacher'
		);
		return $this->db->get_where('users', $checker);
	}

	public function get_teacher_by_id($teacher_id = "") {
		$checker = array(
			'school_id' => $this->school_id,
			'id' => $teacher_id
		);
		$result = $this->db->get_where('teachers', $checker)->row_array();
		return $this->db->get_where('users', array('id' => $result['user_id']));
	}
	//END TEACHER section


	//START TEACHER PERMISSION section
	public function teacher_permission(){
		$class_id = html_escape($this->input->post('class_id'));
		$section_id = html_escape($this->input->post('section_id'));
		$teacher_id = html_escape($this->input->post('teacher_id'));
		$column_name = html_escape($this->input->post('column_name'));
		$value = html_escape($this->input->post('value'));

		$check_row = $this->db->get_where('teacher_permissions', array('class_id' => $class_id, 'section_id' => $section_id, 'teacher_id' => $teacher_id));
		if($check_row->num_rows() > 0){
			$data[$column_name] = $value;
			$this->db->where('class_id', $class_id);
			$this->db->where('section_id', $section_id);
			$this->db->where('teacher_id', $teacher_id);
			$this->db->update('teacher_permissions', $data);
		}else{
			$data['class_id'] = $class_id;
			$data['section_id'] = $section_id;
			$data['teacher_id'] = $teacher_id;
			$data[$column_name] = 1;
			$this->db->insert('teacher_permissions', $data);
		}
	}

	public function teacher_signup(){

			// $teacher_table_data['designation'] = html_escape($this->input->post('designation'));
			$teacher_table_data['school_id'] = $this->input->post('school_id');

			$teacher_table_data['show_on_website'] = 1;	

			if($this->input->post('teacher_5'))
			$teacher_table_data['cpf'] = $this->input->post('teacher_5');
			
			if($this->input->post('teacher_6'))
			$teacher_table_data['informal_name'] = $this->input->post('teacher_6');

			if($this->input->post('teacher_7'))
			$teacher_table_data['dob'] = $this->input->post('teacher_7');
			
			if($this->input->post('teacher_8'))
			$teacher_table_data['affiliation'] = $this->input->post('teacher_8');
			
			if($this->input->post('teacher_9'))
			$teacher_table_data['affiliation1'] = $this->input->post('teacher_9');
			
			if($this->input->post('teacher_10'))
			$teacher_table_data['affiliation2'] = $this->input->post('teacher_10');
			
			if($this->input->post('teacher_11'))
			$teacher_table_data['gender'] = $this->input->post('teacher_11');

			if($this->input->post('teacher_12'))
			$teacher_table_data['color'] = $this->input->post('teacher_12');
			
			if($this->input->post('teacher_13'))
			$teacher_table_data['nationality'] = $this->input->post('teacher_13');
			
			if($this->input->post('teacher_14'))
			$teacher_table_data['cnationality'] = $this->input->post('teacher_14');
			
			if($this->input->post('teacher_15'))
			$teacher_table_data['birth_city'] = $this->input->post('teacher_15');

			if($this->input->post('teacher_16'))
			$teacher_table_data['disabilities'] = $this->input->post('teacher_16');
			
			if($this->input->post('teacher_17')){
				$disability = array();
				foreach($this->input->post('teacher_17') as $val)
				{
				$disability[] = $val;
				}
				$disability = implode(',', $disability);
			
			$teacher_table_data['typedisability'] = $disability;
			}

			if($this->input->post('teacher_27')){
				$saeb = array();
				foreach($this->input->post('teacher_27') as $val)
				{
				$saeb[] = $val;
				}
				$saeb = implode(',', $saeb);

			$teacher_table_data['saeb'] = $saeb;			
			// $teacher_table_data['nis'] = $this->input->post('teacher_39');
			}

			if($this->input->post('teacher_40'))
			$teacher_table_data['birth_certificate'] = $this->input->post('teacher_40');

			if($this->input->post('teacher_41'))
			$teacher_table_data['residence'] = $this->input->post('teacher_41');
			
			if($this->input->post('teacher_42'))
			$teacher_table_data['cep'] = $this->input->post('teacher_42');
			
			if($this->input->post('teacher_39'))
			$teacher_table_data['uf'] = $this->input->post('teacher_39');
			
			if($this->input->post('teacher_43'))
			$teacher_table_data['municipality'] = $this->input->post('teacher_43');
			
			if($this->input->post('teacher_44'))
			$teacher_table_data['residence'] = $this->input->post('teacher_44');

			if($this->input->post('teacher_45'))
			$teacher_table_data['location_of_residence'] = $this->input->post('teacher_45');

			if($this->input->post('teacher_46'))
			$teacher_table_data['higher_education'] = $this->input->post('teacher_46');
			
			if($this->input->post('teacher_47'))
			$teacher_table_data['high_school'] = $this->input->post('teacher_47');
			
			// $teacher_table_data['degree'] = $this->input->post('degree');
			if($this->input->post('teacher_48'))
			$teacher_table_data['course_code'] = $this->input->post('teacher_48');
			
			if($this->input->post('teacher_49'))
			$teacher_table_data['conclusion_year'] = $this->input->post('teacher_49');
			
			if($this->input->post('teacher_50'))
			$teacher_table_data['type_of_institution'] = $this->input->post('teacher_50');
			
			if($this->input->post('teacher_51'))
			$teacher_table_data['course_code2'] = $this->input->post('teacher_51');
			
			if($this->input->post('teacher_52'))
			$teacher_table_data['conclusion_year2'] = $this->input->post('teacher_52');
			
			if($this->input->post('teacher_53'))
			$teacher_table_data['type_of_institution2'] = $this->input->post('teacher_53');
			
			if($this->input->post('teacher_54'))
			$teacher_table_data['course_code3'] = $this->input->post('teacher_54');
			
			if($this->input->post('teacher_55'))
			$teacher_table_data['conclusion_year3'] = $this->input->post('teacher_55');
			
			if($this->input->post('teacher_56'))
			$teacher_table_data['type_of_institution3'] = $this->input->post('teacher_56');
			
			if($this->input->post('teacher_57'))
			$teacher_table_data['knowledge_area1'] = $this->input->post('teacher_57');
			
			if($this->input->post('teacher_58'))
			$teacher_table_data['knowledge_area2'] = $this->input->post('teacher_58');
			
			if($this->input->post('teacher_59'))
			$teacher_table_data['knowledge_area3'] = $this->input->post('teacher_59');

			// $teacher_table_data['institution'] = $this->input->post('institution');
			if($this->input->post('teacher_60')){
			$graduate_courses = array();
				foreach($this->input->post('teacher_60') as $val)
				{
				$graduate_courses[] = $val;
				}
				$graduate_courses = implode(',', $graduate_courses);

			$teacher_table_data['graduate_courses'] = $graduate_courses;
			}

			if($this->input->post('teacher_64')){
				$course_area = array();
				foreach($this->input->post('teacher_64') as $val)
				{
				$course_area[] = $val;
				}
				$course_area = implode(',', $course_area);

			$teacher_table_data['course_area'] = $course_area;
			}	
			
			if($this->input->post('teacher_81'))
			$teacher_table_data['email'] = $this->input->post('teacher_81');
			// $teacher_table_data['type_of_bond'] = $this->input->post('type_of_bond');	
			
			$this->db->insert('teachers', $teacher_table_data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('teacher_added_successfully')
			);			
			return json_encode($response);
}

public function teacher_link(){

	$data['school_id'] = $this->input->post('school_id');
	$data['record_type'] = $this->input->post('record_type');
	
	if($this->input->post('t_search_3'))
	$data['person_code'] = $this->input->post('t_search_3');

	if($this->input->post('t_search_4'))
	$data['inep'] = $this->input->post('t_search_4');

	if($this->input->post('t_search_5'))
	$data['class_code'] = $this->input->post('t_search_5');

	// if($this->input->post('t_search_6'))
	// $data['class_code_inep'] = $this->input->post('t_search_6');

	if($this->input->post('t_search_6'))
	$data['role'] = $this->input->post('t_search_6');

	if($this->input->post('t_search_7'))
	$data['type_of_bond'] = $this->input->post('t_search_7');
	
	if($this->input->post('class_9')){
		$knowledge_area = array();
		foreach($this->input->post('class_9') as $val)
		{
		$knowledge_area[] = $val;
		}
		$knowledge_area = implode(',', $knowledge_area);
	
	$data['knowledge_areas'] = $knowledge_area;
	}

	if($this->db->insert('teacher_link', $data))
	$response = array(
		'status' => true,
		'notification' => get_phrase('link_created_successfully')
	);			
	return json_encode($response);
}

public function student_signup(){

	// $teacher_table_data['designation'] = html_escape($this->input->post('designation'));
	$teacher_table_data['school_id'] = $this->input->post('school_id');

	$teacher_table_data['show_on_website'] = 1;	

	if($this->input->post('teacher_5'))
	$teacher_table_data['cpf'] = $this->input->post('teacher_5');
	
	if($this->input->post('teacher_6'))
	$teacher_table_data['informal_name'] = $this->input->post('teacher_6');

	if($this->input->post('teacher_7'))
	$teacher_table_data['dob'] = $this->input->post('teacher_7');
	
	if($this->input->post('teacher_8'))
	$teacher_table_data['affiliation'] = $this->input->post('teacher_8');
	
	if($this->input->post('teacher_9'))
	$teacher_table_data['affiliation1'] = $this->input->post('teacher_9');
	
	if($this->input->post('teacher_10'))
	$teacher_table_data['affiliation2'] = $this->input->post('teacher_10');
	
	if($this->input->post('teacher_11'))
	$teacher_table_data['gender'] = $this->input->post('teacher_11');

	if($this->input->post('teacher_12'))
	$teacher_table_data['color'] = $this->input->post('teacher_12');
	
	if($this->input->post('teacher_13'))
	$teacher_table_data['nationality'] = $this->input->post('teacher_13');
	
	if($this->input->post('teacher_14'))
	$teacher_table_data['cnationality'] = $this->input->post('teacher_14');
	
	if($this->input->post('teacher_15'))
	$teacher_table_data['birth_city'] = $this->input->post('teacher_15');

	if($this->input->post('teacher_16'))
	$teacher_table_data['disabilities'] = $this->input->post('teacher_16');
	
	if($this->input->post('teacher_17')){
		$disability = array();
		foreach($this->input->post('teacher_17') as $val)
		{
		$disability[] = $val;
		}
		$disability = implode(',', $disability);
	
	$teacher_table_data['typedisability'] = $disability;
	}

	if($this->input->post('teacher_27')){
		$saeb = array();
		foreach($this->input->post('teacher_27') as $val)
		{
		$saeb[] = $val;
		}
		$saeb = implode(',', $saeb);

	$teacher_table_data['saeb'] = $saeb;			
	// $teacher_table_data['nis'] = $this->input->post('teacher_39');
	}

	if($this->input->post('teacher_40'))
	$teacher_table_data['birth_certificate'] = $this->input->post('teacher_40');

	if($this->input->post('teacher_41'))
	$teacher_table_data['residence'] = $this->input->post('teacher_41');
	
	if($this->input->post('teacher_42'))
	$teacher_table_data['cep'] = $this->input->post('teacher_42');
	
	if($this->input->post('teacher_39'))
	$teacher_table_data['uf'] = $this->input->post('teacher_39');
	
	if($this->input->post('teacher_43'))
	$teacher_table_data['municipality'] = $this->input->post('teacher_43');
	
	if($this->input->post('teacher_44'))
	$teacher_table_data['residence'] = $this->input->post('teacher_44');

	if($this->input->post('teacher_45'))
	$teacher_table_data['location_of_residence'] = $this->input->post('teacher_45');

	if($this->input->post('teacher_46'))
	$teacher_table_data['higher_education'] = $this->input->post('teacher_46');
	
	if($this->input->post('teacher_47'))
	$teacher_table_data['high_school'] = $this->input->post('teacher_47');
	
	// $teacher_table_data['degree'] = $this->input->post('degree');
	if($this->input->post('teacher_48'))
	$teacher_table_data['course_code'] = $this->input->post('teacher_48');
	
	if($this->input->post('teacher_49'))
	$teacher_table_data['conclusion_year'] = $this->input->post('teacher_49');
	
	if($this->input->post('teacher_50'))
	$teacher_table_data['type_of_institution'] = $this->input->post('teacher_50');
	
	if($this->input->post('teacher_51'))
	$teacher_table_data['course_code2'] = $this->input->post('teacher_51');
	
	if($this->input->post('teacher_52'))
	$teacher_table_data['conclusion_year2'] = $this->input->post('teacher_52');
	
	if($this->input->post('teacher_53'))
	$teacher_table_data['type_of_institution2'] = $this->input->post('teacher_53');
	
	if($this->input->post('teacher_54'))
	$teacher_table_data['course_code3'] = $this->input->post('teacher_54');
	
	if($this->input->post('teacher_55'))
	$teacher_table_data['conclusion_year3'] = $this->input->post('teacher_55');
	
	if($this->input->post('teacher_56'))
	$teacher_table_data['type_of_institution3'] = $this->input->post('teacher_56');
	
	if($this->input->post('teacher_57'))
	$teacher_table_data['knowledge_area1'] = $this->input->post('teacher_57');
	
	if($this->input->post('teacher_58'))
	$teacher_table_data['knowledge_area2'] = $this->input->post('teacher_58');
	
	if($this->input->post('teacher_59'))
	$teacher_table_data['knowledge_area3'] = $this->input->post('teacher_59');

	// $teacher_table_data['institution'] = $this->input->post('institution');
	if($this->input->post('teacher_60')){
	$graduate_courses = array();
		foreach($this->input->post('teacher_60') as $val)
		{
		$graduate_courses[] = $val;
		}
		$graduate_courses = implode(',', $graduate_courses);

	$teacher_table_data['graduate_courses'] = $graduate_courses;
	}

	if($this->input->post('teacher_64')){
		$course_area = array();
		foreach($this->input->post('teacher_64') as $val)
		{
		$course_area[] = $val;
		}
		$course_area = implode(',', $course_area);

	$teacher_table_data['course_area'] = $course_area;
	}	
	
	if($this->input->post('teacher_81'))
	$teacher_table_data['email'] = $this->input->post('teacher_81');
	// $teacher_table_data['type_of_bond'] = $this->input->post('type_of_bond');	
	
	$this->db->insert('student', $teacher_table_data);

	$response = array(
		'status' => true,
		'notification' => get_phrase('teacher_added_successfully')
	);			
	return json_encode($response);
}

public function director_signup(){

	// $teacher_table_data['designation'] = html_escape($this->input->post('designation'));
	$teacher_table_data['school_id'] = $this->input->post('school_id');

	$teacher_table_data['show_on_website'] = 1;	

	if($this->input->post('teacher_5'))
	$teacher_table_data['cpf'] = $this->input->post('teacher_5');
	
	if($this->input->post('teacher_6'))
	$teacher_table_data['informal_name'] = $this->input->post('teacher_6');

	if($this->input->post('teacher_7'))
	$teacher_table_data['dob'] = $this->input->post('teacher_7');
	
	if($this->input->post('teacher_8'))
	$teacher_table_data['affiliation'] = $this->input->post('teacher_8');
	
	if($this->input->post('teacher_9'))
	$teacher_table_data['affiliation1'] = $this->input->post('teacher_9');
	
	if($this->input->post('teacher_10'))
	$teacher_table_data['affiliation2'] = $this->input->post('teacher_10');
	
	if($this->input->post('teacher_11'))
	$teacher_table_data['gender'] = $this->input->post('teacher_11');

	if($this->input->post('teacher_12'))
	$teacher_table_data['color'] = $this->input->post('teacher_12');
	
	if($this->input->post('teacher_13'))
	$teacher_table_data['nationality'] = $this->input->post('teacher_13');
	
	if($this->input->post('teacher_14'))
	$teacher_table_data['cnationality'] = $this->input->post('teacher_14');
	
	if($this->input->post('teacher_15'))
	$teacher_table_data['birth_city'] = $this->input->post('teacher_15');

	if($this->input->post('teacher_16'))
	$teacher_table_data['disabilities'] = $this->input->post('teacher_16');
	
	if($this->input->post('teacher_17')){
		$disability = array();
		foreach($this->input->post('teacher_17') as $val)
		{
		$disability[] = $val;
		}
		$disability = implode(',', $disability);
	
	$teacher_table_data['typedisability'] = $disability;
	}

	if($this->input->post('teacher_27')){
		$saeb = array();
		foreach($this->input->post('teacher_27') as $val)
		{
		$saeb[] = $val;
		}
		$saeb = implode(',', $saeb);

	$teacher_table_data['saeb'] = $saeb;			
	// $teacher_table_data['nis'] = $this->input->post('teacher_39');
	}

	if($this->input->post('teacher_40'))
	$teacher_table_data['birth_certificate'] = $this->input->post('teacher_40');

	if($this->input->post('teacher_41'))
	$teacher_table_data['residence'] = $this->input->post('teacher_41');
	
	if($this->input->post('teacher_42'))
	$teacher_table_data['cep'] = $this->input->post('teacher_42');
	
	if($this->input->post('teacher_39'))
	$teacher_table_data['uf'] = $this->input->post('teacher_39');
	
	if($this->input->post('teacher_43'))
	$teacher_table_data['municipality'] = $this->input->post('teacher_43');
	
	if($this->input->post('teacher_44'))
	$teacher_table_data['residence'] = $this->input->post('teacher_44');

	if($this->input->post('teacher_45'))
	$teacher_table_data['location_of_residence'] = $this->input->post('teacher_45');

	if($this->input->post('teacher_46'))
	$teacher_table_data['higher_education'] = $this->input->post('teacher_46');
	
	if($this->input->post('teacher_47'))
	$teacher_table_data['high_school'] = $this->input->post('teacher_47');
	
	// $teacher_table_data['degree'] = $this->input->post('degree');
	if($this->input->post('teacher_48'))
	$teacher_table_data['course_code'] = $this->input->post('teacher_48');
	
	if($this->input->post('teacher_49'))
	$teacher_table_data['conclusion_year'] = $this->input->post('teacher_49');
	
	if($this->input->post('teacher_50'))
	$teacher_table_data['type_of_institution'] = $this->input->post('teacher_50');
	
	if($this->input->post('teacher_51'))
	$teacher_table_data['course_code2'] = $this->input->post('teacher_51');
	
	if($this->input->post('teacher_52'))
	$teacher_table_data['conclusion_year2'] = $this->input->post('teacher_52');
	
	if($this->input->post('teacher_53'))
	$teacher_table_data['type_of_institution2'] = $this->input->post('teacher_53');
	
	if($this->input->post('teacher_54'))
	$teacher_table_data['course_code3'] = $this->input->post('teacher_54');
	
	if($this->input->post('teacher_55'))
	$teacher_table_data['conclusion_year3'] = $this->input->post('teacher_55');
	
	if($this->input->post('teacher_56'))
	$teacher_table_data['type_of_institution3'] = $this->input->post('teacher_56');
	
	if($this->input->post('teacher_57'))
	$teacher_table_data['knowledge_area1'] = $this->input->post('teacher_57');
	
	if($this->input->post('teacher_58'))
	$teacher_table_data['knowledge_area2'] = $this->input->post('teacher_58');
	
	if($this->input->post('teacher_59'))
	$teacher_table_data['knowledge_area3'] = $this->input->post('teacher_59');

	// $teacher_table_data['institution'] = $this->input->post('institution');
	if($this->input->post('teacher_60')){
	$graduate_courses = array();
		foreach($this->input->post('teacher_60') as $val)
		{
		$graduate_courses[] = $val;
		}
		$graduate_courses = implode(',', $graduate_courses);

	$teacher_table_data['graduate_courses'] = $graduate_courses;
	}

	if($this->input->post('teacher_64')){
		$course_area = array();
		foreach($this->input->post('teacher_64') as $val)
		{
		$course_area[] = $val;
		}
		$course_area = implode(',', $course_area);

	$teacher_table_data['course_area'] = $course_area;
	}	
	
	if($this->input->post('teacher_81'))
	$teacher_table_data['email'] = $this->input->post('teacher_81');
	// $teacher_table_data['type_of_bond'] = $this->input->post('type_of_bond');	
	
	$this->db->insert('school_director', $teacher_table_data);

	$response = array(
		'status' => true,
		'notification' => get_phrase('director_added_successfully')
	);			
	return json_encode($response);
}

public function director_link(){

	$data['school_id'] = $this->input->post('school_id');
	$data['record_type'] = $this->input->post('record_type');
	
	if($this->input->post('d_search_3'))
	$data['person_code'] = $this->input->post('d_search_3');

	if($this->input->post('d_search_4'))
	$data['inep'] = $this->input->post('d_search_4');

	if($this->input->post('d_search_5'))
	$data['office'] = $this->input->post('d_search_5');

	if($this->input->post('d_search_6'))
	$data['access_criteria'] = $this->input->post('d_search_6');

	if($this->input->post('d_search_7'))
	$data['type_of_bond'] = $this->input->post('d_search_7');

	if($this->db->insert('director_link', $data))
	$response = array(
		'status' => true,
		'notification' => get_phrase('link_created_successfully')
	);			
	return json_encode($response);
}
	//END TEACHER PERMISSION section

	//START PARENT section
	public function parent_create()
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['password'] = sha1($this->input->post('password'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
		$data['school_id'] = $this->school_id;
		$data['role'] = 'parent';
		$data['watch_history'] = '[]';

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $data['email']);
		if($duplication_status){

			$this->db->insert('users', $data);

			$parent_data['user_id'] = $this->db->insert_id();
			$parent_data['school_id'] = $this->school_id;
			$this->db->insert('parents', $parent_data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('parent_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function parent_update($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));

		// check email duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){

			$this->db->where('id', $param1);
			$this->db->update('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('parent_updated_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function parent_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$this->db->where('user_id', $param1);
		$this->db->delete('parents');

		$response = array(
			'status' => true,
			'notification' => get_phrase('parent_has_been_deleted_successfully')
		);

		return json_encode($response);
	}

	public function get_parents() {
		$checker = array(
			'school_id' => $this->school_id,
			'role' => 'parent'
		);
		return $this->db->get_where('users', $checker);
	}

	public function get_parent_by_id($parent_id = "") {
		$checker = array(
			'school_id' => $this->school_id,
			'id' => $parent_id
		);
		$result = $this->db->get_where('parents', $checker)->row_array();
		return $this->db->get_where('users', array('id' => $result['user_id']));
	}
	//END PARENT section


	//START ACCOUNTANT section
	public function accountant_create()
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['password'] = sha1($this->input->post('password'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
		$data['school_id'] = $this->school_id;
		$data['role'] = 'accountant';
		$data['watch_history'] = '[]';

		$duplication_status = $this->check_duplication('on_create', $data['email']);
		if($duplication_status){
			$this->db->insert('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('accountant_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function accountant_update($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));

		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->where('id', $param1);
			$this->db->update('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('accountant_has_been_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);

	}

	public function accountant_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$response = array(
			'status' => true,
			'notification' => get_phrase('accountant_has_been_deleted_successfully')
		);

		return json_encode($response);
	}

	public function get_accountants() {
		$checker = array(
			'school_id' => $this->school_id,
			'role' => 'accountant'
		);
		return $this->db->get_where('users', $checker);
	}

	public function get_accountant_by_id($accountant_id = "") {
		$checker = array(
			'school_id' => $this->school_id,
			'id' => $accountant_id
		);
		return $this->db->get_where('users', $checker);
	}
	//END ACCOUNTANT section

	//START LIBRARIAN section
	public function librarian_create()
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['password'] = sha1($this->input->post('password'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
		$data['school_id'] = $this->school_id;
		$data['role'] = 'librarian';
		$data['watch_history'] = '[]';

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $data['email']);
		if($duplication_status){
			$this->db->insert('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('librarian_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function librarian_update($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));

		// check email duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->where('id', $param1);
			$this->db->update('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('librarian_updated_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function librarian_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$response = array(
			'status' => true,
			'notification' => get_phrase('librarian_deleted_successfully')
		);
		return json_encode($response);
	}


	public function get_librarians() {
		$checker = array(
			'school_id' => $this->school_id,
			'role' => 'librarian'
		);
		return $this->db->get_where('users', $checker);
	}

	public function get_librarian_by_id($librarian_id = "") {
		$checker = array(
			'school_id' => $this->school_id,
			'id' => $librarian_id
		);
		return $this->db->get_where('users', $checker);
	}
	//END LIBRARIAN section


	//START STUDENT AND ADMISSION section
	public function single_student_create(){
		$user_data['name'] = html_escape($this->input->post('name'));
		$user_data['email'] = html_escape($this->input->post('email'));
		$user_data['password'] = sha1(html_escape($this->input->post('password')));
		$user_data['birthday'] = strtotime(html_escape($this->input->post('birthday')));
		$user_data['gender'] = html_escape($this->input->post('gender'));
		$user_data['blood_group'] = html_escape($this->input->post('blood_group'));
		$user_data['address'] = html_escape($this->input->post('address'));
		$user_data['phone'] = html_escape($this->input->post('phone'));
		$user_data['role'] = 'student';
		$user_data['school_id'] = $this->school_id;
		$user_data['watch_history'] = '[]';

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $user_data['email']);
		if($duplication_status){
			$this->db->insert('users', $user_data);
			$user_id = $this->db->insert_id();

			$student_data['code'] = student_code();
			$student_data['user_id'] = $user_id;
			$student_data['parent_id'] = html_escape($this->input->post('parent_id'));
			$student_data['session'] = $this->active_session;
			$student_data['school_id'] = $this->school_id;
			
			$student_data['cpf'] = $this->input->post('cpf');
			$student_data['informal_name'] = $this->input->post('informal_name');
			$student_data['color'] = $this->input->post('color');
			$student_data['nationality'] = $this->input->post('nationality');
			$student_data['cnationality'] = $this->input->post('cnationality');
			$student_data['birth_city'] = $this->input->post('birth_city');
			$student_data['disabilities'] = $this->input->post('disabilities');
			$student_data['typedisability'] = $this->input->post('typedisability');
			$student_data['birth_certificate'] = $this->input->post('birth_certificate');
			$student_data['residence'] = $this->input->post('residence');
			$student_data['cep'] = $this->input->post('cep');
			$student_data['uf'] = $this->input->post('uf');
			$student_data['municipality'] = $this->input->post('municipality');
			$student_data['location_of_residence'] = $this->input->post('location_of_residence');
			$student_data['transport'] = $this->input->post('transport');
			$student_data['vehicle_type'] = $this->input->post('vehicle_type');
			
			$this->db->insert('students', $student_data);
			$student_id = $this->db->insert_id();

			$enroll_data['student_id'] = $student_id;
			$enroll_data['class_id'] = html_escape($this->input->post('class_id'));
			$enroll_data['section_id'] = html_escape($this->input->post('section_id'));
			$enroll_data['session'] = $this->active_session;
			$enroll_data['school_id'] = $this->school_id;
			$this->db->insert('enrols', $enroll_data);

			move_uploaded_file($_FILES['student_image']['tmp_name'], $this->config->item('asset_url').'/users/'.$user_id.'.jpg');

			$response = array(
				'status' => true,
				'notification' => get_phrase('student_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function bulk_student_create(){
		$duplication_counter = 0;
		$class_id = html_escape($this->input->post('class_id'));
		$section_id = html_escape($this->input->post('section_id'));

		$students_name = html_escape($this->input->post('name'));
		$students_email = html_escape($this->input->post('email'));
		$students_password = html_escape($this->input->post('password'));
		$students_gender = html_escape($this->input->post('gender'));
		$students_parent = html_escape($this->input->post('parent_id'));

		foreach($students_name as $key => $value):
			// check email duplication
			$duplication_status = $this->check_duplication('on_create', $students_email[$key]);
			if($duplication_status){
				$user_data['name'] = $students_name[$key];
				$user_data['email'] = $students_email[$key];
				$user_data['password'] = sha1($students_password[$key]);
				$user_data['gender'] = $students_gender[$key];
				$user_data['role'] = 'student';
				$user_data['school_id'] = $this->school_id;
				$user_data['watch_history'] = '[]';
				$this->db->insert('users', $user_data);
				$user_id = $this->db->insert_id();

				$student_data['code'] = student_code();
				$student_data['user_id'] = $user_id;
				$student_data['parent_id'] = $students_parent[$key];
				$student_data['session'] = $this->active_session;
				$student_data['school_id'] = $this->school_id;
				$this->db->insert('students', $student_data);
				$student_id = $this->db->insert_id();

				$enroll_data['student_id'] = $student_id;
				$enroll_data['class_id'] = $class_id;
				$enroll_data['section_id'] = $section_id;
				$enroll_data['session'] = $this->active_session;
				$enroll_data['school_id'] = $this->school_id;
				$this->db->insert('enrols', $enroll_data);
			}else{
				$duplication_counter++;
			}
		endforeach;

		if ($duplication_counter > 0) {
			$response = array(
				'status' => true,
				'notification' => get_phrase('some_of_the_emails_have_been_taken')
			);
		}else{
			$response = array(
				'status' => true,
				'notification' => get_phrase('students_added_successfully')
			);
		}

		return json_encode($response);
	}

	public function excel_create(){
		$class_id = html_escape($this->input->post('class_id'));
		$section_id = html_escape($this->input->post('section_id'));
		$school_id = $this->school_id;
		$session_id = $this->active_session;
		$role = 'student';

		$file_name = $_FILES['csv_file']['name'];
		move_uploaded_file($_FILES['csv_file']['tmp_name'],$this->config->item('asset_url').'/csv_file/student.generate.csv');

		if (($handle = fopen($this->config->item('asset_url').'/csv_file/student.generate.csv', 'r')) !== FALSE) { // Check the resource is valid
			$count = 0;
			$duplication_counter = 0;
			while (($all_data = fgetcsv($handle, 1000, ",")) !== FALSE) { // Check opening the file is OK!
				if($count > 0){
					$user_data['name'] = html_escape($all_data[0]);
					$user_data['email'] = html_escape($all_data[1]);
					$user_data['password'] = sha1($all_data[2]);
					$user_data['phone'] = html_escape($all_data[3]);
					$user_data['gender'] = html_escape($all_data[5]);
					$user_data['role'] = $role;
					$user_data['school_id'] = $school_id;
					$user_data['watch_history'] = '[]';

					// check email duplication
					$duplication_status = $this->check_duplication('on_create', $user_data['email']);
					if($duplication_status){
						$this->db->insert('users', $user_data);
						$user_id = $this->db->insert_id();

						$student_data['code'] = student_code();
						$student_data['user_id'] = $user_id;
						$student_data['parent_id'] = html_escape($all_data[4]);
						$student_data['session'] = $session_id;
						$student_data['school_id'] = $school_id;
						$this->db->insert('students', $student_data);
						$student_id = $this->db->insert_id();

						$enroll_data['student_id'] = $student_id;
						$enroll_data['class_id'] = $class_id;
						$enroll_data['section_id'] = $section_id;
						$enroll_data['session'] = $session_id;
						$enroll_data['school_id'] = $school_id;
						$this->db->insert('enrols', $enroll_data);
					}else{
						$duplication_counter++;
					}
				}
				$count++;
			}
			fclose($handle);
		}

		if ($duplication_counter > 0) {
			$response = array(
				'status' => true,
				'notification' => get_phrase('some_of_the_emails_have_been_taken')
			);
		}else{
			$response = array(
				'status' => true,
				'notification' => get_phrase('students_added_successfully')
			);
		}

		return json_encode($response);
	}

	public function student_update($student_id = '', $user_id = ''){
		$student_data['parent_id'] = html_escape($this->input->post('parent_id'));

		$enroll_data['class_id'] = html_escape($this->input->post('class_id'));
		$enroll_data['section_id'] = html_escape($this->input->post('section_id'));

		$user_data['name'] = html_escape($this->input->post('name'));
		$user_data['email'] = html_escape($this->input->post('email'));
		$user_data['birthday'] = strtotime(html_escape($this->input->post('birthday')));
		$user_data['gender'] = html_escape($this->input->post('gender'));
		$user_data['blood_group'] = html_escape($this->input->post('blood_group'));
		$user_data['address'] = html_escape($this->input->post('address'));
		$user_data['phone'] = html_escape($this->input->post('phone'));
		// Check Duplication
		$duplication_status = $this->check_duplication('on_update', $user_data['email'], $user_id);
		if ($duplication_status) {
			$this->db->where('id', $student_id);
			$this->db->update('students', $student_data);

			$this->db->where('student_id', $student_id);
			$this->db->update('enrols', $enroll_data);

			$this->db->where('id', $user_id);
			$this->db->update('users', $user_data);

			move_uploaded_file($_FILES['student_image']['tmp_name'], $this->config->item('asset_url').'/users/'.$user_id.'.jpg');

			$response = array(
				'status' => true,
				'notification' => get_phrase('student_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function delete_student($student_id, $user_id) {
		$this->db->where('id', $student_id);
		$this->db->delete('students');

		$this->db->where('student_id', $student_id);
		$this->db->delete('enrols');

		$this->db->where('id', $user_id);
		$this->db->delete('users');

		$path = $this->config->item('asset_url').'/users/'.$user_id.'.jpg';
		if(file_exists($path)){
			unlink($path);
		}

		$response = array(
			'status' => true,
			'notification' => get_phrase('student_deleted_successfully')
		);

		return json_encode($response);
	}

	public function student_enrolment($section_id = "") {
		return $this->db->get_where('enrols', array('section_id' => $section_id, 'school_id' => $this->school_id, 'session' => $this->active_session));
	}


	// This function will help to fetch student data by section, class or student id
	public function get_student_details_by_id($type = "", $id = "") {
		$enrol_data = array();
		if ($type == "section") {
			$checker = array(
				'section_id' => $id,
				'session' => $this->active_session,
				'school_id' => $this->school_id
			);
			$enrol_data = $this->db->get_where('enrols', $checker)->result_array();
			foreach ($enrol_data as $key => $enrol) {
				$student_details = $this->db->get_where('students', array('id' => $enrol['student_id']))->row_array();
				$enrol_data[$key]['code'] = $student_details['code'];
				$enrol_data[$key]['user_id'] = $student_details['user_id'];
				$enrol_data[$key]['parent_id'] = $student_details['parent_id'];
				$user_details = $this->db->get_where('users', array('id' => $student_details['user_id']))->row_array();
				$enrol_data[$key]['name'] = $user_details['name'];
				$enrol_data[$key]['email'] = $user_details['email'];
				$enrol_data[$key]['role'] = $user_details['role'];
				$enrol_data[$key]['address'] = $user_details['address'];
				$enrol_data[$key]['phone'] = $user_details['phone'];
				$enrol_data[$key]['birthday'] = $user_details['birthday'];
				$enrol_data[$key]['gender'] = $user_details['gender'];
				$enrol_data[$key]['blood_group'] = $user_details['blood_group'];

				$class_details = $this->crud_model->get_class_details_by_id($enrol['class_id'])->row_array();
				$section_details = $this->crud_model->get_section_details_by_id('section', $enrol['section_id'])->row_array();

				$enrol_data[$key]['class_name'] = $class_details['name'];
				$enrol_data[$key]['section_name'] = $section_details['name'];
			}
		}
		elseif ($type == "class") {
			$checker = array(
				'class_id' => $id,
				'session' => $this->active_session,
				'school_id' => $this->school_id
			);
			$enrol_data = $this->db->get_where('enrols', $checker)->result_array();
			foreach ($enrol_data as $key => $enrol) {
				$student_details = $this->db->get_where('students', array('id' => $enrol['student_id']))->row_array();
				$enrol_data[$key]['code'] = $student_details['code'];
				$enrol_data[$key]['user_id'] = $student_details['user_id'];
				$enrol_data[$key]['parent_id'] = $student_details['parent_id'];
				$user_details = $this->db->get_where('users', array('id' => $student_details['user_id']))->row_array();
				$enrol_data[$key]['name'] = $user_details['name'];
				$enrol_data[$key]['email'] = $user_details['email'];
				$enrol_data[$key]['role'] = $user_details['role'];
				$enrol_data[$key]['address'] = $user_details['address'];
				$enrol_data[$key]['phone'] = $user_details['phone'];
				$enrol_data[$key]['birthday'] = $user_details['birthday'];
				$enrol_data[$key]['gender'] = $user_details['gender'];
				$enrol_data[$key]['blood_group'] = $user_details['blood_group'];

				$class_details = $this->crud_model->get_class_details_by_id($enrol['class_id'])->row_array();
				$section_details = $this->crud_model->get_section_details_by_id('section', $enrol['section_id'])->row_array();

				$enrol_data[$key]['class_name'] = $class_details['name'];
				$enrol_data[$key]['section_name'] = $section_details['name'];
			}
		}
		elseif ($type == "student") {
			$checker = array(
				'student_id' => $id,
				'session' => $this->active_session,
				'school_id' => $this->school_id
			);
			$enrol_data = $this->db->get_where('enrols', $checker)->row_array();
			$student_details = $this->db->get_where('students', array('id' => $enrol_data['student_id']))->row_array();
			$enrol_data['code'] = $student_details['code'];
			$enrol_data['user_id'] = $student_details['user_id'];
			$enrol_data['parent_id'] = $student_details['parent_id'];
			$user_details = $this->db->get_where('users', array('id' => $student_details['user_id']))->row_array();
			$enrol_data['name'] = $user_details['name'];
			$enrol_data['email'] = $user_details['email'];
			$enrol_data['role'] = $user_details['role'];
			$enrol_data['address'] = $user_details['address'];
			$enrol_data['phone'] = $user_details['phone'];
			$enrol_data['birthday'] = $user_details['birthday'];
			$enrol_data['gender'] = $user_details['gender'];
			$enrol_data['blood_group'] = $user_details['blood_group'];

			$class_details = $this->crud_model->get_class_details_by_id($enrol_data['class_id'])->row_array();
			$section_details = $this->crud_model->get_section_details_by_id('section', $enrol_data['section_id'])->row_array();

			$enrol_data['class_name'] = $class_details['name'];
			$enrol_data['section_name'] = $section_details['name'];
		}
		return $enrol_data;
	}
	//END STUDENT AND ADMISSION section


	//STUDENT OF EACH SESSION
	public function get_session_wise_student() {
		$checker = array(
			'session' => $this->active_session,
			'school_id' => $this->school_id
		);
		return $this->db->get_where('enrols', $checker);
	}

	// Get User Image Starts
	public function get_user_image($user_id) {
		if (file_exists($this->config->item('asset_url').'/users/'.$user_id.'.jpg'))
		return base_url().$this->config->item('asset_url').'/users/'.$user_id.'.jpg';
		else
		return base_url().$this->config->item('asset_url').'/users/placeholder.jpg';
	}
	// Get User Image Ends

	// Check user duplication
	public function check_duplication($action = "", $email = "", $user_id = "") {
		$duplicate_email_check = $this->db->get_where('users', array('email' => $email));

		if ($action == 'on_create') {
			if ($duplicate_email_check->num_rows() > 0) {
				return false;
			}else {
				return true;
			}
		}elseif ($action == 'on_update') {
			if ($duplicate_email_check->num_rows() > 0) {
				if ($duplicate_email_check->row()->id == $user_id) {
					return true;
				}else {
					return false;
				}
			}else {
				return true;
			}
		}
	}

	//GET LOGGED IN USER DATA
	public function get_profile_data() {
		return $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->row_array();
	}

	public function update_profile() {
		$response = array();
		$user_id = $this->session->userdata('user_id');
		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['phone'] = $this->input->post('phone');
		$data['address'] = $this->input->post('address');
		// Check Duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $user_id);
		if($duplication_status) {
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);

			move_uploaded_file($_FILES['profile_image']['tmp_name'], $this->config->item('asset_url').'/users/'.$user_id.'.jpg');

			$response = array(
				'status' => true,
				'notification' => get_phrase('profile_updated_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function update_password() {
		$user_id = $this->session->userdata('user_id');
		if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
			$user_details = $this->get_user_details($user_id);
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password');
			$confirm_password = $this->input->post('confirm_password');
			if ($user_details['password'] == sha1($current_password) && $new_password == $confirm_password) {
				$data['password'] = sha1($new_password);
				$this->db->where('id', $user_id);
				$this->db->update('users', $data);

				$response = array(
					'status' => true,
					'notification' => get_phrase('password_updated_successfully')
				);
			}else {

				$response = array(
					'status' => false,
					'notification' => get_phrase('mismatch_password')
				);
			}
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('password_can_not_be_empty')
			);
		}
		return json_encode($response);
	}

	//GET LOGGED IN USERS CLASS ID AND SECTION ID (FOR STUDENT LOGGED IN VIEW)
	public function get_logged_in_student_details() {
		$user_id = $this->session->userdata('user_id');
		$student_data = $this->db->get_where('students', array('user_id' => $user_id))->row_array();
		$student_details = $this->get_student_details_by_id('student', $student_data['id']);
		return $student_details;
	}

	// GET STUDENT LIST BY PARENT
	public function get_student_list_of_logged_in_parent() {
		$parent_id = $this->session->userdata('user_id');
		$parent_data = $this->db->get_where('parents', array('user_id' => $parent_id))->row_array();
		$checker = array(
			'parent_id' => $parent_data['id'],
			'session' => $this->active_session,
			'school_id' => $this->school_id
		);
		$students = $this->db->get_where('students', $checker)->result_array();
		foreach ($students as $key => $student) {
			$checker = array(
				'student_id' => $student['id'],
				'session' => $this->active_session,
				'school_id' => $this->school_id
			);
			$enrol_data = $this->db->get_where('enrols', $checker)->row_array();

			$user_details = $this->db->get_where('users', array('id' => $student['user_id']))->row_array();
			$students[$key]['student_id'] = $student['id'];
			$students[$key]['name'] = $user_details['name'];
			$students[$key]['email'] = $user_details['email'];
			$students[$key]['role'] = $user_details['role'];
			$students[$key]['address'] = $user_details['address'];
			$students[$key]['phone'] = $user_details['phone'];
			$students[$key]['birthday'] = $user_details['birthday'];
			$students[$key]['gender'] = $user_details['gender'];
			$students[$key]['blood_group'] = $user_details['blood_group'];
			$students[$key]['class_id'] = $enrol_data['class_id'];
			$students[$key]['section_id'] = $enrol_data['section_id'];

			$class_details = $this->crud_model->get_class_details_by_id($enrol_data['class_id'])->row_array();
			$section_details = $this->crud_model->get_section_details_by_id('section', $enrol_data['section_id'])->row_array();

			$students[$key]['class_name'] = $class_details['name'];
			$students[$key]['section_name'] = $section_details['name'];
		}
		return $students;
	}

	// In Array for associative array
	function is_in_array($associative_array = array(), $look_up_key = "", $look_up_value = "") {
		foreach ($associative_array as $associative) {
			$keys = array_keys($associative);
			for($i = 0; $i < count($keys); $i++){
				if ($keys[$i] == $look_up_key) {
					if ($associative[$look_up_key] == $look_up_value) {
						return true;
					}
				}
			}
		}
		return false;
	}

	function get_all_teachers($user_id = ""){
		if($user_id > 0){
			$this->db->where('id', $user_id);
		}

		$this->db->where('school_id', $this->school_id);
		$this->db->where("(role='superadmin' OR role='admin' OR role='teacher')");
		return $this->db->get_where('users');
	}
	function get_all_users($user_id = ""){
		if($user_id > 0){
			$this->db->where('id', $user_id);
		}

		$this->db->where('school_id', $this->school_id);
		return $this->db->get_where('users');
	}

}
