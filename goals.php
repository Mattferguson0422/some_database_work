<?php
	// Call Database
    global $db;
    
    include("functions.php");

    // Internal Function to get the current user's group;
    $groupID = bp_get_group_id();

    $goals = $db->get_results("SELECT * FROM goals WHERE group_id = $groupID");

    
    // Show current goals and provide forms to update
    echo "<ul class='savedGoals'>";
    
    foreach($goals as $goal){
        	
        echo "<li class='goal' id='record-".$goal->ID."'>";
        
        // Form used to Modify a Goal
        echo "<form method='post' action=''>";
        echo "<label for='goal_name' class='title'>" . $goal->goal_name . "</label>";
        echo "<input type='text' value='" . $goal->goal_name . "' name='goal_name'>";
        echo "<label for='goal_description' >" . $goal->goal_description . "</label>";
        echo "<textarea name='modify_goal_description'>" . $goal->goal_description . "</textarea>";
        echo "<input type='hidden' name='modify_goal_by_id' value='" . $goal->ID ."'>";

        // JS used here to make the textarea editable
        echo "<span class='edit'>Edit</span>";

        echo "<button type='submit' class='save hide'>Save</button>";
        echo "</form>";
        
        // Form for Deleting a Goal
        echo "<form method='post' action='' id='deleteGoalForm'>";
        echo "<input type='hidden' name='remove_goal_by_id' value='" .$goal->ID."'>";
        echo "<button type='submit' class='delete'>Delete</button>";
        echo "</form>";
        
        echo "</li>";       
    }

    echo "</ul>";

?>

<!-- Form used to submit new goal --> 
<form method="post" action="" id="newGoalForm">
                                                       
    <label for="goal_name">Goal Name:</label>
    <input name="insert_goal_name" type="text">
                                              
    <label for="goal_description">Goal Description:</label>
    <textarea name="insert_goal_description"></textarea>
    
    <input type="hidden" value="<?php echo $groupID ?>" name="insert_group_id" id="group_id">
    
    <input type="submit" value="Add New">
</form>