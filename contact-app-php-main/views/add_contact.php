<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Contact</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../statics/css/styles.css" rel="stylesheet">
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

    .form-container {
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-label {
      font-weight: bold;
      color: #333;
    }

    .form-control {
      border-radius: 5px;
      border: 1px solid #ddd;
    }

    .form-control:focus {
      border-color: #4b6cb7;
      box-shadow: 0 0 5px rgba(75, 108, 183, 0.5);
    }

    .btn-primary {
      background-color: #4b6cb7;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 5px;
    }

    .btn-primary:hover {
      background-color: #3a5a9e;
    }

    .text-danger {
      font-size: 0.875rem;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="../index.php">Contact Manager</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php"><i class="bi bi-house-door-fill"></i>&nbsp;Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="form-container">
          <h1 class="text-center mb-4" style="color: #4b6cb7;">Add Contact</h1>
          <form action="../handlers/add_contact_handler.php" method="POST" onsubmit="return validatePhone()">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" name="phone" id="phone" required>
              <small class="text-danger" id="phoneError"></small>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Save Contact&nbsp;&nbsp;<i class="bi bi-download"></i></button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function validatePhone() {
      const phone = document.getElementById('phone').value;
      const phoneError = document.getElementById('phoneError');
      if (!/^\d+$/.test(phone)) {
        phoneError.textContent = 'Phone number must contain only numbers.';
        return false;
      }
      phoneError.textContent = '';
      return true;
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
