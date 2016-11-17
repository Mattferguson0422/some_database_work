<?php
	// Call Database
    global $db;
    
    include("functions.php");

    // Internal Function to get the current user's group;
    $groupID = bp_get_group_id();
	
    $skills = $db->get_results("SELECT * FROM skills WHERE group_id = $groupID");
    
    foreach($skills as $skill) {
	    $finance = $skill->financial;
	    $flex = $skill->flexibility;
	    $initiative = $skill->initiative;
	    $teamwork = $skill->teamwork;
	    $responsibility = $skill->responsibility;
		$id = $skill->ID;
    }
?>

<!-- form used to add skills via radio buttons or modify if skills already exists -->
<form method="post" action="">
	<section>
		<h5>Financial</h5>
		<div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<fieldset id="ions">
				<?php 
					for($n=1; $n<=5; $n++) {
						if($n == $finance) {
							$checked = "checked";
						} else {
							$checked = "";
						}
						
						echo "<input type='radio' name='skill_q1' value='" . $n . "' " . $checked . "> $n";
					}
				?>
			</fieldset>
		</div>
	</section>
	<section>
		<h5>Flexibility</h5>
		<div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<fieldset>
				<?php 
					for($n=1; $n<=5; $n++) {
						if($n == $flex) {
							$checked = "checked";
						} else {
							$checked = "";
						}
						
						echo "<input type='radio' name='skill_q2' value='" . $n . "' " . $checked . "> $n";
					}
				?>
			</fieldset>
		</div>
	</section>

	<section>
		<h5>Initiative</h5>
		<div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<fieldset>
				<?php 
					for($n=1; $n<=5; $n++) {
						if($n == $initiative) {
							$checked = "checked";
						} else {
							$checked = "";
						}
						
						echo "<input type='radio' name='skill_q3' value='" . $n . "' " . $checked . "> $n";
					}
				?>
			</fieldset>
		</div>
	</section>

	<section>
		<h5>Teamwork</h5>
		<div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<fieldset>
				<?php 
					for($n=1; $n<=5; $n++) {
						if($n == $teamwork1) {
							$checked = "checked";
						} else {
							$checked = "";
						}
						
						echo "<input type='radio' name='skill_q4' value='" . $n . "' " . $checked . "> $n";
					}
				?>
			</fieldset>
		</div>
	</section>

	<section>
		<h5>Responsibility</h5>
		<div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<fieldset>
				<?php 
					for($n=1; $n<=5; $n++) {
						if($n == $responsibility) {
							$checked = "checked";
						} else {
							$checked = "";
						}
						
						echo "<input type='radio' name='skill_q5' value='" . $n . "' " . $checked . "> $n";
					}
				?>
			</fieldset>
		</div>
	</section>

	<input type="hidden" name="modify_skill_by_id" value="<?php echo $id ?>">
	<input type="hidden" name="skill_by_group_id" value="<?php echo $groupID ?>">

	<div class="savedGoalButtons">
		<a href="#" id="editCC" class="edit-skills">Edit</a>
		<button class="hide" type="submit">Save</button>
		<a href="" class="hide edit-skills">Cancel</a>
	</div>
</form>