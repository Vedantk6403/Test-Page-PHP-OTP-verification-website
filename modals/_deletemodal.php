<?php
echo
'   <div class="modal" id="delModal" tabindex="-1">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Delete Employee Record</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <p>Are you sure you want to delete this note.</p>


      <form action="/index.php" method="post">
        <input type="hidden" name="srnoDelete" id="srnoDelete">
        <button type="submit" class="btn btn-outline-danger mb-3 mx-3">Delete</button>
      </form>
    </div>
  </div>


</div>
</div>';
