<?php include '../view/header.php'; ?>
 <link rel="stylesheet" type="text/css" href="main.css"> 
<main>
    <h1>Add Team</h1>
    <form action="index.php" method="post" id="add_team_form">
        <input type="hidden" name="action" value="add_team">

        <label>Team Name:</label>
        <input type="text" name="Name" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Team" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_players">Back to Player List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>