<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>
<section class="container pt-1">
	<div class="row mt-1">
		<div class="col-sm-8 pl-4 ml-2">
			<a class="btn btn-outline-info" href="view_tutor">View Tutor</a>
		</div>
	</div>

	<div class="mt-3 mb-3 col-md-8">
		<legend class="pt-1 pb-1">Enter tutors information</legend>
		<div class="border rounded mt-2 p-3">
			<form method="POST" action="">
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Firstname<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="firstname" id="firstname" required>
						<p class="text-muted"><font size="2" id="checkFirstname"></font></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Surname<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="surname" id="surname" required>
						<p class="text-muted"><font size="2" id="checkSurname"></font></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Gender<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="radio" class="ml-1" name="gender" value="M" checked="">
						<label>Male</label>
						<input type="radio" class="ml-2" name="gender" value="F">
						<label>Female</label>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Date of Birth<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="date" class="form-control" name="dob" id="dob" required>
						<p class="text-muted"><font size="2" id="checkDate"></font></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Contact</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="contact" id="contact">
						<p class="text-muted"><font size="2" id="checkContact"></font></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Email<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="email" class="form-control" name="email" id="email" required>
						<p class="text-muted"><font size="2" id="checkEmail"></font></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Role<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<select class="form-control" name="role" required>
							<option value="P">Admin</option>
							<option value="N" selected>Tutor</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Specialized Module<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<select class="form-control" name="subject" >
							<?php 
								foreach ($modules as $module) {
									echo '<option value="' . $module['module_id'] . '">' . $module['module_name'] . '</option>';
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Username<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="username" id="username" required>
						<p class="text-muted"><font size="2" id="checkUsername"></font></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Password<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="password" id="password"  required="">
						<p class="text-muted"><font size="2" id="checkPassword"></font></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Confirm Password<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
						<p class="text-muted"><font size="2" id="checkConfirmPassword"></font></p>
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
        $('#checkFirstname').hide();
        $('#checkSurname').hide();
        $('#checkDate').hide();
        $('#checkEmail').hide();
        $('#checkContact').hide();
        $('#checkUsername').hide();
        $('#checkPassword').hide();
        $('#checkConfirmPassword').hide();
      

        var firstname_error = true;
        var surname_error = true;
        var date_error = true;
        var email_error = true;
        var contact_error = true;
        var username_error = true;
        var password_error = true;
        var confirmPassword_error = true;
     

        $('#firstname').keyup(function() {
            checkFirstname();
        }); 

        $('#surname').keyup(function() {
            checkSurname();
        });

        $('#dob').keyup(function() {
            checkDate();
        });

        $('#email').keyup(function() {
            checkEmail();
        });

        $('#contact').keyup(function() {
            checkContact();
        });

        $('#username').keyup(function() {
            checkUsername();
        });

        $('#password').keyup(function() {
            checkPassword();
        });

        $('#confirmPassword ').keyup(function() {
            checkConfirmPassword();
        });
      

        function checkFirstname()
        {
	        var firstnameValue = $('#firstname').val();
            var letterOnlyRegExp = /^[a-zA-Z\s]*$/;

            if(firstnameValue.length == '' || !(firstnameValue.match(letterOnlyRegExp))){
            $('#checkFirstname').show();
            $('#checkFirstname').html("Field Cannot be empty. It can contain only alphabet");
            $('#checkFirstname').focus();
            $('#checkFirstname').css("color", "red");
            firstname_error = false;
            return false;
            } else{
                $('#checkFirstname').hide();
            }
        }

        function checkSurname()
        {
            var surnameValue = $('#surname').val();
            var letterOnlyRegExp = /^[a-zA-Z\s]*$/;

            if(surnameValue.length == '' || !(surnameValue.match(letterOnlyRegExp))){
            $('#checkSurname').show();
            $('#checkSurname').html("Field Cannot be empty. It can contain only alphabet");
            $('#checkSurname').focus();
            $('#checkSurname').css("color", "red");
            surname_error = false;
            return false;
            } else{
                $('#checkSurname').hide();
            }
        }

        function checkDate()
        {
    
            var dateValue = $('#dob').val();

            if(dateValue.length == ''){
            $('#checkDate').show();
            $('#checkDate').html("Please fill the date of birth");
            $('#checkDate').focus();
            $('#checkDate').css("color", "red");
            date_error = false;
            return false;
            } else{
                $('#checkDate').hide();
            }
        }

        function checkEmail()
        {
    
            var emailValue = $('#email').val();

            if(emailValue.length == ''){
            $('#checkEmail').show();
            $('#checkEmail').html("Please fill the email");
            $('#checkEmail').focus();
            $('#checkEmail').css("color", "red");
            email_error = false;
            return false;
            } else{
                $('#checkEmail').hide();
            }
        }

        function checkContact()
        {
            var contactValue = $('#contact').val();
            var letterOnlyRegExp = /^[0-9]*$/;
            if (!(contactValue.match(letterOnlyRegExp))) {
	            $('#checkContact').show();
	            $('#checkContact').html("Contact can only have numerical values");
	            $('#checkContact').focus();
	            $('#checkContact').css("color", "red");
	            contact_error = false;
	            return false;
            } else{
                $('#checkContact').hide();
            }

            if ((contactValue.length < 10 ) || (contactValue.length > 10)) {
	            $('#checkContact').show();
	            $('#checkContact').html("Contact cannot have less or more than 10 digits");
	            $('#checkContact').focus();
	            $('#checkContact').css("color", "red");
	            contact_error = false;
	            return false;
            } else{
                $('#checkContact').hide();
            }
        }

        function checkUsername()
        {
    
            var usernameValue = $('#username').val();
			var letterOnlyRegExp = /^[a-zA-Z\s]*$/;

            if(usernameValue.length == '' || !(usernameValue.match(letterOnlyRegExp))){
            $('#checkUsername').show();
            $('#checkUsername').html("Username cannot contain numerical and special values");
            $('#checkUsername').focus();
            $('#checkUsername').css("color", "red");
            username_error = false;
            return false;
            } else{
                $('#checkUsername').hide();
            }
        }


        function checkPassword(){
            var passwordValue = $('#password').val();

			if(passwordValue.length == ''){
				$('#checkPassword').show();
				$('#checkPassword').html("Please fill the Password");
				$('#checkPassword').focus();
				$('#checkPassword').css("color", "red");
				pass_err = false;
				return false;
			}else{
				$('#checkPassword').hide();
			}
			if((passwordValue.length < 5 ) || ( passwordValue.length > 18)){
				$('#checkPassword').show();
				$('#checkPassword').html("Password must be between 5 to 18 character long");
				$('#checkPassword').focus();
				$('#checkPassword').css("color", "red");
				password_error = false;
				return false;
			}else{
				$('#checkPassword').hide();
			}
		}

		function checkConfirmPassword(){
			var confirmValue = $('#confirmPassword').val();
			var passwordValue = $('#password').val();

			if(confirmValue != passwordValue){
				$('#checkConfirmPassword').show();
				$('#checkConfirmPassword').html("Password are not matching");
				$('#checkConfirmPassword').focus();
				$('#checkConfirmPassword').css("color", "red");
				confirmPassword_error = false;
				return false;
			}else{
				$('#checkConfirmPassword').hide();
			}
		}
       

        $('#submit').click(function(){
        firstname_error = true;
        surname_error = true;
        email_error = true;
        contact_error = true;
        username_error = true;
        password_error = true;
        confirmPassword_error = true;
       

        checkFirstname();
        checkSurname();
        checkEmail();
        checkContact();
        checkUsername();
        checkPassword();
        checkConfirmPassword();
       

        if((firstname_error == true) && (surname_error == true) && (email_error == true) && (date_error == true) && (contact_error == true)&& (username_error == true) && (password_error == true) && (confirmPassword_error == true)){
            return true;
        }else{
        	return false;
        }
        });
    });
</script>
