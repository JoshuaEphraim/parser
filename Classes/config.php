<?php

define("HOST","127.0.0.1");
define("USER","admin_store_user");
define("PASSWORD","QW7ZmP5JNW");
define("DB","admin_w_store");



$db = mysql_connect(HOST,USER,PASSWORD);
if (!$db) {
	exit('WRONG CONNECTION');
}
if(!mysql_select_db('admin_w_store',$db)) {
	exit(DB);
}
mysql_query('SET NAMES utf8');


?>