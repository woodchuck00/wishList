<?php
// Model for the user table in DB
class User {
  private $host = 'localhost';
  private $username = 'root';
  private $password = '';
  private $database = 'christmaslist';

  protected $logged_in;

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
  //checks to see if login errors exist, wrong username/password
  public function login(&$errors) {
    session_start();
    if(empty($_REQUEST["caller"])) {
      $status="before_submission";
    }
    else if($_REQUEST["caller"]=="self") {
      $errors=array();
      if(empty($_REQUEST["username"])) {
        $errors["username"]="Empty";
      } 
      else {  
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = :username AND password = :password LIMIT 1");
        $stmt->execute(['username' => $_POST['username'], 'password' => sha1($_POST['password'])]);
        $user=$stmt->fetch();
        if(empty($user)) {
          $errors["username"]="Invalid";
        } 
      }
      if(empty($_REQUEST["password"])) {
        $errors["password"]="Empty";
      }
      if(empty($errors)) {
        $status="success";
        $this->logged_in = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['ID'] = $user['ID'];
        header("Location: index.php");
      } else {
        $status="failure";
      }
    }
    return $status;
  }
  //logout function
  public function logout() {
    session_start();
    session_destroy();
    $this->logged_in=false;
    header("location:index.php");
  }
  //checks for error while user is registering
  public function register(&$errors) {
    if(empty($_REQUEST["caller"])) {
       $status="before_submission";
    }
    else if($_REQUEST["caller"]=="self") {
      $errors=array();
      if(empty($_REQUEST["email"])) {
        $errors["email"]="Empty";
      }
      if(empty($_REQUEST["username"])) {
        $errors["username"]="Empty";
      }
      else { //checks for duplicate username
       $stmt = $this->pdo->prepare("SELECT count(*) as total from user where username= :username");
       $stmt->execute(['username' => $_REQUEST["username"]]);

       $total=$stmt->fetch();
        
        if($total["total"]>1) {
          $errors["username"]="Duplicate";
        }
      }
      if(empty($_REQUEST["password"])) {
        $errors["password"]="Empty";
      }
      //if no error runs query to create user
      if(empty($errors)) {
        $stmt = $this->pdo->prepare("INSERT INTO `user` (`username`, `password`, `email`) VALUES ( :username, :password, :email)");
        $stmt->execute(array(
            ':username' => $_REQUEST["username"],
            ':password' => sha1($_REQUEST["password"]),
            ':email' => $_REQUEST["email"]
        ));
        $status="success";
      }
      else {
        $status="failure";
      }
    }
    return $status;
  }
  // checks to see if user is currently logged in
  public function logged_in() { 
    return $this->logged_in;
  }
  //destroy PDO session
  function __destruct() {
    $this->pdo = null;
  }
}