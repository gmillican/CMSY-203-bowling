 <!-- team -->
<?php include '../view/header.php'; 
$team_info = get_teams();
?> 
<main>
    <link rel="stylesheet" type="text/css" href="../main.css">
    
    <h2>Player Information</h2>
    <p> Team ID: <?php echo $player_info['team_id']; ?></p>
    <p> Team Name:  <?php echo $player_info['team_name']; ?></p>
    <p> Win: <?php echo $player_info['won']; ?></p>
    <p> Lost: <?php echo $player_info['lost']; ?></p>
    
  
</main>
<?php include '../view/footer.php'; ?>


