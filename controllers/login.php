<?php
	if(isset($_POST['submit'])){
		$userLogin = $pdo->prepare("SELECT * FROM students WHERE username =:username");
		$criteria = ['username'=> $_POST['username']];
		$wrongInput = false;
		$userLogin -> execute($criteria);
		if($userLogin->rowCount()>0){
			$user = $userLogin->fetch();
			if(password_verify($_POST['password'], $user['password'])){
				$_SESSION['student_logged'] = $user['student_id'];
				echo $_SESSION['student_logged'];
			}
			else {
				$wrongInput = true;
			}
		}
		else{
			$wrongInput = true;
		}
		if($wrongInput == true){
			echo '<script type="text/javascript"> alert("Wrong username or password"); </script>';
		}
	}

	$templateVars = [ ];
	
	$title = 'Online Examination - Login';
	$content = loadTemplate('../views/login_design.php', $templateVars);
?>