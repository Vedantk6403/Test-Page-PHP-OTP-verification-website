<?php
echo '  <div class="container my-4">
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

  <tbody>';
    
    require '_userdata.php';

    

  echo '</tbody>
</table>

</div>';

?>