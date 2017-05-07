<?php include '../view/header.php'; ?>
 <link rel="stylesheet" type="text/css" href="main.css"> 
<main>
    <h1>Add player</h1>
    <form action="index.php" method="post" id="add_player_form">
        <input type="hidden" name="action" value="add_player">

        <label>Team:</label>
        <select name="team_id">
        <?php foreach ( $teams as $team ) : ?>
            <option value="<?php echo $team['team_id']; ?>">
                <?php echo $team['team_name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>First Name:</label>
        <input type="text" name="fName" />
        <br>

        <label>Last Name:</label>
        <input type="text" name="lName" />
        <br>

        <label>Sex:</label>
        <select name="sex">
			<option value = "M">M</option>
			<option value = "F">F</option>
		</select>
        <br>
		
		<label>Average Score:</label>
        <input type="text" name="avg" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add player" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_players">Back to Player List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>