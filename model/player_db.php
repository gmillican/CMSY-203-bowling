<?php
function get_players_by_team($team_id) {
    global $db;
    $query = 'SELECT * FROM players
              WHERE players.team_id = :team_id
              ORDER BY player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":team_id", $team_id);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}

function get_player($player_id) {
    global $db;
    $query = 'SELECT * FROM players
              WHERE player_id = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":player_id", $player_id);
    $statement->execute();
    $player = $statement->fetch();
    $statement->closeCursor();
    return $player;
}



function delete_player($player_id) {
    global $db;
    $query = 'DELETE FROM players
              WHERE player_id = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_player($team_id, $first_name, $last_name, $sex, $avg) {
    global $db;
    $query = 'INSERT INTO players
                 (team_id, first_name, last_name, sex, avg)
              VALUES
                 (:team_id, :first_name, :last_name, :sex, :avg)';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':sex', $sex);
	$statement->bindValue(':avg', $avg);
    $statement->execute();
    $statement->closeCursor();
}

function edit_player($player_id, $team_id, $first_name, $last_name, $sex, $avg) {
    global $db;
    $query = 'UPDATE players 
              SET team_id = :team_id,
			  first_name = :first_name,
			  last_name = :last_name,
			  sex = :sex
			  avg = :avg
			  WHERE player_id = :player_id';
    $statement = $db->prepare($query);
	$statement->bindValue(':player_id', $player_id);
    $statement->bindValue(':team_id', $team_id);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':sex', $sex);
	$statement->bindValue(':avg', $avg);
    $statement->execute();
    $statement->closeCursor();
}
?>