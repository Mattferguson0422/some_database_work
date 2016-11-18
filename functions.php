<?php

function addGoal(){
	
	global $db;
	
	$goal_name = $_POST['insert_goal_name'];
	$goal_description = $_POST['insert_goal_description'];
	$group_id = $_POST['insert_group_id'];
	
	if(isset($goal_name)) {
	
		$db->insert('goals',array(
			'goal_name'=>$goal_name,
			'goal_description'=>$goal_description,
			'group_id'=>$group_id
		));
	}
}

function removeGoal($id) {
	global $db;
	$id = $_POST['remove_goal_by_id'];
	
	if(isset($id)) {
		$db->delete('goals', array(ID => $id));
	}
}

function modifyGoal() {
	global $db;
	
	$id = $_POST['modify_goal_by_id'];
	$description = $_POST['modify_goal_description'];
	
	if(isset($id)) {
		$db->update('goals', array('goal_description' => $description),  array(ID => $id));
	}
}

function modifySkill() {
	global $db;

	$id = $_POST['modify_skill_by_id'];
	$finance = $_POST['skill_q1'];
    $flex = $_POST['skill_q2'];
    $initiative = $_POST['skill_q3'];
    $teamwork = $_POST['skill_q4'];
    $responsibility = $_POST['skill_q5'];
	$group_id = $_POST['skill_by_group_id'];
	
	// if there is already a record
	if(isset($id)) {
		$db->update('skilletencies', array(
			'financial' => $finance,
			'flexibility' => $flex,
			'initiative' => $initiative,
			'teamwork' => $teamwork,
			'responsibility' => $responsibility,
			'group_id' => $group_id
		), array(ID => $id));	
	}  
	
	// If no skills have been set yet and testing a random column to ensure it's filled out.
	if(empty($id) && $flex != NULL){
		$db->insert('skilletencies', array(
			'financial' => $finance,
			'flexibility' => $flex,
			'initiative' => $initiative,
			'teamwork' => $teamwork,
			'responsibility' => $responsibility,
			'group_id' => $group_id
		));
	}
}