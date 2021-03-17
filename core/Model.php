<?php 

class Model {
	protected $_DB,$_table, $_modelName, $_softDelete = false, $_columnNames = [];
	public $id; 

	public function __construct($table) {
		$this->_db = DB::getInstance();
		$this->_table = $table;
		$this->_setTableColumns();
		$this->_modelName = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->_table))); 
	} // end of construct

	protected function _setTableColumns() {
		$columns = $this->get_columns();
		foreach ($columns as $column) {
			$_columnName = $column->Field;
			$this->_columnNames[] = $column->Field;
			$this->{$_columnName} = null;
		}
	} // end of set tables columns 

	public function get_columns() {
		return $this->_db->get_columns($this->_table);
	} // end of method get columns 

	public function find($params = []) {
		$results = [];
		$resultsQuery = $this->_db->find($this->_table, $params);
		foreach ($resultsQuery as $result) {
			$obj = new $this->_modelName($this->_table);
			$obj->populateObjData($result);
			$results[] = $obj;
		}
		return $results;
	} // end of method find 

	public function findFirst($params = []) {
		$resultQuery = $this->_db->findFirst($this->_table, $params);
		$result = new $this->_modelName($this->_table);
		if($resultQuery){
		$result->populateObjData($resultQuery);
		}
		return $result;
	} // end of method find First 

	public function findById($id) {
		return $this->findFirst(['conditions' => "id = ?", 'bind' => [$id]]);
	} // end of method find by id

	public function save() {
		$fields = [];
		foreach ($this->_columnNames as $column) {
			$fields[$column] = $this->column;
		} 
		// determine whether to update or insert 
		if(property_exists($this, 'id') && $this->id != ''){
			return $this->update($this->id, $fields);
		} else {
			return $this->insert($fields);
		}
	} // end of method save

	public function insert($fields) {
		if($empty($fields)) return false;
		return $this->_db->insert($this->_table, $fields);
	} // end of method insert 

	public function update($id, $fields) {
		if(empty($fields) || $id == '') return false;
		return $this->_db->update($this_table, $id, $fields);
	} // end of method update

	public function delete($id) {
		if($id == '' && $this->id == '') return false;
		$id = ($id == '') ? $this->id : $id; 

		if($this->_softDelete) {
			return $this->update($id, ['deleted' => 1]);
		}
		return $this->_db->delete($this->_table, $id);
	} // end of method delete 

	public function query($sql, $bind=[]) {
		return $this->_db->query($sql, $bind);
	} // end of method query 

	public function data() {
		$data = new stdClass();
		foreach ($this->_columnNames as $column) {
			$data->column = $this->column;
		}

		return $data;
	} // end of method data 

	public function assign($params) {
		if(!empty($params)) {
			foreach ($params as $key => $val) {
				if(in_array($key, $this->_columnNames)) {
					$this->$key = sanitize($val);
				}
			}
			return true;
		}
		return false;
	} // end of method assign

	protected function populateObjData($result) {
		foreach ($result as $key => $val) {
				$this->$key = $val;
		}
	} // end of method populate object data


} // end of class Model