<?php 
	$message = '';
	if (isset($_POST['submit'])) {
		if ($_POST['password'] != $_POST['confirmPassword']){
			$message = 'Password not Matched. Try Again';
		}
		else{
			$studentObj = new DatabaseProcess($pdo, 'students');
			$data = [
				'student_id' => '',
				'firstname' => $_POST['firstname'],
				'lastname' => $_POST['surname'],
				'gender' => $_POST['gender'],
				'dob' => $_POST['dob'],
				'contact' => $_POST['contact'],
				'email' => $_POST['email'],
				'course' => $_POST['course'],
				'level' => $_POST['level'],
				'username' => $_POST['username'],
				'password' => password_hash($_POST['password'],PASSWORD_DEFAULT)
			];
			$studentObj->save($data);
			unset($data);
			
			if ($studentObj){
				$message = 'Student Added Successfully';
			}
			else
				$message = 'Oops! Sorry, failed to add student information. Please try again.';
		}
	}

	$courseObj = new DatabaseProcess($pdo, 'courses');
	$courses = $courseObj->findAll();
	$templateVars = ['courses'=>$courses];
	
	$title = 'Online Examination - Student';
	$heading = 'Add Student';
	$content = loadTemplate('../views/add_student_design.php', $templateVars);
?>