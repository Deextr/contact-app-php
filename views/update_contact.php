<?php
include '../database/database.php';

try {
  $id = $_GET['id'];

  $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result && $result->num_rows > 0) {
    $contact = $result->fetch_assoc();
  } else {
    die("Contact not found");
  }
  $stmt->close();
} catch (\Exception $e) {
  echo "Error: " . $e;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Update Contact </title>
  <link href="../statics/css/bootstrap.min.css" rel="stylesheet">
  <script src="../statics/js/bootstrap.js"></script>
</head>

<body>
  <div class="container d-flex justify-content-center mt-5">
    <div class="col-6">
      <div class="row">
        <p class="display-5 fw-bold">Edit Contact</p>
      </div>
      <div class="row">
        <form class="form" action="../handlers/update_contact_handler.php" method="POST">
          <input name="id" value="<?= $contact['id'] ?>" hidden />
          <div class="my-3">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="<?= $contact['name'] ?>" required />
          </div>
          <div class="my-3">
            <label>Phone</label>
            <input class="form-control" type="text" name="phone" value="<?= $contact['phone'] ?>" required />
          </div>
          <div class="my-3">
            <label>Email</label>
            <input class="form-control" type="email" name="email" value="<?= $contact['email'] ?>" required />
          </div>
          <div class="my-3">
            <button type="submit" class="btn btn-outline-dark">Save Contact</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>