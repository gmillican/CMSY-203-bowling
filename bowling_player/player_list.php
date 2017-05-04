<main>  <!-- player -->
     <link rel="stylesheet" type="text/css" href="../main.css">
    <?php include '../view/header.php'; ?>
    
     <section>
         <form method="post">   <!-- drop down to select sort order -->
            <h4>Select Sort Order</h4>
            <select name="player_sort_order">
                <option value="last_name">Last Name</option>
                <option value="first_name">First Name</option>
                <option value="sex">Sex</option>
                <option value="avg">Average</option>
                <option value="team_name">Team</option>
            </select>
            <input type="submit" value="Display Results">
         </form>
         
         
        <?php $sortOrder = filter_input(INPUT_POST, "player_sort_order");
            if ($sortOrder === NULL) {  //default to last name sort
                $sortOrder = "last_name";
                $sortName = 'Last Name';
                $players = get_all_players_sorted($sortOrder);
            }
            else if ($sortOrder === "team_name"){
                //handle team name sort with different function because join is needed in query
                $players = get_all_players_sorted_by_team();
                $sortName = "Team";
            }
            else {
                $players = get_all_players_sorted($sortOrder);
                /* setting friendly sort order name for display */
                switch ($sortOrder) {
                    case 'last_name' :
                        $sortName = 'Last Name';
                        break;
                    case 'first_name' :
                        $sortName = 'First Name';
                        break;
                    case 'sex' :
                        $sortName = 'Sex';
                        break;
                    case 'avg' :
                        $sortName = 'Average';
                        break;
                }   
                    
            }
        ?>
         
<!-- display a table of players-->   

       <h4>Sorted by: <?php echo $sortName; ?></h4>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Sex</th>
		<th>Average</th>
                <th>Team</th>
            </tr>
           
            <?php foreach ($players as $player) : ?>
            <tr>
                <td><?php echo $player['first_name']; ?></td>
                <td><?php echo $player['last_name']; ?></td>
                <td><?php echo $player['sex']; ?></td>
                <td><?php echo $player['avg']; ?></td>
                <!-- already have team name in $player array if sorting by team -->
                <?php if ($sortOrder === "team_name") {
                         $team = $player['team_name'];
                    }
                    else {
                         $team = get_team_name($player['team_id']); 
                    }
                ?>
                
                <td><?php echo $team; ?></td> 
            </tr>
            <?php endforeach; ?>
        </table>
    <a href="../">Home</a> <br><br>
    </section> 
  
    <?php include '../view/footer.php'; ?>
</main>
