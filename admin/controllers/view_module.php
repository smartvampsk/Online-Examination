<?php
	$message = '';

	if (isset($_GET['delId'])) {
		$delModuleObj = new DatabaseProcess($pdo, 'modules');
		$delId = $_GET['delId'];
		$delModule = $delModuleObj->delete('module_id', $delId);

		if ($delModule == true) {
			$message = 'Module Deleted';
		}
		else
			$message = 'Oops! Sorry, Failed to Delete Module.';
	}

	$moduleObj = new DatabaseProcess($pdo, 'modules');
	$modules = $moduleObj->findAll('module_id');
	$templateVars = ['modules'=> $modules];
	
	$title = 'Online Examination - Module';
	$heading = 'View Module';
	$content = loadTemplate('../views/view_module_design.php', $templateVars);
?>