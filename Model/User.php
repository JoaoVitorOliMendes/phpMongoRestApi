<?php

class User {
    private $id;
    private $firstName;
    private $middleName;
    private $email;
    private $password;

    public function __construct($id, $firstName, $middleName, $email, $password) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->email = $email;
        $this->password = $password;
    }
    
    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getFirstName(){
		return $this->firstName;
	}

	public function setFirstName($firstName){
		$this->firstName = $firstName;
	}

	public function getMiddleName(){
		return $this->middleName;
	}

	public function setMiddleName($middleName){
		$this->middleName = $middleName;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}
}


?>