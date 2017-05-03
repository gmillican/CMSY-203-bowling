<?php   //player
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
        $teams = get_teams();
        $team_name = get_team_name($team_id);
        $players = get_players_by_team($team_id);
        include('player_list.php');
        
    }
    else if ($action == 'view_player') {
        $player_id = filter_input(INPUT_GET, 'player_id', 
        FILTER_VALIDATE_INT);
        
        if ($player_id == NULL || $player_id == FALSE) {
            $player_id = get_first_player_id();
           // $error = 'Missing or incorrget_first_player_id()ect player id.';
           // include('../errors/error.php');
        }
        include('player_view.php');
         
    } 
    
       
?>