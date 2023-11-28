<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<div class="container-fluid d-flex justify-content-center">
  <div class="card w-50 border-dark my-5 text-bg-light">
    <div class="card-header fs-4">
      Login
    </div>
    <div>
      <?php
      // Incorrect credentials login attempt warning
      if (isset($_GET['error'])) {
        echo '<p class="card-text form-control border border-0 text-danger bg-transparent fw-semibold">Incorrect email or password</p>';
      }
      ?>
    </div>
    <div class="card-body">
      <form action="login.php" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control border-secondary" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control border-secondary" id="password" name="password" required>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input border-secondary" id="remember" name="remember">
          <label class="form-check-label" for="remember">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
</div>

<?php
include BASE_PATH . '/includes/footer.php';
?>