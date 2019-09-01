<?php
	if(!isset($_SESSION['student_logged'])){
		header('location:login');		
	}
?>
<?php 
	require '../db/db.php';
	if (isset($_SESSION['mId'])) {
		$mId = $_SESSION['mId'];
	}
?>

<section class="container-fluid modules pt-3">
	<div class="row">
		<div class="col-md-2 rounded text-white sidebar-link sidebar-module">
			<?php require 'sidebar.php'; ?>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-7 pt-3 pb-2 border rounded">
			<div class="row">
 				<div class="col-md-10">
 					<h4 class="ml-2 pl-2"><b>Summary</b></h4>
 				</div>
 				<div class="col-md-2">
 					<form class="" method="POST">
 						<button type="submit" name="submit" class="btn btn-sm btn-danger ml-0 mb-3">Close</button>
 					</form>
 				</div>
 			</div>
			<div class="row border-bottom pb-3">
				<table class="table-sm table-hover ml-4 ">
					<tr>
						<th>Name:</th>
						<td><?php echo $information['firstname']. ' '. $information['lastname']; ?></td>
					</tr>
					<tr>
						<th>Course:</th>
						<td><?php echo $information['title']; ?></td>
					</tr>
					<tr>
						<th>Module:</th>
						<td><?php echo $information['module_name']; ?></td>
					</tr>
					<tr>
						<th>Total Marks:</th>
						<td><?php echo $information['totalMarks']; ?></td>
					</tr>
					<tr>
						<th>Obtained Marks:</th>
						<td><?php echo $information['mark']; ?></td>
					</tr>
				</table>
			</div>
			<div>
				<ol class="pl-3">
					<form class="form-group form-check" method="POST"> 
						<?php 
							foreach ($answers as $answer) { 
							 	if ($answer['solution'] == $answer['correct']) {
							 		$marks = 0;
							 		$marks += $answer['mark'];
							 	}
							 ?>

							 	<li class="pl-1">
						 			<div class="row pt-3">
						 				<div class="col-md-10">
						 					<h5><?php echo $answer['question']; ?></h5>
						 				</div>
						 				<div class="col-md-2">
						 					<h6><?php echo $answer['mark'].' marks'; ?></h6>
						 				</div>
						 			</div>
						 			<ul style="list-style: none;">
						 				<li>
						 					<div class="row">
						 						<div class="col-md-3">
						 							<label>Your Answer</label>
						 						</div>
						 						<div class="col-md-8">
						 							<label><?php echo $answer['solution']; ?></label>
						 						</div>
						 					</div>
						 				</li>
						 				<li>
						 					<div class="row">
						 						<div class="col-md-3">
						 							<label>Correct Answer</label>
						 						</div>
						 						<div class="col-md-8">
						 							<label><?php echo $answer['correct']; ?></label>
						 						</div>
						 					</div>
						 				</li>
						 			</ul>
							 	</li>
				 			<?php }
			 			?>
			 			<div class="row">
			 				<div class="col-md-10"></div>
			 				<div class="col-md-2">
			 					<button type="submit" name="submit" class="btn btn-danger ml-0 mt-3 mb-3">Close</button>
			 				</div>
			 			</div>
			 		</form>
				</ol>
			</div>
		</div>
	</div>
</section>