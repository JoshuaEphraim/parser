<?php

set_time_limit (0);
// создание объекта парсера и получение HTML
require_once 'Classes/XLSFilter.php';
require_once 'Classes/XLSParser.php';
require_once 'Classes/XLSSiteParse.php';
require_once 'Classes/XLSFilterNames.php';

/*
$e = 0;
$d = 0;
$c = 0;
$adr = array('https://www.mycanadianpharmacyrx.com/products/genericviagra.html'
,'https://www.mycanadianpharmacyrx.com/products/cialis.html'
,'https://www.mycanadianpharmacyrx.com/products/viagrasuperactive.html'
,'https://www.mycanadianpharmacyrx.com/products/levitra.html'
,'https://www.mycanadianpharmacyrx.com/products/amoxicillin.html'
,'https://www.mycanadianpharmacyrx.com/products/viagraprofessional.html'




);


/*

$phpexcel = new PHPExcel();
$page = $phpexcel->setActiveSheetIndex(0);
$page->setTitle("Prise List");
$phpexcel->getActiveSheet()->getStyle('A1:A1500')->getFont()->setBold(true);

$n=1;
foreach($parser->getRes6() as $k=>$v)
{

	$c='A';
	$pos=$c.$n;
	$page->setCellValue("{$pos}", $k);
	$c++;
	foreach($v as $key=>$value)
	{
		$n++;
		$pos=$c.$n;
			$page->setCellValue("{$pos}", $key);
			$c++;
		$pos=$c.$n;
			$page->setCellValue("{$pos}", $value);


	}

	$n++;
}
$style_header = array(
	'font'=>array(
		'bold' => true,
		'name' => 'Times New Roman',
		'size' => 10
	),
	'alignment' => array(
		'horizontal' => PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_STYLE_ALIGNMENT::VERTICAL_CENTER,
	),
	'borders' => array(
		'right' => array(
			'style'=>PHPExcel_Style_Border::BORDER_THIN
		)

	)

);
$page->getStyle('A1:AD1')->applyFromArray($style_header);

$objWriter = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel5');
file_force_download($objWriter);
function file_force_download($objWriter) {

	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment;filename='simple.xls'");
	$objWriter->save('php://output');
	exit;

}
*/


$filter=new XLSFilter();
$filter->getXLS();
function arr($a){
	echo '<pre>';
	print_r($a);
	echo '<pre/>';
};
