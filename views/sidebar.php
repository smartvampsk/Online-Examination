<?php 
	if (isset($_GET['mId'])) {
		$_SESSION['mId'] = $_GET['mId'];
		$mId = $_SESSION['mId'];
	}
?>

<ul class="nav-item list-unstyled pl-3">
	<?php
		require '../db/db.php';
		$mod = $pdo->prepare("SELECT * FROM modules WHERE module_id = '$mId'");
		$mod->execute();
		foreach ($mod as $modu) {
			echo '<h4 class="pb-2"><u>'.$modu['module_code'].'</u></h4>';
			echo '<li><a href="module?mId='.$mId.'">Welcome</a></li>';
			echo '<li><a href="module?sId='.$mId.'">Slides</a></li>';
			echo '<li><a href="module?eId='.$mId.'">Examination</a></li>';
			echo '<li><a href="module?swId='.$mId.'">Submit Your Work</a></li>';
		}
	?>
</ul>