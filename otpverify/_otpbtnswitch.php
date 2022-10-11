<?php
if (isset($_SESSION['email'])) {
    echo '<form action="/Login.php" method="POST">

    <div class="mb-3">
    <label for="exampleInputPass" class="form-label">Enter the OTP</label>
    <input type="otp" class="form-control" id="otp" name="otp">
</div>
<button type="submit" class="btn btn-primary otpcheck">Verify</button>
</form>
<form class="d-flex my-0" action="/Login.php" method="post">
     <input type="hidden" name="changeEmail" id="changeEmail" value="1">
    <button class="btn btn-primary" type="submit">Change Email</button>
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
