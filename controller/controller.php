<?php
include_once("model/model.php");
// controller runs functions based of variable in URL
class Controller {
	protected $model;
	
	public function __construct() {  
    $this->model = new Model();
  } 
  // runs if URL is ?page=index, defualt 
  public function index() {
		include_once "view/index.php";
	}
  // runs if URL is ?page=login
  public function login() {
    $status=$this->model->login($errors);
    include_once "view/login.php";
  }
  // runs if URL is ?page=logout
  public function logout() {
    $logged_in=$this->model->logout();
  }
  // runs if URL is ?page=register
  public function register() {
    $status=$this->model->register($errors);
    include_once "view/register.php";
  }
  // runs if URL is ?page=list
	public function list() {
		$itemList = $this->model->getList();
		include_once "view/itemList.php";
	}
  // runs if URL is ?page=addItem
  public function addItem() {
    $logged_in=$this->model->logged_in();
    $status=$this->model->addItem($errors);
    include_once "view/addItem.php";
  }
}