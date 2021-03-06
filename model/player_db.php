<?php
function get_players_by_team($team_id) {
	//used in list_players to get the current list of players
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
	//gets all information on a player, for use in the edit player form
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

function get_all_players_sorted($sortOrder) {
    /* handles all sorts on player page except team name sort */
    global $db;
    $query = 'SELECT * FROM players ORDER BY ' . $sortOrder;
    $statement = $db->prepare($query);
   
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}

function get_all_players_sorted_by_team() {
    /* only used for player sort page sorted by team name */
    global $db;
    $query = 'SELECT first_name, last_name, sex, avg, players.team_id, teams.team_name FROM players
        INNER JOIN teams ON players.team_id = teams.team_id ORDER BY teams.team_name';
    $statement = $db->prepare($query);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}


function delete_player($player_id) {
	//used both for individual deletion and deletion of all players on a team 
	//when deleting the entire team
    global $db;
    $query = 'DELETE FROM players
              WHERE player_id = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_player($team_id, $first_name, $last_name, $sex, $avg) {
	//takes all relevant data, adds new player, data is validated before function call
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
	//similar to add_player, requires the player_id so that it can update rather than insert
    global $db;
    $query = 'UPDATE players 
              SET team_id = :team_id,
			  first_name = :first_name,
			  last_name = :last_name,
			  sex = :sex,
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

function get_first_player_id() {
    /* used to replace NULL where player id is needed in case first player was deleted */
    global $db;
    $query = 'SELECT player_id FROM players
              ORDER BY player_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $player = $statement->fetch();
    $statement->closeCursor();
    return $player[0];
}
?>