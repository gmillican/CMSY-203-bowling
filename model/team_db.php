<?php
function get_teams() {
    global $db;
    $query = 'SELECT * FROM teams
              ORDER BY team_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_team_wins($team_id) {
    global $db;
    $query = 'SELECT * FROM teams
              WHERE team_id = :team_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->execute();    
    $team = $statement->fetch();
    $statement->closeCursor();    
    $team_name = $team['won'];
    return $team_name;
}

function get_team_lost($team_id) {
     global $db;
    $query = 'SELECT * FROM teams
              WHERE team_id = :team_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->execute();    
    $team = $statement->fetch();
    $statement->closeCursor();    
    $team_name = $team['lost'];
    return $team_name;
}

function get_team_name($team_id) {
    global $db;
    $query = 'SELECT * FROM teams
              WHERE team_id = :team_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->execute();    
    $team = $statement->fetch();
    $statement->closeCursor();    
    $team_name = $team['team_name'];
    return $team_name;
}

function delete_team($team_id){
	global $db;
	$players = get_players_by_team($team_id);
	foreach($players as $player){
		delete_player($player["player_id"]);
	}
	
    $query = 'DELETE FROM teams
              WHERE team_id = :team_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_team($team_name){
	
}

function add_win($team_id, $wins){
	global $db;
    $query = 'UPDATE teams 
              SET won = :wins,
			  WHERE team_id = :team_id';
    $statement = $db->prepare($query);
	$statement->bindValue(':team_id', $team_id);
    $statement->bindValue(':wins', $wins);
    $statement->execute();
    $statement->closeCursor();
}

function add_loss($team_id, $loss){
	function add_win($team_id, $wins){
	global $db;
    $query = 'UPDATE teams 
              SET lost = :loss,
			  WHERE team_id = :team_id';
    $statement = $db->prepare($query);
	$statement->bindValue(':team_id', $team_id);
    $statement->bindValue(':loss', $loss);
    $statement->execute();
    $statement->closeCursor();
}
}
?>