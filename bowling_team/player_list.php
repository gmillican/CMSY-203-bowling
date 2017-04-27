<?php include '../view/header.php'; ?>
<!--another change-->
<main>
    <aside>
        <h1>Team View</h1>
        <nav>
        <ul>
            <!-- display links for all team -->
            <?php foreach($team as $category) : ?>
            <li>
                <a href="?category_id=<?php echo $category['team_id']; ?>">
                    <?php echo $category['team_name']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>
    </aside>
    <section>
        <h1><?php echo $category_name; ?></h1>
        <nav>
        <ul>
            <!-- display links for playerss in selected category -->
            <?php foreach ($playerss as $players) : ?>
            <li>
                <a href="?action=view_players&amp;players_id=<?php 
                          echo $players['team_id']; ?>">
                    <?php echo $players['first_name']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>
    </section>
</main>
<?php include '../view/footer.php'; ?>