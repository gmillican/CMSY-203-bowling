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
		<li><a href = "?action=show_team_form">+NEW TEAM</a></li>
        </ul>
        </nav>
    </aside>

    <section>
        <!-- display a table of players -->
        <h2><?php echo $team_name; ?></h2>
		
		<label>Wins: <?php echo $team_wins; ?></label> 
		<form action="." method="post">
                    <input type="hidden" name="action"
                           value="add_win">
                    <input type="hidden" name="team_id"
                           value="<?php echo $team_id; ?>">
					<input type="hidden" name="wins"
                           value="<?php echo $team_wins + 1; ?>">   
                    <input type="submit" value="+">
        </form><br>
		
		<label>Losses: <?php echo $team_loss; ?></label> 
		<form action="." method="post">
                    <input type="hidden" name="action"
                           value="add_loss">
                    <input type="hidden" name="team_id"
                           value="<?php echo $team_id; ?>">
					<input type="hidden" name="loss"
                           value="<?php echo $team_loss + 1; ?>"> 
                    <input type="submit" value="+">
        </form><br>	
		<br>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Sex</th>
				<th>Average</th>
                <th>&nbsp;</th>
				<th>&nbsp;</th>
            </tr>
            <?php foreach ($players as $player) : ?>
            <tr>
                <td><?php echo $player['first_name']; ?></td>
                <td><?php echo $player['last_name']; ?></td>
                <td><?php echo $player['sex']; ?></td>
				<td><?php echo $player['avg']; ?></td>
				
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_player">
                    <input type="hidden" name="player_id"
                           value="<?php echo $player['player_id']; ?>">
                    <input type="hidden" name="team_id"
                           value="<?php echo $player['team_id']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
				
				<td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="player_id"
                           value="<?php echo $player['player_id']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="last_paragraph">
            <a href="?action=show_add_form">Add player</a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; ?>