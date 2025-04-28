<?php
$login = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "dbconnect.php";

    @$username = $_POST["username"];
    @$password = $_POST["password"];

    $sql = "Select * from users where Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("location: Home.php");
    }
    else
    {

    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-danger bg-opacity-25">
    <?php
    if ($login) {
        echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button></div>';
    }
    ?>
    <section>
        <div class="d-flex flex-column min-vh-100 justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-10 mx-auto bg-white rounded shadow">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <img src="logo.jpg" alt="login" class="img-fluid p-5 " />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="m-5 text-center">
                                    <h1>Welcome!</h1>
                                </div>

                                <form class="m-5" action="/miniproject/login.php" method="post">

                                    <label class="form-label">Dashboard
                                        <a href="/"> <input class="form-control" list="browsers"
                                                name="myBrowser" /></label></a>
                                    <datalist id="browsers">
                                        <option value="Student">
                                        <option value="Faculty">
                                        <option value="Admin">
                                    </datalist>


                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input class="form-control" type="text" id="username" name="username" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input class="form-control" type="password" id="password" name="password" />
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="form-check text-start">
                                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                                <label class="form-check-label" for="remember-me">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <!-- <input type="submit" class="form-control btn btn-primary mt-3" /> -->
                                        <button type="submit" class="form-control btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
            var username = document.getElementById("username").value;
            var username = document.getElementById("username").value;


        </script>
</body>

</html>