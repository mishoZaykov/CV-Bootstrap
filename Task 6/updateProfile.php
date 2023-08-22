<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}

require_once "database.php";

if (isset($_POST["update"])) {
  $newUsername = $_POST["username"];
  $newEmail = $_POST["email"];
  $newPhone = $_POST["phone"];
  $newPassword = $_POST["password"];

  $userEmail = $_SESSION["user"];

  if (!empty($newPassword)) {
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    $updateQuery = "UPDATE users SET username = '$newUsername', email = '$newEmail', phone_number = '$newPhone', password = '$newPasswordHash' WHERE email = '$userEmail'";
  } else {
    $updateQuery = "UPDATE users SET username = '$newUsername', email = '$newEmail', phone_number = '$newPhone' WHERE email = '$userEmail'";
  }

  if (mysqli_query($conn, $updateQuery)) {
    // Update session user data after successful update
    $_SESSION["user"] = $newEmail;

    // Set a success message
    $_SESSION["update_success"] = "Profile updated successfully.";

    header("Location: profile.php");
    exit();
} else {
    echo "Error updating user information: " . mysqli_error($conn);
}
}
?>

