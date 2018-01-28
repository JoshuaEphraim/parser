<?php
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/Writer/Excel5.php';

class XLSFilterNames
{
	private $array;
	private $exel;
	function __construct()
	{
		$excelFile = "parsing.xls";
		$objReader1 = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel1 = $objReader1->load($excelFile);

		foreach ($objPHPExcel1->getWorksheetIterator() as $worksheet) {
			$arrayDataparsing[$worksheet->getTitle()] = $worksheet->toArray();
		}
		$f=0;
		foreach($arrayDataparsing['Prise List'] as $prL) {
			if($f>0) {
			$this->array []= array_slice($prL, 0, 7);
			}
			$f++;
		}
		$excelFile = "parserDescription.xls";
		$objReader1 = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel1 = $objReader1->load($excelFile);

		foreach ($objPHPExcel1->getWorksheetIterator() as $worksheet) {
			$arrayDataparsing[$worksheet->getTitle()] = $worksheet->toArray();
		}
		$arr=array();
		foreach($arrayDataparsing['Worksheet'] as $array) {
			$names1=array();
			$names2=array();
			if ($pos=stristr($array[0], 'brand name')) {
				$pos1=stripos($pos, ':');
				$pos2=stripos($pos, ')');
				$names1=explode('/',substr($pos,$pos1+1,($pos2-1)-$pos1));

			}
			if ($pos=stristr($array[0], 'generic name')) {
				$pos1=stripos($pos, ':');
				$pos2=stripos($pos, ';');
				$pos3=stripos($pos, ')');
				$pos2=($pos2&&$pos3)?min($pos2,$pos3):max($pos2,$pos3);
				$names2=explode('/',substr($pos,$pos1+1,($pos2-1)-$pos1));
			}
			if(stristr($array[0], 'generic name')||stristr($array[0], 'brand name')) {
				$npos = stripos($array[0], '(');
				$arrayName = substr($array[0], 0, $npos);
				$arr[$arrayName] = array_merge($names1,$names2);
			}
		}

		$this->exel=$arr;
		$z=0;
		foreach($this->array as &$parse)
		{
			foreach($this->exel as $key=>$value)
			{
				$key=str_ireplace('Generic','',$key);
				if(!strnatcasecmp($parse[0],trim($key)))
				{
					$parse[6]=implode(',',$value);
				}
			}
		}
	}
	public function saveXLS()
	{
		$phpexcel = new PHPExcel();
		$page = $phpexcel->setActiveSheetIndex(0);
		$page->setTitle("Prise List");
		$phpexcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);
		$page->setCellValue("A1", 'name');
		$page->setCellValue("B1", 'doses');
		$page->setCellValue("C1", 'amount');
		$page->setCellValue("D1", 'price');
		$page->setCellValue("E1", 'exist');
		$n=2;
		foreach($this->array as $k=>$v)
		{
			$c='A';
			foreach($v as $key=>$value)
			{
				$pos=$c.$n;
				$page->setCellValue("{$pos}", $value);
				$c++;
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
		$objWriter->save('parsing.xls');
	}
	private function file_force_download($objWriter) {

		header("Content-Type:application/vnd.ms-excel");
		header("Content-Disposition:attachment;filename='simple.xls'");
		$objWriter->save('php://output');
		exit;

	}
	private function my_offset($text) {
		preg_match('/\d/', $text, $m, PREG_OFFSET_CAPTURE);
		if (sizeof($m))
			return $m[0][1];


		return strlen(false);
	}
}