<?php
require_once "../../util/dbConnect.php";
session_start();
?>
<script type="text/javascript">
          document.title = 'Login | VinaEnter Edu';
      </script>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <div class="container">
        <h1 class="text-center">Đăng nhập</h1>
        <div class="row">
            <div class="col-md-6">
                <?php
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    //kiểm tra tài khoản
                    $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
                    $result = $mysqli->query($query);
                    $infoUser = mysqli_fetch_assoc($result);

                    if ($infoUser) {
                        //lưu session
                        $_SESSION['user'] = $infoUser;
                        header("location: ../../admin/");
                    } else {
                        echo "Sai tk mk";
                    }
                }
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery_3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>