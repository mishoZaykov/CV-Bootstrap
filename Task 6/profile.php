<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  <title>User Profile</title>
</head>

<body>
  <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">
                  User profile
                </h2>

                <?php
                if (!isset($_SESSION["user"])) {
                  header("Location: login.php");
                  exit();
                }

                require_once "database.php";


                $userEmail = $_SESSION["user"];

                $sql = "SELECT * FROM users WHERE email = '$userEmail'";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                  die("Database query error: " . mysqli_error($conn));
                } else {
                  $userData = mysqli_fetch_assoc($result);
                }
                ?>

                <?php if (isset($_SESSION["update_success"])) : ?>
                  <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION["update_success"]; ?>
                  </div>
                  <?php unset($_SESSION["update_success"]); // Clear the message after displaying 
                  ?>
                <?php endif; ?>
                
                <form action="updateProfile.php" method="post">
                  <div class="form-outline mb-4">
                    <input type="text" name="username" id="form3Example1cg" class="form-control form-control-lg" value="<?php echo $userData['username']; ?>" />
                    <label class="form-label" for="form3Example1cg">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" value="<?php echo $userData['email']; ?>" />
                    <label class="form-label" for="form3Example3cg">Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" name="phone" id="form3Example3cg" class="form-control form-control-lg" value="<?php echo $userData['phone_number']; ?>" />
                    <label class="form-label" for="form3Example3cg">Phone Number</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form3Example3cg" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example3cg">New Password (Leave empty to keep current)</label>
                  </div>

                  <div class="d-flex justify-content-between">
                    <button type="submit" name="update" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                      Update
                    </button>
                    <a class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" href="logout.php" role="button">Logout</a>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>