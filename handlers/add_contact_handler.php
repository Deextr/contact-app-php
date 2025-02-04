<?php
include "../database/database.php";

try {
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if (!ctype_digit($phone)) {
      die("Invalid phone number. Please enter only numbers.");
    }

    $stmt = $conn->prepare("INSERT INTO contacts (name, phone, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $phone, $email);

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