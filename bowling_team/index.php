<?php   //team
require('../model/database.php');
require('../model/players_db.php');
require('../model/category_db.php');



//Testing Github changes



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'team_name';
    }
}  

if ($action == 'team_name') {
    $category_id = filter_input(INPUT_GET, 'team_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $team = get_team();
    $category_name = get_category_name($category_id);
    $playerss = get_playerss_by_category($category_id);
    include('player_list.php');
} else if ($action == 'view_players') {
    $players_id = filter_input(INPUT_GET, 'players_id', 
            FILTER_VALIDATE_INT);   
    if ($players_id == NULL || $players_id == FALSE) {
        $error = 'Missing or incorrect players id.';
        include('../errors/error.php');
    } else {
        $team = get_team();
        $players = get_players($players_id);

        // Get players data
        $code = $players['team_id'];
        $name = $players['player_name'];
        $list_price = $players['listPrice'];

        // Calculate discounts
        $discount_percent = 30;  // 30% off for all web orders
        $discount_amount = round($list_price * ($discount_percent/100.0), 2);
        $unit_price = $list_price - $discount_amount;

        // Format the calculations
        $discount_amount_f = number_format($discount_amount, 2);
        $unit_price_f = number_format($unit_price, 2);

        // Get image URL and alternate text
        $image_filename = '../images/' . $code . '.png';
        $image_alt = 'Image: ' . $code . '.png';

        include('player_view.php');
    }
}
?>