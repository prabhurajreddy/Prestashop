<?php
global $smarty;
global $cookie;
define('_PS_ADMIN_DIR_', getcwd());
include(_PS_ADMIN_DIR_.'/../../config/config.inc.php');
include ('../../header.php');
$username = $cookie->email;
//print $username;
if($cookie->isLogged())
{
	print "<h4>Advertisement statistics<h4>";
	print "<br>";
	$rows = Db::getInstance()->ExecuteS('select `adeid`,`adname` from '._DB_PREFIX_.'advertisements where username="'.$username.'"');
	foreach($rows as $row)
	{
		print "Advertisement Name : ";
		print $row['adname'];
		print "<br>";
		$ads = Db::getInstance()->ExecuteS('select * from '._DB_PREFIX_.'advertisestats where adeid="'.$row['adeid'].'"');
		$visitors = Db::getInstance()->ExecuteS('select `adeid` from '._DB_PREFIX_.'advertiseviewedusers where adeid="'.$row['adeid'].'"');
		$visitor_count = count($visitors);
		print "Number of views : ";
		print $ads[0]['num_views'];
		print "<br>";
		print "Number of clicks : ";
		print $ads[0]['num_clicks'];
		print "<br>";
		print "Number of seperate views : ";
		print $visitor_count;
		print "<br><br>";
	}
}
else
{
	print "Please Login to see the stats";
}
include ('../../footer.php');
?>