<?php
 error_reporting(E_ALL); date_default_timezone_set('Europe/London'); require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php'; echo date('H:i:s') , " Load from Gnumeric file" , PHP_EOL; $callStartTime = microtime(true); $objReader = PHPExcel_IOFactory::createReader('Gnumeric'); $objPHPExcel = $objReader->load("GnumericTest.gnumeric"); $callEndTime = microtime(true); $callTime = $callEndTime - $callStartTime; echo 'Call time to read Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , PHP_EOL; echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , PHP_EOL; echo date('H:i:s') , " Write to Excel2007 format" , PHP_EOL; $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); $objWriter->save(str_replace('.php', '.xlsx', __FILE__)); echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', __FILE__) , PHP_EOL; echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , PHP_EOL; echo date('H:i:s') , " Done writing file" , PHP_EOL; 