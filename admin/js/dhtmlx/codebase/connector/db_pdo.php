<?php
 require_once("db_common.php"); class PDODBDataWrapper extends DBDataWrapper{ private $last_result; public function query($sql){ LogMaster::log($sql); $res=$this->connection->query($sql); if ($res===false) { $message = $this->connection->errorInfo(); throw new Exception("PDO - sql execution failed\n".$message[2]); } return new PDOResultSet($res); } protected function select_query($select,$from,$where,$sort,$start,$count){ if (!$from) return $select; $sql="SELECT ".$select." FROM ".$from; if ($where) $sql.=" WHERE ".$where; if ($sort) $sql.=" ORDER BY ".$sort; if ($start || $count) { if ($this->connection->getAttribute(PDO::ATTR_DRIVER_NAME)=="pgsql") $sql.=" OFFSET ".$start." LIMIT ".$count; else $sql.=" LIMIT ".$start.",".$count; } return $sql; } public function get_next($res){ $data = $res->next(); return $data; } public function get_new_id(){ return $this->connection->lastInsertId(); } public function escape($str){ $res=$this->connection->quote($str); if ($res===false) return str_replace("'","''",$str); return substr($res,1,-1); } } class PDOResultSet{ private $res; public function __construct($res){ $this->res = $res; } public function next(){ $data = $this->res->fetch(PDO::FETCH_ASSOC); if (!$data){ $this->res->closeCursor(); return null; } return $data; } } ?>