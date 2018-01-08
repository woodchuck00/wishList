<?php
// Model for the list table in DB
class ItemList {
  private $host = 'localhost';
  private $username = 'root';
  private $password = '';
  private $database = 'christmaslist';

  private $pdo;
  // connect to DB using PDO
  public function __construct() {
    if (!isset($this->pdo)) {
      $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
      if (!$this->pdo) {
        echo 'Cannot connect to database server';
        exit;
      }    
    }    
  }
  // get all items from list table
  public function getList() {
    $stmt = $this->pdo->prepare("SELECT * FROM item");
    $stmt->execute();

    $list = $stmt->fetchAll();

		return $list;
	}
  // add item to list table
  public function add(&$errors) {
    if(empty($_REQUEST["caller"])) {
      $status="before_submission";
    }
    else if($_REQUEST["caller"]=="self") {
      //display error if HTML table is incomplete
      $errors=array();
      if(empty($_REQUEST["name"])) {
        $errors["name"]="Empty";
      }
      if(empty($_REQUEST["description"])) {
        $errors["description"]="Empty";
      }
      if(empty($_REQUEST["price"])) {
        $errors["price"]="Empty";
      }
      if(empty($_REQUEST["link"])) {
        $errors["link"]="Empty";
      }
      if(empty($_REQUEST["image"])) {
        $errors["image"]="Empty";
      }
      //run sql query if no errors
      if(empty($errors)) {
        session_start();
        $stmt = $this->pdo->prepare("INSERT INTO `item` ( `userID`, `name`, `description`, `price`, `link`, `image`) VALUES ( :userID, :name, :description, :price, :link, :image)");
        $stmt->execute(array(':userID' => $_SESSION['ID'], 
                          ':name' => $_REQUEST["name"],
                          ':description' => $_REQUEST["description"],
                          ':price' => $_REQUEST["price"],
                          ':link' => $_REQUEST["link"],
                          ':image' => $_REQUEST["image"]
                         )); 
        $status="success";
      } else { 
        $status="failure";
      }
    }
    return $status;
  }
  //destroy PDO session
  function __destruct() {
    $this->pdo = null;
  }
}