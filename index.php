<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
  //header("location:Login.php");
  $navval = false;
  echo "<script>window.location.href='/Login.php';</script>";
  exit();
} else {
  $navval = true;
}

?>
  <?php
  require '_function.php';

  ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome Page</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  
</head>
<style>
#logout{
    display: none;
}
</style>

<body>


  <!-- modal 1 for editing -->

  <div class="modal" id="myModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="/index.php" method="post">
            <input type="hidden" name="srnoEdit" id="srnoEdit">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Name</label>
              <input name="nameEdit" class="form-control" id="nameEdit" placeholder="Enter Name">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Salary</label>
              <input type="number" name="salaryEdit" class="form-control" id="salaryEdit">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">DOJ </label>
              <input type="date" name="dateEdit" id="dateEdit" class="form-control">

            </div>
            <button type="submit" class="btn btn-outline-primary">Edit Info</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </form>
        </div>


      </div>
    </div>
  </div>


  <!-- modal 2 for deleting -->
  <div class="modal" id="delModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Employee Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <p>Are you sure you want to delete this note.</p>
              </div>
        
              <form action="/index.php" method="post">
                    <input type="hidden" name="srnoDelete" id="srnoDelete">
                    <button type="submit" class="btn btn-outline-danger mb-3 mx-3">Delete</button>
                  </form>
                </div>


            </div>
        </div>
    </div>







  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/index.php">Test Page</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
          </li>

        </ul>
        <form class="d-flex my-0" action="/index.php" method="post" role="search">
            <input type="hidden" name="logout" id="logout" value="1"> 
          <button class="btn btn-outline-success" type="submit">Logout</button>
        </form>
      </div>
    </div>
  </nav>


  <div class="container my-3">

    <form action="/index.php" method="post">

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input name="name" class="form-control" id="name" placeholder="Enter Name">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Salary</label>
        <input name="salary" type="number" class="form-control" id="salary" placeholder="Enter Salary">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">DOJ </label>
        <input type="date" class="form-control" name="doj" id="doj">
      </div>
      <button type="submit" class="btn btn-outline-primary">Add Employee</button>
    </form>
  </div>


  <div class="container my-4">
    <table id="myTable" class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Sr. No.</th>
          <th scope="col">Id.</th>
          <th scope="col">Name</th>
          <th scope="col">Salary</th>
          <th scope="col">DOJ</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody>
        <?php
        require '_dbconnect.php';

        $sql2 = "SELECT * FROM `employee`";
        $val2 = mysqli_query($conn, $sql2);
        $serial = 0;

        while ($row = mysqli_fetch_assoc($val2)) {
          $serial =  $serial + 1;
          echo     '<tr>
        <th scope="row">' . $serial . '</th>
        <td>' . $row['id'] . '</td>
        <td>' . $row['name'] . '</td>
        <td>' . $row['salary'] . '</td>
        <td>' . $row['DOJ'] . '</td>
        <td>
        <button class="edits btn btn-outline-primary btn-sm" data-bs-toggle="modal" id="edidtmodalbtn' . $row['id'] . '">Edit</button>
        <button class="delete btn btn-outline-primary btn-sm" data-bs-toggle="modal" id="' . $row['id'] . '">Delete</button>
        </td>
        </tr>';
        }

        ?>

      </tbody>
    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
  <script>
    Employee = document.getElementsByClassName('edits');
    Array.from(Employee).forEach((element) => {
      element.addEventListener("click", (e) => {
        $('#myModal').modal('toggle');
        tr = e.target.parentNode.parentNode;
        name = tr.getElementsByTagName('td')[1].innerText;
        salary = tr.getElementsByTagName('td')[2].innerText;
        date = tr.getElementsByTagName('td')[3].innerText;

        console.log(name);
        console.log(salary);
        console.log(date);

        nameEdit.value = name;
        salaryEdit.value = salary;
        dateEdit.value = date;
        val = tr.getElementsByTagName('td')[0].innerText;
        srnoEdit.value = val;
        // console.log(e.target.id);
      })
    });

    Dnotes = document.getElementsByClassName('delete');
    Array.from(Dnotes).forEach((element) => {
      element.addEventListener("click", (e) => {
        $('#delModal').modal('toggle');
        tr = e.target.parentNode.parentNode;
        srnoDelete.value = tr.getElementsByTagName('td')[0].innerText;
      })
    })
  </script>
</body>

</html>