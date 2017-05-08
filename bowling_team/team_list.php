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
  
        <!-- display a table of teams -->
        <h2><?php echo $team_name; ?></h2>
		<table>
		<th>
		<label> <div class = "section1">Wins: </div><div class = "section2"><?php echo $team_wins; ?></div></label> 
		</th>
		<th>		
		<label><div class = "section">Losses: </div><div class = "section2"><?php echo $team_loss; ?></div></label> 
		</th>
		</table>
		<br>
		
	
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
        </br>
       <button > <div class = "button"><a href="../">Back1</a> <br></div></button>
        </section>
</main>
<?php include '../view/footer.php'; ?>