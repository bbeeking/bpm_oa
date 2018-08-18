<?php
 error_reporting(E_ALL); set_time_limit(0); date_default_timezone_set('Europe/London'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reading WorkBook Data Example #03</title>

</head>
<body>

<h1>PHPExcel Reading WorkBook Data Example #03</h1>
<h2>Read Custom Property Values for a WorkBook</h2>
<?php
 set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/'); include 'PHPExcel/IOFactory.php'; $inputFileType = 'Excel2007'; $inputFileName = './sampleData/example1.xlsx'; $objReader = PHPExcel_IOFactory::createReader($inputFileType); $objPHPExcel = $objReader->load($inputFileName); echo '<hr />'; $customPropertyList = $objPHPExcel->getProperties()->getCustomProperties(); echo '<b>Custom Properties: </b><br />'; foreach($customPropertyList as $customPropertyName) { echo '<b>',$customPropertyName,': </b>'; $propertyValue = $objPHPExcel->getProperties()->getCustomPropertyValue($customPropertyName); $propertyType = $objPHPExcel->getProperties()->getCustomPropertyType($customPropertyName); switch($propertyType) { case 'i' : $propertyType = 'integer number'; break; case 'f' : $propertyType = 'floating point number'; break; case 's' : $propertyType = 'string'; break; case 'd' : $propertyValue = date('l, d<\s\up>S</\s\up> F Y g:i A',$propertyValue); $propertyType = 'date'; break; case 'b' : $propertyValue = ($propertyValue) ? 'TRUE' : 'FALSE'; $propertyType = 'boolean'; break; } echo $propertyValue,' (',$propertyType,')<br />'; } ?>
<body>
</html>
