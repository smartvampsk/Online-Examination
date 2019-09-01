<div>
   <ol>
      <form class="form-group form-check" method="POST"> 
         <?php 
            $counter = 0;
            foreach ($questions as $question) { 
               $counter++;
               $counter = strval($counter);
               ?>
               <li class="">
                  <legend><?php echo $question['question']; ?></legend>
                  <input class="form-check-input ml-2" type="hidden" name="<?php echo 'q_id'.$counter; ?>" value="<?php echo $question['q_id']; ?>">
                  <input class="form-check-input ml-2" type="hidden" name="<?php echo 'correct'.$counter; ?>" value="<?php echo $question['correct']; ?>">
                  <ul style="list-style: lower-alpha;">
                     <li>
                        <input class="form-check-input ml-2" type="radio" name="<?php echo 'solution'.$counter; ?>" value="<?php echo $question['opt1']; ?>">
                        <label class="form-check-label pl-5"><?php echo $question['opt1']; ?></label>
                     </li>
                     <li>
                        <input class="form-check-input ml-2" type="radio" name="<?php echo 'solution'.$counter; ?>" value="<?php echo $question['opt2']; ?>">
                        <label class="form-check-label pl-5"><?php echo $question['opt2']; ?></label>
                     </li>
                     <li>
                        <input class="form-check-input ml-2" type="radio" name="<?php echo 'solution'.$counter; ?>" value="<?php echo $question['opt3']; ?>">
                        <label class="form-check-label pl-5"><?php echo $question['opt3']; ?></label>

                     </li>
                     <li>
                        <input class="form-check-input ml-2" type="radio" name="<?php echo 'solution'.$counter; ?>" value="<?php echo $question['opt4']; ?>">
                        <label class="form-check-label pl-5"><?php echo $question['opt4']; ?></label>
                     </li>
                  </ul>
               </li>
            <?php }
         ?>
         <input type="hidden" name="counter" value=" <?php echo $counter; ?> ">
         <button type="submit" name="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
      </form>
   </ol>
</div>



         <div>
            <ol>
               <form class="form-group form-check" method="POST"> 
                  <?php 
                     $counter = 0;
                     foreach ($answers as $answer) { 
                        $counter++;
                        $counter = strval($counter);
                        ?>
                        <li class="">
                           <legend><?php echo $answer['question']; ?></legend>
                           <input class="form-check-input ml-2" type="hidden" name="<?php echo 'q_id'.$counter; ?>" value="<?php echo $question['q_id']; ?>">
                           <input class="form-check-input ml-2" type="hidden" name="<?php echo 'correct'.$counter; ?>" value="<?php echo $question['correct']; ?>">
                           <ul style="list-style: lower-alpha;">
                              <li>
                                 <input class="form-check-input ml-2" type="radio" name="<?php echo 'solution'.$counter; ?>" value="<?php echo $question['opt1']; ?>">
                                 <label class="form-check-label pl-5"><?php echo $answer['opt1']; ?></label>
                              </li>
                              <li>
                                 <input class="form-check-input ml-2" type="radio" name="<?php echo 'solution'.$counter; ?>" value="<?php echo $question['opt2']; ?>">
                                 <label class="form-check-label pl-5"><?php echo $answer['opt2']; ?></label>
                              </li>
                              <li>
                                 <input class="form-check-input ml-2" type="radio" name="<?php echo 'solution'.$counter; ?>" value="<?php echo $question['opt3']; ?>">
                                 <label class="form-check-label pl-5"><?php echo $answer['opt3']; ?></label>

                              </li>
                              <li>
                                 <input class="form-check-input ml-2" type="radio" name="<?php echo 'solution'.$counter; ?>" value="<?php echo $question['opt4']; ?>">
                                 <label class="form-check-label pl-5"><?php echo $answer['opt4']; ?></label>
                              </li>
                           </ul>
                        </li>
                     <?php }
                  ?>
                  <input type="hidden" name="counter" value=" <?php echo $counter; ?> ">
                  <button type="submit" name="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
               </form>
            </ol>
         </div>


         <?php
   if(!isset($_SESSION['user_logged'])){
      header('location:login');     
   }
?>

<section class="container pt-1">
   <div class="row mt-1">
      <div class="col-sm-8 pl-4 ml-2">
         <a class="btn btn-outline-info" href="view_course">View Course</a>
      </div>
   </div>

   <div class="mt-3 mb-3 col-md-8">
      <div class="border rounded mt-2 p-3">
         <form method="POST" action="">
            <div class="form-group row">
               <label class="col-sm-4 col-form-label">Course Level<span class="text-danger font-weight-bold">&nbsp;*</span></label>
               <div class="col-sm-8">
                  <input type="text" class="form-control" name="level" placeholder="eg. 4/5/6" required>
               </div>
            </div>

            <div class="form-group row">
               <label class="col-sm-4 col-form-label">Course Title<span class="text-danger font-weight-bold">&nbsp;*</span></label>
               <div class="col-sm-8">
                  <input type="text" class="form-control" name="title" placeholder="Course" required>
               </div>
            </div>

            <div class="form-group row">
               <label class="col-sm-4 col-form-label">Credit Weights<span class="text-danger font-weight-bold">&nbsp;*</span></label>
               <div class="col-sm-8">
                  <input type="text" class="form-control" name="credit" placeholder="Total Credits" required>
               </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-lg mt-3 mb-3">Add</button>
         </form>
      </div>
   </div>
</section>