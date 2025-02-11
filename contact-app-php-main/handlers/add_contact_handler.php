<?php
session_start();
include "../database/database.php";

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $user_id = $_SESSION['user_id']; // Get the logged-in user's ID

        if (!ctype_digit($phone)) {
            die("Invalid phone number. Please enter only numbers.");
        }

        $stmt = $conn->prepare("INSERT INTO contacts (name, phone, email, user_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $phone, $email, $user_id);

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