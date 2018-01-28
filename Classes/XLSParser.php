<?php

include_once('phpquery-master\phpQuery\phpQuery.php');
class XLSParser
{
	private $html;
	private $defect;
	private $res6;
	private $res3;
	private $res1;
	function __construct()
	{
		$this->defect = array('Description' => 'Description', 'Bonus Policy' => 'Bonus Policy', 'Our license' => 'Our license', 'Our address' => 'Our address', 'We accept' => 'We accept');
		$this->res3 = array();
		$this->res6 = array();
		$this->res1 = array();
	}

	public function parseData($array)
	{
	    $index=0;
		foreach ($array as $ur) {
			$habrablog = file_get_contents($ur);
			$document = phpQuery::newDocument($habrablog);
			//Описание товара

			$hentry0 = $document->find('#product-order');
			$hentry1 = $document->find('#product-description');
			$main=$document->find('.main-block');
			$name=trim($document->find('.main-block .title:eq(0)')->text());
			foreach ($hentry0 as $el) {
				$pq = pq($el);

				$this->res6[$name]['Description'] = $pq->find('h1:contains(Description)+p')->html();
			}
			foreach ($hentry1 as $el) {
				$pq = pq($el);
				$this->res6[$name]['Description'] = $pq->find('h1:contains(Description)+p')->html();
				$this->res6[$name]['Recommendations'] = $pq->find('h2:contains(Recommendations)+p')->html();
				$this->res6[$name]['Precautions'] = $pq->find('h2:contains(Precautions)+p')->html();
				$this->res6[$name]['Ingredients'] = $pq->find('h2:contains(Ingredients)+p')->html();
			}

			$order=$main->find('#product-order');

            foreach ($order->find('.product') as $el) {
                $el = pq($el);
                $this->res3[$index]['title']=trim($main->find('h1.title:eq(0)')->text());
                $this->res3[$index]['doses']=trim($el->find('.description span')->text());
                $this->res3[$index]['amount']=trim($el->find('.description strong')->text());
                $this->res3[$index]['price']=trim($el->find('.price')->text());
                $index++;
            }
		}

	}
	public function getRes1(){
		return $this->res1;
	}
	public function writeRes3(){
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
        foreach($this->res3 as $k=>$v)
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
	public function getRes6(){
		return $this->res6;
	}
}