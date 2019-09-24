<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>Registration Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
    </head>
    <body class="text-center">
        <form class="form-signin" action="register.php" method="POST" id="testform">
            <img class="mb-4" src="images/icons/login.png" alt="" width="150" height="72">
            <?php 
                include("php/register.php");
                include("php/errors.php");
            ?>
            <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
            <div class="form-row">
                <div class="col-lg-4 offset-lg-1">
                    <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                </div>
                <div class="col-lg-6">
                    <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required>
                </div>
            </div>
            <div class="form-row">
                    <div class="col-lg-4 offset-lg-1">
                        <input type="password" name="pwd1" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
            </div>
            <div class="form-row">
                    <div class="col-lg-4 offset-lg-1">
                        <input type="password" name="pwd2" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <div class="col-lg-6">
                        <input type="number" name="pno" class="form-control" placeholder="Phone number" required>
                    </div>
            </div>
            <div class="form-row">
                    <div class="col-lg-4 offset-lg-1">
                        <input type="number" name="id" class="form-control" placeholder="ID" required>
                    </div>
                    <div class="col-lg-6">
                        <select name="designation" class="form-control">
                            <option value="Teaching">Teaching</option>
                            <option value="Non-Teaching">Non-Teaching</option>
                        </select>
                    </div>
            </div>
            <div class="form-row">
                    <div class="col-lg-4 offset-lg-1">
                        <input type="address" name="address" class="form-control" placeholder="Address" required>
                    </div>
                    <div class="col-lg-6">
                        <input type="number" name="att" class="form-control" placeholder="Attendance" required>
                    </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4 offset-lg-1">
                    <input type="text" name="quli" class="form-control" placeholder="Qualification" required>
                </div>
            </div>
            <div class="checkbox mb-3">
            <label>
                <p>Already have an account ? <a href="login.html">Click here to login</a></p>
            </label>
            </div>
            <div class="form-row">
                    <div class="col-lg-4 offset-lg-4">
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit-form">Sign in</button>
                    </div>
            </div>
        </form>

    </body>
</html>