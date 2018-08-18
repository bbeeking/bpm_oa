<?php
 define('IN_DAEM', true); include '../includes/init.php'; if(!empty($_GET["id"])) { $sql = "select * from process_management where id = '".$_GET["id"]."'"; $result = $db->query_first($sql); if(empty($result)) gourl("该流程未注册!","",-1); } if(!empty($_POST)) { if(empty($_POST["name"]) || empty($_POST["status"]) || empty($_POST["debug"])) gourl("缺少响应参数!","",-1); $config_data = empty($_REQUEST["config_data"]) ? json_encode(array('title' => $_POST["name"]),JSON_UNESCAPED_UNICODE) : $_REQUEST["config_data"]; $node_property_config = empty($_REQUEST["node_property_config"]) ? '' : $_REQUEST["node_property_config"]; if(empty($_POST["id"])) { $name = $_POST["name"]; $sql = "select id from process_management where process_title = '".$name."'"; $result = $db->query_first($sql); if($result["id"]>0) gourl("该流程已被注册!","",-1); $sql = "insert into process_management
                set process_title = '".$_POST["name"]."',
                config_data = '".$config_data."',
                node_property_config = '".$node_property_config."',
                type = '".$_POST["type"]."',
                category = '".$_POST["category"]."',
                status = '".$_POST["status"]."',
                debug = '".$_POST["debug"]."',"; $sql .= "builder = '".$_SESSION["UserName"]."',"; $sql .= "create_time = '".DAEM_TIME."',"; $sql = rtrim($sql,","); $res = $db->query($sql); if($res) { $id = $db->insert_id(); gourl("流程注册成功，现在转入设计页面!","processDesigner.php?id=".$id); } else { gourl("注册失败!","",-1); } } else { $node_property_config = json_decode($node_property_config,true); $node_property_config["title"] = $_POST["name"]; $node_property_config = json_encode($node_property_config,JSON_UNESCAPED_UNICODE); $sql = "update process_management
                set process_title = '".$_POST["name"]."',
                config_data = '".$config_data."',
                node_property_config = '".$node_property_config."',
                type = '".$_POST["type"]."',
                category = '".$_POST["category"]."',
                status = '".$_POST["status"]."',
                debug = '".$_POST["debug"]."'
                where id = '".$_GET["id"]."'"; $res = $db->query($sql); if($res) { gourl("流程修改成功!","processDesigner.php?id=".$_GET["id"]); } else { gourl("修改失败!","",-1); } } } include template();