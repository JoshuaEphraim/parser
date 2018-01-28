<?php
//Выборка номер заказа клиента
function get_orders_list() {
	/*$sql = "SELECT o.id,o.email,o.s_name,o.s_address,o.s_city,o.s_zip,o.s_country,o.s_state,o.s_phone,o.s_phone2,
op.id_order,p.prod_name,op.prod_count,op.prod_price
FROM orders o, ordered_products op, products p WHERE o.id=op.id_order AND op.id_product=p.id";*/
    $sql = "SELECT * FROM orders";
	$result = mysql_query($sql);
	
	if(!$result) {
		exit(mysql_error());
	}
		$row = array();
	
	for($i = 0;$i < mysql_num_rows($result);$i++) {
		$row[] = mysql_fetch_assoc($result);
	}
		return $row;
}
//Выборка заказ товаров клиента
function get_ordered_products() {
    $sql = "SELECT o.id,o.id_order,p.prod_name,o.prod_price,
            o.prod_count,o.prod_price FROM ordered_products o, products p WHERE p.id=o.id_product";
    $result = mysql_query($sql);
    if(!$result) {
        exit(mysql_error());
    }
    $row = array();

    for($i = 0;$i < mysql_num_rows($result);$i++) {
        $row[] = mysql_fetch_assoc($result);
    }
    return $row;
}
function arr($a){echo '<pre>';print_r($a);echo '</pre>';}
//Заголовок полей заказов товара клиента
$mhed = array('id'=>'Id','name'=>'Name','qty'=>'Quantity','price'=>'Item price');


