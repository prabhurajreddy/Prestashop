<?php
if (!defined('_PS_VERSION_'))
  exit;
//define('_PS_DEBUG_SQL_', true)
 
class admanage extends Module
  {
  public function __construct()
    {
    $this->name = 'admanage';
    $this->tab = 'Products';
    $this->version = 1.0;
    $this->author = 'Prabhu';
    $this->need_instance = 0;
 
    parent::__construct();
 
    $this->displayName = $this->l('Ad Manage');
    $this->description = $this->l('Advertisement portal');
    }
 
  public function install()
    {
      if (!$this->create_database())
        return false;
	  	      
      if (parent::install() == false OR !$this->registerHook('leftColumn')){}
        return false;
      return true;
    }
  public function uninstall()
    {
      if (!Db::getInstance()->Execute('DROP TABLE `'._DB_PREFIX_.'advertisements`'))
      {
	  	  return false;	
	    }
      if (!Db::getInstance()->Execute('DROP TABLE `'._DB_PREFIX_.'advertisestats`'))
      {
        return false; 
      } 
      if (!Db::getInstance()->Execute('DROP TABLE `'._DB_PREFIX_.'advertiseviewedusers`'))
      {
        return false; 
      } 
      if (!parent::uninstall())
        Db::getInstance()->Execute('DELETE FROM `'._DB_PREFIX_.'admanage`');
      parent::uninstall();
    }
  public function hookLeftColumn( $params )
    { 
      $this->admanage_updatedb();
      $this->admanage_setadurl();
      return $this->display(__FILE__,'admanage.tpl');
    }
 
  public function hookRightColumn($params)
    {
      return $this->hookLeftColumn($params);
    }
  private function admanage_setadurl()
    {
      global $smarty;
      $req_parameters=$_SERVER['QUERY_STRING'];
      $timing_category=$this->gettiming_category();
      $category_flag=false;
      $category=0;
      if (strpos($req_parameters,'id_category') !== false) {
          $category_flag=true;
          $category = preg_replace('/\D/', '', $req_parameters);
      }
      global $cookie;
      $index=-1;
      global $select_adeurl;
      global $admanage_ads;
      //global $select_adeid;
      $rows = Db::getInstance()->ExecuteS('select * from '._DB_PREFIX_.'advertisements where adactive=1');
      foreach($rows as $row)
      {
        // Condition to check the preference of the advertiser
        if((($row['loggeduserprefered']==0) || ($row['loggeduserprefered']==1) && $cookie->isLogged()) &&
          ($row['category']==0 ||($category_flag && $row['category']==$category)) &&
          ($row['timing']==0 || ($row['timing']==$timing_category)))
        {
          $index+=1;
          $admanage_ads[$index]=$row['adeid'];
        }
      }
      $adid = rand(0,count($admanage_ads)-1);
      foreach($rows as $row){
        if($row['adeid']== $admanage_ads[$adid]){
          $select_adeurl=$row['adurl'];
        }    
      }
      if ($select_adeurl)
      {  
        $smarty -> assign ('admanage_advertise_url',$select_adeurl);
        $this->admanage_updateadstats($admanage_ads[$adid]);
      }
      else
      {
        $smarty -> assign ('admanage_advertise_url',"https://192.168.1.20/prestashop/modules/admanage/Advertisements/ads_default.html");
      } 

    }
    private function gettiming_category(){
      $a=date('H');
      if($a>=5 && $a<12){
        return 1;
      }
      elseif ($a>=12 && $a<16){
        return 2;
      }
      elseif ($a>=17 && $a<21){
        return 3;
      }
      else{
        return 4;
      }

    }
    private function admanage_updateadstats($local_adeid)
    {
      $hostname=$_SERVER['HTTP_HOST'];
      $budget_available=0;
      $num_views=0;
      $adstats=Db::getInstance()->ExecuteS('select * from '._DB_PREFIX_.'advertisestats where adeid='.$local_adeid.'');
      foreach ($adstats as $adstat){
        $num_views=$adstat['num_views'];
        $budget_available=$adstat['budget_available'];
      } 
      $num_views+=1;
      $budget_available-=1;
      Db::getInstance()->Execute('update '._DB_PREFIX_.'advertisestats set num_views='.$num_views.',budget_available='.$budget_available.' where adeid='.$local_adeid.'');
      Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'advertiseviewedusers(`adeid`,`hostname`) values('.$local_adeid.',"'.$hostname.'")');
    }
    private function admanage_updatedb()
    {
      $rows = Db::getInstance()->ExecuteS('select * from '._DB_PREFIX_.'advertisements where adactive=1');
      foreach($rows as $row)
      {
        if($row['package']==1)
        {
          $adstats=Db::getInstance()->ExecuteS('select * from '._DB_PREFIX_.'advertisestats where adeid='.$row['adeid'].'');
          foreach ($adstats as $adstat)
            $budget=$adstat['budget_available'];
          if(!($budget>0))
          {
            Db::getInstance()->Execute('update '._DB_PREFIX_.'advertisements set adactive=0 where adeid='.$row['adeid'].'');
          }
        }
      } 
    }

    private function create_database()
    {
      if (!Db::getInstance()->Execute('CREATE TABLE `'._DB_PREFIX_.'advertisements` (
          `adeid` int(6) unsigned NOT NULL auto_increment PRIMARY KEY, 
          `username` varchar(50) NOT NULL,
          `adname` varchar(100) NOT NULL,
          `adurl` varchar(500) NOT NULL,
           `package` int(2) unsigned NOT NULL,
           `timing` int(2) unsigned NOT NULL,
           `category` int(2) unsigned NOT NULL,
           `loggeduserprefered` bool ,
           `adactive` bool,
           `date_posted` TIMESTAMP DEFAULT CURRENT_TIMESTAMP)
            ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'))
      {
        return false;
      }
      if(!Db::getInstance()->Execute('CREATE TABLE `'._DB_PREFIX_.'advertisestats` (
            `adeid` int(6) unsigned NOT NULL PRIMARY KEY,
            `budget_available` int(6) unsigned NOT NULL ,
            `num_views` int(6) unsigned NOT NULL,
            `num_clicks` int(6) unsigned NOT NULL )
            ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'))
      {
        return false;
      }
      if(!Db::getInstance()->Execute('CREATE TABLE `'._DB_PREFIX_.'advertiseviewedusers` (
              `adeid` int(6) unsigned NOT NULL,
              `username` varchar(50) NOT NULL)
              ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'))
      {
        return false;
      }
      return true;

    } 
  }
?>
