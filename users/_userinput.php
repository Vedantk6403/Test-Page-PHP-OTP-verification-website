<?php
echo '
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
';
?>
