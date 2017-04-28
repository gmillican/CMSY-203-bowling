<main>  <!-- player -->
     <link rel="stylesheet" type="text/css" href="../main.css">
    <?php include '../view/header.php'; ?>
    <aside>
        <h1>Team</h1>
        <nav>
        <ul>
            <!-- display links for all teams -->
            <?php foreach($teams as $team) : ?>
            <li>
                <a href="?action=list_players&amp;team_id=<?php echo $team['team_id']; ?>">
                    <?php echo $team['team_name']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>
    </aside>
    
     
   
    <section>
 
<!-- display a table of players-->   
        
        <h1><?php echo $team_name; ?><h2>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Sex</th>
		<th>Average</th>
            </tr>
            <?php foreach ($players as $player) : ?>
            <tr>
                <td><?php echo $player['first_name']; ?></td>
                <td><a href="?action=view_player&amp;player_id=<?php 
                          echo $player['player_id']; ?>" >
                    <?php echo $player['last_name']; ?> </a> </td>
                
                <td><?php echo $player['sex']; ?></td>
		<td><?php echo $player['avg']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
   
    </section> 
  
    <?php include '../view/footer.php'; ?>
</main>
