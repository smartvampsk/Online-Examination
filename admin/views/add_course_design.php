<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>

<section class="container pt-1">
	<div class="row mt-1">
		<div class="col-sm-8 pl-4 ml-2">
			<a class="btn btn-outline-info" href="view_course">View Course</a>
		</div>
	</div>

	<div class="mt-3 mb-3 col-md-8">
		<div class="border rounded mt-2 p-3">
			<form method="POST" action="">
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Course Level<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="level" id="level" placeholder="eg. 4/5/6" required>
						<p class="text-muted"><font size="2" id="checkLevel"></font></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Course Title<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="title" id="title" placeholder="Course" required>
						<p class="text-muted"><font size="2" id="checkTitle"></font></p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Credit Weights<span class="text-danger font-weight-bold">&nbsp;*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="credit" id="credit" placeholder="Total Credits" required>
						<p class="text-muted"><font size="2" id="checkCredits"></font></p>
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
	    $('#checkLevel').hide();
	    $('#checkTitle').hide();
	    $('#checkCredits').hide();
	  

	    var level_error = true;
	    var title_error = true;
	    var credit_error = true;

	    $('#level').keyup(function() {
	        checkLevel();
	    }); 

	    $('#title').keyup(function() {
	        checkTitle();
	    }); 

	    $('#credit').keyup(function() {
	        checkCredits();
	    });

	    function checkLevel()
	    {
	        var levelValue = $('#level').val();

	        if(levelValue.length == ''){
	        $('#checkLevel').show();
	        $('#checkLevel').html("Level cannot be empty");
	        $('#checkLevel').focus();
	        $('#checkLevel').css("color", "red");
	        level_error = false;
	        return false;
	        } else{
	            $('#checkLevel').hide();
	        }
	    }


	    function checkTitle()
	    {
	        var titleValue = $('#title').val();
	        var letterOnlyRegExp = /^[a-zA-Z\s]*$/;

	        if(titleValue.length == '' || !(titleValue.match(letterOnlyRegExp))){
	        $('#checkTitle').show();
	        $('#checkTitle').html("Fill the title correctly. It cannot contain numbers or special characters");
	        $('#checkTitle').focus();
	        $('#checkTitle').css("color", "red");
	        title_error = false;
	        return false;
	        } else{
	            $('#checkTitle').hide();
	        }
	    }


	    function checkCredits()
	    {

	        var creditValue = $('#credit').val();

	        if(creditValue.length == ''){
	        $('#checkCredits').show();
	        $('#checkCredits').html("Credit cannot be empty");
	        $('#checkCredits').focus();
	        $('#checkCredits').css("color", "red");
	        credit_error = false;
	        return false;
	        } else{
	            $('#checkCredits').hide();
	        }
	    }


	    $('#submit').click(function(){
	    level_error = true;
	    title_error = true;
	    credit_error = true;
	   

	    checkLevel();
	    checkTitle();
	    checkCredits();
	   
	    if((level_error == true) && (title_error == true) && (credit_error == true)){
	        return true;
	    }else{
	    return false;
	    }
	    });
	});
	</script>