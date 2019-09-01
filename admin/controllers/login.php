<?php 
	$message = '';
	if(isset($_POST['submit'])){
		$userLogin = $pdo->prepare("SELECT * FROM tutors WHERE username =:username");
		$criteria = ['username'=> $_POST['username']];
		$wrongInput = false;
		$userLogin -> execute($criteria);
		if($userLogin->rowCount()>0){
			$user = $userLogin->fetch();
			if(password_verify($_POST['password'], $user['password'])){
				$_SESSION['user_logged'] = $user['tutor_id'];
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
	$heading = 'Login';
	$content = loadTemplate('../views/login_design.php', $templateVars);
?>