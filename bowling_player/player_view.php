 <!-- player -->
<?php include '../view/header.php'; 
$player_info = get_player($player_id);
?> 
<main>
    <link rel="stylesheet" type="text/css" href="../main.css">
    
    <h2>Player Information</h2>
    <p> First Name: <?php echo $player_info['first_name']; ?></p>
    <p> Last Name:  <?php echo $player_info['last_name']; ?></p>
    <p> Sex: <?php echo $player_info['sex']; ?></p>
    <p> Average: <?php echo $player_info['avg']; ?></p>
    <p>
    <a href="../">Home</a><nbsp><nbsp><nbsp><nbsp><nbsp><nbsp>
    <a href="?action=list_players&amp;team_id=<?php echo $player_info['team_id']; ?>">
        Back</a> </p>
    
  
</main>
<?php include '../view/footer.php'; ?>