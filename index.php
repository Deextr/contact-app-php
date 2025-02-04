<?php include 'database/database.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="statics/css/styles.css" rel="stylesheet">
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

    .card {
      border: none;
      border-radius: 10px;
      transition: transform 0.2s ease-in-out;
      background: #fff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: bold;
      color: #333;
    }

    .card-text {
      color: #666;
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
            <a class="nav-link" href="views/add_contact.php">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h1 class="text-center mb-4" style="color: #4b6cb7;">Your Contacts</h1>
        <?php
        $res = $conn->query("SELECT * FROM contacts");
        ?>
        <?php if ($res->num_rows > 0) : ?>
          <div class="row">
            <?php while ($row = $res->fetch_assoc()) : ?>
              <div class="col-md-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?= $row['name']; ?></h5>
                    <p class="card-text text-muted"><?= $row['phone']; ?></p>
                    <p class="card-text text-muted"><?= $row['email']; ?></p>
                    <div class="d-flex gap-2">
                      <a href="views/update_contact.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                      <a href="handlers/delete_contact_handler.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
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