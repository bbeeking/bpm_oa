<?php
 error_reporting(E_ALL); set_time_limit(0); date_default_timezone_set('Europe/London'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reading WorkBook Data Example #01</title>

</head>
<body>

<h1>PHPExcel Reading WorkBook Data Example #01</h1>
<h2>Read the WorkBook Properties</h2>
<?php
 set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/'); include 'PHPExcel/IOFactory.php'; $inputFileType = 'Excel5'; $inputFileName = './sampleData/example1.xls'; $objReader = PHPExcel_IOFactory::createReader($inputFileType); $objPHPExcel = $objReader->load($inputFileName); echo '<hr />'; $creator = $objPHPExcel->getProperties()->getCreator(); echo '<b>Document Creator: </b>',$creator,'<br />'; $creationDatestamp = $objPHPExcel->getProperties()->getCreated(); $creationDate = date('l, d<\s\up>S</\s\up> F Y',$creationDatestamp); $creationTime = date('g:i A',$creationDatestamp); echo '<b>Created On: </b>',$creationDate,' at ',$creationTime,'<br />'; $modifiedBy = $objPHPExcel->getProperties()->getLastModifiedBy(); echo '<b>Last Modified By: </b>',$modifiedBy,'<br />'; $modifiedDatestamp = $objPHPExcel->getProperties()->getModified(); $modifiedDate = date('l, d<\s\up>S</\s\up> F Y',$modifiedDatestamp); $modifiedTime = date('g:i A',$modifiedDatestamp); echo '<b>Last Modified On: </b>',$modifiedDate,' at ',$modifiedTime,'<br />'; $workbookTitle = $objPHPExcel->getProperties()->getTitle(); echo '<b>Title: </b>',$workbookTitle,'<br />'; $description = $objPHPExcel->getProperties()->getDescription(); echo '<b>Description: </b>',$description,'<br />'; $subject = $objPHPExcel->getProperties()->getSubject(); echo '<b>Subject: </b>',$subject,'<br />'; $keywords = $objPHPExcel->getProperties()->getKeywords(); echo '<b>Keywords: </b>',$keywords,'<br />'; $category = $objPHPExcel->getProperties()->getCategory(); echo '<b>Category: </b>',$category,'<br />'; $company = $objPHPExcel->getProperties()->getCompany(); echo '<b>Company: </b>',$company,'<br />'; $manager = $objPHPExcel->getProperties()->getManager(); echo '<b>Manager: </b>',$manager,'<br />'; ?>
<body>
</html>
