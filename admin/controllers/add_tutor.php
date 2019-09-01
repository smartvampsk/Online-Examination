<?php 
	$message = '';
	if (isset($_POST['submit'])) {
		if ($_POST['password'] != $_POST['confirmPassword']){
			header('location:add_tutor?msg=Password not Matched. Try Again');
		}
		else{
			$tutorObj = new DatabaseProcess($pdo, 'tutors');
			$data = [
				'tutor_id' => '',
				'firstname' => $_POST['firstname'],
				'lastname' => $_POST['surname'],
				'gender' => $_POST['gender'],
				'dob' => $_POST['dob'],
				'contact' => $_POST['contact'],
				'email' => $_POST['email'],
				'role' => $_POST['role'],
				'subject' => $_POST['subject'],
				'username' => $_POST['username'],
				'password' => password_hash($_POST['password'],PASSWORD_DEFAULT)
			];
			$tutorObj->save($data);
			
			if ($tutorObj){
				$message = 'Tutor Added Successfully';
			}
			else
				$message = 'Oops! Sorry, failed to add tutor information. Please try again.';
		}
	}

	$moduleObj = new DatabaseProcess($pdo, 'modules');
	$modules = $moduleObj->findAll();
	$templateVars = ['modules'=>$modules];
	
	$title = 'Online Examination - Tutor';
	$heading = 'Add Tutor';
	$content = loadTemplate('../views/add_tutor_design.php', $templateVars);
?>