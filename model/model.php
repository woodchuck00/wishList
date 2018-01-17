<?php
include_once("model/list.php");
include_once("model/user.php");
// unites the list and user classes to be easy called by the controller
class Model {
	protected $list;
	protected $user;
		
	public function __construct() {  
	  $this->list = new ItemList();
	  $this->user = new User();
	} 
	public function login(&$errors) {
	  return $this->user->login($errors);
	}
	public function logout() {
	  return $this->user->logout();
	}
	public function register(&$errors) {
	  return $this->user->register($errors);
	}
	public function forgot_password(&$errors) {
	  return $this->user->forgot_password($errors);
	}
	public function logged_in() {
	  return $this->user->logged_in();
	}
        public function getList() {
	  return $this->list->getList();
	}
	public function addItem(&$errors) {
	  return $this->list->add($errors);
	}
}
