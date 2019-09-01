<?php
	$mId = $_GET['eId'];
	
	$templateVars = [ ];
	$title = 'Online Examination - Examination';
	$content = loadTemplate('../views/exam_design.php', $templateVars);
?>