<?php include '../view/header.php'; ?>
<main>
    <h1>Error</h1>
    <p class="first_paragraph"><?php echo $error; ?></p><br>
	<a href = <?php echo('"' . $return_url . '"');?>>Back</a>
</main>
<?php include '../view/footer.php'; ?>