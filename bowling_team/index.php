




<?php   //player
require('../model/database.php');
require('../model/player_db.php');
require('../model/team_db.php');



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_teams';
    }
}  

if ($action == 'list_teams') {
    $team_id = filter_input(INPUT_GET, 'team_id', 
            FILTER_VALIDATE_INT);
    if ($team_id == NULL || $team_id == FALSE) {
        $team_id = 1;
    }
    	//$team_win = get_team_wins($team_id)
        $teams = get_teams();
        $players = get_players_by_team($team_id);
        $team_wins = get_team_wins($team_id);
        $team_loss = get_team_lost($team_id);
        $team_name = get_team_name($team_id);
        include('team_list.php');
        
    }
    else if ($action == 'view_team') {
        $player_id = filter_input(INPUT_GET, 'team_id', 
        FILTER_VALIDATE_INT);
        
        if ($player_id == NULL || $player_id == FALSE) {
            $player_id = 1;
           // $error = 'Missing or incorrect player id.';
           // include('../errors/error.php');
        }
        include('team_view.php');
        
        
    } 
    
?>

 