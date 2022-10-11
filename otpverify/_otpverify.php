<?php
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

            if (mail($email, "OTP for verification", 'Your OTP is : ' . $otp . '  Thank you', "From: vedantk6403@gmail.com") && $val2) {
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
    elseif(isset($_POST['changeEmail'])){

        session_start();
        session_unset();
        session_destroy();
        echo "<script>window.location.href='/Login.php';</script>";
    }
    else{
        session_start();
        $email = $_SESSION['email'];
        $otp = $_POST['otp'];
        $sql4 = "SELECT * FROM `emailverify` WHERE `email` = '$email';";
        $val4 = mysqli_query($conn, $sql4);
        $check2 = mysqli_num_rows($val4);
        while ($row = mysqli_fetch_assoc($val4)) {
            $verify = password_verify($otp, $row['otp']);
        }
        if ($check2 == 1 && $verify) {

            $_SESSION['login'] = true;
            // $_SESSION['email'] = $email;
            
            //   never use space in location 
            echo "<script>window.location.href='/index.php';</script>";

        } else {
        }
    }
}
?>