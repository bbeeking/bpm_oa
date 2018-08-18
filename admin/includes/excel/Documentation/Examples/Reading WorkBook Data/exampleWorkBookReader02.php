<?php
 error_reporting(E_ALL); set_time_limit(0); date_default_timezone_set('Europe/London'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reading WorkBook Data Example #02</title>

</head>
<body>

<h1>PHPExcel Reading WorkBook Data Example #02</h1>
<h2>Read a list of Custom Properties for a WorkBook</h2>
<?php
 set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/'); include 'PHPExcel/IOFactory.php'; $inputFileType = 'Excel2007'; $inputFileName = './sampleData/example1.xlsx'; $objReader = PHPExcel_IOFactory::createReader($inputFileType); $objPHPExcel = $objReader->load($inputFileName); echo '<hr />'; $customPropertyList = $objPHPExcel->getProperties()->getCustomProperties(); echo '<b>Custom Property names: </b><br />'; foreach($customPropertyList as $customPropertyName) { echo $customPropertyName,'<br />'; } ?>
<body>
</html>
