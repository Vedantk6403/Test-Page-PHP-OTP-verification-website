<?php
echo '  <div class="modal" id="myModal" tabindex="-1">
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
</div>';