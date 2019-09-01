<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>

<section class="container pt-1">
	<div class="row mt-1">
		<div class="col-sm-8 pl-4 ml-2">
			<a class="btn btn-outline-info" href="view_module">View Module</a>
		</div>
	</div>

	<div class="mt-3 mb-3 col-md-8">
		<div class="border rounded mt-2 p-3">
			<form method="POST" action="">
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Module Name<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="module" id="module" required>
						<p class="text-muted"><font size="2" id="checkModule"></font></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Module Code<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="code" id="code" required>
						<p class="text-muted"><font size="2" id="checkCode"></font></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Module Credit<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="credit" id="credit" required>
						<p class="text-muted"><font size="2" id="checkCredits"></font></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Select Course<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<select class="form-control" name="course" id="course" required>
							<?php 
								foreach ($courses as $course) {
									echo '<option value="' . $course['course_id'] . '">' . $course['title'] . '</option>';
								}
							?>
						</select>
						<p class="text-muted"><font size="2" id="checkCourse"></font></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Select Level<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<select class="form-control" name="level" id="level" required>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
						</select>
						<p class="text-muted"><font size="2" id="checkLevel"></font></p>
					</div>
				</div>

				<button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg mt-3 mb-3">Add</button>
			</form>
		</div>
	</div>
</section>

<script>
    $(document).ready(function()
    {
        $('#checkModule').hide();
        $('#checkCode').hide();
        $('#checkCredits').hide();
        $('#checkCourse').hide();
        $('#checkLevel').hide();

        var module_error = true;
        var code_error = true;
        var credit_error = true;
        var course_error = true;
        var level_error = true;

        $('#module').keyup(function() {
            checkModule();
        }); 

        $('#code').keyup(function() {
            checkCode();
        }); 

        $('#credit').keyup(function() {
            checkCredits();
        });

        $('#course').keyup(function() {
            checkCourse();
        });

        $('#level').keyup(function() {
            checkLevel();
        });

        function checkModule()
        {
            var moduleValue = $('#module').val();
            var letterOnlyRegExp = /^[a-zA-Z\s]*$/;

            if(moduleValue.length == '' || !(moduleValue.match(letterOnlyRegExp))){
            $('#checkModule').show();
            $('#checkModule').html("It can only contains alpha characters.");
            $('#checkModule').focus();
            $('#checkModule').css("color", "red");
            module_error = false;
            return false;
            } else{
                $('#checkModule').hide();
            }
        }

        function checkCode()
        {
    
            var codeValue = $('#code').val();
            var letterOnlyRegExp = /^[0-9a-zA-Z\s]*$/;

            if(codeValue.length == '' || !(codeValue.match(letterOnlyRegExp))){
	            $('#checkCode').show();
	            $('#checkCode').html("Field Cannot be empty. It can contain alpha numeric values");
	            $('#checkCode').focus();
	            $('#checkCode').css("color", "red");
	            code_error = false;
	            return false;
            } else{
                $('#checkCode').hide();
            }
        }

        function checkCredits()
        {
            var creditValue = $('#credit').val();
            var letterOnlyRegExp = /^[0-9]*$/;

            if(creditValue.length == '' || !(creditValue.match(letterOnlyRegExp))){
	            $('#checkCredits').show();
	            $('#checkCredits').html("Credit Cannot be empty. It can only contain numerical values");
	            $('#checkCredits').focus();
	            $('#checkCredits').css("color", "red");
	            credit_error = false;
	            return false;
            } else{
                $('#checkCredits').hide();
            }
        }

        function checkCourse()
        {
    
            var coruseValue = $('#course').val();

            if(coruseValue.length == ''){
            $('#checkCourse').show();
            $('#checkCourse').html("Address cannot be empty");
            $('#checkCourse').focus();
            $('#checkCourse').css("color", "red");
            course_error = false;
            return false;
            } else{
                $('#checkCourse').hide();
            }
        }

        function checkLevel()
        {
    
            var levelValue = $('#level').val();

            if(levelValue.length == '' ){
            $('#checkLevel').show();
            $('#checkLevel').html("");
            $('#checkLevel').focus();
            $('#checkLevel').css("color", "red");
            level_error = false;
            return false;
            } else{
                $('#checkLevel').hide();
            }
        }

        $('#submit').click(function(){
        module_error = true;
     	code_error = true;
        credit_error = true;
        course_error = true;
        level_error = true;
       
		checkModule();
        checkCode();
        checkCredits();
        checkCourse();
        checkLevel();

        if((module_error == true) && (code_error == true) && (credit_error == true) && (course_error == true)&& (level_error == true)){
            return true;
        }else{
        	return false;
        }
        });
    });
</script>