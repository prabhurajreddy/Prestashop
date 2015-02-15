<?php
global $smarty;
global $cookie;
define('_PS_ADMIN_DIR_', getcwd());
include(_PS_ADMIN_DIR_.'/../../config/config.inc.php');
include ('../../header.php');

$adname = $_POST['adname'];
$username = $cookie->email;
$adurl = $_POST['adurl'];

$budget = $_POST['budgetvalue'];

$category = $_POST['category'];
$timing=$_POST['timing'];
if (isset($_POST['loggeduserpref'])) {
	$loggeduserpref = 1;
}
else{
	$loggeduserpref = 0;
}
$flag = 1;
//print $loggeduserpref; 
$smarty -> assign('mymodule_SuccessMessage', "Congratulations your advertisement is successfully submitted!!!!");
$smarty -> assign('mymodule_ErrorMessage', "Request unsuccess");

if ( Db::getInstance()->Execute('insert into '._DB_PREFIX_.'advertisements(`username`,`adname`,`adurl`,`package`,`timing`,`category`,`loggeduserprefered`,`adactive`) VALUES ("'.$username.'","'.$adname.'","'.$adurl.'",1,'.$timing.','.$category.','.$loggeduserpref.','.$flag.')'))
{
	$smarty -> display(dirname(__FILE__) . '/successPage.tpl');
}
else 
{
	$smarty -> display(dirname(__FILE__) . '/failurePage.tpl');
} 

// getting the id of last added advertisement 
$rows = Db::getInstance()->ExecuteS('select * from ps_advertisements where username="'.$username.'" and adurl="'.$adurl.'"');
foreach ($rows as $row)
	$adeid = $row['adeid'];

// Adding the entry into advertisement stat table 

if(!Db::getInstance()->Execute('insert into '._DB_PREFIX_.'advertisestats(`adeid`,`budget_available`,`num_views`,`num_clicks`) 
values('.$adeid.','.$budget.',0,0)'))
{
	
}
include ('../../footer.php');
?>