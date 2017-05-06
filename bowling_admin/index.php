<?php   //admin
require('../model/database.php');
require('../model/player_db.php');
require('../model/team_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_players';
    }
}

if ($action == 'list_players') {
    $team_id = filter_input(INPUT_GET, 'team_id', 
            FILTER_VALIDATE_INT);
			
    if ($team_id == NULL || $team_id == FALSE) {
        $team_id = get_first_team_id();
    }
	
	if($team_id == null || $team_id == FALSE){
		include('empty_list.php');
	}else{
		$team_name = get_team_name($team_id);
		$team_wins = get_team_wins($team_id);
		$team_loss = get_team_lost($team_id);
		$teams = get_teams();
		$players = get_players_by_team($team_id);
		include('player_list.php');
	}
} else if ($action == 'delete_player') {
    $player_id = filter_input(INPUT_POST, 'player_id', 
            FILTER_VALIDATE_INT);
    $team_id = filter_input(INPUT_POST, 'team_id', 
            FILTER_VALIDATE_INT);
    if ($team_id == NULL || $team_id == FALSE ||
            $player_id == NULL || $player_id == FALSE) {
        $error = "Missing or incorrect player id or team id.";
        include('../errors/error.php');
    } else { 
        delete_player($player_id);
        header("Location: .?team_id=$team_id");
    }
} else if ($action == 'show_add_form') {
    $teams = get_teams();
    include('player_add.php');    
} else if ($action == 'add_player') {
    $team_id = filter_input(INPUT_POST, 'team_id', 
            FILTER_VALIDATE_INT);
    $first_name = filter_input(INPUT_POST, 'fName');
    $last_name = filter_input(INPUT_POST, 'lName');
    $sex = filter_input(INPUT_POST, 'sex');
    $avg = filter_input(INPUT_POST, 'avg', FILTER_VALIDATE_INT);
	
    if ($team_id == NULL || $team_id == FALSE || $first_name == NULL || 
            $last_name == NULL || $sex == NULL || strlen($sex) > 1 || $avg == NULL || $avg == false) {
        $error = "Invalid player data. Check all fields and try again.";
		$return_url = "?action=show_add_form";
        include('../errors/recoverable_error.php');
    } else { 
        add_player($team_id, $first_name, $last_name, $sex, $avg);
        header("Location: .?team_id=$team_id");
    }
} else if($action == 'edit_player'){
	$player_id = filter_input(INPUT_POST, 'player_id',FILTER_VALIDATE_INT);
	$team_id = filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);
    $first_name = filter_input(INPUT_POST, 'fName');
    $last_name = filter_input(INPUT_POST, 'lName');
    $sex = filter_input(INPUT_POST, 'sex');
	$avg = filter_input(INPUT_POST, 'avg', FILTER_VALIDATE_INT);
	
    if ($player_id == NULL || $player_id == false || $team_id == NULL || $team_id == FALSE || $first_name == NULL || 
            $last_name == NULL || $sex == NULL || strlen($sex) > 1 || $avg == NULL || $avg == false) {
        $error = "Invalid player data. Check all fields and try again.";
        $return_url = "?team_id=$team_id";
        include('../errors/recoverable_error.php');
    } else { 
        edit_player($player_id, $team_id, $first_name, $last_name, $sex, $avg);
        header("Location: .?team_id=$team_id");
    }
	
} else if ($action == 'show_edit_form'){
	$player_id = filter_input(INPUT_POST, 'player_id', 
            FILTER_VALIDATE_INT);
	if($player_id == NULL || $player_id == false){
		$error = "Missing or incorrect player id.";
        include('../errors/error.php');
	}
	else{
		$teams = get_teams();
		include('player_edit.php');
	}
} else if($action == 'change_loss'){
	$team_id = filter_input(INPUT_POST, 'team_id', 
            FILTER_VALIDATE_INT);
	$loss = filter_input(INPUT_POST, 'loss', 
            FILTER_VALIDATE_INT);
	if($team_id == NULL || $team_id == false || $loss == NULL || $loss == false){
		$error = "Invalid team data. Please try again.";
        include('../errors/error.php');
	}else{
		change_loss($team_id, $loss);
		header("Location: .?team_id=$team_id");
	}
} else if ($action == 'change_win'){
	$team_id = filter_input(INPUT_POST, 'team_id', 
            FILTER_VALIDATE_INT);
	$wins = filter_input(INPUT_POST, 'wins', 
            FILTER_VALIDATE_INT);
	if($team_id == NULL || $team_id == false || $wins == NULL || $wins == false){
		$error = "Invalid team data. Please try again.";
        include('../errors/error.php');
	}else{
		change_win($team_id, $wins);
		header("Location: .?team_id=$team_id");
	}
}else if($action == 'show_team_form'){
	include('team_add.php');
}else if($action == 'add_team'){
	$team_name = filter_input(INPUT_POST, 'Name');
	if($team_name == NULL){
		$error = "Invalid team data. Please try again.";
		$return_url = "?action=show_team_form";
        include('../errors/recoverable_error.php');
	}else{
		$team_id = add_team($team_name);
		header("Location: .?team_id=$team_id");
	}
}
else if($action == "delete_team"){
	$team_id = filter_input(INPUT_POST, 'team_id', 
            FILTER_VALIDATE_INT);
	if($team_id == NULL || $team_id == false){
		$error = "Invalid team data. Please try again.";
        include('../errors/error.php');
	}else{
		delete_team($team_id);
		$team_id = get_first_team_id();
		header("Location: .?team_id=$team_id");
	}
}



?>