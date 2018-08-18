<?php
 define('IN_DAEM', true); include '../includes/init.php'; include './templateConfig.php'; $type = empty($_GET["type"]) ? "outer" : $_GET["type"]; if($type == "inner") { include './templateConfigInner.php'; } $counter = 0; $id = empty($_GET["ID"]) ? "" : $_GET["ID"]; if(!empty($id)) { $dataAry = $tmpAry = array(); $query = "select * from [DRSDatabase].[dbo].[TemplateEntity] where [ID] = '".$id."'"; $stmt = $conn->query( $query ); while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){ $tmpAry[] = $row; } $dataAry = $tmpAry['0']; } $userAry = get_user_realname(); $userAllowAry = get_user_realname('0'); if(!empty($_POST)) { $templateId = $_POST["templateId"]; $templateName = $_POST["templateName"]; $outboard = $_POST["outboard"]; $certificate = $_POST["certificate"]; $productCatalog = $_POST["productCatalog"]; $catalog = $_POST["catalog"]; $TemplateCatalog = $_POST["TemplateCatalog"]; $paramName = $_POST["paramName"]; $approver = $_POST["approver"]; $paramName = str_replace(",undefined","",$paramName); $paramName = str_replace("undefined,","",$paramName); $coolType = $_POST["coolType"]; $builder = $_SESSION["UserName"]; if($_FILES['file']['name'] != '') { $fileBasicPath = file_upload(DAEM_DATA_ROOT."upload"); $filePath = DAEM_PATH."data/upload/".basename($fileBasicPath); if (empty($filePath)) { Gourl("请上传CDR文件!", "", "-1"); } $fileContent = file_get_contents($fileBasicPath); $hex = ""; for($i=0;$i<=strlen($fileContent);$i++){ $asc = ord(substr($fileContent,$i,1)); $hex .= dechex($asc); } $fileContent = $hex; } if(!empty($id)) { $sql = "UPDATE [DRSDatabase].[dbo].[TemplateEntity] set
                [templateId] = '".$templateId."',
                [templateName] = '".$templateName."',
                [outboard] = '".$outboard."',
                [certificate] = '".$certificate."',
                [productCatalog] = '".$productCatalog."',
                [catalog] = '".$catalog."',
                [TemplateCatalog] = '".$TemplateCatalog."',
                [paramName] = '".$paramName."',
                [approver] = '".$approver."',
                [builder] = '".$builder."',
                [approverStatus] = '0',
                [approverDateTime] = '',
                [createDateTime] = '".date('Y-m-d H:i:s')."',
                [typeOf] = '".$type."',
                [coolType] = '".$coolType."'"; if($_FILES['file']['name'] != '') { $sql .= ",[filePath] = '".$filePath."',
                    [fileName] = '".$_FILES['file']['name']."',
                    [fileContent] = CONVERT(varbinary(max),'".$fileContent."')"; } $sql .= " where ID = '".$id."'"; } else { $sql = "INSERT INTO [DRSDatabase].[dbo].[TemplateEntity]
                ([templateId],[templateName],[outboard],[certificate],[productCatalog],[catalog],[TemplateCatalog],[paramName],[approver],[filePath],[fileName],[builder],[approverStatus],[createDateTime],[fileContent],[typeOf],[coolType]) VALUES
                ('".$templateId."','".$templateName."','".$outboard."','".$certificate."','".$productCatalog."','".$catalog."','".$TemplateCatalog."','".$paramName."','".$approver."','".$filePath."','".$_FILES['file']['name']."', '".$builder."','0', '".date('Y-m-d H:i:s')."',CONVERT(varbinary(max),'".$fileContent."'),'".$type."','".$coolType."')"; } $stmt = $conn->query( $sql ); if($stmt) { gourl("操作成功,请等待审批通过后生效!", "templateList.php?type=".$type); } } include template(); function CheckDataIntoTemplate($outboard, $productCatalog, $certificate, $catalog, $TemplateCatalog) { global $conn; if(empty($outboard) || empty($productCatalog) || empty($certificate) || empty($catalog) || empty($TemplateCatalog)) { return "出口，产品类，认证,类型,模板分类 不能为空!"; } $dataAry = array(); $query = "select * from [DRSDatabase].[dbo].[TemplateEntity] where outboard = '".$outboard."'
                and  productCatalog ='".$productCatalog."'
                and certificate = '".$certificate."'
                and catalog = '".$catalog."'
                and TemplateCatalog = '".$TemplateCatalog."'"; $stmt = $conn->query( $query ); while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){ $row['fileName'] = ltrim(strrchr($row['filePath'],'//'),'\/'); $dataAry[] = $row; } if (count($dataAry) != 0) { return "已存在：出口，产品类，认证,类型,模板分类 相同模板，请直接使用!"; } else { return "1"; } } function bstr2bin($input) { if (!is_string($input)) return null; $value = unpack('H*', $input); $value = str_split($value[1], 1); $bin = ''; foreach ($value as $v) { $b = str_pad(base_convert($v, 16, 2), 4, '0', STR_PAD_LEFT); $bin .= $b; } return $bin; } function getBytes($string) { $bytes = array(); for($i = 0; $i < strlen($string); $i++){ $bytes[] = ord($string[$i]); } return $bytes; } function toStr($bytes) { $str = ''; foreach($bytes as $ch) { $str .= chr($ch); } return $str; }