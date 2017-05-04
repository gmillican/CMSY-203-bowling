<main>  <!-- player -->
     <link rel="stylesheet" type="text/css" href="../main.css">
    <?php include '../view/header.php'; ?>
    
     <section>
         <form method="post">
            <h4>Select Sort Order</h4>
            <select name="player_sort_order">
                <option value="last_name" selected>Last Name</option>
                <option value="first_name">First Name</option>
                <option value="sex">Sex</option>
                <option value="avg">Average</option>
                <option value="team_id">Team</option>
            </select>
            <input type="submit" value="Display Results"><br>
         </form>
         
         
        <?php $sortOrder = filter_input(INPUT_POST, 'player_sort_order'); ?>
        <?php $players = get_all_players_sorted($sortOrder); ?>
         
<!-- display a table of players-->   
     
     
       <br>
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
                <?php $team = get_team_name($player['team_id']); ?>
                <td><?php echo $team; ?></td> 
            </tr>
            <?php endforeach; ?>
        </table>
    <a href="../">Home</a> <br><br>
    </section> 
  
    <?php include '../view/footer.php'; ?>
</main>
