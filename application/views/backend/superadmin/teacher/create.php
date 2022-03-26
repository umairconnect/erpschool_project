<form method="POST" class="d-block ajaxForm" action="<?php echo route('teacher/create'); ?>" enctype="multipart/form-data">
    <div class="form-row">
		
		
        <div class="form-group col-md-12">
            <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
            <label for="name"><?php echo get_phrase('name'); ?></label>
            <input type="text" class="form-control" id="name" name="name" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_teacher_name'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="email"><?php echo get_phrase('email'); ?></label>
            <input type="email" class="form-control" id="email" name="email" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_teacher_email'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="password"><?php echo get_phrase('password'); ?></label>
            <input type="password" class="form-control" id="password" name="password" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_teacher_password'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="designation"><?php echo get_phrase('designation'); ?></label>
            <input type="text" class="form-control" id="designation" name="designation" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_teacher_designation'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="department"><?php echo get_phrase('department'); ?></label>
            <select name="department" id="department" class="form-control select2" data-toggle = "select2" required>
                <option value=""><?php echo get_phrase('select_a_department'); ?></option>
                <?php $departments = $this->db->get_where('departments', array('school_id' => school_id()))->result_array();
                foreach($departments as $department){
                    ?>
                    <option value="<?php echo $department['id']; ?>"><?php echo $department['name']; ?></option>
                <?php } ?>
            </select>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_a_department'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone"><?php echo get_phrase('phone_number'); ?></label>
            <input type="text" class="form-control" id="phone" name="phone" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_teacher_phone_number'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="gender"><?php echo get_phrase('gender'); ?></label>
            <select name="gender" id="gender" class="form-control select2" data-toggle = "select2">
                <option value=""><?php echo get_phrase('select_a_gender'); ?></option>
                <option value="Male"><?php echo get_phrase('male'); ?></option>
                <option value="Female"><?php echo get_phrase('female'); ?></option>
                <option value="Others"><?php echo get_phrase('others'); ?></option>
            </select>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_teacher_gender'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="blood_group"><?php echo get_phrase('blood_group'); ?></label>
            <select name="blood_group" id="blood_group" class="form-control select2" data-toggle = "select2">
                <option value=""><?php echo get_phrase('select_a_blood_group'); ?></option>
                <option value="a+">A+</option>
                <option value="a-">A-</option>
                <option value="b+">B+</option>
                <option value="b-">B-</option>
                <option value="ab+">AB+</option>
                <option value="ab-">AB-</option>
                <option value="o+">O+</option>
                <option value="o-">O-</option>
            </select>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_teacher_blood_group'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label><?php echo get_phrase('facebook_profile_link'); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                </div>
                <input type="text" class="form-control" name="facebook_link">
            </div>
            <small id="" class="form-text text-muted"><?php echo get_phrase('facebook_profile_link'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label><?php echo get_phrase('twitter_profile_link'); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                </div>
                <input type="text" class="form-control" name="twitter_link">
            </div>
            <small id="" class="form-text text-muted"><?php echo get_phrase('twitter_profile_link'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label><?php echo get_phrase('linkedin_profile_link'); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
                </div>
                <input type="text" class="form-control" name="linkedin_link">
            </div>
            <small id="" class="form-text text-muted"><?php echo get_phrase('linkedin_profile_link'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone"><?php echo get_phrase('address'); ?></label>
            <textarea class="form-control" id="address" name="address" rows="5" required></textarea>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_teacher_address'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="about"><?php echo get_phrase('about'); ?></label>
            <textarea class="form-control" id="about" name="about" rows="5" required></textarea>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_a_small_about'); ?></small>
        </div>

        <div class="form-group col-md-12">
          <label for="show_on_website"><?php echo get_phrase('show_on_website'); ?></label>
          <select name="show_on_website" id="show_on_website" class="form-control select2" data-toggle = "select2">
            <option value="1"><?php echo get_phrase('show'); ?></option>
            <option value="0"><?php echo get_phrase('do_not_need_to_show'); ?></option>
          </select>
          <small id="" class="form-text text-muted"><?php echo get_phrase('show_this_teacher_on_website'); ?></small>
        </div>
		<div class="form-group col-md-12">
            <label for="cpf"><?php echo get_phrase('CPF'); ?></label>
            <input type="text" class="form-control" id="cpf" name="cpf" required>
            <small id="" class="form-text text-muted">CPF</small>
        </div>
		<div class="form-group col-md-12">
            <label for="informal_name"><?php echo get_phrase('Informal'); ?></label>
            <input type="text" class="form-control" id="informal_name" name="informal_name" required>
            <small id="" class="form-text text-muted">Informal Name</small>
        </div>
		<div class="form-group col-md-12">
            <label for="birthdatepicker">Birthday</label>
			<input type="date" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name="birthday" value="<?php echo date('Y-m-d');?>" required="">
            <small id="" class="form-text text-muted">Birthday</small>
        </div>
		<div class="form-group col-md-12">
            <label for="Color">Color</label>
            <select name="color" id="Color" class="form-control select2" data-toggle = "select2">
                <option value="">Color</option>
                <option value="White">White</option>
                <option value="Black">Black</option>
                <option value="Yellow">Yellow</option>
                <option value="Parda">Parda</option>
                <option value="Indigenous">Indigenous</option>
                <option value="Not declared">Not declared</option>
            </select>
        </div>
		<div class="form-group col-md-12">
            <label for="Nationality">Nationality</label>
            <select name="nationality" id="Nationality" class="form-control select2" data-toggle = "select2">
                <option value="">Nationality</option>
                <option value="Brazilian">Brazilian</option>
                <option value="naturalized">Brazilian - born abroad or naturalized</option>
                <option value="Foreign">Foreign</option>
            </select>
        </div>
		<div class="form-group col-md-12">
            <label for="cnationality">Country of Nationality</label>
            <input type="text" class="form-control" id="CNationality" name="cnationality" required>
            <small id="" class="form-text text-muted">Country of Nationality</small>
        </div>
		<div class="form-group col-md-12">
            <label for="birth_city">City of birth</label>
            <input type="text" class="form-control" id="birth_city" name="birth_city" required>
            <small id="" class="form-text text-muted">City of birth</small>
        </div>
		<div class="form-group col-md-12">
            <label for="disabilities">School professionals with disabilities, autism spectrum disorder or high skills / giftedness</label>
			<select name="disabilities" id="disabilities" class="form-control select2" data-toggle = "select2">
                 <option value="">School professionals with disabilities</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
		<div class="form-group col-md-12">
            <label for="typedisability">Type of disability</label>
			<select name="typedisability" id="typedisability" class="form-control select2" data-toggle = "select2">
                 <option value="">Type of disability</option>
                <option value="Low vision">Low vision</option>
                <option value="Blindness">Blindness</option>
                <option value="Deficiency auditory">Deficiency auditory</option>
                <option value="Deficiency physics">Deficiency physics</option>
                <option value="Deficiency intellectual">Deficiency intellectual</option>
                <option value="Deafness">Deafness</option>
                <option value="DEAFBLINDNESS">DEAFBLINDNESS</option>
                <option value="Deficiency multiple">Deficiency multiple</option>
                <option value="Autism spectrum disorder">Autism spectrum disorder</option>
                <option value="High skills giftedness">High skills /giftedness</option>
            </select>
        </div>
		<div class="form-group col-md-12">
            <label for="residence">Country of residence</label>
            <input type="text" class="form-control" id="residence" name="residence" required>
        </div>
		<div class="form-group col-md-12">
            <label for="CEP">CEP</label>
            <input type="text" class="form-control" id="CEP" name="cep" required>
        </div>
		<div class="form-group col-md-12">
            <label for="UF">UF</label>
            <input type="text" class="form-control" id="UF" name="uf" required>
        </div>
		<div class="form-group col-md-12">
            <label for="Municipality">Municipality</label>
            <input type="text" class="form-control" id="Municipality" name="municipality" required>
        </div>
		<div class="form-group col-md-12">
            <label for="location_of_residence">Location  of residence</label>
			<select name="location_of_residence" id="location_of_residence" class="form-control select2" data-toggle = "select2">
                 <option value="">Location  of residence</option>
                <option value="Urban">Urban</option>
                <option value="Rural">Rural</option>
            </select>
        </div>
		<div class="form-group col-md-12">
            <label for="higher_education"> Higher education level completed</label>
			<select name="higher_education" id="higher_education" class="form-control select2" data-toggle = "select2">
                 <option value="">Select Higher education level completed</option>
                <option value="college education">college education</option>
                <option value="High school">High school</option>
                <option value="Elementary School ">Elementary School </option>
                <option value="Didn't finish elementary school">Didn't finish elementary school</option>
            </select>
        </div>
		<div class="form-group col-md-12">
            <label for="high_school"> Type of high school attended:</label>
			<select name="high_school" id="high_school" class="form-control select2" data-toggle = "select2">
                 <option value="">Type of high school attended</option>
                <option value="General formation">General formation </option>
                <option value="Normal mode teaching">Normal mode teaching </option>
                <option value="Technical course">Technical course</option>
                <option value="indigenous teaching - normal mode">indigenous teaching - normal mode</option>
            </select>
        </div>
		<div class="form-group col-md-12">
			<label for="name">Higher Education Data</label>
		</div>
		<div class="form-group col-md-12">
            <label for="course_area">Course area </label>
            <input type="text" class="form-control" id="course_area" name="course_area" required>
        </div>
		<div class="form-group col-md-12">
            <label for="Degree">Academic Level / Degree: </label>
            <select name="degree" id="Degree" class="form-control select2" data-toggle = "select2">
                 <option value="">Degree</option>
                <option value="bachelor degree">bachelor degree </option>
                <option value="Graduation">Graduation</option>
                <option value="Sequential">Sequential</option>
                <option value="Technological">Technological</option>
            </select>
        </div>
		<div class="form-group col-md-12">
            <label for="course_code">Higher Course Code:</label>
            <input type="text" class="form-control" id="course_code" name="course_code" required>
        </div>
		<div class="form-group col-md-12">
            <label for="conclusion_year:">Conclusion year:</label>
            <input type="text" class="form-control" id="conclusion_year" name="conclusion_year" required>
        </div>
		<div class="form-group col-md-12">
            <label for="type_of_institution">Type of institution:</label>
			<select name="type_of_institution" id="type_of_institution" class="form-control select2" data-toggle = "select2">
                 <option value="">Type of institution</option>
                <option value="Public">Public</option>
                <option value="Toilet">Toilet</option>
            </select>
        </div>
		<div class="form-group col-md-12">
            <label for="institution:">Institution of college education:</label>
            <input type="text" class="form-control" id="institution" name="institution" required>
        </div>
		<div class="form-group col-md-12">
            <label for="graduate_courses">Completed graduate courses</label>
			<select name="graduate_courses" id="graduate_courses" class="form-control select2" data-toggle = "select2">
                 <option value="">Completed graduate courses</option>
                <option value="Specialization">Specialization</option>
                <option value="Master's">Master's</option>
                <option value="Doctorate degree">Doctorate degree </option>
                <option value="No graduate completed">No graduate completed</option>
            </select>
        </div>
		<div class="form-group col-md-12">
            <label for="performs_at_school">Function he performs at school:</label>
			<select name="performs_at_school" id="performs_at_school" class="form-control select2" data-toggle = "select2">
                 <option value="">Function he performs at school</option>
                <option value="Teacher">Teacher</option>
                <option value="Libras Translator and Interpreter ">Libras Translator and Interpreter </option>
                <option value="Guia-Interpreter">Guia-Interpreter</option>
                <option value="Assistant / educational assistant">Assistant / educational assistant</option>
                <option value="Full professor">Full professor</option>
                <option value="School support professional for students with disabilities">School support professional for students with disabilities</option>
                <option value="Professional / activity monitor complementary">Professional / activity monitor complementary</option>
                <option value="Teaching tutor">Teaching tutor</option>
            </select>
        </div>
		<div class="form-group col-md-12">
            <label for="type_of_bond">Functional situation / contracting regime / type of bond:</label>
			<select name="type_of_bond" id="type_of_bond" class="form-control select2" data-toggle = "select2">
                 <option value="">type of bond</option>
                <option value="Tender / effective / stable">Tender / effective / stable</option>
                <option value="Temporary contract">Temporary contract</option>
                <option value="Outsourced contract">Outsourced contract</option>
                <option value="CLT Agreement">CLT Agreement</option>
            </select>
        </div>
        <div class="form-group col-md-12">
            <label for="image_file"><?php echo get_phrase('upload_image'); ?></label>
            <input type="file" class="form-control" id="image_file" name="image_file">
        </div>

        <div class="form-group mt-2 col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_teacher'); ?></button>
        </div>
    </div>
</form>

<script>
$(document).ready(function () {
    initSelect2(['#department', '#gender', '#blood_group', '#show_on_website']);
});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllTeachers);
});

// initCustomFileUploader();
</script>
