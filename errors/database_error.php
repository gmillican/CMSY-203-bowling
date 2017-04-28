<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Bowling</title>
    <link rel="stylesheet" type="text/css" href="../main.css" />
</head>

<!-- the body section -->
<body>
    <header><h1>Bowling</h1></header>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the project database.</p>
        <p>The database must be installed correctly.</p>
        <p>MySQL must be running..</p>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Bowling database.</p>
    </footer>
</body>
</html>