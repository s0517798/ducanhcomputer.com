<?php
namespace NukeViet\Tar;
use PDO;
use PDOException;
class Checkalias
{
    public $check = 0;
    public $list_tags = array();
    public $module_data_alias = 'alias';
	public function check_id_alias($id_alias, $alias)
	{
		global $db_config, $module_data, $db;
		if(!empty($alias))
		{
			if($id_alias > 0)
			{
				$this->check = $db->query("SELECT count(id) FROM " . NV_PREFIXLANG . "_" . $this->module_data_alias . "_rows WHERE id_alias != ". $id_alias . " AND alias like '". $alias ."'")->fetchColumn();
			}
			else
			{	
				$this->check = $db->query("SELECT count(id) FROM " . NV_PREFIXLANG . "_" . $this->module_data_alias . "_rows WHERE alias like '". $alias ."'")->fetchColumn();
			}
		}
	}
	public function add_alias_page($id_alias, $alias, $module, $op_module)
	{
		global $db_config, $module_data, $db;
		if(!empty($alias) and !empty($module) and !empty($op_module))
		{
			$count = 1; 
			if($id_alias > 0)
			{
				$count = $db->query("SELECT count(id) FROM " . NV_PREFIXLANG . "_" . $this->module_data_alias . "_rows WHERE id_alias = ". $id_alias . " AND module like '". $module ."' AND op like '". $op_module ."'")->fetchColumn();
				if($count == 0)
				{
					try{
						$stmt = $db->prepare( 'INSERT INTO ' . NV_PREFIXLANG . '_' . $this->module_data_alias . '_rows (alias, module, op, id_alias, weight, status) VALUES (:alias, :module, :op, :id_alias, :weight, :status)' );

						$stmt->bindValue( ':status', 1, PDO::PARAM_INT );
						$weight = $db->query( 'SELECT max(status) FROM ' . NV_PREFIXLANG . '_' . $this->module_data_alias . '_rows' )->fetchColumn();
						$weight = intval( $weight ) + 1;
						$stmt->bindParam( ':weight', $weight, PDO::PARAM_INT );
						$stmt->bindParam( ':alias', $alias, PDO::PARAM_STR );
						$stmt->bindParam( ':module', $module, PDO::PARAM_STR );
						$stmt->bindParam( ':op', $op_module, PDO::PARAM_STR );
						$stmt->bindParam( ':id_alias', $id_alias, PDO::PARAM_INT );
						$exc = $stmt->execute();
						if( $exc )
						{	
						}
					}
					catch( PDOException $e )
					{
					}
				}
				elseif($count == 1)
				{
					try{
					$db->query( "UPDATE " . NV_PREFIXLANG . "_" . $this->module_data_alias . "_rows SET alias='" . $alias . "' WHERE id_alias=" . $id_alias ." AND module like '". $module ."' AND op like '". $op_module ."'");
					}
					catch( PDOException $e )
					{
					}
				}
			}
		}
	}
	public function delete_alias_page($id_alias, $module, $op_module)
	{
		global $db_config, $db;
		if($id_alias > 0)
		{
			try{
				$db->query( "DELETE FROM " . NV_PREFIXLANG . "_" . $this->module_data_alias . "_rows WHERE id_alias=" . $id_alias ." AND module like '". $module ."' AND op like '". $op_module ."'");
			}
			catch( PDOException $e )
			{
			}
		}
	}
	public function check_catid_alias($catid_alias, $alias)
	{
		global $db_config, $module_data, $db;
		if(!empty($alias))
		{
			if($catid_alias > 0)
			{
				$this->check = $db->query("SELECT count(id) FROM " . NV_PREFIXLANG . "_" . $this->module_data_alias . "_rows WHERE catid_alias != ". $catid_alias . " AND alias like '". $alias ."'")->fetchColumn();
			}
			else
			{	
				$this->check = $db->query("SELECT count(id) FROM " . NV_PREFIXLANG . "_" . $this->module_data_alias . "_rows WHERE alias like '". $alias ."'")->fetchColumn();
			}
		}
	}
	public function add_alias_news($catid_alias, $id_alias, $alias, $module, $op_module)
	{
		global $db_config, $module_data, $db;
		if(!empty($alias) and !empty($module) and !empty($op_module))
		{
			$count = 1; 
			if($catid_alias > 0 and $id_alias > 0)
			{
				$count = $db->query("SELECT count(id) FROM " . NV_PREFIXLANG . "_" . $this->module_data_alias . "_rows WHERE id_alias = ". $id_alias . " AND module like '". $module ."' AND op like '". $op_module ."'")->fetchColumn();
				if($count == 0)
				{
					try{
						$stmt = $db->prepare( 'INSERT INTO ' . NV_PREFIXLANG . '_' . $this->module_data_alias . '_rows (alias, module, op, id_alias, catid_alias, weight, status) VALUES (:alias, :module, :op, :id_alias, :catid_alias, :weight, :status)' );
						$stmt->bindValue( ':status', 1, PDO::PARAM_INT );
						$weight = $db->query( 'SELECT max(status) FROM ' . NV_PREFIXLANG . '_' . $this->module_data_alias . '_rows' )->fetchColumn();
						$weight = intval( $weight ) + 1;
						$stmt->bindParam( ':weight', $weight, PDO::PARAM_INT );
						$stmt->bindParam( ':alias', $alias, PDO::PARAM_STR );
						$stmt->bindParam( ':module', $module, PDO::PARAM_STR );
						$stmt->bindParam( ':op', $op_module, PDO::PARAM_STR );
						$stmt->bindParam( ':id_alias', $id_alias, PDO::PARAM_INT );
						$stmt->bindParam( ':catid_alias', $catid_alias, PDO::PARAM_INT );
						$exc = $stmt->execute();
						if( $exc )
						{
						}
					}
					catch( PDOException $e )
					{
					}
				}
				elseif($count == 1)
				{
					try{
					$db->query( "UPDATE " . NV_PREFIXLANG . "_" . $this->module_data_alias . "_rows SET catid_alias=". $catid_alias .", alias='" . $alias . "' WHERE id_alias=" . $id_alias ." AND module like '". $module ."' AND op like '". $op_module ."'");
					}
					catch( PDOException $e )
					{
					}
				}
			}
		}
	}
	public function add_alias_catalogy_news($catid_alias, $alias, $module, $op_module)
	{
		global $db_config, $module_data, $db;
		if(!empty($alias) and !empty($module) and !empty($op_module))
		{
			$count = 1; 
			if($catid_alias > 0)
			{
				$count = $db->query("SELECT count(id) FROM " . NV_PREFIXLANG . "_" . $this->module_data_alias . "_rows WHERE catid_alias = ". $catid_alias . " AND module like '". $module ."' AND op like '". $op_module ."'")->fetchColumn();
				if($count == 0)
				{
					try{
						$stmt = $db->prepare( 'INSERT INTO ' . NV_PREFIXLANG . '_' . $this->module_data_alias . '_rows (alias, module, op, catid_alias, weight, status) VALUES (:alias, :module, :op, :catid_alias, :weight, :status)' );

						$stmt->bindValue( ':status', 1, PDO::PARAM_INT );

						$weight = $db->query( 'SELECT max(status) FROM ' . NV_PREFIXLANG . '_' . $this->module_data_alias . '_rows' )->fetchColumn();
						$weight = intval( $weight ) + 1;
						$stmt->bindParam( ':weight', $weight, PDO::PARAM_INT );
						$stmt->bindParam( ':alias', $alias, PDO::PARAM_STR );
						$stmt->bindParam( ':module', $module, PDO::PARAM_STR );
						$stmt->bindParam( ':op', $op_module, PDO::PARAM_STR );
						$stmt->bindParam( ':catid_alias', $catid_alias, PDO::PARAM_INT );

						$exc = $stmt->execute();
						if( $exc )
						{
						
						}
					}
					catch( PDOException $e )
					{
					  
					}
				}
				elseif($count == 1)
				{
					try{
					$db->query( "UPDATE " . NV_PREFIXLANG . "_" . $this->module_data_alias . "_rows SET catid_alias=". $catid_alias .", alias='" . $alias . "' WHERE catid_alias=" . $catid_alias ." AND module like '". $module ."' AND op like '". $op_module ."'");
					}
					catch( PDOException $e )
					{
					}
				}
			}
		}	
	}
	public function delete_alias_news($id_alias, $module, $op_module)
	{
		global $db_config, $db;
		if($id_alias > 0)
		{
			try{
				$db->query( "DELETE FROM " . NV_PREFIXLANG . "_" . $this->module_data_alias . "_rows WHERE id_alias=" . $id_alias ." AND module like '". $module ."' AND op like '". $op_module ."'");
			}
			catch( PDOException $e )
			{
			}
		}
	}
	public function delete_alias_catalogy_news($catid_alias, $module, $op_module)
	{
		global $db_config, $db;
		if($catid_alias > 0)
		{
			try{
				
				$db->query( "DELETE FROM " . NV_PREFIXLANG . "_" . $this->module_data_alias . "_rows WHERE catid_alias=" . $catid_alias ." AND module like '". $module ."' AND op like '". $op_module ."'");
			}
			catch( PDOException $e )
			{
			}
		}
	}
	public function list_tags()
	{
		global $db_config, $db;
		$list_tags = $db->query( "SELECT id, alias FROM " . NV_PREFIXLANG . "_" . $this->module_data_alias . " WHERE status =1")->fetchAll();
		return $list_tags;
	}
}