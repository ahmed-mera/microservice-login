<?php
    $tittle = "Register";
    require_once "header.php";
?>

<div class="container register pt-5 mx-auto">
    <form action="?action=register" class="w-100 mx-auto" method="post" autocomplete="off">
        <h1 class="text-capitalize text-center mt-5 mb-5">Register</h1>
        <div class="form-row">
            <div class="col-6 mb-3 md-form">
                <label for="fname">First Name</label>
                <input name="fname" type="text" class="form-control" minlength="3" id="fname" required>
            </div>
            <div class="col-6 mb-3 md-form">
                <label for="lname">Last Name</label>
                <input name="lname" type="text" class="form-control" minlength="3"  id="lname" required>
            </div>

            <div class="col-12 mb-3 md-form">
                <label for="email">Email</label>
                <input name="email" type="email" minlength="8" class="form-control" id="email"  required>
            </div>

            <div class="col-6 mb-3 md-form">
                <label for="password">Password</label>
                <input name="password" type="password" minlength="8" class="form-control" id="password" required>
            </div>
            <div class="col-6 mb-3 md-form">
                <label for="conf-password">Confirm Password</label>
                <input name="conf-password" type="password" minlength="8" class="form-control"  id="conf-password" required>
            </div>

        </div>
        <button class="btn btn-primary btn-md btn-rounded" type="submit">Register</button>
    </form>
</div>

<?php
require_once "footer.php" ?>