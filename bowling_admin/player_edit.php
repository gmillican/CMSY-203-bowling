<?php 
include '../view/header.php'; 
?>
 <link rel="stylesheet" type="text/css" href="main.css"> 
<main>
    <h1>Edit player</h1>
    <form action="index.php" method="post" id="edit_player_form">
        <input type="hidden" name="action" value="edit_player">
		<input type="hidden" name="player_id"
			value="<?php echo $player_info['player_id']; ?>">

		
        <label>Team:</label>
        <select name="team_id">
        <?php foreach ( $teams as $team ) : ?>
            <option value="<?php echo $team['team_id']; ?>" 
				<?php if($team['team_id'] == $player_info['team_id']){
					echo 'selected="selected"';
				}?> 
			>
                <?php echo $team['team_name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>First Name:</label>
        <input type="text" name="fName" value = "<?php echo $player_info['first_name']; ?>"/>
        <br>

        <label>Last Name:</label>
        <input type="text" name="lName" value = "<?php echo $player_info['last_name']; ?>"/>
        <br>

        <label>Sex:</label>
        <select name="sex">
			<option value = "M"
				<?php if('M' == $player_info['sex']){
					echo 'selected="selected"';
				}?>
			>M</option>
			<option value = "F"
				<?php if('F' == $player_info['sex']){
					echo 'selected="selected"';
				}?>
			>F</option>
		</select>
        <br>
		
		<label>Average Score:</label>
        <input type="text" name="avg" value = "<?php echo $player_info['avg']; ?>"/>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Edit player" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_players">Back to Player List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>