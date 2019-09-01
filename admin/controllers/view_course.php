<?php 
	$message = '';

	if (isset($_GET['delId'])) {
		$delCourseObj = new DatabaseProcess($pdo, 'courses');
		$delId = $_GET['delId'];
		$delCourse = $delCourseObj->delete('course_id', $delId);

		if ($delCourse == true) {
			$message = 'Course Deleted';
		}
		else
			$message = 'Oops! Sorry, Failed to Delete Course. Please try again.';
	}
	
	$courseObj = new DatabaseProcess($pdo, 'courses');
	$courses = $courseObj->findAll('course_id');
	$templateVars = ['courses'=> $courses];

	$title = 'Online Examination - Course';
	$heading = 'View Course';
	$content = loadTemplate('../views/view_course_design.php', $templateVars);
?>
