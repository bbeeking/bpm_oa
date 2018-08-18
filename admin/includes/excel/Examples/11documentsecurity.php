<?php
 error_reporting(E_ALL); ini_set('display_errors', TRUE); ini_set('display_startup_errors', TRUE); define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />'); date_default_timezone_set('Europe/London'); require_once dirname(__FILE__) . '/../Classes/PHPExcel.php'; echo date('H:i:s') , " Create new PHPExcel object" , EOL; $objPHPExcel = new PHPExcel(); echo date('H:i:s') , " Set document properties" , EOL; $objPHPExcel->getProperties()->setCreator("Maarten Balliauw") ->setLastModifiedBy("Maarten Balliauw") ->setTitle("Office 2007 XLSX Test Document") ->setSubject("Office 2007 XLSX Test Document") ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.") ->setKeywords("office 2007 openxml php") ->setCategory("Test result file"); echo date('H:i:s') , " Add some data" , EOL; $objPHPExcel->setActiveSheetIndex(0); $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Hello'); $objPHPExcel->getActiveSheet()->setCellValue('B2', 'world!'); $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Hello'); $objPHPExcel->getActiveSheet()->setCellValue('D2', 'world!'); echo date('H:i:s') , " Rename worksheet" , EOL; $objPHPExcel->getActiveSheet()->setTitle('Simple'); echo date('H:i:s') , " Set document security" , EOL; $objPHPExcel->getSecurity()->setLockWindows(true); $objPHPExcel->getSecurity()->setLockStructure(true); $objPHPExcel->getSecurity()->setWorkbookPassword("PHPExcel"); echo date('H:i:s') , " Set sheet security" , EOL; $objPHPExcel->getActiveSheet()->getProtection()->setPassword('PHPExcel'); $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true); $objPHPExcel->getActiveSheet()->getProtection()->setSort(true); $objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true); $objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true); $objPHPExcel->setActiveSheetIndex(0); echo date('H:i:s') , " Write to Excel2007 format" , EOL; $callStartTime = microtime(true); $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); $objWriter->save(str_replace('.php', '.xlsx', __FILE__)); $callEndTime = microtime(true); $callTime = $callEndTime - $callStartTime; echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL; echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL; echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL; echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL; echo date('H:i:s') , " Done writing file" , EOL; echo 'File has been created in ' , getcwd() , EOL; 