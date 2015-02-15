<?php
global $smarty;

include ('../../config/config.inc.php');
include ('../../header.php');

$admanage = new admanage();
$message = $admanage -> l('Welcome to your own shop!');
$smarty -> assign('messageSmarty', $message);
// creation of our variable
$smarty -> assign('messageSmarty', "Welcome to my shop!");
if ($cookie->isLogged()) {
	$smarty -> display(dirname(__FILE__) . '/advertise_submit_form.tpl');
} 
else {
	$smarty -> display(dirname(__FILE__) . '/error_admanage_page.tpl');
}
include ('../../footer.php');
?>
