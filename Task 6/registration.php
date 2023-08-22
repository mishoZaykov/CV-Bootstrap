<?php
  session_start();
  if(isset($_SESSION["user"])){
    header("Location: profile.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  <title>Registration Form</title>
</head>

<body>
  <section class="vh-100 bg-image" style="
        background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');
      ">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">
                  Create an account
                </h2>
                <?php
                if (isset($_POST["submit"])) {
                  $username = $_POST["username"];
                  $email = $_POST["email"];
                  $phone = $_POST["phone"];
                  $password = $_POST["password"];
                  $passwordRepeat = $_POST["repeat_password"];

                  $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                  $errors = array();

                  if (empty($username) OR empty($email) OR empty($phone) OR empty($password) OR empty($passwordRepeat)) {
                    array_push($errors, "All fields are required");
                  }
                  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "Email is not valid");
                  }
                  if (strlen($phone) < 10) {
                    array_push($errors, "Phone number must be at least 10 digits long");
                  }
                  if (strlen($password) < 8) {
                    array_push($errors, "Password must be at least 8 characters long");
                  }
                  if ($password !== $passwordRepeat) {
                    array_push($errors, "Password does not match");
                  }

                  require_once "database.php";
                  $sql = "SELECT * FROM users WHERE email = '$email'";
                  $result = mysqli_query($conn, $sql);
                  $rowCont = mysqli_num_rows($result);
                  if($rowCont>0){
                    array_push($errors, "Email already exists!");
                  }
                  if(count($errors) > 0){
                    foreach($errors as $error){
                      echo "<div class='alert alert-danger' role='alert'>$error</div>";
                    }
                  }else{
                    $sql = "INSERT INTO users (username, email, phone_number, password) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                    if($prepareStmt){
                      mysqli_stmt_bind_param($stmt,"ssss",$username, $email, $phone, $passwordHash);
                      mysqli_stmt_execute($stmt);
                      echo "<div class='alert alert-success' role='alert'>Registered successfully</div>";
                    }else{
                      die("Something went wrong");
                    }
                  }
                }
                ?>

                <form action="registration.php" method="post">
                  <div class="form-outline mb-4">
                    <input type="text" name="username" id="form3Example1cg" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example1cg">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example3cg">Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" name="phone" id="form3Example3cg" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example3cg">Phone Number</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example4cg">Password</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="repeat_password" id="form3Example4cdg" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example4cdg">Repeat password</label>
                  </div>

                  <div class="d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                      Register
                    </button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">
                    Have already an account?
                    <a href="login.php" class="fw-bold text-body"><u>Login here</u></a>
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