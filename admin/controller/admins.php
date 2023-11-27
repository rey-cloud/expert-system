<?php

require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

$sql = "SELECT * FROM users WHERE type='admin' and deleted_at IS null";
$result = $conn->query($sql);

$conn->close();
while ($row = $result->fetch_assoc()) {
    // Check if the logged-in admin's first name is "admin"
    // If it is, they can delete other admins (excluding themselves)
    if ($admin_first_name === "admin" && $row['first_name'] !== "admin") {
      $deleteLink = '<button type="submit" class="bg-[#a07f7e] hover:bg-[#864543] text-white py-1 px-2 rounded" name="deleteAdmin" value="' . $row['user_id'] . '">Delete</button>';
  } else {
      // Admin with other names or "admin" itself can't delete
      $deleteLink = 'Not Authorized';
  }
?>
<tr>
  <td class='py-2 px-4 border-r-2 text-center border-b'><?php echo $row['user_id']; ?></td>
  <td class='py-2 px-4 border-r-2 border-b'>
    <?php echo ucfirst($row['first_name']); ?>
    <?php echo ucfirst($row['last_name']); ?>
  </td>
  <td class='py-2 px-4 border-r-2 border-b'><?php echo $row['email']; ?></td>
  <td class='py-2 px-4 border-r-2 text-center border-b'><?php echo $row['pass']; ?></td>
  <td class='py-2 px-4 border-r-2 text-center border-b'><?php echo $deleteLink; ?></td>
</tr>
<?php } ?>