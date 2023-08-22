<?php
  session_start();
  if(isset($_SESSION["user"])){
    header("Location: profile.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  <title>Login Form</title>
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
                  Login
                </h2>
                <?php
                if(isset($_POST["login"])){
                  $email = $_POST["email"];
                  $password = $_POST["password"];
                  require_once "database.php";
                  $sql = "SELECT * FROM users WHERE email = '$email'";
                  $result = mysqli_query($conn, $sql);
                  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                  if($user){
                    if(password_verify($password, $user["password"])){
                      session_start();
                      $_SESSION["user"] = $user["email"];
                      header("Location: profile.php");
                      die();
                    }else {
                      echo "<div class='alert alert-danger' role='alert'>Password does not match</div>";
                    }
                  }else{
                    echo "<div class='alert alert-danger' role='alert'>Email does not exists</div>";
                  }
                }
                ?>

                <form action="login.php" method="post">

                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example3cg">Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example4cg">Password</label>
                  </div>

                  <div class="d-flex justify-content-center">
                    <button type="submit" name="login" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                      Login
                    </button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">
                    Don't have an account?
                    <a href="registration.php" class="fw-bold text-body"><u>Register here</u></a>
                  </p>
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