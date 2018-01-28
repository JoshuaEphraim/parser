<?php

require_once 'Classes/XLSFilter.php';
/** Include PHPExcel */
require_once 'Classes/PHPExcel.php';

include('simple_html_dom.php');
$html = new simple_html_dom();
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/genericviagra.html');
/* $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/cialis.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/viagrasuperactive.html');
    $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/levitra.html');
    $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/amoxicillin.html');
    $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/viagraprofessional.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/viagraforce.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/femalepinkviagra.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/zithromax.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/cialissuperactive.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/propecia.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/lasix.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/prednisolone.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/clomid.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/prozac.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/cialispro.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/genericviagra.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/cialis.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/viagrasuperactive.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/levitra.html');
/*    $data = file_get_html('https://wwycanadianpharmacyrx.com/products/viagraprofessional.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/viagraforce.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/cialissuperactive.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/cialispro.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/viagrasofttabs.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/cialissofttabs.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/celebrex.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/indometacin.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/imitrex.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/topamax.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/zanaflex.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/diclofenac.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/cafergot.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/tizanidine.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/lidocaine.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/amoxicillin.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/zithromax.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/cipro.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/flagyl.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/cephalexin.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/vibramycin.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/tetracycline.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/erythromycin.html');
/*
$data = file_getml('https://www.mycanadianpharmacyrx.com/products/ampicillin.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/femalepinkviagra.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/clomid.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/diflucan.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/tricyclen.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/alesse.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/femalecialis.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/estrace.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/estradiolvalerate.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/estracecream.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/provera.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/prozac.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/wellbutrinsr.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/lexapro.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/zoloft.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/desyrel.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/celexa.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/paxil.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/cymbalta.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/elavil.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/pristiq.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/buspar.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/sleepwell.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/anexil.html');
  $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/brahmi.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/melatonin.html');
  $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/alertcaps.html');
 $data = file_get_html('https://www.mycanadianpharmacyrx.com/products/remagain.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/sumenta.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/tagara.html');
$data = file_get_html('https://www.mycanadianpharmacyrx.com/products/stresstea.html');
$data = file_get_html('');
$data = file_get_html('');
$data = file_get_html('');
$data = file_get_html('');
$data = file_get_html('');

*/
$adr = array('https://www.mycanadianpharmacyrx.com/products/elavil.html','https://www.mycanadianpharmacyrx.com/products/cymbalta.html');
//function arr($a){echo '<pre>';print_r($a);echo '</pre>';}


$objPHPExcel = new PHPEXcel();
$objPHPExcel->setActiveSheetIndex(0);
$active_sheet = $objPHPExcel->getActiveSheet();
$active_sheet2 = $objPHPExcel->getActiveSheet();
// Ориентация страницы и  размер листа
$active_sheet->getPageSetup()
    ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);

$active_sheet->getPageSetup()
    ->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$active_sheet2->getPageSetup()
    ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);

$active_sheet2->getPageSetup()
    ->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
// Поля документа
$active_sheet->getPageMargins()->setTop(1);
$active_sheet->getPageMargins()->setRight(0.75);
$active_sheet->getPageMargins()->setLeft(0.75);
$active_sheet->getPageMargins()->setBottom(1);
// Настройки шрифта
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

//Ширина ячеек
$active_sheet->getColumnDimension('A')->setWidth(20);
//$active_sheet->getColumnDimension('B')->setWidth(20);
//$active_sheet->getColumnDimension('C')->setWidth(20);
//$active_sheet->getColumnDimension('D')->setWidth(20);

//Заголовок ячеек
//$active_sheet->setCellValue('A1','name');
//$active_sheet->setCellValue('B1','Email');
//$active_sheet->setCellValue('C1','Name');
//$active_sheet->setCellValue('D1','Address');

$row_start = 0;
$i = 1;
$row_start2 = 0;
$a = 'K';
$defect = array('Description'=>'Description','Bonus Policy'=>'Bonus Policy','Our license'=>'Our license','Our address'=>'Our address','We accept'=>'We accept');
//arr($defect);
$res1 = array();
//$row_next = $row_start + $i;Переводит на следующую строку
$row_next = $row_start + $i;

$mhed = array('id'=>'Id','name'=>'Name','qty'=>'Quantity','price'=>'Item price');

$uri = 0;
$res7 = array();
if($data->innertext!='' and count($data->find('.bestseller'))){

    foreach($data->find('a') as $a){
        //echo $a->tag . '">' . $a->outertext . '</br>';
        $res7[] = $a->outertext;
    }
}
$adr = array(

    'https://www.mycanadianpharmacyrx.com/products/shuddhaguggulu.html'
,'https://www.mycanadianpharmacyrx.com/products/ayurslim.html'
,'https://www.mycanadianpharmacyrx.com/products/vrikshamla.html'
,'https://www.mycanadianpharmacyrx.com/products/retina.html'
,'https://www.mycanadianpharmacyrx.com/products/temovate.html'
,'https://www.mycanadianpharmacyrx.com/products/careprost.html'
,'https://www.mycanadianpharmacyrx.com/products/betnovate.html'
,'https://www.mycanadianpharmacyrx.com/products/differin.html'
,'https://www.mycanadianpharmacyrx.com/products/elocon.html'
,'https://www.mycanadianpharmacyrx.com/products/aldara.html'
,'https://www.mycanadianpharmacyrx.com/products/hydrocortisone.html'
,'https://www.mycanadianpharmacyrx.com/products/triamcinolonecream.html'
,'https://www.mycanadianpharmacyrx.com/products/lumigan.html'
,'https://www.mycanadianpharmacyrx.com/products/xalatan.html'
,'https://www.mycanadianpharmacyrx.com/products/combigan.html'
,'https://www.mycanadianpharmacyrx.com/products/patanol.html'
,'https://www.mycanadianpharmacyrx.com/products/fml.html'
,'https://www.mycanadianpharmacyrx.com/products/alphagan.html'
,'https://www.mycanadianpharmacyrx.com/products/travoprost.html'
,'https://www.mycanadianpharmacyrx.com/products/acular.html'
,'https://www.mycanadianpharmacyrx.com/products/zaditor.html'
,'https://www.mycanadianpharmacyrx.com/products/ophthacare.html'
,'https://www.mycanadianpharmacyrx.com/products/nexium.html'
,'https://www.mycanadianpharmacyrx.com/products/aciphex.html'
,'https://www.mycanadianpharmacyrx.com/products/misoprostol.html'
,'https://www.mycanadianpharmacyrx.com/products/bentyl.html'
,'https://www.mycanadianpharmacyrx.com/products/protonix.html'
,'https://www.mycanadianpharmacyrx.com/products/asacol.html'
,'https://www.mycanadianpharmacyrx.com/products/prevacid.html'
,'https://www.mycanadianpharmacyrx.com/products/prilosec.html'
,'https://www.mycanadianpharmacyrx.com/products/omeprazole.html'
,'https://www.mycanadianpharmacyrx.com/products/zantac.html'
,'https://www.mycanadianpharmacyrx.com/products/glucophage.html'
,'https://www.mycanadianpharmacyrx.com/products/actos.html'
,'https://www.mycanadianpharmacyrx.com/products/glyburide.html'
,'https://www.mycanadianpharmacyrx.com/products/glucotrolxl.html'
,'https://www.mycanadianpharmacyrx.com/products/amaryl.html'
,'https://www.mycanadianpharmacyrx.com/products/janumet.html'
,'https://www.mycanadianpharmacyrx.com/products/januvia.html'
,'https://www.mycanadianpharmacyrx.com/products/exermet.html'
,'https://www.mycanadianpharmacyrx.com/products/precose.html'
,'https://www.mycanadianpharmacyrx.com/products/meshashringi.html'
,'https://www.mycanadianpharmacyrx.com/products/zovirax.html'
,'https://www.mycanadianpharmacyrx.com/products/valtrex.html'
,'https://www.mycanadianpharmacyrx.com/products/acivir.html'
,'https://www.mycanadianpharmacyrx.com/products/podofilox.html'
,'https://www.mycanadianpharmacyrx.com/products/atripla.html'
,'https://www.mycanadianpharmacyrx.com/products/famvir.html'
,'https://www.mycanadianpharmacyrx.com/products/truvada.html'
,'https://www.mycanadianpharmacyrx.com/products/epivir.html'
,'https://www.mycanadianpharmacyrx.com/products/combivir.html'
,'https://www.mycanadianpharmacyrx.com/products/sustiva.html'
,'https://www.mycanadianpharmacyrx.com/products/nolvadex.html'
,'https://www.mycanadianpharmacyrx.com/products/methotrexate.html'
,'https://www.mycanadianpharmacyrx.com/products/arimidex.html'
,'https://www.mycanadianpharmacyrx.com/products/femara.html'
,'https://www.mycanadianpharmacyrx.com/products/iressa.html'
,'https://www.mycanadianpharmacyrx.com/products/xtane.html'
,'https://www.mycanadianpharmacyrx.com/products/cytoxan.html'
,'https://www.mycanadianpharmacyrx.com/products/gleevec.html'
,'https://www.mycanadianpharmacyrx.com/products/hydrea.html'
,'https://www.mycanadianpharmacyrx.com/products/zometa.html'
,'https://www.mycanadianpharmacyrx.com/products/prednisolone.html'
,'https://www.mycanadianpharmacyrx.com/products/synthroid.html'
,'https://www.mycanadianpharmacyrx.com/products/colchicine.html'
,'https://www.mycanadianpharmacyrx.com/products/antabuse.html'
,'https://www.mycanadianpharmacyrx.com/products/allopurinol.html'
,'https://www.mycanadianpharmacyrx.com/products/motilium.html'
,'https://www.mycanadianpharmacyrx.com/products/naltrexone.html'
,'https://www.mycanadianpharmacyrx.com/products/atarax.html'
,'https://www.mycanadianpharmacyrx.com/products/dexamethasone.html'
,'https://www.mycanadianpharmacyrx.com/products/zofran.html'
,'https://www.mycanadianpharmacyrx.com/products/seroquel.html'
,'https://www.mycanadianpharmacyrx.com/products/strattera.html'
,'https://www.mycanadianpharmacyrx.com/products/abilify.html'
,'https://www.mycanadianpharmacyrx.com/products/zyprexa.html'
,'https://www.mycanadianpharmacyrx.com/products/mirapex.html'
,'https://www.mycanadianpharmacyrx.com/products/aricept.html'
,'https://www.mycanadianpharmacyrx.com/products/neurontin.html'
,'https://www.mycanadianpharmacyrx.com/products/namenda.html'
,'https://www.mycanadianpharmacyrx.com/products/lamictal.html'
,'https://www.mycanadianpharmacyrx.com/products/selegiline.html'
,'https://www.mycanadianpharmacyrx.com/products/petcam.html'
,'https://www.mycanadianpharmacyrx.com/products/pyrantelpamoate.html'
,'https://www.mycanadianpharmacyrx.com/products/careopet.html'
,'https://www.mycanadianpharmacyrx.com/products/levamisole.html'
,'https://www.mycanadianpharmacyrx.com/products/atopex.html'
,'https://www.mycanadianpharmacyrx.com/products/micohex.html'
,'https://www.mycanadianpharmacyrx.com/products/seledruff.html'
,'https://www.mycanadianpharmacyrx.com/products/chantix.html'
,'https://www.mycanadianpharmacyrx.com/products/zyban.html'
,'https://www.mycanadianpharmacyrx.com/products/nicorettegum.html'
,'https://www.mycanadianpharmacyrx.com/products/neurobionforte.html'
,'https://www.mycanadianpharmacyrx.com/products/liv52caps.html'
,'https://www.mycanadianpharmacyrx.com/products/kapikachhu.html'
,'https://www.mycanadianpharmacyrx.com/products/mentat.html'
,'https://www.mycanadianpharmacyrx.com/products/folicacid.html'
,'https://www.mycanadianpharmacyrx.com/products/vitamine.html'
,'https://www.mycanadianpharmacyrx.com/products/pilex.html'
,'https://www.mycanadianpharmacyrx.com/products/ginseng.html'
,'https://www.mycanadianpharmacyrx.com/products/chyavanaprasha.html'
,'https://www.mycanadianpharmacyrx.com/products/aloespirulina.html'
,'https://www.mycanadianpharmacyrx.com/products/melatonin-desc.html'
,'https://www.mycanadianpharmacyrx.com/products/melatonin-testim.html'
,'https://www.mycanadianpharmacyrx.com/products/?tag=Insomnia-desc.html'
,'https://www.mycanadianpharmacyrx.com/products/?tag=Sleep-desc.html'
,'https://www.mycanadianpharmacyrx.com/products/?tag=Sleep+Aid-desc.html'
,'https://www.mycanadianpharmacyrx.com/products/melatonin-desc.html'
);
$res6 = array();
foreach ($adr as $ur) {
    $data = file_get_html($ur);
    //Описание товара
    if($data->innertext!='' and count($data->find('.title'))) {
        foreach($data->find('p') as $a){

            //echo $a->plaintext.'<br>';
            $res6[] = $a->plaintext;
        }
    }
   /* if ($data->innertext != '' and count($data->find('#product-order'))) {
//Получение товаров всех категорий
        foreach ($data->find('#product-order h3, .description strong , .price') as $a) {

            if ($a->plaintext != $defect[$a->plaintext]) {
                //echo $a->tag . '">' . $a->plaintext . '</br>';
                $res3[] = $a->plaintext;
                if ($a->tag == 'h3' || $a->tag == 'div') {
                    $res1[] = $a->plaintext;
                    //echo $a->plaintext;
                    if ($res3[$a->plaintext] == $a->plaintext) {
                        //$res4[] = $res3;
                    }
                }
            }
        }
    }*/
}
foreach($res6 as $item) {
    $row_next = $row_start + $i;//Перенос строки

    $active_sheet->setCellValue('A'.$row_next,$item);
    //$active_sheet->setCellValue('B'.$row_next,$item);
    //$active_sheet->setCellValue('C'.$row_next,$item);
    //$active_sheet->setCellValue('D'.$row_next,$item);

    $i++;
    $aa = $a;
    $a1 = $a;

}
$i++;
$aa = $a;
$a1 = $a;
/*
foreach($res3 as $item) {
    $row_next = $row_start + $i;//Перенос строки

    $active_sheet->setCellValue('A'.$row_next,$item);
    //$active_sheet->setCellValue('B'.$row_next,$item);
    //$active_sheet->setCellValue('C'.$row_next,$item);
    //$active_sheet->setCellValue('D'.$row_next,$item);

    $i++;
    $aa = $a;
    $a1 = $a;

    foreach ($res3 as $item2) {
        $row_next = $row_start2 + $i;
        if ($item2['id_order'] == $item['id']) {
            $active_sheet->setCellValue($a1++.'1', $mhed['id']);
            $active_sheet->setCellValue($aa++ . $row_next, $item2);
            $active_sheet->setCellValue($a1++.'1', $mhed['name']);
            $active_sheet->setCellValue($aa++ . $row_next, $item2);
            $active_sheet->setCellValue($a1++.'1', $mhed['qty']);
            $active_sheet->setCellValue($aa++ . $row_next, $item2);
            $active_sheet->setCellValue($a1++.'1', $mhed['price']);
            $active_sheet->setCellValue($aa++ . $row_next, $item2);

        }

    }
}*/
/*
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
    /*'fill' => array(
        'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
        'color'=>array(
            'rgb' => 'CFCFCF'
        )
    ),*/
 /*   'borders' => array(
        'right' => array(
            'style'=>PHPExcel_Style_Border::BORDER_THIN
        )

    )

);
$active_sheet->getStyle('A1:AD1')->applyFromArray($style_header);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit();