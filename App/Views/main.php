<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Book</title>
    <link rel='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel="stylesheet" href="/assets/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
</head>
<body>
<nav class=" navbar navbar-expand-lg navbar-dark default-color">
    <a class="navbar-brand" href="/">Home</a>
    <h3 style="color: white ">Welcome To Our Phone Book Page</h3>

    <ul class="navbar-nav ml-auto nav-flex-icons">

        <li class="nav-item">
            <a class="nav-link waves-effect waves-light">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light">
                <i class="fab fa-google-plus-g"></i>
            </a>
        </li>
        <?php if (isset($_SESSION['is_logged_in'])): ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
        </li>
        <li>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <button class="logout_btn" type="submit" name="logout">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
            <?php endif; ?>
        </li>
    </ul>
    </div>
</nav>
<?php require($view); ?>
<script src="assets/script.js"></script>
</body>
</html>
