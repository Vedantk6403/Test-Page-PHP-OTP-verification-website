<?php
require '_dbconnect.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        $email = $_POST["email"];
        $sql = "SELECT * FROM `emailverify` WHERE `email` = '$email';";
        $val = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($val);
        $otp = rand(100000, 999999);
        $hash = password_hash($otp, PASSWORD_DEFAULT);
        if ($check) {
            $sql2 = "UPDATE `emailverify` SET `otp` = '$hash' WHERE `emailverify`.`email` = '$email';";
            $val2 = mysqli_query($conn, $sql2);

            if (mail($email, "OTP for verification", 'Your OTP is :<b>' . $otp . '</b><br>Thank you', "From: vedantk6403@gmail.com") && $val2) {
                session_start();
                $_SESSION['email'] = $email;
                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>Success!</strong> OTP has been sent successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                    <strong>Error!</strong> OTP not sent. Please check the email entered.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
        } else {
            $sql3 = "INSERT INTO `emailverify` (`email`, `otp`) VALUES ('$email', '$hash');";
            $val3 = mysqli_query($conn, $sql3);
            
            if (mail($email, "OTP for verification", 'Your OTP is :<b>' . $otp . '</b><br>Thank you', "From: vedantk6403@gmail.com") && $val3) {
                session_start();
          $_SESSION['email'] = $email;
                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>Success!</strong> OTP has been sent successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                    <strong>Error!</strong> OTP not sent. Please check the email entered.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
        }
    }
    else{
        session_start();
        $email = $_SESSION['email'];
        $otp = $_POST['otp'];
        $sql4 = "SELECT * FROM `emailverify` WHERE `email` = '$email';";
        $val4 = mysqli_query($conn, $sql4);
        $check2 = mysqli_num_rows($val4);
        while ($row = mysqli_fetch_assoc($val4)) {
            echo "<br>".$row['email'];
            $verify = password_verify($otp, $row['otp']);
        }
        if ($check2 == 1 && $verify) {
            header("location: /index.php");
            echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                            <strong>Success!</strong> Loged in successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';

            $_SESSION['login'] = true;
            // $_SESSION['email'] = $email;
            echo "<script>window.location.href='/index.php';</script>";
            //header("location: index.php");
            //   never use space in location 
            
        }
    }

}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Login Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>


<body>



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index.php">Test Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Login.php">Login</a>

                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container my-3">

        <h1 class="text-center" style="font-family: Anton, San-serif;">Login to our Website</h1>
        <?php
        // session_start();
        if (isset($_SESSION['email'])) {
            echo '<form action="/Login.php" method="POST">

    <div class="mb-3 otpcheck">
    <label for="exampleInputPass" class="form-label">Enter the OTP</label>
    <input type="otp" class="form-control" id="otp" name="otp">
</div>
<button type="submit" class="btn btn-primary otpcheck">Verify</button>
<button type="button" id="changeemail" class="btn btn-primary otpcheck">Change Email</button>
</form>';
        } else {
            echo '
    <form action="/Login.php" method="POST">
    <div class="mb-3 sendotp">
        <label for="exampleInputuser" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
        <div id="email" class="form-text">We will never share your email with anyone else.</div>
    </div>
    <button type="submit" id="sendotpbtn" class="btn btn-primary sendotp">Send OTP</button>
    
</div>
</form>
    ';
    
        }

        ?>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

        <script>
            // let sendotp = document.getElementById("sendotp");
            // sendotp.addEventListener("click", function(e){

            //     sendotp.style.display = none;
            // } )

            // $('#sendotpbtn').click(function() {
            //     $(".otpcheck").css("display", "inline-block");
            //     $(".sendotp").css("display", "none");
            // })

            // $('#changeemail').click(function() {
            //     // <?php
            //     // session_start();
            //     // session_unset();
            //     // session_destroy();
            //     // // header("location: Login.php");
            //     //  ?>
            //     $(".otpcheck").css("display", "none");
            //     $(".sendotp").css("display", "block");
            // })
        </script>
</body>

</html>