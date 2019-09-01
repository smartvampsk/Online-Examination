<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>

<section class="pt-1 p-1">
	<div class="row mt-1 pb-3">
		<div class="col-sm-8">
			<a class="btn btn-outline-info" href="add_module">Add Questions</a>
		</div>
		
		<form class="form-inline ml-2">
			<input class="form-control" type="search" placeholder="Search">
			<button class="btn btn-outline-info ml-2">Search</button>
		</form>
	</div>

	<div class="container">
		<ol class="">
			<?php
				foreach ($questions as $question) { ?>
					<li class="">
						<div class="">
						<form class="form-group form-check">
							<div class="row">
								<div class="col-md-10">
									<legend><?php echo $question['question']; ?></legend>
								</div>
								<div class="col-md-2 text-right">
									<?php echo '<a class="btn btn-sm btn-info" href="edit_question?qId=' . $question['q_id'].'">Edit</a>'; ?>
									<input type="hidden" name="qd_id" value="<?php echo $question['qd_id']; ?>" />
								</div>
							</div>
							<ul style="list-style: lower-alpha;">
								<li>
									<input class="form-check-input ml-2" type="radio" name="q_id" value="q_id">
									<label class="form-check-label pl-5"><?php echo $question['opt1']; ?></label></li>
								<li>
									<input class="form-check-input ml-2" type="radio" name="q_id" value="q_id">
									<label class="form-check-label pl-5"><?php echo $question['opt2']; ?></label>
								</li>
								<li>
									<input class="form-check-input ml-2" type="radio" name="q_id" value="q_id">
									<label class="form-check-label pl-5"><?php echo $question['opt3']; ?></label>
								</li>
								<li>
									<input class="form-check-input ml-2" type="radio" name="q_id" value="q_id">
									<label class="form-check-label pl-5"><?php echo $question['opt4']; ?></label>
								</li>
							</ul>
								
						</form>
					</li>
				<?php  }
			?>		
		</ol>	
	</div>
</section>