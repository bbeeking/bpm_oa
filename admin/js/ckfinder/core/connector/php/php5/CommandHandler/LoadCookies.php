<?php
 if (!defined('IN_CKFINDER')) exit; require_once CKFINDER_CONNECTOR_LIB_DIR . "/CommandHandler/XmlCommandHandlerBase.php"; class CKFinder_Connector_CommandHandler_LoadCookies extends CKFinder_Connector_CommandHandler_XmlCommandHandlerBase { private $command = "LoadCookies"; protected function buildXml() { if (empty($_POST['CKFinderCommand']) || $_POST['CKFinderCommand'] != 'true') { $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_INVALID_REQUEST); } if (!$this->_currentFolder->checkAcl(CKFINDER_CONNECTOR_ACL_FILE_VIEW)) { $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_UNAUTHORIZED); } $oCookiesNode = new Ckfinder_Connector_Utils_XmlNode("Cookies"); $this->_connectorNode->addChild($oCookiesNode); $i = 0; foreach ($_COOKIE as $name => $value) { if (!is_array($value) && strpos($name, "CKFinder_") !== 0) { $oCookieNode[$i] = new Ckfinder_Connector_Utils_XmlNode("Cookie"); $oCookiesNode->addChild($oCookieNode[$i]); $oCookieNode[$i]->addAttribute("name", $name); $oCookieNode[$i]->addAttribute("value", $value); $i++; } } } } 