<?php
class UserData {
	public static $tablename = "user";

	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->username = "";
		$this->password = "";
		$this->is_active = "0";
		$this->created_at = "NOW()";
	}
	//public static $obj = new UserData(); 

	public function add(){
		$sql = "insert into ".self::$tablename." (name,lastname,email,username,password,status,kind,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->username\",\"$this->password\",1,$this->kind,$this->created_at)";
		Executor::doit($sql);
	}

	public function register(){
		$sql = "insert into ".self::$tablename." (name,lastname,email,password,status,kind,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->password\",1,3,$this->created_at)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",email=\"$this->email\",username=\"$this->username\",password=\"$this->password\",status=$this->status,kind=$this->kind where id=$this->id";
		Executor::doit($sql);
	}

	public function update_profile(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",email=\"$this->email\",image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}
	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}


	public static function getByEmail($id){
		$sql = "select * from ".self::$tablename." where email=\"$id\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getAdmin(){
		$sql = "select * from ".self::$tablename." where kind= 1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


}

?>