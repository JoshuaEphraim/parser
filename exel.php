<?php

include_once ('index.php');
require_once 'Classes/XLSFilter.php';


/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.12.2017
 * Time: 17:29
 */
$z=0;
foreach($res3 as $k=>$v)
{

    if(stripos($v,'pills')){$pills=$v;}
    if(stripos($v,';'))
    {


     $cost=html_entity_decode(trim($v));
    $array[$z][]=array($name,$mg,$pills,$cost);
     $z++;}
	if(stripos($v,'gra')||stripos($v,'lis')){


	    $buff=explode(' ',$v);
	    $name=$buff[0];
	    $mg=$buff[1];
	}

}

