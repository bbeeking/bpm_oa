<?php
 require_once("db_common.php"); class MsSQLDBDataWrapper extends DBDataWrapper{ private $last_id=""; private $insert_operation=false; private $start_from=false; public function query($sql){ LogMaster::log($sql); $res = mssql_query($sql,$this->connection); if ($this->insert_operation){ $last = mssql_fetch_assoc($res); $this->last_id = $last["dhx_id"]; mssql_free_result($res); } if ($this->start_from) mssql_data_seek($res,$this->start_from); return $res; } public function get_next($res){ return mssql_fetch_assoc($res); } protected function get_new_id(){ return $this->last_id; } protected function insert_query($data,$request){ $sql = parent::insert_query($data,$request); $this->insert_operation=true; return $sql.";SELECT @@IDENTITY AS dhx_id"; } protected function select_query($select,$from,$where,$sort,$start,$count){ if (!$from) return $select; $sql="SELECT " ; if ($count) $sql.=" TOP ".($count+$start); $sql.=" ".$select." FROM ".$from; if ($where) $sql.=" WHERE ".$where; if ($sort) $sql.=" ORDER BY ".$sort; if ($start && $count) $this->start_from=$start; else $this->start_from=false; return $sql; } public function escape($data){ return str_replace("'","''",$data); } public function begin_transaction(){ $this->query("BEGIN TRAN"); } } ?>