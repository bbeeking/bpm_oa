<?php
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); header("Cache-Control: no-store, no-cache, must-revalidate"); header("Cache-Control: post-check=0, pre-check=0", false); header("Pragma: no-cache"); $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload"; $cleanupTargetDir = true; $maxFileAge = 5 * 3600; @set_time_limit(5 * 60); $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0; $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0; $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : ''; $fileName = preg_replace('/[^\w\._]+/', '_', $fileName); if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) { $ext = strrpos($fileName, '.'); $fileName_a = substr($fileName, 0, $ext); $fileName_b = substr($fileName, $ext); $count = 1; while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b)) $count++; $fileName = $fileName_a . '_' . $count . $fileName_b; } $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName; if (!file_exists($targetDir)) @mkdir($targetDir); if ($cleanupTargetDir && is_dir($targetDir) && ($dir = opendir($targetDir))) { while (($file = readdir($dir)) !== false) { $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file; if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) { @unlink($tmpfilePath); } } closedir($dir); } else die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}'); if (isset($_SERVER["HTTP_CONTENT_TYPE"])) $contentType = $_SERVER["HTTP_CONTENT_TYPE"]; if (isset($_SERVER["CONTENT_TYPE"])) $contentType = $_SERVER["CONTENT_TYPE"]; if (strpos($contentType, "multipart") !== false) { if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) { $out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab"); if ($out) { $in = fopen($_FILES['file']['tmp_name'], "rb"); if ($in) { while ($buff = fread($in, 4096)) fwrite($out, $buff); } else die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}'); fclose($in); fclose($out); @unlink($_FILES['file']['tmp_name']); } else die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}'); } else die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}'); } else { $out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab"); if ($out) { $in = fopen("php://input", "rb"); if ($in) { while ($buff = fread($in, 4096)) fwrite($out, $buff); } else die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}'); fclose($in); fclose($out); } else die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}'); } if (!$chunks || $chunk == $chunks - 1) { rename("{$filePath}.part", $filePath); } die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}'); ?>