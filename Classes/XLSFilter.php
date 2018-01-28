<?php
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/Writer/Excel5.php';

class XLSFilter
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
                $this->array [] = array_slice($prL, 0, 7);
            }
            $f++;
        }
        $excelFile = "Book.xlsx";
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load($excelFile);

        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $arrayDataBook[$worksheet->getTitle()] = $worksheet->toArray();
        }
        $this->exel=$arrayDataBook;
        $z=0;
        foreach($this->array as &$parse)
        {
            foreach($this->exel['Лист1'] as &$exel)
            {
                if(!stristr($parse[1],'/')||stristr($parse[1],'/1000')) {
                    $arr = array();
                    $pag = $this->my_offset($exel[0]);
                    $BookMg = 0;
                    if ($pag) {
                        $BookText = trim(substr($exel[0], 0, $pag));
                        if (stristr(substr($exel[0], $pag), 'mg')) {
                            $BookMg = (float)substr($exel[0], $pag);
                        }
                    } else {
                        $BookText = trim($exel[0]);
                        if (stristr($exel[2], 'mg')) {
                            $BookMg = (float)$exel[2];
                        }
                    }

                    if (strcasecmp(trim($parse[0]), $BookText) === 0 && (float)$parse[1] == $BookMg && $BookMg > 0 && $BookText) {
                        $parse[4] = '+';
                        $parse[5] = $exel[5];
                        $exel[10]='+';
                        $parse[0].=' from '.$exel[0].'|'.$exel[1];
                    }
                    if ($parse[6] && $parse[4] != '+') {
                        $arr = explode(',', $parse[6]);
                        foreach ($arr as $v) {
                            if (strcasecmp(trim($v), $BookText) === 0 && (float)$parse[1] == $BookMg && $BookMg > 0 && $BookText) {


                                $parse[4] = '+';
                                $parse[5] = $exel[5];
                                $exel[10]='+';
                                $parse[0].='/'.trim($v);
                                $parse[0].=' from '.$exel[0].'|'.$exel[1];
                            }
                        }
                    }
                }
            }
        }
        foreach($this->array as &$parse)
        {
            foreach($this->exel['Лист1'] as &$exel)
            {
                if($parse[4]!='+') {
                    if(!stristr($parse[1],'/')||stristr($parse[1],'/1000')) {
                        $arr = array();
                        $ex=$exel[0];
                        $ex = str_ireplace('Generic', ' ', $ex);
                        $pag = $this->my_offset($ex);
                        $BookMg = 0;
                        if ($pag) {
                            $BookText = trim(substr($ex, 0, $pag));
                            if (stristr(substr($ex, $pag), 'mg')) {
                                $BookMg = (float)substr($ex, $pag);
                            }
                        } else {
                            $BookText = trim($ex);
                            if (stristr($exel[2], 'mg')) {
                                $BookMg = (float)$exel[2];
                            }
                        }

                        if (strcasecmp(trim($parse[0]), $BookText) === 0 && (float)$parse[1] == $BookMg && $BookMg > 0 && $BookText) {

                            $parse[4] = '+';
                            $parse[5] = $exel[5];
                            $exel[10]='+';
                            $parse[0].=' from '.$exel[0].'|'.$exel[1];
                        }
                        if ($parse[6] && $parse[4] != '+') {
                            $arr = explode(',', $parse[6]);
                            foreach ($arr as $v) {
                                if (strcasecmp(trim($v), $BookText) === 0 && (float)$parse[1] == $BookMg && $BookMg > 0 && $BookText) {


                                    $parse[4] = '+';
                                    $parse[5] = $exel[5];
                                    $exel[10]='+';
                                    $parse[0].='/'.trim($v);
                                    $parse[0].=' from '.$exel[0].'|'.$exel[1];
                                }
                            }
                        }
                    }
                }
            }
        }
        foreach($this->array as &$parse)
        {
            foreach($this->exel['Лист1'] as &$exel)
            {

                if($parse[4]!='+') {
                    if(!stristr($parse[1],'/')||stristr($parse[1],'/1000')) {
                        $arr = array();
                        $pag = $this->my_offset($exel[1]);
                        $BookMg = 0;

                        if ($pag) {
                            $BookText = trim(substr($exel[1], 0, $pag));
                            if (stristr(substr($exel[1], $pag), 'mg')) {
                                $BookMg = (float)substr($exel[1], $pag);
                            }
                        } else {
                            $BookText = trim($exel[1]);
                            if (stristr($exel[2], 'mg')) {
                                $BookMg = (float)$exel[2];
                            }
                        }
                        if (strcasecmp(trim($parse[0]), $BookText) === 0 && (float)$parse[1] == $BookMg && $BookMg > 0 && $BookText) {

                            $parse[4] = '+';
                            $parse[5] = $exel[5];
                            $exel[10]='+';
                            $parse[0].=' from '.$exel[0].'|'.$exel[1];
                        }
                        if ($parse[6] && $parse[4] != '+') {
                            $arr = explode(',', $parse[6]);

                            foreach ($arr as $v) {
                                if (strcasecmp(trim($v), $BookText) === 0 && (float)$parse[1] == $BookMg && $BookMg > 0 && $BookText) {


                                    $parse[4] = '+';
                                    $parse[5] = $exel[5];
                                    $exel[10]='+';
                                    $parse[0].='/'.trim($v);
                                    $parse[0].=' from '.$exel[0].'|'.$exel[1];
                                }
                            }
                        }
                    }
                }
            }
        }
        foreach($this->exel['Лист1'] as &$ex)
        {
            if($ex[10]!='+') {
                $this->array[] = array($ex[0],$ex[1],$ex[2]);

            }
        }
    }
    public function getXLS()
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
        $this->file_force_download($objWriter);
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