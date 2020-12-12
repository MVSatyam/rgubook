<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | rgubook</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/css/mdb.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/js/mdb.min.js"></script>

    <style>
        *{
            font-family: 'Roboto', arial;
        }
        .test {
            transition: .4s;
        }

        .test:hover {
            transition: .4s;
            background-color: rgba(3, 169, 244, 0.7);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top">

        <a href="#" class="navbar-brand"><i class="fab fa-facebook"></i> <b>RGUBOOK | Register</b> </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--<div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white test">Users</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white test">Products</a>
                </li>
            </ul>
        </div>-->

    </nav>
    <!-- Default form login -->
    <div class="card" style="margin: 50px auto;width: 450px;">
        <!-- Default form register -->
        <form class="text-center border border-light p-5" action="#!">

            <p class="h4 mb-4">Sign up</p>

            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name">
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="col">
                <label class="form-check-label" style="">Gender</label>
                </div>
                <div class="col">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" required>
                    <label class="form-check-label" for="gridRadios1">Male</label>
                </div>
                <div class="col">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female" required>
                    <label class="form-check-label" for="gridRadios2">Female</label>
                </div>
            </div>

            <!-- Id No -->
            <input type="text" id="defaultRegisterFormId" class="form-control mb-4" placeholder="Id No">

            <!-- E-mail -->
            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

            <!-- Password -->
            <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                At least 8 characters and 1 digit
            </small>

            <!-- Phone number -->
            <input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
            <!--<small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                Optional - for two step authentication
            </small>-->

            <!-- Newsletter -->
            <!--<div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
                <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
            </div>-->

            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Sign Up</button>

            <hr>

            <!-- Terms of service -->
            <!--<p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a>
            </p>
            <br>-->
            <p>Already a member?
                <a href="login.php">Login</a>
            </p>
        </form>
        <!-- Default form register -->
    </div>


</body>

</html>