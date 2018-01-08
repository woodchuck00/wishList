<?php include_once "header.php"; ?>
<!-- use the userid to change the class, use different color for each user.
      TODO: sort gift items into separate tables-->
  <?php foreach($itemList as $list) { 
    if ($list["userID"] == 1)
      $class = 'alexlist';
    if ($list["userID"] == 2)
      $class = 'fatherlist';
    if ($list["userID"] == 3)
      $class = 'nicklist';
    if ($list["userID"] == 4)
      $class = 'motherlist';
    if ($list["userID"] == 5)
      $class = 'omalist';
    ?>
    <table class="<?php echo $class; ?>">
    <tr>
      <td class="item_image"><img width="150" src="<?php echo $list["image"]; ?>"></td>
      <td class="item_content">
        <h2><?php echo $list["name"]; ?></h2>
        <p class='item_description'><?php echo $list["description"]; ?></p>
      </td>
      <td class="item_price">$<?php echo $list["price"]; ?></td>
      <td class="item_link"><a href="<?php echo $list["link"]; ?>">link</a></td>    
    </tr>
    </table>
  <?php } ?>
<?php include_once "footer.php"; ?>