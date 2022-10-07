<?php
  require '_dbconnect.php';


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['srnoEdit'])) {
      $seriall = $_POST['srnoEdit'];
      $name = $_POST['nameEdit'];
      $salary = $_POST['salaryEdit'];
      $date = $_POST['dateEdit'];
      $sql = " UPDATE `employee` SET `name` = '$name', `salary` = '$salary', `DOJ` = '$date' WHERE `employee`.`id` = $seriall;";
      $val3 = mysqli_query($conn, $sql);
      if ($val3) {
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
       <strong>Success!</strong> Your Info has been Updated successfully.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Error!</strong> We are facing some Error. Your Info has not been Updated successfully. Sorry for the inconveinence caused.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      }


    } 
    elseif (isset($_POST['srnoDelete'])) {
      $serialdel = $_POST['srnoDelete'];
      $sql5 = " DELETE FROM `employee` WHERE `employee`.`id` = $serialdel";
      $val5 = mysqli_query($conn, $sql5);
      if ($val5) {
        echo '<div class="alert alert-primary alert-dismissible fade show my-0" role="alert">
       <strong>Success!</strong> Your Note has been Deleted successfully.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Error!</strong> We are facing some Error. Your Note has not been Deleted successfully. Sorry for the inconveinence caused.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      }

     
    }
    elseif(isset($_POST['logout'])){
        session_start();
        session_unset();
        session_destroy();
        echo "<script>window.location.href='/Login.php';</script>";
    }

    else {
        $name = $_POST['name'];
        $salary = $_POST['salary'];
        $date = $_POST['doj'];

      $sql = " INSERT INTO `employee` (`name`, `salary`, `DOJ`) VALUES ('$name', '$salary', '$date');";

      $val2 = mysqli_query($conn, $sql);
      if ($val2) {
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
       <strong>Success!</strong> Your Info has been submitted successfully.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Error!</strong> We are facing some Error. Your Info has not been submitted successfully. Sorry for the inconveinence caused.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      }
    }
  }


?>