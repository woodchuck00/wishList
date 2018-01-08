<!-- form to add items to wish list db 
    only show if user is logged in  -->
<?php 
include_once "header.php";

if(isset($_SESSION['username'])) {
    $after_login=true;

 if($status=="before_submission" or $status=="failure") { ?>
  <h3>Please fill up the following form to add new book</h3>
  <form method="post">
    <fieldset>
      <legend>Item Add Form</legend>
      <label for="name">name</label>
      <input type="text" name=name id=name value="">
      <font color="red"><?php echo $errors["name"]; ?></font>
      <br>
      <label for="description">description</label>
      <textarea name="description" id="description" rows="4" cols="50"></textarea>
      <font color="red"><?php echo $errors["description"]; ?></font>
      <br>
      <label for="price">price</label>
      <input type="text" name="price" id="price" value="">
      <font color="red"><?php echo $errors["price"]; ?></font>
      <br>
      <label for="link">link</label>
      <input type="text" name="link" id="link" value="">
      <font color="red"><?php echo $errors["link"]; ?></font>
      <br>
      <label for="image">image</label>
      <!-- TODO use JS to upload images -->
      <input type="text" name="image" id="image" value="">
      <font color="red"><?php echo $errors["image"]; ?></font>
      <br>
      <input type="hidden" name="page" value="addItem">
      <input type="hidden" name="caller" value="self">
      <input type="submit" value="Save">
    </fieldset>
  </form>
<?php } else { ?>
    <h3>item saved</h3>
<?php
    }
  } else {
    $before_login=true;
?>
<h3>invalid login!</h3>
<?php } 
include_once "footer.php";
?>