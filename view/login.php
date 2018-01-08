<?php
  include_once "header.php";

  // show html form if user is not logged, if user is logged in hide the form
	if($status=="before_submission" or $status=="failure") 	{ ?>
	<form method="post">
		<fieldset>
			<legend>Login Form</legend>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" value="">
			<font color="red"><?php echo $errors["username"]; ?></font>
			<br>
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
			<font color="red"><?php echo $errors["password"]; ?></font>
			<br>
			<input type="hidden" name="page" value="login">
			<input type="hidden" name="caller" value="self">
			<input type="submit" value="Sign In">
		</fieldset>
	</form>
<?php } else { ?>
		<form method="post">
			<input type="hidden" name="username" id="username" value="<?php echo $_REQUEST["username"]; ?>">
			<input type="hidden" name="password" id="password" value="<?php echo $_REQUEST["password"]; ?>">
			<input type="hidden" name="page" value="index">
		</form>
		<script>
			document.forms[0].submit();
		</script>
<?php 
  }
  include_once "footer.php";
?>
