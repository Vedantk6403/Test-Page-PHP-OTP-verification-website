<?php

echo '
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
        </li>';

  if(isset($_SESSION)){
      echo '   <form class="d-flex my-0" action="/index.php" method="post">
     <input type="hidden" name="logout" id="logout" value="1">
    <button class="btn btn-outline-success" type="submit">Logout</button>
    </form>';

  }
  else {
    echo '<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/Login.php">Login</a>

            </li>';
  }

echo'
    </ul>
 
  </div>
</div>
</nav>
';
