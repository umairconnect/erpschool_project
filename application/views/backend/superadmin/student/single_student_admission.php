<?php $school_id = school_id(); ?>

<form method="POST" class="col-12 d-block ajaxForm" action="<?php echo route('student/create_single_student'); ?>" id = "student_admission_form" enctype="multipart/form-data">
    <div class="col-md-12">
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="name"><?php echo get_phrase('name'); ?></label>
            <div class="col-md-9">
                <input type="text" id="name" name="name" class="form-control" placeholder="name" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="email"><?php echo get_phrase('email'); ?></label>
            <div class="col-md-9">
                <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="password"><?php echo get_phrase('password'); ?></label>
            <div class="col-md-9">
                <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="parent_id"><?php echo get_phrase('parent'); ?></label>
            <div class="col-md-9">
                <select id="parent_id" name="parent_id" class="form-control select2" data-toggle = "select2"  required >
                    <option value=""><?php echo get_phrase('select_a_parent'); ?></option>
                    <?php $parents = $this->db->get_where('parents', array('school_id' => $school_id))->result_array(); ?>
                    <?php foreach($parents as $parent): ?>
                        <option value="<?php echo $parent['id']; ?>"><?php echo $this->user_model->get_user_details($parent['user_id'], 'name'); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="class_id"><?php echo get_phrase('class'); ?></label>
            <div class="col-md-9">
                <select name="class_id" id="class_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSection(this.value)">
                    <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                    <?php $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array(); ?>
                    <?php foreach($classes as $class){ ?>
                        <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="section_id"><?php echo get_phrase('section'); ?></label>
            <div class="col-md-9" id = "section_content">
                <select name="section_id" id="section_id" class="form-control select2" data-toggle = "select2" required >
                    <option value=""><?php echo get_phrase('select_section'); ?></option>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="birthdatepicker"><?php echo get_phrase('birthday'); ?></label>
            <div class="col-md-9">
                <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name = "birthday"   value="<?php echo date('m/d/Y'); ?>" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="gender"><?php echo get_phrase('gender'); ?></label>
            <div class="col-md-9">
                <select name="gender" id="gender" class="form-control select2" data-toggle = "select2"  required>
                    <option value=""><?php echo get_phrase('select_gender'); ?></option>
                    <option value="Male"><?php echo get_phrase('male'); ?></option>
                    <option value="Female"><?php echo get_phrase('female'); ?></option>
                    <option value="Others"><?php echo get_phrase('others'); ?></option>
                </select>
            </div>
        </div>
        
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="blood_group"><?php echo get_phrase('blood_group'); ?></label>
            <div class="col-md-9">
                <select name="blood_group" id="blood_group" class="form-control select2" data-toggle = "select2"  required>
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
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-textarea"><?php echo get_phrase('address'); ?></label>
            <div class="col-md-9">
                <textarea class="form-control" id="example-textarea" rows="5" name = "address" placeholder="address"></textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="phone"><?php echo get_phrase('phone'); ?></label>
            <div class="col-md-9">
                <input type="text" id="phone" name="phone" class="form-control" placeholder="phone" required>
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="cpf"><?php echo get_phrase('CPF'); ?></label>
            <div class="col-md-9">
					<input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="informal_name"><?php echo get_phrase('Informal'); ?></label>
            <div class="col-md-9">
					<input type="text" class="form-control" id="informal_name" name="informal_name" required>
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="Color">Color</label>
            <div class="col-md-9">
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
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="Nationality">Nationality</label>
            <div class="col-md-9">
				<select name="nationality" id="Nationality" class="form-control select2" data-toggle = "select2">
                <option value="">Nationality</option>
                <option value="Brazilian">Brazilian</option>
                <option value="naturalized">Brazilian - born abroad or naturalized</option>
                <option value="Foreign">Foreign</option>
            </select>	
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="cnationality">Country of Nationality</label>
            <div class="col-md-9">
				<input type="text" class="form-control" id="CNationality" name="cnationality" required>	
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="birth_city">City of birth</label>
            <div class="col-md-9">
            <input type="text" class="form-control" id="birth_city" name="birth_city" required>	
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="disabilities">Student with a disability, autism spectrum disorder or high skills /giftedness</label>
            <div class="col-md-9">
				<select name="disabilities" id="disabilities" class="form-control select2" data-toggle = "select2">
					 <option value="">Student disability</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>	
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="typedisability">Type of disability</label>
            <div class="col-md-9">
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
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="birth_certificate"> Birth certificate registration number (new certificate)</label>
            <div class="col-md-9">
				<input type="text" class="form-control" id="birth_certificate" name="birth_certificate" required>	
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="residence">Country of residence</label>
            <div class="col-md-9">
				<input type="text" class="form-control" id="residence" name="residence" required>	
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="cep">CEP</label>
            <div class="col-md-9">
					<input type="text" class="form-control" id="cep" name="cep" required>
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="UF">UF</label>
            <div class="col-md-9">
				<input type="text" class="form-control" id="UF" name="uf" required>	
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="Municipality">Municipality</label>
            <div class="col-md-9">
				<input type="text" class="form-control" id="Municipality" name="municipality" required>	
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="location_of_residence">Location  of residence</label>
            <div class="col-md-9">
				<select name="location_of_residence" id="location_of_residence" class="form-control select2" data-toggle = "select2">
                 <option value="">Location  of residence</option>
                <option value="Urban">Urban</option>
                <option value="Rural">Rural</option>
            </select>	
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="transport">Public school transport</label>
            <div class="col-md-9">
				<select name="transport" id="transport" class="form-control select2" data-toggle = "select2">
                 <option value="">Public school transport</option>
                <option value="Urban">Municipal</option>
                <option value="Rural">State</option>
            </select>	
            </div>
        </div>
		
		<div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="vehicle_type">Type of vehicle used for school transport</label>
            <div class="col-md-9">
				<select name="vehicle_type" id="vehicle_type" class="form-control select2" data-toggle = "select2">
					 <option value="">Type of vehicle used for school transport</option>
					<option value="Bicycle">Bicycle</option>
					<option value="Animal traction">Animal traction</option>
					<option value="Micro bus">Micro bus</option>
					<option value="Vans / Kombi">Vans / Kombi</option>
					<option value="Bus">Bus</option>
					<option value="Vessel">Vessel</option>
					<option value="Waterway">Waterway</option>
					<option value="Other type of road vehicle">Other type of road vehicle</option>
				</select>	
            </div>
        </div>
		
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-fileinput"><?php echo get_phrase('student_profile_image'); ?></label>
            <div class="col-md-9 custom-file-upload">
                <div class="wrapper-image-preview" style="margin-left: -6px;">
                    <div class="box" style="width: 250px;">
                        <div class="js--image-preview" style="background-image: url(<?php echo base_url($this->config->item('asset_url').'/users/placeholder.jpg'); ?>); background-color: #F5F5F5;"></div>
                        <div class="upload-options">
                            <label for="student_image" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_an_image'); ?> </label>
                            <input id="student_image" style="visibility:hidden;" type="file" class="image-upload" name="student_image" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-secondary col-md-4 col-sm-12 mb-4"><?php echo get_phrase('add_student'); ?></button>
        </div>
    </div>
</form>

<script type="text/javascript">
var form;
$(".ajaxForm").submit(function(e) {
  form = $(this);
  ajaxSubmit(e, form, refreshForm);
});
var refreshForm = function () {
    form.trigger("reset");
}
</script>
