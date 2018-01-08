<?php 
  include_once "header.php";
  $before_login=true;
?>
<!-- registration form, only show if user is not logged in -->
<?php
  if($status=="before_submission" or $status=="failure") {
?>
  <h3>register yourself</h3>
  <form method="post">
    <fieldset>
      <legend>Registration Form</legend>
      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="">
      <font color="red"><?php echo $errors["email"]; ?></font>
      <br>
      <label for="username">Username</label>
      <input type="text" name="username" id="username" value="">
      <font color="red"><?php echo $errors["username"]; ?></font>
      <br>
      <label for="password">Password</label>
      <input type="password" name="password" id="password">
      <font color="red"><?php echo $errors["password"]; ?></font>
      <br>
      <input type="hidden" name="page" value="register">
      <input type="hidden" name="caller" value="self">
      <input type="submit" value="Sign Up">
    </fieldset>
  </form>
<?php } else { ?>
    <h3>Registration Successful</h3>
<?php
  }
  include_once "footer.php";
?>