<?php
 error_reporting(E_ALL); ini_set('display_errors', TRUE); ini_set('display_startup_errors', TRUE); define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />'); date_default_timezone_set('Europe/London'); require_once dirname(__FILE__) . '/../Classes/PHPExcel.php'; $inputFileType = 'Excel2007'; $inputFileName = 'templates/31docproperties.xlsx'; echo date('H:i:s') , " Load Tests from $inputFileType file" , EOL; $callStartTime = microtime(true); $objPHPExcelReader = PHPExcel_IOFactory::createReader($inputFileType); $objPHPExcel = $objPHPExcelReader->load($inputFileName); $callEndTime = microtime(true); $callTime = $callEndTime - $callStartTime; echo 'Call time to read Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL; echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL; echo date('H:i:s') , " Adjust properties" , EOL; $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document") ->setSubject("Office 2007 XLSX Test Document") ->setDescription("Test XLSX document, generated using PHPExcel") ->setKeywords("office 2007 openxml php"); echo date('H:i:s') , " Write to Excel2007 format" , EOL; $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); $objWriter->save(str_replace('.php', '.xlsx', __FILE__)); echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL; echo date('H:i:s') , " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB" , EOL; echo EOL; echo date('H:i:s') , " Reread Excel2007 file" , EOL; $objPHPExcelRead = PHPExcel_IOFactory::load(str_replace('.php', '.xlsx', __FILE__)); echo date('H:i:s') , " Get properties" , EOL; echo 'Core Properties:' , EOL; echo '    Created by - ' , $objPHPExcel->getProperties()->getCreator() , EOL; echo '    Created on - ' , date('d-M-Y',$objPHPExcel->getProperties()->getCreated()) , ' at ' , date('H:i:s',$objPHPExcel->getProperties()->getCreated()) , EOL; echo '    Last Modified by - ' , $objPHPExcel->getProperties()->getLastModifiedBy() , EOL; echo '    Last Modified on - ' , date('d-M-Y',$objPHPExcel->getProperties()->getModified()) , ' at ' , date('H:i:s',$objPHPExcel->getProperties()->getModified()) , EOL; echo '    Title - ' , $objPHPExcel->getProperties()->getTitle() , EOL; echo '    Subject - ' , $objPHPExcel->getProperties()->getSubject() , EOL; echo '    Description - ' , $objPHPExcel->getProperties()->getDescription() , EOL; echo '    Keywords: - ' , $objPHPExcel->getProperties()->getKeywords() , EOL; echo 'Extended (Application) Properties:' , EOL; echo '    Category - ' , $objPHPExcel->getProperties()->getCategory() , EOL; echo '    Company - ' , $objPHPExcel->getProperties()->getCompany() , EOL; echo '    Manager - ' , $objPHPExcel->getProperties()->getManager() , EOL; echo 'Custom Properties:' , EOL; $customProperties = $objPHPExcel->getProperties()->getCustomProperties(); foreach($customProperties as $customProperty) { $propertyValue = $objPHPExcel->getProperties()->getCustomPropertyValue($customProperty); $propertyType = $objPHPExcel->getProperties()->getCustomPropertyType($customProperty); echo '    ' , $customProperty , ' - (' , $propertyType , ') - '; if ($propertyType == PHPExcel_DocumentProperties::PROPERTY_TYPE_DATE) { echo date('d-M-Y H:i:s',$propertyValue) , EOL; } elseif ($propertyType == PHPExcel_DocumentProperties::PROPERTY_TYPE_BOOLEAN) { echo (($propertyValue) ? 'TRUE' : 'FALSE') , EOL; } else { echo $propertyValue , EOL; } } echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) . " MB" , EOL; 