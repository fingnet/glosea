<?php
class Rest extends Service {
	
	function __construct($model = null){
		
	}
	
	//读取数据
	public function get($id){
		return is_null($id) ? $this -> $model -> getRow($id) : $this -> $model -> getList();
	}
	
	//新增数据
	public function put(){
		return $this -> $model -> create();
	}
	
	//修改数据
	public function post($id){
		return $this -> $model -> update($id);
	}
	
	//删除数据
	public function delete($id){
		return $this -> $model -> remove($id);
	}
}
