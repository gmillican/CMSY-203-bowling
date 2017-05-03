<?php include '../view/header.php'; ?>
<main>
    <h1>Player List</h1>

    <aside>
        <!-- display a list of teams -->
        <h2>Teams</h2>
        <nav>
        <ul>
        <?php foreach ($teams as $team) : ?>
            <li>
            <a href="?team_id=<?php echo $team['team_id']; ?>">
                <?php echo $team['team_name']; ?>
            </a>
            </li>
        <?php endforeach; ?>
        </ul>
        </nav>
    </aside>

    <section>
    
    
 Sorted by
<select name="card_type">
<option value="visa" selected>Win</option>
<option value="mastercard">Lost</option>
<option value="discover">Team Name</option>
<option value="discover">Team ID</option>

</select>
    
        <!-- display a table of teams -->
        <h2><?php echo $team_name; ?></h2>
		<table>
		<th>
		<label>Wins: <?php echo $team_wins; ?></label> 
		<br>
		</th>
		<th>		
		<label>Losses: <?php echo $team_loss; ?></label> </th>
		</table>
		
	
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Sex</th>
				<th>Average</th>
                
            </tr>
            <?php foreach ($players as $player) : ?>
            <tr>
                <td><?php echo $player['first_name'];?></td>
                <td><?php echo $player['last_name'];?></td>
                <td><?php echo $player['sex']; ?></td>
				<td><?php echo $player['avg']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>
<?php include '../view/footer.php'; ?>