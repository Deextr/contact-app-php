<?php
include "../database/database.php";

try {
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    $stmt = $conn->prepare("UPDATE contacts SET name = ?, phone = ?, email = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $phone, $email, $id);

    if ($stmt->execute()) {
      header("Location: ../index.php");
      exit;
    } else {
      echo "Operation failed";
    }
  }
} catch (\Exception $e) {
  echo "Error: " . $e;
}