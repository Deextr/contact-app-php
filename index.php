<?php include 'database/database.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="statics/css/styles.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
      background: linear-gradient(90deg, #4b6cb7, #182848);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }

    .table {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .table th,
    .table td {
      vertical-align: middle;
    }

    .btn-warning {
      background-color: #ffc107;
      border: none;
    }

    .btn-danger {
      background-color: #dc3545;
      border: none;
    }

    .btn-warning:hover,
    .btn-danger:hover {
      opacity: 0.9;
    }

    .text-center {
      color: #555;
    }

    .text-muted {
      color: #999 !important;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Contact Manager</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="views/add_contact.php"><i class="bi bi-person-lines-fill"></i>&nbsp;Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <div class="row">
      <div class="col-md-10 mx-auto">
        <h1 class="text-center mb-4" style="color: #4b6cb7;">Your Contacts</h1>
        <?php
        $res = $conn->query("SELECT * FROM contacts");
        ?>
        <?php if ($res->num_rows > 0) : ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $res->fetch_assoc()) : ?>
                <tr>
                  <td><?= $row['name']; ?></td>
                  <td><?= $row['phone']; ?></td>
                  <td><?= $row['email']; ?></td>
                  <td>
                    <div class="d-flex gap-2">
                      <a href="views/update_contact.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i>&nbsp;Edit</a>
                      <a href="handlers/delete_contact_handler.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i>&nbsp;Delete</a>
                    </div>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        <?php else : ?>
          <div class="text-center">
            <p class="text-muted">🎉 No contacts found! Add a new contact.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
